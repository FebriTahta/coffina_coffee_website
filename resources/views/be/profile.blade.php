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
                                    <li class="breadcrumb-item active">Profile
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Inputs start -->
                
                    @if ($profile == null)
                    <section id="basic-input">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ICON & LOGO</h4>
                                        <small><code>if you want to show the logo thumbnail at the social media, the size
                                                must
                                                be less than 250kb</code></small>
                                    </div>
                                    <form id="formadd">
                                        @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <label for="customFile">Icon (80px * 80px)</label>
                                                <div class="custom-file" style="margin-bottom: 20px">
                                                    <input onchange="showPreview(event)" type="file"
                                                        class="custom-file-input" name="icon" id="customFile" required/>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <br>
                                                <img src="" id="preview" height="100px" width="auto" alt="">
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <label for="customFile">Logo Website</label>
                                                <div class="custom-file" style="margin-bottom: 20px">
                                                    <input onchange="showPreview2(event)" type="file"
                                                        class="custom-file-input" name="logo" id="customFile" required/>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <br>
                                                <img src="" id="imgpreview" height="100px" width="auto" alt="">
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                               <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                        <label>Email Corp</label>
                                                        <input type="email" class="form-control" name="email" id="email" required>
                                                    </div>
                                               </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <div class="row">
                                                     <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                         <label>Background Color : </label>
                                                         <input type="color" class="form-control" value="" name="warna_bg" id="warna_bg" required req>
                                                         <span id="bg_val"> </span>
                                                     </div>
                                                     <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                        <label>Text Color : </label>
                                                        <input type="color" class="form-control" value="" name="warna_text" id="warna_text" required>
                                                        <span id="text_val"> </span> 
                                                    </div>
                                                </div>
                                             </div>
                                            <div class="col-md-12" style="text-align: right;">
                                                <input type="submit" id="btnadd" class="btn btn-sm btn-info"
                                                    value="SUBMIT!">
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <input type="hidden" id="parameter" value="kosong">
                    @else
                    <form id="formadd">@csrf
                        <input type="hidden" name="id" value="{{$profile->id}}">
                    <section id="basic-input">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ICON & LOGO</h4>
                                        <small><code>if you want to show the logo thumbnail at the social media, the size
                                                must
                                                be less than 250kb</code></small>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <label for="customFile">Icon (80px * 80px)</label>
                                                <div class="custom-file" style="margin-bottom: 20px">
                                                    <input onchange="showPreview(event)" type="file"
                                                        class="custom-file-input" name="icon" id="customFile" />
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <br>
                                                <img src="{{asset('img/icon/'.$profile->icon)}}" id="preview" height="100px" width="auto" alt="">
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <label for="customFile">Logo Website</label>
                                                <div class="custom-file" style="margin-bottom: 20px">
                                                    <input onchange="showPreview2(event)" type="file"
                                                        class="custom-file-input" name="logo" id="customFile"/>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <br>
                                                <img src="{{asset('img/logo/'.$profile->logo)}}" id="imgpreview" height="100px" width="auto" alt="">
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <div class="row">
                                                     <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                         <label>Email Corp</label>
                                                         <input type="email" class="form-control" value="{{$profile->email}}" name="email" id="email" required>
                                                     </div>
                                                </div>
                                             </div>
                                             <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                        <label>Background Color : </label>
                                                        <input type="color" class="form-control" value="{{$profile->warna_bg}}" name="warna_bg" id="warna_bg" required req>
                                                        <span id="bg_val"> {{$profile->warna_bg}} </span>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                       <label>Text Color : </label>
                                                       <input type="color" class="form-control" value="{{$profile->warna_text}}" name="warna_text" id="warna_text" required>
                                                       <span id="text_val"> {{$profile->warna_text}}</span> 
                                                   </div>
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
                </form>
                <input type="hidden" id="parameter" value="ada">
                <input type="hidden" id="ada_warna_bg" value="{{$profile->warna_bg}}">
                <input type="hidden" id="ada_warna_text" value="{{$profile->warna_text}}">
                    @endif
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
            
                var colorButton = document.getElementById("warna_bg");
                var colorDiv = document.getElementById("bg_val");

                var colorButton2 = document.getElementById("warna_text");
                var colorDiv2 = document.getElementById("text_val");

                colorButton.oninput = function() {
                    colorDiv.innerHTML = colorButton.value;
                    colorDiv.style.color = colorButton.value;
                }

                colorButton2.oninput = function() {
                    colorDiv2.innerHTML = colorButton2.value;
                    colorDiv2.style.color = colorButton2.value;
                }
            
            
        })

        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("preview");

                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreview2(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("imgpreview");

                preview.src = src;
                preview.style.display = "block";
            }
        }

        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('profile.store') }}",
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

                        // document.getElementById("warna_bg").value = response.warna_bg;
                        // document.getElementById("bg_val").value = response.warna_bg;

                        // document.getElementById("warna_text").value = response.warna_bg;
                        // document.getElementById("text_val").value = response.warna_text;
                        
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
