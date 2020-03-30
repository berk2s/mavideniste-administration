@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Bildirim ayarları')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Ayarlar</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Bildirim ayarları</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div method="post" action="" id="work-experience" class="section work-experience">
            {{csrf_field()}}
            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <div class="info">
                                    <h5 class="">BİLDİRİM AYARLARI</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">

                                            <div class="work-section">


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="degree2"><a href=""><i>Sipariş Hazırlanıyor</i> bildirimi</a></label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <button
                                                                class="btn btn-primary btn-rounded mb-2"
                                                                data-toggle="modal"
                                                                data-target="#orderPreparingNotification"
                                                            >Değiştir</button>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="degree2"><a href=""><i>Sipariş Yolda</i> bildirimi</a></label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <button
                                                                class="btn btn-primary btn-rounded mb-2"
                                                                data-toggle="modal"
                                                                data-target="#orderEnrouteNotification"
                                                            >Değiştir</button>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="degree2"><a href=""><i>Sipariş Teslim Edildi</i> bildirimi</a></label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <button
                                                                class="btn btn-primary btn-rounded mb-2"
                                                                data-toggle="modal"
                                                                data-target="#orderDeliveredNotification"
                                                            >Değiştir</button>

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
    </div>

    </div>

    <div class="modal fade" id="orderPreparingNotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sipariş Hazırlanıyor bildirimi</h5>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('handle_change_prepare_notification_settings') }}">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="degree2">Bildirim başlığı <small>zorunlu değil</small></label>
                                    <input type="text" class="form-control mb-4" name="prepare_notification_title" id="prepare_notification_title" value="{{$prepareTitle}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="degree2">Bildirim içeriği <small>zorunlu</small></label>
                                    <textarea
                                        class="form-control"
                                        name="prepare_notification_text"
                                    >{{$prepareText}}</textarea>
                                </div>
                            </div>
                        </div>



                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Vazgeç</button>
                    <input type="submit" class="btn btn-primary" value="Güncelle"/>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="orderEnrouteNotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sipariş Yolda bildirimi</h5>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('handle_change_enroute_notification_settings') }}">
                        {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="degree2">Bildirim başlığı <small>zorunlu değil</small></label>
                                <input type="text" class="form-control mb-4" name="enroute_notification_title" id="enroute_notification_title" value="{{$enrouteTitle}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="degree2">Bildirim içeriği <small>zorunlu</small></label>
                                <textarea
                                    class="form-control"
                                    name="enroute_notification_text"
                                >{{$enrouteText}}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Vazgeç</button>
                    <input type="submit" class="btn btn-primary" value="Güncelle"/>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="orderDeliveredNotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sipariş Teslim Edildi bildirimi</h5>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('handle_change_delivered_notification_settings') }}">
                        {{csrf_field()}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="degree2">Bildirim başlığı <small>zorunlu değil</small></label>
                                <input type="text" class="form-control mb-4" name="delivered_notification_title" id="delivered_notification_title" value="{{$deliveredTitle}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="degree2">Bildirim içeriği <small>zorunlu</small></label>
                                <textarea
                                    class="form-control"
                                    name="delivered_notification_text"
                                >{{$deliveredText}}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Vazgeç</button>
                    <input type="submit" class="btn btn-primary" value="Güncelle"/>

                </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('header_addons')

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/forms/switches.css">
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

    @php

        if(!empty($_GET['success'])){
            echo "<script>
                Snackbar.show({text: 'Tercih değiştirildi! ', duration: 50000});
            </script>";
        }


    @endphp

    <script>
        fetch('http://127.0.0.1:3000/api/category',{
            headers:{
                'x-api-key':'56595339-71a8-46e6-a890-700620d6a9ae'
            }
        })
            .then((res) => {
                return res.json();
            })
            .then((res2) => {
                console.log(res2)
            })
            .catch((err) => console.log(err))
    </script>
@endsection
