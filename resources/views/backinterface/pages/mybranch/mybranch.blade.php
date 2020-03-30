
@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Bayi bilgileri')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Bayim</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Bayi bilgileri</span></li>
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
                                    <h5 class="">Bayi bilgileri</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">

                                            <div class="work-section">


                                                <div class="row">

                                                    <div class="col-lg-12">

                                                        <ul class="list-group">

                                                            <li class="list-group-item" style="display: flex; flex-direction: row; justify-content: space-between">
                                                                <span><b>Bayi adı</b></span>
                                                                <span>{{$branch->branch_name}}</span>
                                                            </li>

                                                            <li class="list-group-item" style="display: flex; flex-direction: row; justify-content: space-between">
                                                                <span><b>Komisyon</b></span>
                                                                <span>{{$branch->branch_committee}}</span>
                                                            </li>

                                                            <li class="list-group-item" style="display: flex; flex-direction: row; justify-content: space-between">
                                                                <span><b>İl</b></span>
                                                                <span>{{$branch->get_province->il_adi}}</span>
                                                            </li>

                                                            <li class="list-group-item" style="display: flex; flex-direction: row; justify-content: space-between">
                                                                <span><b>İlçe</b></span>
                                                                <span>{{$branch->get_county->ilce_adi}}</span>
                                                            </li>

                                                        </ul>

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

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css">

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


@endsection
