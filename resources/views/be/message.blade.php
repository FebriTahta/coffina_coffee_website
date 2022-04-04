@extends('layouts.master')

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">


    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-quill-editor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-email.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"> --}}
     <!-- BEGIN: Vendor CSS-->
     <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/katex.min.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/quill.snow.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
     <!-- END: Vendor CSS-->
 
     <!-- BEGIN: Theme CSS-->
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
 
     <!-- BEGIN: Page CSS-->
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-quill-editor.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
     <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-email.css">
     <!-- END: Page CSS-->
 
     <!-- BEGIN: Custom CSS-->
     <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
     <!-- END: Custom CSS-->
@endsection

@section('content')
<?php $pesan = App\Models\Message::orderBy('id','desc')->with('choice')->get();
      $belum_dibaca = App\Models\Message::where('status','belum dibaca')->get();
               ?>
<div class="app-content content email-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-area-wrapper container-xxl p-0">
        <div class="sidebar-left">
            <div class="sidebar">
                <div class="sidebar-content email-app-sidebar">
                    <div class="email-app-menu">
                        <div class="form-group-compose text-center compose-btn">
                            <button onClick="refresh(this)" type="button" class="compose-email btn btn-primary btn-block" data-backdrop="false" data-toggle="modal" data-target="#compose-mail">
                                refresh page
                            </button>
                        </div>
                        <div class="sidebar-menu-list">
                            <div class="list-group list-group-messages">
                                <a href="javascript:void(0)" class="list-group-item list-group-item-action active">
                                    <i data-feather="mail" class="font-medium-3 mr-50"></i>
                                    <span class="align-middle">Messages</span>
                                    <span class="badge badge-light-primary badge-pill float-right">{{$belum_dibaca->count()}} from {{$pesan->count()}}</span>
                                </a>
                                <hr>
                                {{-- <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                    <i data-feather="eye" class="font-medium-3 mr-50"></i>
                                    <span class="align-middle">Read All Messages</span>
                                    <span class="badge badge-light-danger badge-pill float-right">{{$belum_dibaca->count()}}</span>
                                </a> --}}
                               
                            </div>
                            <!-- <hr /> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="content-right">
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="body-content-overlay"></div>
                    <!-- Email list Area -->
                    <div class="email-app-list">
                        <!-- Email search starts -->
                        <div class="app-fixed-search d-flex align-items-center">
                            <div class="sidebar-toggle d-block d-lg-none ml-1">
                                <i data-feather="menu" class="font-medium-5"></i>
                            </div>
                            <div class="d-flex align-content-center justify-content-between w-100">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="email-search" placeholder="Search email" aria-label="Search..." aria-describedby="email-search" />
                                </div>
                            </div>
                        </div>
                        <!-- Email search ends -->

                        <!-- Email actions starts -->
                        <div class="app-action">
                            <div class="action-right">
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item mail-delete">
                                        <span class="action-icon"><i data-feather="trash-2" class="font-medium-2"></i></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Email actions ends -->

                        <!-- Email list starts -->
                        <div class="email-user-list">
                            <ul class="email-media-list">
                                @foreach ($pesan as $key=> $item)
                                <li 
                                data-id="{{$item->id}}" data-name="{{$item->name}}" data-email="{{$item->email}}" data-phone="{{$item->phone}}"
                                data-deskripsi="{{$item->deskripsi}}" data-status="{{$item->status}}" data-tanggal="{{$item->created_at}}" 
                                
                                <?php 
                                    $pilihan = [];
                                    foreach ($item->choice as $key => $value) {
                                        # code...
                                        $pilihan[] = $value->name;
                                    }
                                    $ya = implode(", ", $pilihan);
                                ?>

                                data-choice="{{
                                    $ya
                                }}"
                                    @if ($item->status == 'belum dibaca')
                                    class="media mail-read"
                                    @else
                                    class="media"
                                    @endif
                                >
                                    <div class="media-left pr-50" onclick="Tes(event)">
                                        <div class="avatar">
                                            <img src="{{asset('app-assets/images/portrait/small/avatar-s-9.jpg')}}" alt="avatar img holder" />
                                        </div>
                                        <div class="user-action">
                                            <span class="email-favorite" data-id="{{$item->id}}"><i data-feather="trash"></i></span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="mail-details">
                                            <div class="mail-items">
                                                <h5 class="mb-25">{{$item->name}}</h5>
                                                <span class="text-truncate">🎯 {{$item->email}} | {{$item->phone}}</span>
                                            </div>
                                            <div class="mail-meta-item">
                                                <span class="mr-50 bullet bullet-success bullet-sm"></span>
                                                <span class="mail-date">{{$item->created_at}}</span>
                                            </div>
                                        </div>
                                        <div class="mail-message">
                                            <p class="text-truncate mb-0">
                                                {{$item->deskripsi}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                            <div class="no-results">
                                <h5>No Items Found</h5>
                            </div>
                        </div>
                        <!-- Email list ends -->
                    </div>
                    <!--/ Email list Area -->
                    <!-- Detailed Email View -->
                    <div class="email-app-details">
                        <!-- Detailed Email Header starts -->
                        <div class="email-detail-header">
                            <div class="email-header-left d-flex align-items-center">
                                <span class="go-back mr-1"><i data-feather="chevron-left" class="font-medium-4"></i></span>
                                <h4 class="email-subject mb-0">Detail Messages 😃</h4>
                            </div>
                            
                        </div>
                        <!-- Detailed Email Header ends -->

                        <!-- Detailed Email Content starts -->
                        <div class="email-scroll-area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="email-label">
                                        <span class="mail-label badge badge-pill badge-light-primary">Company</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header email-detail-head">
                                            <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                                                <div class="avatar mr-75">
                                                    <img src="{{asset('app-assets/images/portrait/small/avatar-s-9.jpg')}}" alt="avatar img holder" width="48" height="48" />
                                                </div>
                                                <div class="mail-items">
                                                    <h5 class="mb-0" id="nama_pengirim">Carlos Williamson</h5>
                                                    <div class="email-info-dropup">
                                                        <span id="email_pengirim" role="button" class="dropdown-toggle font-small-3 text-muted" id="card_top01" aria-haspopup="true" aria-expanded="false">
                                                            carlos@gmail.com
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mail-meta-item d-flex align-items-center">
                                                <small class="mail-date-time text-muted" id="tanggal_pengirim">29 Aug, 2020, 14:58</small>
                                            </div>
                                        </div>
                                        <div class="card-body mail-message-wrapper pt-2">
                                            <div class="mail-message">
                                                <p class="card-text">Hi,</p>
                                                <p class="card-text" id="deskripsi_pengirim">
                                                    bah kivu decrete epanorthotic unnotched Argyroneta nonius veratrine preimaginary saunders demidolmen
                                                    Chaldaic allusiveness lorriker unworshipping ribaldish tableman hendiadys outwrest unendeavored
                                                    fulfillment scientifical Pianokoto Chelonia
                                                </p>
                                                <p id="choice_pengirim"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="mb-0">
                                                    Click here to
                                                    <u><a href="mailto:mail" id="mailto_pengirim" class="text-primary">reply message</a></u>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Detailed Email Content ends -->
                    </div>
                    <!--/ Detailed Email View -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    {{-- <script src="{{asset('app-assets/vendors/js/editors/quill/katex.min.js')}}"></script> --}}
    {{-- <script src="{{asset('app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script> --}}
    <script src="{{asset('app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-email.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script>
        $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });
            
        function refresh(){
              window.location.reload("Refresh")
            }
      </script>
@endsection