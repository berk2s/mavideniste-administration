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
                                                                <input type="email" class="form-control form-control-sm border-none" id="couponTitle">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponDesc" class="col-sm-4 col-form-label col-form-label-sm">Kupon açıklaması</label>
                                                            <div class="col-sm-8">
                                                                <textarea id="couponDesc" style="height:200px" class="form-control form-control-sm border-none"></textarea>
                                                            </div>
                                                        </div>

                                                    </section>
                                                    <h3>Süre</h3>
                                                    <section>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponTitle" class="col-sm-4 col-form-label col-form-label-sm">Geçerlilik süresi (saat)</label>
                                                            <div class="col-sm-8">
                                                                <input type="email" class="form-control form-control-sm border-none"id="couponTitle">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponTitle" class="col-sm-4 col-form-label col-form-label-sm">Kupon adeti <br /> <small>Sınırsız ise 0 giriniz</small></label>
                                                            <div class="col-sm-8">
                                                                <input type="email" class="form-control form-control-sm border-none"  id="couponTitle">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponTitle" class="col-sm-4 col-form-label col-form-label-sm">Durum <br /> <small>Kuponu yayınlandığı gibi aktifleştir</small></label>
                                                            <div class="col-sm-8">

                                                                <label class="switch s-info">
                                                                    <input type="checkbox" checked>
                                                                    <span class="slider round"></span>
                                                                </label>

                                                            </div>
                                                        </div>



                                                    </section>
                                                    <h3>Fiyatlandırma</h3>
                                                    <section>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponTitle" class="col-sm-4 col-form-label col-form-label-sm">Fiyatlandırma birimi</label>
                                                            <div class="col-sm-8">
                                                                <select
                                                                    class="form-control"
                                                                >
                                                                    <option>Lira</option>
                                                                    <option>Yüzde</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="couponTitle" class="col-sm-4 col-form-label col-form-label-sm">Fiyat Birimi (TL)</label>
                                                            <div class="col-sm-8">
                                                                <input type="email" class="form-control form-control-sm border-none"  id="couponTitle">
                                                            </div>
                                                        </div>


                                                    </section>
                                                    <h3>Koşul</h3>
                                                    <section>

                                                        <ul class="list-group " style="list-style:none!important;">
                                                            <li class="list-group-item" style="padding:10px">Minumum fiyat sınırlaması
                                                                <span class="badge badge-primary" style="float:right"> <a href="" style="color:white">Ekle</a> </span>
                                                            </li>
                                                            <li class="list-group-item" style="padding:10px">Sadece seçili ürünlerde/üründe
                                                                <span class="badge badge-danger" style="float:right;margin-left:10px"> <a href="" style="color:white">Sil</a> </span>
                                                                <span class="badge badge-info" style="float:right"> <a href="" style="color:white">Düzenle</a> </span>

                                                            </li>
                                                            <li class="list-group-item" style="padding:10px">Sadece seçili kategorilerde/kategoride
                                                                <span class="badge badge-primary" style="float:right"> <a href="" style="color:white">Ekle</a> </span>
                                                            </li>
                                                            <li class="list-group-item" style="padding:10px">Belirli ürün/ürünlerin olduğu sepette
                                                                <span class="badge badge-primary" style="float:right"> <a href="" style="color:white">Ekle</a> </span>
                                                            </li>
                                                        </ul>

                                                    </section>
                                                    <h3>Sonuç</h3>
                                                    <section>

                                                        <div class="infobox-2">

                                                            <p class="info-text"><b>Kupon adı: </b> MVDN54</p>
                                                            <p class="info-text"><b>Kupon bilgisi: </b> Şimdi yapacağınız alışverişlerde sepette yüzde elli indirim bizden</p>

                                                            <p class="info-text"><b>Geçerlilik süresi: </b> 360 saat (Beklemede)</p>
                                                            <p class="info-text"><b>Kupon adeti: </b> Sınırsız</p>
                                                            <p class="info-text"><b>Durum: </b> Taslak</p>
                                                            <p class="info-text"><b>Fiyatlandırma tipi: </b> Lira</p>
                                                            <p class="info-text"><b>Fiyatlandırma birimi: </b> 10</p>
                                                            <p class="info-text"><b>Minumum fiyat sınırlaması: </b> 50</p>
                                                            <p class="info-text"><b>Sadece seçili ürünlerde: </b> Elma, armut, kalp, seks</p>
                                                        </div>

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
        $(".tagging").select2();
        $("#couponWizard").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            cssClass: 'pill wizard',
            onFinished: function(){
                alert('test')
            },
            onStepChanging:function(d){
                return true
            }
        });
    </script>
@endsection
