@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Log geçmişi')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Ayarlar</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Log Geçmişi</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">
        <form method="post" action="" id="work-experience" class="section work-experience">

            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <div class="info">
                                    <h5 class="">Log(İşlem) GEÇMİŞİ</h5>
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="mt-container">
                                                <div class="timeline-line">


                                                    @foreach($logs as $log)

                                                        @php

                                                            $time = explode(' ', $log->created_at);
                                                            $time2 = explode(':', $time[1]);
                                                            $time3 = $time2[0].':'.$time2[1];

                                                        @endphp

                                                        <div class="item-timeline">
                                                            <p class="t-time">{{$time3}}</p>
                                                            <div class="t-dot

                                                            @php
                                                                switch($log->log_type){
                                                                    case 1:
                                                                        echo 't-dot-success';
                                                                        break;
                                                                    case 2:
                                                                         echo ' t-dot-info';
                                                                         break;
                                                                    case 3:
                                                                          echo 't-dot-dark';
                                                                          break;
                                                                    case 4:
                                                                          echo ' t-dot-warning';
                                                                          break;
                                                                }
                                                            @endphp

                                                            ">

                                                            </div>
                                                            <div class="t-text">
                                                                <p>@php echo $log->log_msg @endphp</p>
                                                                <p class="t-meta-time" style="max-width: max-content">{{\Illuminate\Support\Facades\Auth::user()->user_name}} tarafından <span style="color:#1b55e2">{{$log->created_at->diffForHumans()}}</span> (<span style="color:#6C758F">{{$log->created_at}}</span>)</p>
                                                            </div>
                                                        </div>

                                                    @endforeach


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
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/components/timeline/custom-timeline.css" rel="stylesheet" type="text/css" />

@endsection

@section('footer_addons')
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/js/users/account-settings.js"></script>
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/blockui/jquery.blockUI.min.js"></script>

@endsection
