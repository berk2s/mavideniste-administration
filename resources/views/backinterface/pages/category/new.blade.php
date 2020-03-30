@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Kategori ekle')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Kategoriler</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Kategori ekle</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">

            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example section work-experience" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <div class="info">
                                    <h5 class="">KATEGORİ EKLE</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">

                                            <div class="work-section">


                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">Kategori Adı</label>
                                                            <input type="text" class="form-control mb-4" name="categoryName" id="categoryName" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">


                                                             <div class="custom-file-container" data-upload-id="categoryImageNew">
                                                                 <label>Kategori Resmi <a id="clearImage" href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                 <label class="custom-file-container__custom-file" >
                                                                     <input type="file" name='categoryFile' id="NEW_categoryfile" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                                     <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                     <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                 </label>
                                                                 <div class="custom-file-container__image-preview" style="height:120px"></div>
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
                        <a
                            class="btn btn-info"
                            onclick="clickCategoryPreview()"
                            >
                            Önizleme
                        </a>

                    </div>

                </div>

    </div>

    </div>
    <a
        data-toggle="modal"
        data-target="#previewCategory"
        id="previewCategoryADOM"
        style="display: none"
        href="javascript:void(0);"></a>
    <div id="previewCategory" class="modal animated fadeInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="edit_categoryName">Kategori Önizlemesi
                        <div id='loadingSpinForEdit' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 p-0">

                        <div class="work-section">

                            <div class="row" style="display: flex; justify-content: center;align-items: center">
                                <div id="imageArea"
                                    style="
                                        width: 110px;
                                        height: 92px;
                                        position: absolute;
                                        background: #fff;
                                        top: 107px;
                                        left: 60px;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        border-radius: 20px;"
                                >
                                    <img
                                        style="
                                            width: 100px;
                                            height: 84px;
                                            position: absolute;
                                            /* top: 110px; */
                                            border-radius: 20px;"
                                        id="previewIMG"/>
                                    <b style="
                                            margin-top: 109px;
                                            font-family: Arial;
                                            color: #304555;
                                            font-size: 11px;

                                        "
                                        id="previewCatName"
                                    ></b>
                                </div>
                                <img src="/mod/previewlist.png" />
                            </div>

                        </div>

                    </div>


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

    <script src="/mod/plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('categoryImageNew')

    </script>

    <script src="/mod/js/category/new.js"></script>

@endsection
