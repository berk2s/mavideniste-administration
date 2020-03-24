@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Tercih Değiştir')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Bayi</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Operatör listesi</span></li>
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
                                    <h5 class="">OPERATÖR LİSTESİ</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">

                                            <div class="row">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover table-striped mb-4">
                                                        <thead>
                                                        <tr>
                                                            <th>OPERATOR ADI</th>
                                                            <th>TELEFON</th>
                                                            <th>E-POSTA</th>
                                                            <th>ADRES</th>
                                                            <th>BAYİ</th>
                                                            <th>YETKİLER</th>
                                                            <th class="text-center">İŞLEM</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$user->user_name}}</td>
                                                                <td>{{$user->user_phone}}</td>
                                                                <td>{{$user->email}}</td>
                                                                <td>{{$user->user_address}}</td>
                                                                <td>{{$user->user_branch_info->branch_name}}</td>
                                                                <td><a href="" data-toggle="modal" data-target="#userAuthority_{{$user->user_id}}">Gör</a></td>

                                                                <td class="text-center">

                                                                    <a href="/bayi/operator/duzenle/{{$user->user_id}}">Düzenle</a>

                                                                    | <a href="/bayi/operator/sil/{{$user->user_id}}">Sil</a>

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

    @foreach($users as $user)
        <div class="modal fade" id="userAuthority_{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>{{$user->user_name}}</b> operatörünün yetkileri</h5>

                    </div>
                    <div class="modal-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped mb-4">
                                <thead>
                                <tr>
                                    <th>Sayfa</th>
                                    <th>Yetki</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($user->user_authority as $authority)
                                    <tr>
                                        <td>{{$authority->desc}}</td>
                                        <td><b style="color:green">Yetkili</b></td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>

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
