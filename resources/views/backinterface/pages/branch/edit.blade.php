@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Kategori Ekle')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Bayi</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Bayi düzenle</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <form action="" method="post">
                {{csrf_field()}}
                <div class="account-content">
                    <div class="scrollspy-example section work-experience" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <div class="info">
                                    <h5 class="">BAYİ DÜZENLE</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">

                                            <div class="work-section">


                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">Bayi adı</label>
                                                            <input type="text" class="form-control mb-4" name="branch_name" value="{{$branch_name}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">Bayi komisyonu</label>
                                                            <input type="text" class="form-control mb-4" oninput="checkNumeric(this)" name="branch_committee" value="{{$branch_committee}}">
                                                        </div>
                                                    </div>

                                                    <input type="hidden" id="branchDefaultProvince" value="{{$branch_province}}"/>
                                                    <input type="hidden" id="branchDefaultCounty" value="{{$branch_county}}"/>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">İl</label>
                                                            <select
                                                                name="branch_province"
                                                                id="branchProvince"
                                                                class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">İlçe</label>
                                                            <select
                                                                name="branch_county"
                                                                id="branchCounty"
                                                                class="form-control"></select>
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
                            value="Düzenle"
                        />

                    </div>

                </div>
            </form>
        </div>

    </div>

@endsection

@section('header_addons')

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="/mod/plugins/animate/animate.css" rel="stylesheet" type="text/css" />

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/forms/switches.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
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

    <script src="/mod/js/branch/edit.js"></script>

@endsection
