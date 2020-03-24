window.onload = async () => {
    document.getElementById('pendingorders').click();

    let countPending=0;
    let countPrepare=0;
    let countEnroute=0;

    const socket = io.connect('http://localhost:3000');

    socket.on('connect', () => {
        console.log('baglandi!');

        socket.on('newOrder', (data) => {

            if(data.order.branch_id == BRANCH_ID) {
                document.getElementById('pendingOrdersTickler').style.display = 'block';
                addOrder(data.order);
            }

        });

    });

    addOrder = async (e) => {

        document.getElementById('loading').style.display = 'flex';


        const orderArea = document.getElementById('ct');

        const orderID = e._id;

        const orderUniqueKey = e.visibility_id;

        let orderUserName;
        let orderUserID;
        if(Array.isArray(e.user)){
            orderUserID = e.user[0]._id;
            orderUserName = e.user[0].name_surname;
        }else{
            orderUserID = e.user_id;
            const userDetails = await getUserDetails(orderUserID);
            console.log(userDetails)
            orderUserName = userDetails.data.name_surname
        }


        const products = e.products;


        const orderAddressProvince = e.user_address.address_province.text;
        const orderAddressCounty = e.user_address.address_county.text;
        const orderAddressLTD = e.user_address.address_ltd;
        const orderAddressLNG = e.user_address.address_lng;
        const addressDesc = e.user_address.address+' ('+e.user_address.address_direction+')';

        const orderPaymentType = e.payload_type;
        const orderPaymentTypeText = orderPaymentType == 1 ? 'Nakit' : 'Kart';
        const orderPrice = e.price;

        const orderNote = e.order_note;

        const isBlueCurrier = e.is_bluecurrier;

        const orderCoupon = e.coupon;
        const orderCouponText = orderCoupon != null ? orderCoupon.coupon_name : 'YOK'

        const orderDate = dateParse(e.order_date);

        const orderStatus = e.order_status;

        let infoText = '';

        let orderNoteText = '';

        if(orderNote.trim() == ''){
            orderNoteText = '(not yok)'
        }else{
            orderNoteText = `(${orderNote})`;
        }

        if(products.length > 1)
            infoText = `${products[0].product_name} ve ${products.length-1} ürün daha ${orderNoteText}`
        else
            infoText = `${products[0].product_name} ${orderNoteText}`

        const relevantDiv = document.createElement('div');

        relevantDiv.classList.add('todo-item');
        relevantDiv.style.cursor = 'default';

        if(orderStatus == 0){
            countPending++;
            relevantDiv.classList.add('pendingorders');
        } else if(orderStatus == 1) {
            countPrepare++;
            relevantDiv.classList.add('prepareorders');
        }else if(orderStatus == 2) {
            countEnroute++;
            relevantDiv.classList.add('enrouteorders');
        }

        document.getElementById('pendingBadge').innerHTML = countPending;
        document.getElementById('prepareBadge').innerHTML = countPrepare;
        document.getElementById('enrouteBadge').innerHTML = countEnroute;

        relevantDiv.setAttribute('id', `ORDER_${orderID}`)

        let orderStatusActions = '';
        let orderStatusImage = '';

        if(orderStatus == 0){
            orderStatusActions = `<a
                                class="dropdown-item danger"
                                href="javascript:void(0);"
                                onclick="setOrderToPrepare(this)"
                                data-orderid="${orderID}"
                                data-orderstatus="${orderStatus}"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                Hazırlanan
                            </a>
                          `
            orderStatusImage = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>`
        }else if(orderStatus == 1){
            orderStatusActions = `
                            <a
                                class="dropdown-item primary"
                                href="javascript:void(0);"
                                onclick="setOrderToEnRoute(this)"
                                data-orderid="${orderID}"
                                data-orderstatus="${orderStatus}"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                Yolda
                            </a>
                           `
            orderStatusImage = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>`
        }else if(orderStatus == 2){
            orderStatusActions = `
                            <a
                                class="dropdown-item warning"
                                href="javascript:void(0);"

                                onclick="setOrderToSuccessfull(this)"
                                data-orderid="${orderID}"
                                data-orderstatus="${orderStatus}"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                Teslim edildi
                            </a>`;
            orderStatusImage = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>`
        }


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
                             <span id="PRICE_${orderID}">${orderPrice} TL</span>
                        </span>

                    </p>
                    <p class="todo-text">

                       ${infoText}

                    </p>
                </div>

                <div class="priority-dropdown custom-dropdown-icon">
                    <div class="dropdown p-dropdown">
                        <a class="dropdown-toggle warning" href="#" role="button" id="ORDERDROPDOWN_${orderID}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            ${orderStatusImage}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="ORDERDROPDOWN_${orderID}" id="ORDERDROPDOWNACTIONS_${orderID}">
                            ${orderStatusActions}
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


                               onclick="viewOrderDetails(this)"

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
                            <a class="dropdown-item" href="javascript:void(0);"

                               onclick="printOrderPlug(this)"

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
                            >Bilgi fişi</a>
                            <a
                            href="https://www.google.com/maps/dir/40.7474978,30.3565063/${orderAddressLTD},${orderAddressLNG}"
                            class="dropdown-item"
                            target="_blank"


                            >Yol tarifi</a>
                            <a
                                class="dropdown-item"
                                href="javascript:void(0);"

                                onclick="updateOrderPrice(this)"

                                data-ordername="${orderUniqueKey}"
                                data-orderid="${orderID}"
                                data-ordername="${orderUniqueKey}"
                                data-orderstatus="${orderStatus}"
                                data-totalprice="${orderPrice}"
                                >Fiyatı güncelle</a>

                            <a
                                class="dropdown-item"
                                 href="javascript:void(0);"
                                 onclick="setOrderToCancel(this)"

                                data-ordername="${orderUniqueKey}"
                                data-orderid="${orderID}"
                                data-ordername="${orderUniqueKey}"
                                data-orderstatus="${orderStatus}"
                                data-totalprice="${orderPrice}"
                                 >İptal et</a>

                        </div>
                    </div>
                </div>
           </div>
    `

        orderArea.insertBefore(relevantDiv, orderArea.firstChild);

        document.getElementById('loading').style.display = 'none';

        document.getElementById('pendingorders').click()
    };

    setOrderToCancel = async (e) => {
        if(confirm('Siparişi iptal etmek istiyor musunuz?')){
            const orderid = e.getAttribute('data-orderid');
            const orderstatus = e.getAttribute('data-orderstatus');

            const updateRequest = await orderCancel(orderid)

            console.log(updateRequest)

            if(updateRequest.state.code == 'PO_1') {
                const elem = document.getElementById(`ORDER_${orderid}`);
                elem.parentNode.removeChild(elem);
                Snackbar.show({text:'Siparişi iptal ettiniz', duration:3000})
                calcStatusCount(orderstatus, -1)

                //ORDERDROPDOWN_${orderID}
                //ORDERDROPDOWNACTIONS_${orderID}
            }
        }
    }

    setOrderToPrepare = async e => {

        if(confirm('Sipariş durumunu hazırlanan yapmak istiyor musunuz?')){
            const orderid = e.getAttribute('data-orderid');
            const orderstatus = e.getAttribute('data-orderstatus');

            const updateRequest = await orderPrepare(orderid)

            console.log(updateRequest)

            if(updateRequest.state.code == 'PO_1') {
                const elem = document.getElementById(`ORDER_${orderid}`);
                elem.classList.remove('pendingorders');
                elem.classList.add('prepareorders');
                document.getElementById('pendingorders').click();
                Snackbar.show({text:'Ürün hazırlanıyor', duration:3000})
                calcStatusCount(orderstatus, 1)
                changeDropdown(orderid, 1);

                //ORDERDROPDOWN_${orderID}
                //ORDERDROPDOWNACTIONS_${orderID}
            }
        }
    }

    setOrderToEnRoute = async e => {

        if(confirm('Sipariş durumunu yolda yapmak istiyor musunuz?')){
            const orderid = e.getAttribute('data-orderid');
            const orderstatus = e.getAttribute('data-orderstatus');

            const updateRequest = await orderEnroute(orderid)

            console.log(updateRequest)

            if(updateRequest.state.code == 'PO_1') {
                const elem = document.getElementById(`ORDER_${orderid}`);
                elem.classList.remove('prepareorders');
                elem.classList.add('enrouteorders');
                document.getElementById('prepareorders').click();
                Snackbar.show({text:'Ürün yola çıktı', duration:3000})
                calcStatusCount(orderstatus, 2)
                changeDropdown(orderid, 2);

                //ORDERDROPDOWN_${orderID}
                //ORDERDROPDOWNACTIONS_${orderID}
            }
        }
    }

    setOrderToSuccessfull = async e => {

        if(confirm('Sipariş durumunu teslim edildi yapmak istiyor musunuz?')){
            const orderid = e.getAttribute('data-orderid');
            const orderstatus = e.getAttribute('data-orderstatus');

            const updateRequest = await orderSuccessfull(orderid)

            console.log(updateRequest)

            if(updateRequest.state.code == 'PO_1') {
                const elem = document.getElementById(`ORDER_${orderid}`);
                elem.parentNode.removeChild(elem);
                Snackbar.show({text:'Tebrikler! Sipariş başarı ile teslim edildi', duration:3000})
                calcStatusCount(orderstatus, 3)
                changeDropdown(orderid, 3);

                //ORDERDROPDOWN_${orderID}
                //ORDERDROPDOWNACTIONS_${orderID}
            }
        }
    }

    changeDropdown = (orderID, orderStatus) => {
        const icon = document.getElementById(`ORDERDROPDOWN_${orderID}`);
        const actions = document.getElementById(`ORDERDROPDOWNACTIONS_${orderID}`);

        let orderStatusActions = '';
        let orderStatusImage = '';

        if(orderStatus == 0){
            orderStatusActions = `<a
                                class="dropdown-item danger"
                                href="javascript:void(0);"
                                onclick="setOrderToPrepare(this)"
                                data-orderid="${orderID}"
                                data-orderstatus="${orderStatus}"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                Hazırlanan
                            </a>
                          `
            orderStatusImage = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>`
        }else if(orderStatus == 1){
            orderStatusActions = `
                            <a
                                class="dropdown-item primary"
                                href="javascript:void(0);"
                                onclick="setOrderToEnRoute(this)"
                                data-orderid="${orderID}"
                                data-orderstatus="${orderStatus}"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                Yolda
                            </a>
                           `
            orderStatusImage = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>`
        }else if(orderStatus == 2){
            orderStatusActions = `
                            <a
                                class="dropdown-item warning"
                                href="javascript:void(0);"

                                onclick="setOrderToSuccessfull(this)"
                                data-orderid="${orderID}"
                                data-orderstatus="${orderStatus}"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                Teslim edildi
                            </a>`;
            orderStatusImage = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>`
        }

        icon.innerHTML = orderStatusImage;
        actions.innerHTML = orderStatusActions;

    }

    calcStatusCount = (decrement, increment) => {

        if(decrement == 0)
            countPending--;
        else if(decrement == 1)
            countPrepare--;
        else if(decrement == 2)
            countEnroute--;

        if(increment == 0)
            countPending++;
        else if(increment == 1)
            countPrepare++;
        else if(increment == 2)
            countEnroute++;

        document.getElementById('pendingBadge').innerHTML = countPending;
        document.getElementById('prepareBadge').innerHTML = countPrepare;
        document.getElementById('enrouteBadge').innerHTML = countEnroute;
    }

    orderPrepare = async (id) => {
        try{
            const request = await fetch(`${API_URL}/api/orders/status/prepare`,{
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key':API_KEY
                },
                body:JSON.stringify({
                    orderid:id,
                    title:PREPARE_TITLE,
                    text:PREPARE_TEXT
                })
            });
            return request.json();
        }catch(e){
            console.log(e)
        }
    }

    orderSuccessfull = async (id) => {
        try{
            const request = await fetch(`${API_URL}/api/orders/status/successfull`,{
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key':API_KEY
                },
                body:JSON.stringify({
                    orderid:id,
                    title:DELIVERED_TITLE,
                    text:DELIVERED_TEXT
                })
            });
            return request.json();
        }catch(e){
            console.log(e)
        }
    }

    orderCancel = async (id) => {
        try{
            const request = await fetch(`${API_URL}/api/orders/status/cancel`,{
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key':API_KEY
                },
                body:JSON.stringify({
                    orderid:id
                })
            });
            return request.json();
        }catch(e){
            console.log(e)
        }
    }

    orderEnroute = async (id) => {
        try{
            const request = await fetch(`${API_URL}/api/orders/status/enroute`,{
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key':API_KEY
                },
                body:JSON.stringify({
                    orderid:id,
                    title:ENROUTE_TITLE,
                    text:ENROUTE_TEXT
                })
            });
            return request.json();
        }catch(e){
            console.log(e)
        }
    }

    updateOrderPrice = (e) => {
        document.getElementById('orderUpdatePriceA').click()
        const orderid = e.getAttribute('data-orderid');
        const orderunique = e.getAttribute('data-ordername')

        const total_price = e.getAttribute('data-totalprice');

        document.getElementById('UPDATEPRICE_ordername').innerHTML = `Sipariş - #${orderunique}`

        document.getElementById('UPDATEPRICE_price').value = total_price;

        document.getElementById('orderPriceUpdateSvnBtn').setAttribute('data-orderid', orderid);

    }

    orderPriceUpdateSave = async (e) => {
        try{
            const orderid = e.getAttribute('data-orderid');
            const price = document.getElementById('UPDATEPRICE_price').value;

            if(price.trim() == ''){
                Snackbar.show({text:'Boş bırakmayınız', duration:4000});
                return false;
            }

            const updatePrice = await fetch(`${API_URL}/api/orders/price`, {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY,
                },
                body:JSON.stringify({
                    orderid:orderid,
                    price:price
                })
            });

            document.getElementById(`PRICE_${orderid}`).innerHTML = `${price} TL`

            Snackbar.show({text:"Fiyat güncellendi", duration:4000})

        }catch(e){
            console.log(e);
        }
    }

    printOrderPlug = async (e) => {
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

        someJSONdata = [
            {
                name: 'John Doe',
                email: 'john@doe.com',
                phone: '111-111-1111'
            },
            {
                name: 'Barry Allen',
                email: 'barry@flash.com',
                phone: '222-222-2222'
            },
            {
                name: 'Cool Dude',
                email: 'cool@dude.com',
                phone: '333-333-3333'
            }
        ]

        printJS({
            printable: 'oogles',
            type: 'html',
            style: `
            .modal-body:{width:50px}
        `,
            maxWidth:50,
        });
    }

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
            console.log(orders)
            orders.data.map(e => {
                addOrder(e);
            });
        }catch(e){
            console.log(e);
        }
    }

    getOpenOrders = async () => {
        try{
            const orders = await fetch(`${API_URL}/api/orders/open/${BRANCH_ID}`, {
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

    await readyOrders();

}

