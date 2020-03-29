@extends('backinterface.layout.structure')
@section('title', 'Maviden İste - Canlı siparişler')

@section('page_navigation')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Siparişler</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Geçmiş siparişler</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">


        <div class="row invoice layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="app-hamburger-container">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                </div>
                <div class="doc-container">
                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="search">
                                    <input type="text" class="form-control" placeholder="Siparişlerde ara">
                                </div>
                                <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">

                                    @foreach($results->data as $result)
                                        <li class='nav-item'>
                                            <div class='nav-link list-actions' id='invoice-{{$result->visibility_id}}' data-invoice-id="{{$result->visibility_id}}">
                                                <div class="f-m-body">
                                                    <div class="f-head">
                                                        <svg style='border-radius: 0!important' xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                                    </div>
                                                    <div class="f-body">
                                                        <p class="invoice-number">{{$result->is_bluecurrier == true ? 'Mavikurye' : 'Sipariş'}} - #{{$result->visibility_id}}</p>
                                                        <p class="invoice-customer-name">{{$result->user[0]->name_surname}}</p>
                                                        <p class="invoice-generated-date">{{Carbon\Carbon::parse($result->order_date)->format('d-m-Y H:i')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-container">
                        <div class="invoice-inbox">

                            <div class="inv-not-selected">
                                <p>Listeden bir sipariş seçin</p>
                            </div>

                            <div class="invoice-header-section">
                                <h4 class="inv-number"></h4>
                                <div class="invoice-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                </div>
                            </div>

                            <div id="ct" class="">

                                @foreach($results->data as $result)


                                    <div class='invoice-{{$result->visibility_id}}'>
                                    <div class="content-section  animated animatedFadeInUp fadeInUp">

                                        <div class="row inv--head-section">

                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">SİPARİŞ </h3>
                                            </div>
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <div class="company-info">
                                                    <img src="/logo.png" style="width:30px;height:30px;margin-right: 20px;" />
                                                    <h5 class="inv-brand-name">Maviden İste</h5>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row inv--detail-section">

                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">Sipariş Sahibi</p>
                                            </div>


                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-customer-name">{{$result->user[0]->name_surname}}</p>
                                                <p class="inv-street-addr">{{$result->user_address->address}}</p>
                                                <p class="inv-email-address">{{$result->user[0]->phone_number}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                <p class="inv-list-number"><span class="inv-title">Sipariş numarası : </span> <span class="inv-number">[invoice number]</span></p>
                                                <p class="inv-created-date"><span class="inv-title">Sipariş tarihi : </span> <span class="inv-date">{{Carbon\Carbon::parse($result->order_date)->format('d-m-Y H:i') }}</span></p>
                                                <p class="inv-created-date"><span class="inv-title">Hazırlanma tarihi : </span> <span class="inv-date">{{Carbon\Carbon::parse($result->order_history_prepare)->format('d-m-Y H:i') }}</span></p>
                                                <p class="inv-created-date"><span class="inv-title">Yola çıkma tarihi : </span> <span class="inv-date">{{Carbon\Carbon::parse($result->order_history_enroute)->format('d-m-Y H:i') }}</span></p>
                                                <p class="inv-due-date"><span class="inv-title">Teslim tarihi : </span> <span class="inv-date">{{Carbon\Carbon::parse($result->order_history_success)->format('d-m-Y H:i') }}</span></p>
                                            </div>
                                        </div>
                                        @if($result->products != null)

                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">S.No</th>
                                                            <th scope="col">Ürün</th>
                                                            <th  scope="col">Miktar</th>
                                                            <th  scope="col">Tutar</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $i = 0; @endphp
                                                            @foreach($result->products as $product)
                                                                <tr>
                                                                    <td>{{$i}}</td>
                                                                    <td>{{$product->product_name}}</td>
                                                                    <td>{{$product->count}}</td>
                                                                    <td>{{$product->product_list_price}}</td>

                                                                </tr>
                                                                @php $i++ @endphp
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @endif


                                        <div class="row mt-4">
                                            @if($result->products != null)

                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">Diğer Bilgiler:</h6>
                                                        </div>
                                                        <div class="col-sm-4 col-12">
                                                            <p class=" inv-subtitle">Ödeme: </p>
                                                        </div>
                                                        <div class="col-sm-8 col-12">
                                                            <p class="">{{$result->payload_type == 1 ? 'Nakit' : 'Kart'}}</p>
                                                        </div>
                                                        <div class="col-sm-4 col-12">
                                                            <p class=" inv-subtitle">Sipariş notu : </p>
                                                        </div>
                                                        <div class="col-sm-8 col-12">
                                                            <p class="">{{$result->order_note != null ? $result->order_note : ''}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @endif

                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        @if($result->products != null)

                                                        <div class="col-sm-8 col-7">
                                                            <p class="">Kupon: </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{$result->coupon != null ? $result->coupon->coupon_name : 'Yok'}}</p>
                                                        </div>
                                                        @endif
                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <h4 class="">Sipariş Tutarı : </h4>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                            <h4 class="">{{$result->price}} TL</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    </div>






                            @endforeach


                            </div>


                        </div>

                        <div class="inv--thankYou">
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <p class="">mavideniste</p>
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

    <link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <link href="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/css/apps/invoice.css" rel="stylesheet" type="text/css" />
@endsection

@section('footer_addons')
    <script src="/mod/js/orders/historyorders.js"></script>

    <!-- toastr -->
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="/mod/{{ \Illuminate\Support\Facades\Auth::user()->is_theme_dark ? '' : 'light/' }}assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <script src="/mod/plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script src="/mod/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/mod/plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js"></script>

    <script src=" https://printjs-4de6.kxcdn.com/print.min.js"></script>

    <script src="/mod/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="/mod/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/mod/plugins/table/datatable/button-ext/buttons.print.min.js"></script>


    <script>


    </script>

@endsection
