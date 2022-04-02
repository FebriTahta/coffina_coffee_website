@extends('layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">About Us</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">About Us
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="col-xl-12">
                    <div id="errList" class="text-uppercase"></div>
                </div>
                <!-- Basic Inputs start -->
                <form id="formadd">
                    @csrf
                    @if ($profile == null)
                    <section id="basic-input">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">About Us Section</h4>
                                        <small><code></code></small>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="customFile">Image</label>
                                                    <div class="custom-file" style="margin-bottom: 20px">
                                                        <input onchange="showPreview(event)" type="file"
                                                            class="custom-file-input" name="img" id="customFile" required/>
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="customFile">Title</label>
                                                    <input type="text" name="title" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="customFile">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="">Image Preview</label>
                                                    <img src="" id="preview" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="text-align: right;">
                                                <input type="submit" id="btnadd" class="btn btn-sm btn-info"
                                                    value="SUBMIT!">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @else
                    <section id="basic-input">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">About Us Section</h4>
                                        <small><code></code></small>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="customFile">Image</label>
                                                    <div class="custom-file" style="margin-bottom: 20px">
                                                        <input onchange="showPreview(event)" type="file"
                                                            class="custom-file-input" name="img" id="customFile"/>
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="customFile">Title</label>
                                                    <input type="hidden" name="id" value="{{$profile->id}}">
                                                    <input type="text" name="title" value="{{$profile->title}}" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="customFile">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10">{{$profile->deskripsi}}</textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="">Image Preview</label>
                                                    <img src="{{asset('img/about/'.$profile->img)}}" id="preview" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="text-align: right;">
                                                <input type="submit" id="btnadd" class="btn btn-sm btn-info"
                                                    value="SUBMIT!">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#textwe').val('woo');
        })

        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("preview");

                preview.src = src;
                preview.style.display = "block";
            }
        }

        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('about.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Process Adding Team');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $("#formadd")[0].reset();
                        $('#btnadd').val('SUBMIT!');
                        $('#btnadd').attr('disabled', false);
                        window.location.reload();
                        toastr['success']('👋' + response.message, 'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                        });
                    } else {
                        $("#formadd")[0].reset();
                        $('#btnadd').val('SUBMIT!');
                        $('#btnadd').attr('disabled', false);
                        toastr['error']('👋' + response.message, 'Error!', {
                            closeButton: true,
                            tapToDismiss: false,
                        });
                        $('#errList').html("");
                        $('#errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#errList').append('<div>' + err_values + '</div>');
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
