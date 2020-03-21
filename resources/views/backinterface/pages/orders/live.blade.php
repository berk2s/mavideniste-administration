@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Canlı siparişler')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Siparişler</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Canlı siparişler</span></li>
@endsection

@section('content')

    <div class="layout-px-spacing" id="liveOrdersArea">

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="mail-box-container">
                    <div class="mail-overlay"></div>

                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                <h5 class="app-title">Canlı Siparişler</h5>
                                <div class="spinner-border spinner-border-reverse align-self-center loader-sm text-secondary" id="loading" style="display:none"></div>
                            </div>

                            <div class="todoList-sidebar-scroll">
                                <div class="col-md-12 col-sm-12 col-12 mt-4 pl-0">
                                    <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="pendingorders" data-toggle="pill" href="#pendingorders" role="tab" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                                Bekleyen
                                                <div class="spinner-grow text-info align-self-center loader-sm" style="width:20px;height:20px;float:right;display:none" id="pendingOrdersTickler" ></div>

                                                <span class="todo-badge badge"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="prepareorders" data-toggle="pill" href="#prepareorders" role="tab" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                                Hazırlanan
                                                <span class="todo-badge badge"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="enrouteorders" data-toggle="pill" href="#enrouteorders" role="tab" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                                Yolda
                                                <span class="todo-badge badge"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="successorders" data-toggle="pill" href="#successorders" role="tab" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>

                                                Başarılı
                                                <span class="todo-badge badge"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="todo-inbox" class="accordion todo-inbox">
                        <div class="search">
                            <input type="text" class="form-control input-search" placeholder="Siparişlerde ara...">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                        </div>

                        <div class="todo-box">

                            <div id="ct" class="todo-box-scroll">


                            </div>

                            <div class="modal fade" id="todoShowListItem" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            <div class="compose-box">
                                                <div class="compose-content">
                                                    <h5 class="task-heading"></h5>
                                                    <p class="task-text"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <a href='#' onclick="javascript:void(0)" id="orderDetailsA"  data-toggle="modal" data-target="#orderDetailsModal"></a>

                <!-- Modal -->
                <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
                    <div class="modal-dialog  modal-lg"  role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                <div class="compose-box">
                                    <div class="compose-content" id="addTaskModalTitle">
                                        <h5 class="" id="DETAIL_ordername">Sipariş Bilgileri</h5>

                                        <div id=""
                                            style="display:flex"
                                        >

                                            <ul class="list-group " style="margin-right:20px;width:51%;overflow: scroll;max-height: 463px;">

                                                <li class="list-group-item" style="text-align: center">
                                                   <b>Sipariş bilgileri</b>
                                                </li>
                                                <li class="list-group-item detailOrder">
                                                    <span>#</span>
                                                    <span><b id="DETAIL_orderUniqueKey"></b></span>
                                                </li>

                                                <li class="list-group-item detailOrder">
                                                    <span>Sipariş tarihi:</span>
                                                    <span><b id="DETAIL_orderDate"></b></span>
                                                </li>

                                                <li class="list-group-item detailOrder">
                                                    <span>Müşteri:</span>
                                                    <span><b id="DETAIL_customer"></b></span>
                                                </li>


                                                <li class="list-group-item detailOrder">
                                                    <span>Ödeme tipi:</span>
                                                    <span><b id="DETAIL_paymentType"></b></span>
                                                </li>

                                                <li class="list-group-item detailOrder">
                                                    <span>Tutar:</span>
                                                    <span><b id="DETAIL_totalPrice"></b></span>
                                                </li>

                                                <li class="list-group-item detailOrder">
                                                    <span>Kupon:</span>
                                                    <span><b id="DETAIL_coupon"></b></span>
                                                </li>

                                                <li class="list-group-item detailOrder">
                                                    <span>Konum:</span>
                                                    <span><b id="DETAIL_location"></b></span>
                                                </li>

                                                <li class="list-group-item detailOrder" style="flex-direction: column">
                                                    <span>Adres tarifi:</span>
                                                    <span><b id="DETAIL_locationDesc"></b></span>
                                                </li>

                                                <li class="list-group-item detailOrder" style="flex-direction: column">
                                                    <span>Sipariş notu:</span>
                                                    <span><b id="DETAIL_ordernote"></b></span>
                                                </li>

                                            </ul>

                                            <ul class="list-group "
                                                style="
                                                    width: 51%;
                                                    float: right;
                                                    overflow: scroll;
                                                    max-height: 463px;">

                                                <li class="list-group-item"
                                                    style="text-align: center;">
                                                    <b>Ürünler</b>
                                                </li>
                                                <div id="DETAIL_productsListArea">



                                                </div>

                                            </ul>
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

    <style>
        .detailOrder{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            flex-wrap: wrap;
        }
    </style>

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />

    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />

    <link href="/mod/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/forms/switches.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/select2/select2.min.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/editors/quill/quill.snow.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/apps/todolist.css" rel="stylesheet" type="text/css" />

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

    <script src="/mod/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="/mod/plugins/select2/select2.min.js"></script>

    <script src="/mod/plugins/select2/custom-select2.js"></script>
    <script src="/mod/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/mod/plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js"></script>



    <script src="/mod/js/orders/liveorders.js"></script>

    <script src="/mod/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="/mod/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.print.min.js"></script>

    <script src="/mod/assets/js/ie11fix/fn.fix-padStart.js"></script>
    <script src="/mod/plugins/editors/quill/quill.js"></script>
    <script src="/mod/assets/js/apps/todoList.js"></script>

@endsection
