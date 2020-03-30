@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Alt kategori ekle')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Kategoriler</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Alt kategori Ekle</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example section work-experience" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h5 class="">ALT KATEGORİ EKLE</h5>
                                <div class="row">

                                    <div class="col-md-11 mx-auto">

                                        <div class="work-section">


                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="degree2">Alt kategori Adı</label>
                                                        <input type="text" class="form-control mb-4" name="categoryName" id="categoryName" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="degree2">Kategori</label>

                                                        <select class="form-control" id="categoryList">
                                                        </select>

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

                    <a
                        type="submit"
                        class="btn btn-primary"
                        id="btnAddCategory"
                        onclick="clickCategoryAdd()"
                        href="javascript:void(0);"
                    >Kaydet</a>


                </div>

            </div>

        </div>

    </div>


@endsection

@section('header_addons')

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="/mod/plugins/animate/animate.css" rel="stylesheet" type="text/css" />

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/forms/switches.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/select2/select2.min.css">

@endsection

@section('footer_addons')
    <script src="/mod/plugins/select2/select2.min.js"></script>

    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/js/users/account-settings.js"></script>
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- toastr -->
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <script src="/mod/plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
        //First upload

        $('#categoryList').select2({})

    </script>

    <script src="/mod/js/category/subnew.js"></script>

@endsection
