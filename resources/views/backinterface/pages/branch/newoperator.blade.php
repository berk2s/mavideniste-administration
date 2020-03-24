@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Marka Ekle')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Bayi</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Operatör ekle</span></li>
@endsection

@section('content')
    <form action="" method="post">

        {{csrf_field()}}

        <div class="layout-px-spacing">

            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example section work-experience" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <div class="info">
                                    <h5 class="">OPERATÖR EKLE</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">

                                            <div class="work-section">


                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">Operatör adı</label>
                                                            <input type="text" class="form-control mb-4" name="operator_name" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">E-Posta</label>
                                                            <input type="text" class="form-control mb-4" name="operator_email" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">Şifre</label>
                                                            <input type="password" class="form-control mb-4" name="password" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">Telefon numarası</label>
                                                            <input type="text" oninput="checkNumeric(this)" class="form-control mb-4" name="operator_phone"  value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">Adres</label>
                                                            <input type="text" class="form-control mb-4" name="operator_address" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">İlgili bayi</label>
                                                            <select class="form-control" name="branch" id="branchSelect">
                                                                @foreach($branchies as $branch)
                                                                    <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">Yetkiler</label>
                                                            <select class="form-control basic" name="authority[]" id="authoritySelect" multiple>
                                                                @foreach($authorities as $authority)
                                                                    <option value="{{$authority->page_id}}">{{$authority->desc}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-lg-6"><label for="degree2">Diğer bayileri denetleme</label></div>
                                                            <div class="col-lg-6">
                                                                <label class="switch s-icons s-outline  s-outline-success  ">
                                                                    <input type="checkbox" name="ghost"
                                                                    >
                                                                    <span class="slider round"></span>
                                                                </label>
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

                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Kaydet" />

                        </a>

                    </div>

                </div>

            </div>

        </div>
    </form>
@endsection

@section('header_addons')

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="/mod/plugins/animate/animate.css" rel="stylesheet" type="text/css" />

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/forms/switches.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/select2/select2.min.css">

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


    <script src="/mod/js/brand/new.js"></script>
    <script src="/mod/plugins/select2/select2.min.js"></script>
    <script>
        $('#authoritySelect').select2();
        $('#branchSelect').select2();
    </script>

@endsection
