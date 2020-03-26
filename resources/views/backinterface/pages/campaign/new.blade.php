@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Kupon oluştur')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Kampanya</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Kampanya oluştur</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example section work-experience" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h5 class="">KAMPANYA OLUŞTUR</h5>
                                <div class="row">

                                    <div class="col-md-11 mx-auto">

                                        <div class="work-section">


                                            <div class="row">

                                                <div id="couponWizard">
                                                    <h3>Kampanya bilgileri</h3>
                                                    <section>

                                                        <div class="form-group row  mb-4">
                                                            <label for="campaignTitle" class="col-sm-4 col-form-label col-form-label-sm">Kampanya adı</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm border-none" id="campaignTitle" value="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="campaignShortDesc" class="col-sm-4 col-form-label col-form-label-sm">Kampanya kısa açıklaması <small id="restCharacter">91</small></label>
                                                            <div class="col-sm-8">
                                                                <textarea id="campaignShortDesc" oninput="handleShortDesc(this)" onpaste="return false;" ondrop="return false;" style="height:200px" class="form-control form-control-sm border-none"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-4">
                                                            <label for="campaignType" class="col-sm-4 col-form-label col-form-label-sm">Kampanya tipi</label>
                                                            <div class="col-sm-8">

                                                                <select
                                                                    class="form-control"
                                                                    id="campaignType"
                                                                    onchange="campaignTypeChange(this)"
                                                                >
                                                                    <option value="0" selected>Düz</option>
                                                                    <option value="1">Açıklamalı</option>
                                                                </select>

                                                            </div>
                                                        </div>


                                                        <div class="form-group row  mb-4">
                                                            <label for="couponDesc" class="col-sm-4 col-form-label col-form-label-sm">Bayi</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="branch" value="{{auth()->user()->user_branch_info->branch_name}}" disabled class="form-control" />
                                                            </div>
                                                        </div>

                                                    </section>
                                                    <h3>Kampanya Detayları</h3>
                                                    <section>

                                                        <div class="form-group row  mb-4" id="campaignDescArea">

                                                            <div class="col-lg-12">
                                                                <label for="couponDesc" class="">Kampanya açıklaması</label>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <textarea id="couponDesc" style="height:200px" class="form-control form-control-sm border-none"></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="form-group row  mb-4">


                                                            <div class="col-lg-12">
                                                                    <label>Kampanya resmi</label>

                                                                <input type="file" name='campaignImage' class='formControl' id="NEW_campaignImage"  accept="image/*">

                                                            </div>

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
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('footer_addons')
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- toastr -->
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/jquery.blockUI.min.js"></script>

    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/custom-blockui.js"></script>
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/js/components/ui-accordions.js"></script>
    <script src="/mod/plugins/select2/select2.min.js"></script>

    <script src="/mod/plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="/mod/plugins/jquery-step/custom-jquery.steps.js"></script>
    <script src="/mod/plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
        $(".tagging").select2({
            //  tags: true
        });


        //First upload
      //  var firstUpload = new FileUploadWithPreview('campaignImageArea')

    </script>
    <script src="/mod/js/campaign/new.js"></script>

@endsection
