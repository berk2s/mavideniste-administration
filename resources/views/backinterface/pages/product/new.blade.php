@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Ürün Ekle')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Ürünler</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Ürün Ekle</span></li>
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
                                                        <div class="form-group  col-md-6">
                                                            <label for="productCategory">Kategori</label>
                                                            <select id='productCategory' class="form-control  basic">

                                                            </select>
                                                        </div>

                                                        <div class="form-group  col-md-6">
                                                            <label for="productBrand">Marka</label>
                                                            <select id='productBrand' class="form-control  basic">

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row ">

                                                        <div class="form-group  col-md-6">
                                                            <label for="productName">Liste Fiyatı</label>
                                                            <input oninput="checkNumeric(this)" type="text" class="form-control" id="productListPrice" placeholder="50">
                                                            <small class="form-text text-muted">Sadece sayı giriniz</small>
                                                        </div>

                                                        <div class="form-group  col-md-6">
                                                            <label for="productName">İndirim (%)</label>
                                                            <input type="text" class="form-control" id="productDiscount" value="0">
                                                            <small id="discountText" class="form-text text-muted">İndirimli Fiyat: <span style="font-family: Arial">₺</span>58</small>
                                                        </div>

                                                    </div>

                                                    <div class="form-row ">

                                                        <div class="form-group  col-md-4">
                                                            <label for="productName">Gramaj Tipi</label>
                                                            <select id='productUnitType' class="form-control basic">
                                                                <option>Kilogram (kg)</option>
                                                                <option>Gram (g)</option>
                                                                <option>Miligram (mg)</option>
                                                                <option>Litre (L)</option>
                                                                <option>Santilite (cL)</option>
                                                                <option>Mililitre (mL)</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group  col-md-4">
                                                            <label for="productName">Gramaj</label>
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
                        id="btnAddBrand"
                        onclick="clickBrandAdd()"
                        href="javascript:void(0);"
                    >Kaydet</a>

                    </a>

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
        var firstUpload = new FileUploadWithPreview('categoryImageNew')


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
