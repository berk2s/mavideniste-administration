@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Haber listesi')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Haber</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Haberler listesi</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing" >
        <div class="row layout-top-spacing">
            <div class="col-lg-12 col-md-12 layout-spacing" >
                <div class="statbox widget box box-shadow" >
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Haberler Listesi

                                    <div id='loadingSpin' class="spinner-border text-success align-self-center loader-sm" style="display:none;float:right;width:20px;height:20px"></div>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area" >

                        <div class="table-responsive mb-4 mt-4">
                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>HABER ADI</th>
                                    <th>RESİM</th>
                                    <th>DURUM</th>
                                    <th>TARİH</th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="viewImage" class="modal animated fadeInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="edit_categoryName">Marka Düzenle
                        <div id='loadingSpinForEdit' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 p-0">

                        <div class="work-section" style="display:flex;justify-content: center;align-items: center">


                            <img src="" id="viewImgSrc" style="width:355px;height:172px" />


                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Vazgeç</button>
                    <button type="button" id='EDIT_brandSaveBtn' onclick="clickBrandEditSave(this)" class="btn btn-primary">
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
                    <h5 class="modal-title" id="edit_categoryName">Haber Resmi
                        <div id='loadingImageViewForEdit' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 p-0" style="flex-direction:column;display: flex;justify-content: center;align-items: center">


                        <img id='imageShowSrc' />

                        <div class="custom-file-container mt-5" data-upload-id="productImageNew">
                            <label>Haber Resmi Değiştir <a id="clearImage" href="javascript:void(0)" class="custom-file-container__image-clear" title="Resmi Sil">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" name='productFile' id="productFile" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview" style="height:120px"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Vazgeç</button>
                    <button type="button" id='EDIT_imageSaveBtn' onclick="clickChangeImage(this)" class="btn btn-primary">
                        Kaydet</button>
                </div>

            </div>
        </div>
    </div>




@endsection

@section('header_addons')

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />

    <link href="/mod/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/forms/switches.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/dt-global_style.css">

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
        var firstUpload = new FileUploadWithPreview('productImageNew')

    </script>

    <script src="/mod/js/news/list.js"></script>

    <script src="/mod/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="/mod/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.print.min.js"></script>

@endsection
