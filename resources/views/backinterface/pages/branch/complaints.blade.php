@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Şikayetler')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Bayim</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Şikayetler</span></li>
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
                                    <h5 class="">GELEN ŞİKAYETLER</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">

                                            <div class="row">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover table-striped mb-4">
                                                        <thead>
                                                        <tr>
                                                            <th>MÜŞTERİ</th>
                                                            <th>TELEFON</th>
                                                            <th>ŞUBE</th>
                                                            <th>SİPARİŞ</th>
                                                            <th>ŞİKAYET TARİHİ</th>
                                                            <th class="text-center">İŞLEM</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($complaints as $complaint)
                                                            <tr>
                                                                <td>{{$complaint->user_name}}</td>
                                                                <td>{{$complaint->user_phone}}</td>
                                                                <td>{{$complaint->branch->branch_name}}</td>
                                                                <td>{{$complaint->order}}</td>
                                                                <td>{{$complaint->created_at->diffForHumans()}}</td>

                                                                <td class="text-center">


                                                                    <a href="" data-toggle="modal" data-target="#COMPLAINT_{{$complaint->complaint_id}}">Metni gör</a>
                                                                    | <a href="/bayi/sil/">Sil</a>

                                                                </td>
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

    @foreach($complaints as $complaint)
        <div class="modal fade" id="COMPLAINT_{{$complaint->complaint_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$complaint->user_name}} kullanıcısının şikayeti</h5>
                    </div>
                    <div class="modal-body">
                        <p class="modal-text">
                            {{$complaint->complaint}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
