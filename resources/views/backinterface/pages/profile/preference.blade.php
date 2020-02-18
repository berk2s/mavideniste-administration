@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Şifre Değiştir')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Ayarlar</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Tercihlerim</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">
        <form method="post" action="" id="work-experience" class="section work-experience">
            {{csrf_field()}}
            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <div class="info">
                                    <h5 class="">TERCİHLERİM</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">

                                            <div class="work-section">


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="degree2">Koyu Tasarım</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <label class="switch s-icons s-outline  s-outline-success  ">
                                                                <input type="checkbox" name="darktheme"
                                                                {{
                                                                    \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? 'checked' : ''
                                                                }}
                                                                >
                                                                <span class="slider round"></span>
                                                            </label>
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
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/forms/switches.css">
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

        if(!empty($_GET['success'])){
            echo "<script>
                Snackbar.show({text: 'Tercih değiştirildi! ', duration: 50000});
            </script>";
        }


    @endphp
@endsection
