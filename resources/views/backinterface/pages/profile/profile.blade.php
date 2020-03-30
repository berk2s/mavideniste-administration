@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Profil Ayarları')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Ayarlar</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Profil Ayarları</span></li>
@endsection

@section('content')
<div class="layout-px-spacing">
    <form method="post" action="" id="work-experience" class="section work-experience">

    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h5 class="">PROFİL BİLGİLERİM</h5>
                                <div class="row">

                                    <div class="col-md-11 mx-auto">

                                        <div class="work-section">

                                                {{csrf_field()}}
                                            <input
                                                type="hidden"
                                                name="user_id"
                                                value="{{$user->user_id}}"
                                            />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="degree2">İsim & Soyisim</label>
                                                        <input type="text" class="form-control mb-4" name="user_name" id="user_name" value="{{$user->user_name}}">
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="degree3">E-Posta Adresi</label>
                                                                <input type="text" class="form-control mb-4" id="email" value="{{$user->email}}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="degree4">Telefon Numarası</label>
                                                                <input type="text" class="form-control mb-4" name='user_phone' id="user_phone" value="{{$user->user_phone}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>İletişim Adresi</label>
                                                        <textarea class="form-control" id='user_address' name="user_address" rows="5">{{$user->user_address}}</textarea>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="account-settings-footer">

            <div class="as-footer-container" style="flex-direction: row-reverse">

                <input
                    type="submit"
                    class="btn btn-primary"
                    value="Kaydet"
                />
            </div>

        </div>
    </form>
    </div>

</div>
@endsection

@section('header_addons')

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('footer_addons')
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/js/users/account-settings.js"></script>
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- toastr -->
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    @php

        if($_GET){
            echo "<script>
                Snackbar.show({text: 'Profil ayarları değiştirildi', duration: 100000});
            </script>";
        }

    @endphp
@endsection
