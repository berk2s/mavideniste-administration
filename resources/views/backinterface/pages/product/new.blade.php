@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Ürünler ekle')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Ürünler</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Ürün ekle</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example section work-experience" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h5 class="">ÜRÜN EKLE

                                    <div id='loadingSpin' class="spinner-border text-success align-self-center loader-sm" style="display: none;float:right;width:20px;height:20px"></div>

                                </h5>
                                <div class="row">

                                    <div class="col-md-11 mx-auto">

                                        <div class="work-section">




                                                <form>

                                                    <div class="form-group mb-4">
                                                        <label for="productName">Ürün Adı</label>
                                                        <input type="text" class="form-control" id="productName" placeholder="Eti Browni İntense Fındıklı">
                                                    </div>

                                                    <div class="form-row ">

                                                        <div class="form-group  col-md-4">
                                                            <label for="productCategory">Kategori</label>
                                                            <select id='productCategory' onchange="handleCategoryChange(this)" class="form-control  basic">

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
                                                            <label for="productListPrice">Liste Fiyatı</label>
                                                            <input oninput="checkNumeric(this)" type="text" class="form-control" id="productListPrice" placeholder="50">
                                                            <small class="form-text text-muted">Sadece sayı giriniz</small>
                                                        </div>
                                                        <div class="form-group  col-md-8">
                                                            <div class="form-row">
                                                                <div
                                                                    style="
                                                                        width: 100%;
                                                                        position: absolute;
                                                                        height: 115px;
                                                                        z-index: 9;
                                                                        display: flex;
                                                                        justify-content: center;
                                                                        align-items: center;
                                                                    "
                                                                        id="switchArea"
                                                                    >
                                                                    <div style="position: absolute;">
                                                                        <label class="switch s-primary mr-2">
                                                                            <input type="checkbox" id='blurSwitch' data-type="isDiscount">
                                                                            <span class="slider round"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  col-md-12" style="filter:blur(4px);transition: 0.4s" id="filterBlurArea">
                                                                    <div class="form-row">
                                                                        <div class="form-group  col-md-6">
                                                                            <label for="productDiscountPrice">İndirimli Fiyatı</label>
                                                                            <input oninput="checkNumeric(this)" type="text" class="form-control" id="productDiscountPrice" value="0">
                                                                            <small class="form-text text-muted">Sadece sayı giriniz</small>
                                                                        </div>

                                                                        <div class="form-group  col-md-6">
                                                                            <label for="productDiscount " style="margin-bottom: 0px;" class="w-100">İndirim (%)

                                                                                <label class="switch s-primary  float-right" id="labelAreaSwitch" style="opacity: 0">
                                                                                    <input type="checkbox" id="areaSwitch" data-type="isDiscount">
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </label>
                                                                            <input type="text" class="form-control" id="productDiscount" value="0">
                                                                            <small id="discountText" class="form-text text-muted">İndirimli Fiyat: <span style="font-family: Arial">₺</span>58</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-row ">

                                                        <div class="form-group  col-md-4">
                                                            <label for="productUnitType">Gramaj Tipi</label>
                                                            <select id='productUnitType' class="form-control basic">
                                                                <option value="kg" selected>Kilogram (kg)</option>
                                                                <option value="g">Gram (g)</option>
                                                                <option value="mg">Miligram (mg)</option>
                                                                <option value="L">Litre (L)</option>
                                                                <option value="cL">Santilite (cL)</option>
                                                                <option value="mL">Mililitre (mL)</option>
                                                                <option value="adet">Adet</option>
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

                                                    <div class="form-group">


                                                        <div class="custom-file-container" data-upload-id="productImageNew">
                                                            <label>Kategori Resmi <a id="clearImage" href="javascript:void(0)" class="custom-file-container__image-clear" title="Resmi Sil">x</a></label>
                                                            <label class="custom-file-container__custom-file" >
                                                                <input type="file" name='productFile' id="productFile" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview" style="height:120px"></div>
                                                        </div>


                                                    </div>

                                                </form>


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
                        id="btnAddProduct"
                        onclick="addProductSave(this)"
                        href="javascript:void(0);"
                    >Kaydet</a>

                    </a>


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
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/assets/css/forms/switches.css">

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

    <script src="/mod/plugins/select2/select2.min.js"></script>
    <script src="/mod/plugins/select2/custom-select2.js"></script>
    <script src="/mod/plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script src="/mod/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/mod/plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js"></script>
    <script src="/mod/js/product/new.js"></script>

    <script>
        var firstUpload = new FileUploadWithPreview('productImageNew')


        var ss = $(".basic").select2({
        });

        // Example with postfix (large)
        $("#productDiscount").TouchSpin({
            postfix: '%',
            buttondown_class: "btn btn-classic btn-primary downProductDiscount",
            buttonup_class: "btn btn-classic btn-primary upProductDiscount"
        });
    </script>
@endsection
