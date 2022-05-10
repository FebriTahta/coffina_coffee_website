@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}  ">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}  ">
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
                            <h2 class="content-header-title float-left mb-0">PRODUCT</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Product Item
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Inputs start -->
                <section id="basic-input">
                    <div class="row">
                        <div class="col-xl-12">
                            <div id="errList" class="text-uppercase"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">INPUT PRODUCT</h4>
                                </div>
                                <form id="formadd">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12 mb-1">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12 mb-1">
                                                <label for="">Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control summernote" id="" cols="30" rows="3"></textarea>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">Jenis</label>
                                                    <select name="jenis_id" class="form-control" id="" required>
                                                        <option value=""></option>
                                                        @foreach ($jenis as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                <label for="customFile">Image Product</label>
                                                <div class="custom-file" style="margin-bottom: 20px">
                                                    <input onchange="showPreview(event)" type="file"
                                                        class="custom-file-input" name="img" id="customFile" required/>
                                                    <label class="custom-file-label" id="img_preview" for="customFile">Choose file</label>
                                                </div>
                                                <br>
                                                <img src="" id="preview" alt="">
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                                
                                                <input type="submit" class="btn btn-sm btn-primary" id="btnadd"
                                                    value="INPUT!">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <section id="responsive-datatable">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header border-bottom">
                                                <h4 class="card-title">Product Table</h4>
                                            </div>
                                            <div class="card-datatable">
                                                <table class="table" id="example">
                                                    <thead>
                                                        <tr>
                                                            <th>img</th>
                                                            <th>jenis</th>
                                                            <th>name</th>
                                                            <th>deskripsi</th>
                                                            <th>option</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>img</th>
                                                            <th>jenis</th>
                                                            <th>name</th>
                                                            <th>deskripsi</th>
                                                            <th>option</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
                <!-- Basic Inputs end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: red">
                    <h4 class="modal-title" id="myModalLabel17" style="color: white">DELETE DATA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formdel">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id" name="id" required>
                                    <input type="hidden" class="form-control" id="image" name="img" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" style="text-align: center">
                                    <h5 style="font-weight: 900">ARE YOU SURE TO DELETE THIS FILE ?</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" id="btndel" value="DELETE!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(11, 202, 139)">
                    <h4 class="modal-title" id="myModalLabel17" style="color: white">UPDATE DATA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formadd2">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12 mb-1">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" required>
                                    <label for="basicInput">name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Mini Title" />
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-12 mb-1">
                                <div class="form-group">
                                    <label for="helpInputTop">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control summernote"></textarea>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                <label for="customFile">Image Product</label>
                                <div class="custom-file" style="margin-bottom: 20px">
                                    <input type="file" class="custom-file-input" onchange="showPreview2(event)" name="img"
                                        id="customFile" />
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <br>
                                <input type="submit" class="btn btn-sm btn-primary" id="btnadd2" value="INPUT!">
                            </div>
                            <div class="col-xl-6 col-md-6 col-12 mb-1">
                                <img src="" id="imgpreview" alt="">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/table-datatables-advanced.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>

    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        $(document).ready(function() {
                $('.summernote').summernote({
                    placeholder: 'Deskripsi...',
                    tabsize: 2,
                    height: 200
                });
            });

        function showPreview2(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("imgpreview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
    <script>
        $('#modaledit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var deskripsi = button.data('deskripsi')
            var src = button.data('src')
            var modal = $(this)
            modal.find('.modal-content #id').val(id);
            modal.find('.modal-content #name').val(name);
            // modal.find('.modal-content #deskripsi').val(deskripsi);
            $('#deskripsi').summernote('code',deskripsi);
            document.getElementById('imgpreview').src = src;
            console.log(src);
        })
    </script>
    <script>
        $('#large').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var image = button.data('image')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #image').val(image);
        })
    </script>
    <script>
        $('#formdel').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('product.delete') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndel').attr('disabled', 'disabled');
                    $('#btndel').val('Process Deleting Product');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#large').modal('hide');
                        $("#formdel")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btndel').val('DELETE!');
                        $('#btndel').attr('disabled', false);
                        toastr['error']('👋' + response.message, 'Warning!', {
                            closeButton: true,
                            tapToDismiss: false,
                        });
                    } else {
                        $("#formdel")[0].reset();
                        $('#btndel').val('DELETE!');
                        $('#btndel').attr('disabled', false);
                        toastr['warning']('👋' + response.message, 'Warning!', {
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
    <script>
        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('product.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Proses Input');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#large').modal('hide');
                        $("#formadd")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#img_preview').html('');
                        $('#btnadd').val('INPUT!');
                        $('#btnadd').attr('disabled', false);
                        toastr['success']('👋' + response.message, 'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                        });
                    } else {
                        $('#btnadd').val('INPUT!');
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

        $('#formadd2').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('product.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd2').attr('disabled', 'disabled');
                    $('#btnadd2').val('Proses Input');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaledit').modal('hide');
                        $("#formadd2")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd2').val('INPUT!');
                        $('#btnadd2').attr('disabled', false);
                        toastr['success']('👋' + response.message, 'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                        });
                    } else {
                        $('#btnadd2').val('INPUT!');
                        $('#btnadd2').attr('disabled', false);
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

    <script>
        $(document).ready(function() {
            console.log('lol');
            var table = $('#example').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.page') }}",
                columns: [{
                        
                        data: 'image',
                        name: 'image'
                    },
                    {
                        
                        data: 'jenis',
                        name: 'jenis.name'
                    },
                    {
                        
                        data: 'name',
                        name: 'name'
                    },
                    {
                        
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },

                    {
                        
                        data: 'option',
                        name: 'option',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endsection
