@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Ürünler listesi')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Ürünler</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Ürünler listesi</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing" >
        <div class="row layout-top-spacing">
            <div class="col-lg-12 col-md-12 layout-spacing" >
                <div class="statbox widget box box-shadow" >
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>ÜRÜNLER LİSTESİ

                                    <div id='loadingSpin' class="spinner-border text-success align-self-center loader-sm" style="display: none;float:right;width:20px;height:20px"></div>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area" >

                        <div class="table-responsive mb-4 mt-4">
                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ÜRÜN</th>
                                    <th>KATEGORİ</th>
                                    <th>ALT KATEGORİ</th>
                                    <th>MARKA</th>
                                    <th>LİSTE FİYATI</th>
                                    <th>İNDRM FİYATI</th>
                                    <th>İNDİRİM(%)</th>
                                    <th>GRAMAJ</th>
                                    <th>MİKTAR</th>
                                    <th>DURUM</th>
                                    <th></th>
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

    <div id="fadeinModal" class="modal animated fadeInDown" role="dialog">
        <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="edit_categoryName">Ürün Düzenle
                        <div id='loadingSpinForEdit' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 p-0">

                        <div class="work-section">

                            <div class="row">
                                <form id="EditCategoryForm" class='w-100' enctype="multipart/form-data" method="post">
                                    <div class="form-group mb-4">
                                        <label for="productName">Ürün Adı</label>
                                        <input type="text" class="form-control" id="productName" placeholder="Eti Browni İntense Fındıklı">
                                    </div>

                                    <div class="form-row ">
                                        <div class="form-group  col-md-4">
                                            <label for="productCategory">Kategori</label>
                                            <select id='productCategory' onchange="handleCatChange(this)" class="form-control  basic">
                                            </select>
                                        </div>

                                        <div class="form-group  col-md-4">
                                            <label for="productSubCategory">Alt kategori</label>
                                            <select id='productSubCategory' class="form-control  basic">
                                            </select>
                                        </div>


                                        <div class="form-group  col-md-4">
                                            <label for="productBrand">Marka</label>
                                            <select id='productBrand' class="form-control  basic">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row ">

                                        <div class="form-group  col-md-4">
                                            <label for="productUnitType">Gramaj Tipi</label>
                                            <select id='productUnitType' class="form-control basic">

                                            </select>
                                        </div>

                                        <div class="form-group  col-md-4">
                                            <label for="productUnitWeight">Gramaj</label>
                                            <input oninput="checkNumeric(this)" type="text" class="form-control" id="productUnitWeight" placeholder="250">
                                            <small class="form-text text-muted">Sadece sayı giriniz</small>
                                        </div>

                                        <div class="form-group  col-md-4">
                                            <label for="productName">Miktar</label>
                                            <input oninput="checkNumeric(this)" type="text" class="form-control" id="productAmount" placeholder="30">
                                            <small class="form-text text-muted">Sadece sayı giriniz</small>
                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Vazgeç</button>
                    <button type="button" id='EDIT_productSaveBtn' onclick="clickProductEditSave(this)" class="btn btn-primary">
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
                    <h5 class="modal-title" id="edit_categoryName">Ürün Resmi
                        <div id='loadingImageViewForEdit' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 p-0" style="flex-direction:column;display: flex;justify-content: center;align-items: center">


                        <img id='imageShowSrc' />

                        <div class="custom-file-container mt-5" data-upload-id="productImageNew">
                            <label>Ürün Resmi Değiştir <a id="clearImage" href="javascript:void(0)" class="custom-file-container__image-clear" title="Resmi Sil">x</a></label>
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

    <div id="product" class="modal animated fadeInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="edit_categoryName">Ürün Resmi
                        <div id='loadingImageViewForEdit' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
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

    <div id="setDiscount" class="modal animated fadeInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="edit_categoryName">İndirim Yap
                        <div id='loadingSpinForDiscount' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 p-0">

                        <div class="work-section">

                            <div class="row">
                                <form id="" class="w-100" enctype="multipart/form-data" method="post">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="degree2">Ürün <span style="font-size:12px;color:green" id="DISCOUNT_productStatusText"></span></label>
                                            <input type="text" class="form-control mb-4" id="DISCOUNT_productname" value="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="degree2">Liste Fiyatı</label>
                                            <input type="text" class="form-control mb-4" onchange='clearNumericTrimToZero(this)' oninput="checkNumeric(this)" id="DISCOUNT_listprice" value="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="degree2">İndirim </label>
                                            <label style='float:right' class="switch s-icons s-outline  s-outline-success">
                                                <input type="checkbox" name="darktheme" id="DISCOUNT_switch">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-md-12" style="transition: 0.4s" id="discountPriceArea">
                                        <div class="form-group">
                                            <label for="degree2">İndirim Fiyatı</label>
                                            <input type="text" onchange='clearNumericTrimToZero(this)' oninput="checkNumeric(this)" class="form-control mb-4" id="DISCOUNT_discountprice" value="">
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="transition: 0.4s" id="discountPercentageArea">
                                        <div class="form-group">

                                            <label for="degree2">İndirim (%)</label>
                                            <input type="text" onchange='clearNumericTrimToZero(this)' oninput="checkNumeric(this)" class="form-control" id="DISCOUNT_discount" value="0">
                                            <small id="discountText" class="form-text text-muted">
                                            </small>

                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Vazgeç</button>
                    <button type="button" id='DISCOUNT_btn' onclick="clickDiscountEditSave(this)" class="btn btn-primary">
                        Kaydet</button>
                </div>
            </div>
        </div>
    </div>

    <div id="productDetail" class="modal animated fadeInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="edit_categoryName">Ürün Detayları
                        <div id='loadingImageViewForEdit' style="display: none" class="spinner-border text-success align-self-center loader-sm" style="float:right;width:20px;height:20px;margin:5px"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 p-0" >

                        <ul class="list-group list-group-icons-meta">
                            <li class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">Ürün Adı</h6>
                                        <p class="mg-b-0" id="DETAIL_productname"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action ">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">Kategori</h6>
                                        <p class="mg-b-0" id="DETAIL_productcategory"></p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item list-group-item-action ">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">Marka</h6>
                                        <p class="mg-b-0" id="DETAIL_productbrand"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">Liste Fiyatı</h6>
                                        <p class="mg-b-0" id="DETAIL_productlistprice"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">İndirimli Fiyat</h6>
                                        <p class="mg-b-0" id="DETAIL_productdiscountprice"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">İndirim</h6>
                                        <p class="mg-b-0" id="DETAIL_productdiscount"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">Birim Gramaj Tipi</h6>
                                        <p class="mg-b-0" id="DETAIL_productweightunittype"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">Gramaj</h6>
                                        <p class="mg-b-0" id="DETAIL_productunitweight"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">Miktar</h6>
                                        <p class="mg-b-0" id="DETAIL_productamount"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">Durum</h6>
                                        <p class="mg-b-0" id="DETAIL_productstatus"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                        <h6 class="tx-inverse">Eklenme Tarihi</h6>
                                        <p class="mg-b-0" id="DETAIL_productdate"></p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>

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

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/select2/select2.min.css">
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

    <script src="/mod/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="/mod/plugins/select2/select2.min.js"></script>

    <script src="/mod/plugins/select2/custom-select2.js"></script>
    <script src="/mod/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/mod/plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js"></script>



    <script src="/mod/js/product/list.js"></script>

    <script src="/mod/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="/mod/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.print.min.js"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('productImageNew')
        $("#DISCOUNT_discount").TouchSpin({
            postfix: '%',
            buttondown_class: "btn btn-classic btn-primary downProductDiscount",
            buttonup_class: "btn btn-classic btn-primary upProductDiscount"
        });

        var ss = $(".basic").select2({
        });

    </script>

@endsection
