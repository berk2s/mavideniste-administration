@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Kategori Listesi')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Kategoriler</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Kategori Listesi</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing" >
        <div class="row layout-top-spacing">
            <div class="col-lg-12 col-md-12 layout-spacing" >
                <div class="statbox widget box box-shadow" >
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Kategori Listesi

                                    <div id='loadingSpin' class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px"></div>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area" >
                        <input type="hidden" id="imageBase64" />



                        <div class="table-responsive mb-4 mt-4">
                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Kategori ADI</th>
                                    <th>Kategori RESMİ</th>
                                    <th>Alt kategoriler</th>
                                    <th class="text-center">Durum</th>
                                    <th class="text-center">Eklenme tarihi</th>
                                    <th class="text-center">İŞLEM</th>
                                </tr>
                                </thead>
                                <tbody id="categoryListTableTBody">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fadeinModal" class="modal animated fadeInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="edit_categoryName">Kategori Düzenle
                        <div id='loadingSpinForEdit' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 p-0">

                        <div class="work-section">

                            <div class="row">
                                <form id="EditCategoryForm" enctype="multipart/form-data" method="post">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="degree2">Kategori Adı</label>
                                            <input type="text" class="form-control mb-4" id="EDIT_categoryName" value="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="degree2">Alt kategoriler</label>
                                            <select class="form-control" id="EDIT_subcategories" multiple></select>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="degree2">Durum <small id="EDIT_categoryStatus_TEXT"></small></label>

                                        <label style='float:right' class="switch s-icons s-outline  s-outline-success">
                                        <input type="checkbox" name="darktheme" id="EDIT_categoryStatus">
                                        <span class="slider round"></span>
                                        </label>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <div class="custom-file-container" data-upload-id="categoryImageChange">
                                            <label>Resmi Değiştir <a id="clearImage" href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" name='file' id="EDIT_categoryfile" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview" style="height:120px"></div>
                                        </div>

                                        <input type="hidden" id="EDIT_currentimage" />
                                    </div>
                                </div>
                                </form>

                            </div>

                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Vazgeç</button>
                    <button type="button" id='EDIT_categorySaveBtn' onclick="clickCategoryEditSave(this)" class="btn btn-primary">
                        Kaydet</button>
                </div>
            </div>
        </div>
    </div>

    <div id="imagePlay" class="modal animated fadeInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="edit_categoryName">Kategori Resmi
                        <div id='loadingSpinForEdit' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 p-0" style="display: flex;justify-content: center;align-items: center">

                        <img id='imageShowSrc' />

                    </div>

                </div>

            </div>
        </div>
    </div>



@endsection

@section('header_addons')

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="/mod/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />

    <link href="/mod/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/forms/switches.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/dt-global_style.css">

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


    <script src="/mod/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="/mod/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.print.min.js"></script>


    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('categoryImageChange')
        $('#EDIT_subcategories').select2({})
    </script>

    <script src="/mod/js/category/list.js"></script>
@endsection
