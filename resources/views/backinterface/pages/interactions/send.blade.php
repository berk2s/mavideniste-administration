@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Bildirim Gönder')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Etkileşim</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Bildirim gönder</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example section work-experience" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h5 class="">Bildirim gönder</h5>
                                <div class="row">

                                    <div class="col-md-11 mx-auto">

                                        <div class="work-section">


                                            <div class="row">

                                                <div class="infobox-2">
                                                    <h5 class="info-heading m-0 p-0" id="notificationTitlePreviewArea"></h5>
                                                    <p class="info-text" id="notificationDescPreviewArea"></p>
                                                </div>

                                                <div class="col-lg-12 mt-5">
                                                        <div class="form-group mb-4">
                                                            <label for="notificationTitleInput">Bildirim başlığı</label>
                                                            <input type="text" class="form-control" id="notificationTitleInput" placeholder="İndirim">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="notificationDescInput">Bildirim içeriği</label>
                                                            <input type="text" class="form-control" id="notificationDescInput" placeholder="Bugüne özel 20% indirim">
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="notificationDescInput">Kullanıcı Grubu</label>
                                                            <select id='CREATE_users' class="form-control tagging">
                                                                <option>Herkes</option>
                                                            </select>
                                                        </div>
                                                        <input type="submit" id="sendNotificationBtn" class="btn btn-primary" value="Bildirimi gönder">
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

    <style>
        .blockui-growl-message {
            display: none;
            text-align: left;
            padding: 15px;
            background-color: #455a64;
            color: #fff;
            border-radius: 3px;
        }
        .blockui-animation-container { display: none; }
        .multiMessageBlockUi {
            display: none;
            background-color: #455a64;
            color: #fff;
            border-radius: 3px;
            padding: 15px 15px 10px 15px;
        }
        .multiMessageBlockUi i { display: block }
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
    <script src="/mod/js/interactions/sendnotifications.js"></script>

    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/jquery.blockUI.min.js"></script>

    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/custom-blockui.js"></script>

    <script src="/mod/plugins/select2/select2.min.js"></script>
    <script>
        $(".tagging").select2();
    </script>
@endsection
