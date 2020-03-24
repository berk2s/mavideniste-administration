@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Kupon oluştur')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Kupon</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Kupon oluştur</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example section work-experience" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h5 class="">KUPON OLUŞTUR</h5>
                                <div class="row">

                                    <div class="col-md-11 mx-auto">

                                        <div class="work-section">


                                            <div class="row">

                                                <div id="couponWizard">
                                                    <h3>Kupon bilgileri</h3>
                                                    <section>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponTitle" class="col-sm-4 col-form-label col-form-label-sm">Kupon adı</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm border-none" id="couponTitle" value="{{$coupon_name}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponDesc" class="col-sm-4 col-form-label col-form-label-sm">Kupon açıklaması</label>
                                                            <div class="col-sm-8">
                                                                <textarea id="couponDesc" style="height:200px" class="form-control form-control-sm border-none"></textarea>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row  mb-4">
                                                            <label for="couponDesc" class="col-sm-4 col-form-label col-form-label-sm">Bayi</label>
                                                            <div class="col-sm-8">

                                                                <input type="text" name="branch" value="{{$branch->branch_name}}" disabled class="form-control" />

                                                            </div>
                                                        </div>

                                                    </section>
                                                    <h3>Süre</h3>
                                                    <section>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponTime" class="col-sm-4 col-form-label col-form-label-sm">
                                                                Geçerlilik süresi (saat) <br />
                                                                <small id="couponTimeDesc"></small>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" oninput="checkNumeric(this);calcTimeDesc(this)" class="form-control form-control-sm border-none" id="couponTime">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponAmount" class="col-sm-4 col-form-label col-form-label-sm">Kupon adeti <br /> <small>Sınırsız ise 0 giriniz</small></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" oninput="checkNumeric(this)" class="form-control form-control-sm border-none"  id="couponAmount">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponStatus" class="col-sm-4 col-form-label col-form-label-sm">Durum <br /> <small>Kuponu yayınlandığı gibi aktifleştir</small></label>
                                                            <div class="col-sm-8">

                                                                <label class="switch s-info">
                                                                    <input type="checkbox" id="couponStatus" checked>
                                                                    <span class="slider round"></span>
                                                                </label>

                                                            </div>
                                                        </div>



                                                    </section>
                                                    <h3>Fiyatlandırma</h3>
                                                    <section>

                                                        <div class="form-group row  mb-4">
                                                            <label for="coupunPriceType" class="col-sm-4 col-form-label col-form-label-sm">Fiyatlandırma birimi</label>
                                                            <div class="col-sm-8">
                                                                <select
                                                                    class="form-control"
                                                                    id="coupunPriceType"
                                                                    onchange="couponPriceTypeChange(this)"
                                                                >
                                                                    <option value="TL">Lira</option>
                                                                    <option value="%">Yüzde</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="coupunPriceUnit" class="col-sm-4 col-form-label col-form-label-sm">Fiyat Birimi (<span id="couponPriceTypeDesc"></span>)</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" value="1" oninput="checkNumeric(this);handleMinPrice(this)" onblur="clearNumericTrimToZero(this)" class="form-control form-control-sm border-none"  id="coupunPriceUnit">
                                                            </div>
                                                        </div>


                                                    </section>
                                                    <h3>Koşul</h3>
                                                    <section>

                                                        <ul class="list-group " style="list-style:none!important;">
                                                            <li class="list-group-item" style="padding:10px" >Minumum fiyat sınırlaması

                                                                <div id="minPriceArea" style="float:right">
                                                                    <span class="badge badge-primary" style="float:right" data-toggle="modal" data-target="#minPriceModal"> <a style="color:white"  href="javascript:void(0)">Ekle</a> </span>
                                                                </div>

                                                            </li>
                                                            <li class="list-group-item" style="padding:10px" >Sadece seçili ürünlerde/üründe

                                                                <div id="selectedItemsOnlyArea" style="float:right">
                                                                    <span class="badge badge-primary" style="float:right" data-toggle="modal" data-target="#selectedOnlyItemsModal"> <a style="color:white" href="javascript:void(0)">Ekle</a> </span>
                                                                </div>

                                                            </li>
                                                            <li class="list-group-item" style="padding:10px">Sadece seçili kategorilerde/kategoride

                                                                <div id="selectedCategoriesOnlyArea" style="float:right">
                                                                    <span class="badge badge-primary" data-toggle="modal" data-target="#selectedCategories" style="float:right"> <a href="javascript:void(0)" style="color:white">Ekle</a> </span>
                                                                </div>

                                                            </li>
                                                            <li class="list-group-item" style="padding:10px" >Belirli ürün/ürünlerin olduğu sepette

                                                                <div id="selectedItemsArea" style="float:right">
                                                                    <span class="badge badge-primary" data-toggle="modal" data-target="#selectedItemsModal" style="float:right"> <a href="javascript:void(0)" style="color:white">Ekle</a> </span>
                                                                </div>

                                                            </li>
                                                        </ul>

                                                    </section>


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

            <input type="hidden" id="couponMinPrice_" value="false">
            <input type="hidden" id="couponSelectedOnlyItems_" value="false">
            <input type="hidden" id="couponSelectedOnlyCategories_" value="false">
            <input type="hidden" id="couponSelectedItems_" value="false">

        </div>

    </div>


    <div class="modal fade" id="minPriceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Minumum fiyat sınırlaması
                    <br />
                        <small id="infoMinPrice"></small>
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row  mb-4">
                        <label for="couponMinPrice" class="col-sm-4 col-form-label col-form-label-sm">Min. Fiyat
                        </label>
                        <div class="col-sm-8">
                            <input type="text" oninput="checkNumeric(this)" class="form-control form-control-sm border-none"  id="couponMinPrice">
                            <small>Kuponun geçerli olması için sepetin minumum fiyatı</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Kapat</button>
                    <button type="button" class="btn btn-primary" onclick="couponMinPriceSave()" id="couponMinPriceSaveBtn">Kaydet</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="selectedOnlyItemsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sadece seçili ürünlerde/üründe</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row  mb-4">
                        <label for="couponSelectedOnlyItems" class="col-sm-12 col-form-label col-form-label-sm">Seçili ürünler
                        </label>
                        <div class="col-sm-12 mt-4">

                            <select class="form-control tagging" multiple="multiple" id="couponSelectedOnlyItems">

                            </select>

                            <small>Kuponun geçerli olması için sepette <b>sadece</b> seçili bu ürünler bulunmalı</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> İptal</button>
                    <button type="button" class="btn btn-primary" onclick="couponSelectedOnlyItemsSave()" id="couponSelectedOnlyItemsSaveBtn">Kaydet</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="selectedItemsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Belirli ürün/ürünlerin olduğu sepette</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row  mb-4">
                        <label for="couponSelectedItems" class="col-sm-12 col-form-label col-form-label-sm">Seçili ürünler
                        </label>
                        <div class="col-sm-12 mt-4">

                            <select class="form-control tagging" multiple="multiple" id="couponSelectedItems">

                            </select>

                            <small>Kuponun geçerli olması için sepette seçili bu ürünler bulunmalı</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> İptal</button>
                    <button type="button" class="btn btn-primary" onclick="couponSelectedItemsSave()" id="couponSelectedItemsSaveBtn">Kaydet</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="selectedCategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sadece seçili kategorilerde/kategoride</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row  mb-4">
                        <label for="couponSelectedCategories" class="col-sm-12 col-form-label col-form-label-sm">Seçili kategoriler
                        </label>
                        <div class="col-sm-12 mt-4">

                            <select class="form-control tagging" multiple="multiple" id="couponSelectedCategories">

                            </select>

                            <small>Kuponun geçerli olması için sepette <b>sadece</b> bu kategorilerden ürün olmalı</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> İptal</button>
                    <button type="button" class="btn btn-primary" onclick="couponSelectedCategoriesSave()" id="couponSelectedCategoriesSaveBtn">Kaydet</button>
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

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/elements/infobox.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/jquery-step/jquery.steps.css">

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css">

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/elements/infobox.css" rel="stylesheet" type="text/css" />


    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
    </style>

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
    <script src="/mod/js/coupon/new.js"></script>

    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/jquery.blockUI.min.js"></script>

    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/custom-blockui.js"></script>
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/js/components/ui-accordions.js"></script>
    <script src="/mod/plugins/select2/select2.min.js"></script>

    <script src="/mod/plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="/mod/plugins/jquery-step/custom-jquery.steps.js"></script>

    <script>
        $(".tagging").select2({
          //  tags: true
        });

    </script>
@endsection
