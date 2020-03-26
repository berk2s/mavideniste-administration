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

                                                <span class="badge" id="pendingBadge" style=" font-size: 10px; display: flex;justify-content: center;align-items: center;top: 20px;"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link list-actions"
                                                id="prepareorders"
                                                data-toggle="pill" href="#prepareorders" role="tab" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                                Hazırlanan
                                                <span class="badge" id="prepareBadge" style=" font-size: 10px; display: flex;justify-content: center;align-items: center;top: 20px;"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="enrouteorders" data-toggle="pill" href="#enrouteorders" role="tab" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                                Yolda
                                                <span class="badge" id="enrouteBadge" style=" font-size: 10px; display: flex;justify-content: center;align-items: center;top: 20px;"></span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="bluecurrierorders" data-toggle="pill" href="#enrouteorders" role="tab" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                                                <div class="spinner-grow text-info align-self-center loader-sm" style="width:20px;height:20px;float:right;display:none" id="blueCurrierTickler" ></div>

                                                Mavi Kurye
                                                <span class="badge" id="blueCurrierBadge" style=" font-size: 10px; display: flex;justify-content: center;align-items: center;top: 20px;"></span>
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
                <a href='#' onclick="javascript:void(0)" id="orderUpdatePriceA"  data-toggle="modal" data-target="#updatePriceModal"></a>

                <!-- Modal -->
                <div class="modal fade" id="updatePriceModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
                    <div class="modal-dialog "  role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                <div class="compose-box">
                                    <div class="compose-content" id="addTaskModalTitle">
                                        <h5 class="" id="UPDATEPRICE_ordername">Sipariş Bilgileri</h5>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex mail-to mb-4" style="align-items: center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                    <div class="w-100">
                                                        <input id="UPDATEPRICE_price" oninput="checkNumeric(this)" type="text" class="form-control">
                                                        <span class="validation-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> İptal</button>
                                <button class="btn add-tsk" id="orderPriceUpdateSvnBtn" onclick="orderPriceUpdateSave(this)">Güncelle</button>
                            </div>
                        </div>
                    </div>
                </div>

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
    <div id="oogles" style="
                        background-image: url('/mod/fislogo.png');
                        maxWidth:1.4cm;
                        width:1.4cm;
                        maxHeight:5.6cm;
                        height:5.6cm;
                        -webkit-print-color-adjust: exact;
                        background-position: bottom;
                        background-repeat: no-repeat;
                        background-size: 30px;">
        <div class="modal-header"
             style="
             text-align: center;
             font-family: Arial;
             color:#304555;
             border-bottom: 1px solid #000;
             padding-bottom: 5px;">
                <b style="font-size:2px;">Mavidenİste - Sipariş fişi</b>
        </div>
        <div class="modal-body" style="padding-top:5">
            <div style="
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            padding: 5 0 0 0!important;
            margin-top: 5px;
            font-family: Arial;
            font-weight: 500;
            font-size: 2px;"
            >
                <span style="font-family: Tahoma;font-size:2px;">Sipariş - #123214123122</span>
                <span style="font-family: Tahoma;font-size:2px;">2020-03-21 18:20:33</span>
            </div>

            <div style="
                display:flex;
                flex-direction: column;
                justify-content:space-between;
                padding: 5 0 0 0!important;
                margin-top: 5px;
                font-family: Arial;
                font-weight: 500;
                font-size: 2px;
                padding-bottom: 5px;
                border-bottom: 1px dotted #304555;">
                    <span style="
                        font-family: Tahoma;
                        font-size:2px;
                        padding-bottom: 5px;">Berk Topcu - 05396861440</span>

                    <span style="
                        font-family: Tahoma;
                        font-size:2px;
                            ">1625.ada d blok daire 5 15 temmuz camili mahallesi (yunus market arkasi) - Adapazari, Sakarya</span>
                    </div>


                    <div style="display:flex;flex-direction: row;justify-content:space-between;padding: 5 0 0 0!important;margin-top: 5px;font-family: Arial;font-weight: 500;font-size: 12px;">

                            <span style="
                            font-family: Tahoma;
                            font-weight: bold;
                            color: #304555;
                            font-size:2px;
                        ">Adet</span>
                                        <span style="
                            font-family: Tahoma;
                            font-weight: bold;
                            color: #304555;
                            font-size:2px;
                        ">Ürün</span>
                                        <span style="
                            font-family: Tahoma;
                            font-weight: bold;
                            color: #304555;
                            font-size:2px;
                        ">Fiyat</span>

                    </div>

                    <div style="
                        border-bottom: 1px dotted #304555;
                        padding-bottom: 5px;
                    ">

                    <div style="display:flex;flex-direction: row;justify-content:space-between;padding: 5 0 0 0!important;margin-top: 5px;font-family: Arial;font-weight: 500;font-size: 12px;">

                        <span style="
                        font-family: Tahoma;
                        font-weight: bold;
                        color: #304555;
                        font-size:2px;
                    ">1</span>
                                        <span style="
                        font-family: Tahoma;
                        font-weight: bold;
                        color: #304555;
                        font-size:2px;
                    ">Tadim Karisik Kuruyemis 500g</span>
                                        <span style="
                        font-family: Tahoma;
                        font-weight: bold;
                        color: #304555;
                        font-size:2px;
                    ">15</span>


                </div>




                </div>
            </div>

            <div>
                <div style="display:flex;flex-direction: column;justify-content: column;padding: 5 0 0 0!important;margin-top: 5px;font-family: Arial;font-weight: 500;font-size: 12px;">

                       <span style="
                        font-family: Tahoma;
                        font-weight: bold;
                        color: #304555;
                        font-size:2px;
                    ">Tutar: 53 TL (KDV Dahil)</span>
                                <span style="
                            font-family: Tahoma;
                            font-weight: bold;
                            color: #304555;
                            font-size:2px;
                        ">Kupon: Uygulanmamış</span>

                                <span style="
                            font-family: Tahoma;
                            font-weight: bold;
                            color: #304555;
                            font-size:2px;
                        ">Sipariş notu: Gelirken bir tane kısa parliament lütfen</span>


                </div>

            </div>

        </div> </div>
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
    <link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
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

    <script src=" https://printjs-4de6.kxcdn.com/print.min.js"></script>

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
