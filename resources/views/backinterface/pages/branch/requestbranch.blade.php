@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Bayilik istekleri')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Bayi</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Bayilik istekleri</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">
        <form method="post" action="" id="work-experience" class="section work-experience">
            {{csrf_field()}}
            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <div class="info">
                                    <h5 class="">GELEN BAYİLİK İSTEKLERİ</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">

                                            <div class="row">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover table-striped mb-4">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>AD SOYAD</th>
                                                            <th>İL</th>
                                                            <th>TELEFON NUMARASI</th>
                                                            <th>BİOGRAFİ</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($requests as $request)
                                                            <tr>
                                                                <td>{{$request->request_id}}</td>
                                                                <td>{{$request->name_surname}}</td>
                                                                <td>{{$request->province_detail->il_adi}}</td>
                                                                <td>{{$request->phone_number}}</td>
                                                                <td>{{$request->bio}}</td>

                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>



                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        </form>
    </div>

    </div>



@endsection

@section('header_addons')

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/forms/switches.css">

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
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



@endsection
