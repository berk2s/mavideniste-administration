window.onload = async () => {
    document.getElementById('pendingorders').click();
   //
}

const socket = io.connect('http://localhost:3000');

socket.on('connect', () => {
    console.log('baglandi!');

    socket.on('newOrder', (data) => {
        document.getElementById('pendingOrdersTickler').style.display = 'block';

        console.log('geldi');
        addOrder(data.order);
    });

});

addOrder = async (e) => {

    document.getElementById('loading').style.display = 'flex';


    const orderArea = document.getElementById('ct');

    const orderID = e._id;

    const orderUniqueKey = e.visibility_id;

    const orderUserID = e.user_id;
    const userDetails = await getUserDetails(orderUserID);
    const orderUserName = userDetails.data.name_surname

    const products = e.products;


    const orderAddressProvince = e.user_address.address_province.text;
    const orderAddressCounty = e.user_address.address_county.text;
    const orderAddressLTD = e.user_address.address_ltd;
    const orderAddressLNG = e.user_address.address_lng;
    const addressDesc = e.user_address.address+' ('+e.user_address.address_direction+')';

    const orderPaymentType = e.payload_type;
    const orderPaymentTypeText = orderPaymentType == 1 ? 'Nakit' : 'Kart';
    const orderPrice = e.price;

    const orderNote = typeof e.orderNote === 'undefined' ? 'Not yok' : e.orderNote;

    const isBlueCurrier = e.is_bluecurrier;

    const orderCoupon = e.coupon;
    const orderCouponText = orderCoupon != null ? orderCoupon.coupon_name : 'YOK'

    const orderDate = dateParse(e.order_date);

    let infoText = '';

    let orderNoteText = '';

    if(typeof orderNote !== 'undefined')
        orderNoteText = `(${orderNote})`

    if(products.length > 1)
        infoText = `${products[0].product_name} ve ${products.length-1} ürün daha ${orderNoteText}`
    else
        infoText = `${products[0].product_name} ${orderNoteText}`

    const relevantDiv = document.createElement('div');

    relevantDiv.classList.add('todo-item');
    relevantDiv.classList.add('pendingorders');

    relevantDiv.innerHTML = `
            <div class="todo-item-inner">

                <div class="todo-content">
                    <h5 class="todo-heading">Sipariş - #${orderUniqueKey} </h5>
                    <p class="meta-date" style="margin:10px 0; display:flex; flex-direction: row; justify-content: space-between; align-items: center">

                        <span style="width:max-content">
                            <svg xmlns="http://www.w3.org/2000/svg" style='margin-top:-3px' width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-watch"><circle cx="12" cy="12" r="7"></circle><polyline points="12 9 12 12 13.5 13.5"></polyline><path d="M16.51 17.35l-.35 3.83a2 2 0 0 1-2 1.82H9.83a2 2 0 0 1-2-1.82l-.35-3.83m.01-10.7l.35-3.83A2 2 0 0 1 9.83 1h4.35a2 2 0 0 1 2 1.82l.35 3.83"></path></svg>
                            <span>${orderDate}</span>
                        </span>

                        <span style="width:max-content">
                            <svg xmlns="http://www.w3.org/2000/svg" style='margin-top:-3px' width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span><a href="">${orderUserName}</a></span>
                        </span>

                        <span style="width:max-content">
                            <svg xmlns="http://www.w3.org/2000/svg" style='margin-top:-3px' width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <span>${orderAddressCounty}, ${orderAddressProvince}</span>
                        </span>

                        <span style="width:max-content">
                            <svg xmlns="http://www.w3.org/2000/svg" style='margin-top:-3px' width="16" height="16"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trello"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect></svg>
                             <span>${orderPrice} TL</span>
                        </span>

                    </p>
                    <p class="todo-text">

                       ${infoText}

                    </p>
                </div>

                <div class="priority-dropdown custom-dropdown-icon">
                    <div class="dropdown p-dropdown">
                        <a class="dropdown-toggle warning" href="#" role="button" id="dropdownMenuLink-18" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-18">
                            <a class="dropdown-item danger" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                Hazırlanan
                            </a>
                            <a class="dropdown-item primary" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                Yolda
                            </a>
                            <a class="dropdown-item warning" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                Başarılı
                            </a>
                        </div>
                    </div>
                </div>

                <div class="action-dropdown custom-dropdown-icon">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-19" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-19">
                            <a
                               class="dropdown-item"
                               href="javascript:void(0);"


                               onClick="viewOrderDetails(this)"

                               data-orderid="${orderID}"
                               data-ordername="${orderUniqueKey}"
                               data-orderdate="${orderDate}"

                               data-customername="${orderUserName}"
                               data-customerid="${orderUserID}"

                                data-paymenttype="${orderPaymentTypeText}"

                                data-totalprice="${orderPrice}"

                                data-coupon="${orderCouponText}"

                                data-location="${orderAddressCounty}, ${orderAddressProvince}"

                                data-locationdesc="${addressDesc}"

                                data-ordernote="${orderNote}"

                               >Detaylar</a>
                            <a class="dropdown-item" href="javascript:void(0);">Bilgi fişi</a>
                            <a class="dropdown-item" href="javascript:void(0);">Yol tarifi</a>
                            <a class="dropdown-item" href="javascript:void(0);">Fiyatı güncelle</a>
                            <a class="dropdown-item" href="javascript:void(0);">İptal et</a>

                        </div>
                    </div>
                </div>
           </div>
    `

    orderArea.insertBefore(relevantDiv, orderArea.firstChild);

    document.getElementById('loading').style.display = 'none';

};

viewOrderDetails = async (e) => {
    const orderid = e.getAttribute('data-orderid');
    const orderunique = e.getAttribute('data-ordername')
    const orderdate = e.getAttribute('data-orderdate');

    const customer_id = e.getAttribute('data-customerid');
    const customer_name = e.getAttribute('data-customername')

    const payment_type = e.getAttribute('data-paymenttype');

    const total_price = e.getAttribute('data-totalprice');

    const coupon_name = e.getAttribute('data-coupon');

    const location = e.getAttribute('data-location');

    const locationdesc = e.getAttribute('data-locationdesc')

    const ordernote = e.getAttribute('data-ordernote')

    const products = await getProducts(orderid);

    products.data.map(e => {
        const area = document.getElementById('DETAIL_productsListArea');
        const item = document.createElement('li');
        item.classList.add('list-group-item')
        item.classList.add('detailOrder')
        item.style.flexDirection = 'column';

        item.innerHTML = `
            <span><b>${e.product_name}</b></span>
            <span><b>${e.count} Adet</b></span>
        `;

        area.append(item);


    })


    //console.log(JSON.parse(products))

    const ordername = 'Sipariş - '+orderunique;

    document.getElementById('DETAIL_ordername').innerHTML = ordername;
    document.getElementById('DETAIL_orderUniqueKey').innerHTML = orderunique;
    document.getElementById('DETAIL_orderDate').innerHTML = orderdate;
    document.getElementById('DETAIL_customer').innerHTML = customer_name;
    document.getElementById('DETAIL_paymentType').innerHTML = payment_type;
    document.getElementById('DETAIL_totalPrice').innerHTML = total_price;
    document.getElementById('DETAIL_coupon').innerHTML = coupon_name;
    document.getElementById('DETAIL_location').innerHTML = location;
    document.getElementById('DETAIL_locationDesc').innerHTML = locationdesc;
    document.getElementById('DETAIL_ordernote').innerHTML = ordernote;
    document.getElementById('orderDetailsA').click();


}

getUserDetails = async (userID) => {
    try{
        const userDetails = await fetch(`${API_URL}/api/p/user/${userID}`, {
            method:'GET',
            headers:{
                'x-api-key': API_KEY
            }
        });
        return userDetails.json();
    }catch(e){
        console.log(e);
    }
}

getProducts = async (order_id) => {
    try{
        const userDetails = await fetch(`${API_URL}/api/orders/product/${order_id}`, {
            method:'GET',
            headers:{
                'x-api-key': API_KEY
            }
        });
        return userDetails.json();
    }catch(e){
        console.log(e);
    }
}

readyOrders = async () => {
    try{
        const orders = await getOpenOrders();
        orders.data.map(e => {
            addOrder(e);
        });
    }catch(e){
        console.log(e);
    }
}

getOpenOrders = async () => {
    try{
        const orders = await fetch(`${API_URL}/api/orders/open`, {
            method:'GET',
            headers:{
                'x-api-key': API_KEY
            }
        });
        return orders.json()
    }catch(e){
        console.log(e);
    }
}

readyOrders();
