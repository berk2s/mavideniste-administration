window.onload = async () => {
    fetchOrders = async () => {
        try{
            //pills-tab
            const order = await getOrders();
            order.data.map(async e => {

                //const li = document.createElement('li');
                //li.classList.add('nav-item');
                //const div = document.createElement('div');
                //div.classList.add('nav-link');
                //div.classList.add('list-actions');
                //div.id = `invoices-${e.visibility_id}`;
                //div.setAttribute('data-invoice-id', e.visibility_id);
                //li.append(div);
                let list = `<li class="nav-item">

                    <div class="nav-link list-actions" data-invoice-id="${e.visibility_id}" id="invoices-${e.visibility_id}">
                    <div class="f-m-body">
                                                <div class="f-head">
                                                    <svg style='border-radius: 0!important' xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">Sipariş - #${e.visibility_id}</p>
                                                    <p class="invoice-customer-name">${e.user[0].name_surname}</p>
                                                    <p class="invoice-generated-date">${dateParse(e.order_date)}</p>
                                                </div>
                                            </div>
                                            </div>
    </li>
`;
              //  div.innerHTML = list;


                console.log(e)

                let products = ``;

                let i = 1;

                if(e.products != null) {

                    const promiseMap = e.products.map(e => {
                        return new Promise((resolve, reject) => {
                            products += `<tr>
                                     <td>${i}</td>
                                     <td>${e.product_name}</td>
                                     <td class="text-right">${e.count}</td>
                                     <td class="text-right">${e.product_list_price}</td>
                                 </tr>`;
                            i++;
                            resolve(true);
                        })
                    });
                    await Promise.all(promiseMap)

                }



                const invoiceDiv = document.createElement('div');
                invoiceDiv.classList.add(`invoices-${e.visibility_id}`);

                let invoiceArea = `<div class="invoices-${e.visibility_id}"> <div class="content-section  animated animatedFadeInUp fadeInUp">

                                        <div class="row inv--head-section">

                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">Sipariş - #${e.visibility_id}</h3>
                                            </div>
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <div class="company-info">
                                                    <img src="/logo.png" style="width:35px; height:35px; border-radius: 10px; margin-right: 10px;" />
                                                    <h5 class="inv-brand-name">MAVİDENİSTE</h5>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row inv--detail-section">

                                            <div class="col-sm-5 align-self-center">
                                                <p class="inv-to">Müşteri</p>
                                            </div>

                                               <div class="col-sm-7 align-self-center  text-sm-right order-sm-0 order-1"">
                                                <p class="inv-to">Sipariş süreleri</p>
                                            </div>


                                            <div class="col-sm-5 ">
                                                <p class="inv-customer-name">${e.user[0].name_surname}</p>
                                                <p class="inv-street-addr">${e.user_address.address_county.text}, ${e.user_address.address_province.text}</p>
                                                <p class="inv-email-address">${e.user_address.address}</p>
                                                <p class="inv-email-address">${e.user[0].phone_number}</p>
                                            </div>




                                            <div class="col-sm-7 align-self-center  text-sm-right order-2 ">
                                                <p class="inv-customer-name">Sipariş verilme tarihi: ${dateParse(e.order_date)}</p>
                                                <p class="inv-customer-name">Hazırlanma tarihi: ${dateParse(e.order_history_prepare != null ? e.order_history_prepare : e.order_date)}</p>
                                                <p class="inv-customer-name">Yola çıkma tarihi: ${dateParse(e.order_history_enroute != null ? e.order_history_enroute : e.order_date)}</p>
                                                <p class="inv-customer-name">Teslim edilme tarihi: ${dateParse(e.order_history_success != null ? e.order_history_success : e.order_date)}</p>

                                            </div>


                                        </div>

                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">S.No</th>
                                                            <th scope="col">Ürün</th>
                                                            <th class="text-right" scope="col">Adet</th>
                                                            <th class="text-right" scope="col">Fiyat</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        ${products}

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-6 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">Ödeme bilgileri:</h6>
                                                        </div>
                                                        <div class="col-sm-4 col-12">
                                                            <p class=" inv-subtitle">Ödeme tipi: </p>
                                                        </div>
                                                        <div class="col-sm-8 col-12">
                                                            <p class="">${e.payload_type == 1 ? 'Kart' : 'Nakit'}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">Kupon: </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">${e.coupon != null ? e.coupon.coupon_name : 'Yok'}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">Toplam: </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">${e.price} TL</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
</div>
                                    </div>`;

                invoiceDiv.innerHTML = invoiceArea

                document.getElementById('pills-tab').innerHTML += list;
                document.getElementById('ct').innerHTML += invoiceDiv;

            })
        }catch(e){
            console.log(e);
        }
    }

    getOrders = async () => {
        try{
            const order = await fetch(`${API_URL}/api/p/orders/history/${BRANCH_ID}`, {
                method:'GET',
                headers:{
                    'x-api-key':API_KEY
                }
            });
            return order.json();
        }catch(e){
            console.log(e);
        }
    }


    fitIt = async () => {
        $('.search > input').on('keyup', function() {
            var rex = new RegExp($(this).val(), 'i');
            $('.nav .nav-item').hide();
            $('.nav .nav-item').filter(function() {
                return rex.test($(this).text());
            }).show();
        });

        $('[data-toggle="tooltip"]').tooltip({
            'template': '<div class="tooltip actions-btn-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        })

        var $btns = $('.list-actions').click(function() {

            alert('asd')
            var getDataInvoiceAttr = $(this).attr('data-invoice-id');
            var getParentDiv = $(this).parents('.doc-container');
            var getParentInvListContainer = $(this).parents('.inv-list-container');

            var $el = $('.' + this.id).show();
            $('#ct > div').not($el).hide();
            var setInvoiceNumber = getParentDiv.find('.invoice-inbox .inv-number').text('#'+ getDataInvoiceAttr);
            var showInvHeaderSection = getParentDiv.find('.invoice-inbox .invoice-header-section').css('display', 'flex');
            var showInvContentSection = getParentDiv.find('.invoice-inbox #ct').css('display', 'block');
            var showInvContentSection = getParentDiv.find('.invoice-inbox').css('height', 'calc(100vh - 197px)');
            var hideInvEmptyContent = getParentDiv.find('.invoice-inbox .inv-not-selected').css('display', 'none');
            var hideInvEmptyContent = getParentDiv.find('.invoice-container .inv--thankYou').css('display', 'block');
            if ($(this).parents('.tab-title').hasClass('open-inv-sidebar')) {
                $(this).parents('.tab-title').removeClass('open-inv-sidebar');
            }
            $btns.removeClass('active');
            $(this).addClass('active');

            var myDiv = document.getElementsByClassName('invoice-inbox')[0];
            myDiv.scrollTop = 0;
        })

        $('.action-print').on('click', function(event) {
            event.preventDefault();
            /* Act on the event */
            window.print();
        });

        const ps = new PerfectScrollbar('.inv-list-container', {
            suppressScrollX : true
        });


        const inv_container = new PerfectScrollbar('.invoice-inbox', {
            suppressScrollX : true
        });

        if (window.innerWidth >= 768) {
            const inv_container = new PerfectScrollbar('.invoice-inbox', {
                suppressScrollX : true
            });
        } else if (window.innerWidth < 768) {
            inv_container.destroy();
        }


        $('.hamburger, .inv-not-selected p').on('click', function(event) {
            $('.doc-container').find('.tab-title').toggleClass('open-inv-sidebar')
        })

    }

     await fetchOrders();
    await fitIt()
    }




