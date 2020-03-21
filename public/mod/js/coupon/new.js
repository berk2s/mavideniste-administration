window.onload = () => {
    calcTimeDesc = (e) => {
        const value = parseInt(e.value);
        let day = 0;
        let hour = 0;
        let text = '';

        if(e.value.trim() == ''){
            day = 0;
            hour = 0;
            text = '';
        }else{
            if(value%24 != 0){
                hour = value%24;

                if(value/24 >= 1){
                    day = parseInt(value/24);
                }

                text = `${day} gün ${hour} saat`;
            }else{
                if(value/24 >= 1){
                    day = parseInt(value/24);
                }
                text = `${day} gün`
            }
        }

        document.getElementById('couponTimeDesc').innerHTML = text;

    }

    document.getElementById('coupunPriceType').value = 'TL';

    document.getElementById('couponPriceTypeDesc').innerHTML = document.getElementById('coupunPriceType').value;

    saveCoupon = async () => {
        try{
            const coupon_name = document.getElementById('couponTitle').value;
            const coupon_desc = document.getElementById('couponDesc').value;
            const coupon_time = document.getElementById('couponTime').value;
            const coupon_amount = document.getElementById('couponAmount').value;
            const coupon_status = document.getElementById('couponStatus').checked;
            const coupun_price_type = document.getElementById('coupunPriceType').value;
            const coupon_price_unit = document.getElementById('coupunPriceUnit').value;

            const LIMIT_coupon_min_price = document.getElementById('couponMinPrice').value;
            const LIMIT_coupon_selected_only_items = getSelectedValues(document.getElementById('couponSelectedOnlyItems'));
            const LIMIT_coupon_selected_items = getSelectedValues(document.getElementById('couponSelectedItems'));
            const LIMIT_coupon_selected_categories = getSelectedValues(document.getElementById('couponSelectedCategories'));

            const couponMinPrice_ = document.getElementById('couponMinPrice_').value;
            const couponSelectedOnlyItems_ = document.getElementById('couponSelectedOnlyItems_').value;
            const couponSelectedOnlyCategories_ = document.getElementById('couponSelectedOnlyCategories_').value;
            const couponSelectedItems_ = document.getElementById('couponSelectedItems_').value;

            let LIMIT_priceLimitation = {values: null, status:false};
            let LIMIT_selectedOnlyItems = {values: null, status:false};
            let LIMIT_selectedOnlyCategories = {values: null, status:false};
            let LIMIT_selectedItems = {values: null, status:false};

            if(couponMinPrice_ != 'false'){
                LIMIT_priceLimitation = {values: LIMIT_coupon_min_price, status:true};
            }

            if(couponSelectedOnlyItems_ != 'false'){
                LIMIT_selectedOnlyItems = {values: LIMIT_coupon_selected_only_items, status:true}
            }

            if(couponSelectedOnlyCategories_ != 'false'){
                LIMIT_selectedOnlyCategories = {values: LIMIT_coupon_selected_categories, status:true}
            }

            if(couponSelectedItems_ != 'false'){
                LIMIT_selectedItems = {values: LIMIT_coupon_selected_items, status:true}
            }

            if(
                coupon_name.trim() == ''
                ||
                coupon_desc.trim() == ''
                ||
                coupon_time.trim() == ''
                ||
                coupon_amount.trim() == ''
                ||
                coupon_price_unit.trim() == ''
                ||
                couponMinPrice_ == 'false'
            ){
                Snackbar.show({text:'İlgili alanları boş bırakmayın', duration:4000});
                return false;
            }else{

                const checkName = await checkCouponName(coupon_name);

                console.log(checkName);

                if(checkName.status == false){
                    Snackbar.show({text:'Böyle bir kupon adı mevcut', duration:4000});
                    return false;
                }

                let unit;

                if(coupun_price_type == 'TL')
                    unit = 1;
                else
                    unit = 2;

                const saveCoupon = await fetch(`${API_URL}/api/p/coupon`, {
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json',
                        'x-api-key':API_KEY
                    },
                    body:JSON.stringify({
                        coupon_name:coupon_name,
                        coupon_text:coupon_desc,
                        coupon_time:coupon_time,
                        coupon_amount:coupon_amount,
                        coupon_status:coupon_status,
                        coupon_price_type:unit,
                        coupon_price_unit:coupon_price_unit,
                        limit_price:LIMIT_priceLimitation,
                        limit_selected_items_only:LIMIT_selectedOnlyItems,
                        limit_selected_categories_only:LIMIT_selectedOnlyCategories,
                        limit_selected_items:LIMIT_selectedItems,
                    })
                });

                Snackbar.show({text:'Kupon oluşturuldu', duration:4000});


                console.log(JSON.stringify({
                    coupon_name:coupon_name,
                    coupon_text:coupon_desc,
                    coupon_time:coupon_time,
                    coupon_amount:coupon_amount,
                    coupon_status:coupon_status,
                    coupon_price_type:unit,
                    coupon_price_unit:coupon_price_unit,
                    limit_price:LIMIT_priceLimitation,
                    limit_selected_items_only:LIMIT_selectedOnlyItems,
                    limit_selected_categories_only:LIMIT_selectedOnlyCategories,
                    limit_selected_items:LIMIT_selectedItems,
                }));
            }


        }catch(e){
            console.log(e);
        }
    }

    checkCouponName = async (name) => {
        const checkName = await fetch(`${API_URL}/api/p/coupon/check/${name}`, {
            method:'GET',
            headers:{
                'x-api-key':API_KEY
            }
        });
        return checkName.json()
    }

    couponPriceTypeChange = (e) => {
        const value = e.value;
        document.getElementById('couponPriceTypeDesc').innerHTML = e.value;

        const val = document.getElementById('coupunPriceType').value;
        if(val == '%'){
            document.getElementById('infoMinPrice').innerHTML = `Fiyat birimi yüzde olduğu için bir kısıtlama yok`
            document.getElementById('coupunPriceUnit').value = 0;
        }else{
            document.getElementById('infoMinPrice').innerHTML = `${document.getElementById('coupunPriceUnit').value} TL'den büyük olmalı`
            document.getElementById('coupunPriceUnit').value = 0;
        }
    }

    handleCancel = (e) => {
        switch(e){
            case 1:
                document.getElementById('couponMinPrice_').value = 'false';
                document.getElementById('couponMinPrice_').click()
                break;
            case 2:
                document.getElementById('couponSelectedOnlyItems_').value = 'false';
                document.getElementById('couponSelectedOnlyItems_').click()
                break;
            case 3:
                document.getElementById('couponSelectedOnlyCategories_').value = 'false';
                document.getElementById('couponSelectedOnlyCategories_').click()
                break;
            case 4:
                document.getElementById('couponSelectedItems_').value = 'false';
                document.getElementById('couponSelectedItems_').click()
                break;
        }
    }

    document.getElementById('couponMinPrice_').addEventListener('click', (e) => {
        const value = e.target.value;
        if(value == 'true'){
            document.getElementById('minPriceArea').innerHTML = `
                       <span class="badge badge-danger" style="float:right;margin-left:10px" > <a href="javascript:void(0)" onclick="handleCancel(1)" style="color:white">Sil</a> </span>
                       <span class="badge badge-info" style="float:right" data-toggle="modal" data-target="#minPriceModal"> <a href="javascript:void(0)" style="color:white">Düzenle</a> </span>
                `;
        }else{
            document.getElementById('minPriceArea').innerHTML = `
                    <span class="badge badge-primary" style="float:right" data-toggle="modal" data-target="#minPriceModal"> <a style="color:white" href="javascript:void(0)">Ekle</a> </span>
                `;
        }
    });

    document.getElementById('couponSelectedOnlyItems_').addEventListener('click', (e) => {
        const value = e.target.value;
        if(value == 'true'){
            document.getElementById('selectedItemsOnlyArea').innerHTML = `
                       <span class="badge badge-danger" style="float:right;margin-left:10px" > <a href="javascript:void(0)" onclick="handleCancel(2)" style="color:white">Sil</a> </span>
                       <span class="badge badge-info" style="float:right" data-toggle="modal" data-target="#selectedOnlyItemsModal"> <a href="javascript:void(0)" style="color:white">Düzenle</a> </span>
                `;
        }else{
            document.getElementById('selectedItemsOnlyArea').innerHTML = `
                    <span class="badge badge-primary" style="float:right" data-toggle="modal" data-target="#selectedOnlyItemsModal"> <a style="color:white" href="javascript:void(0)">Ekle</a> </span>
                `;
        }
    });

    document.getElementById('couponSelectedItems_').addEventListener('click', (e) => {
        const value = e.target.value;
        if(value == 'true'){
            document.getElementById('selectedItemsArea').innerHTML = `
                       <span class="badge badge-danger" style="float:right;margin-left:10px" > <a href="javascript:void(0)" onclick="handleCancel(4)" style="color:white">Sil</a> </span>
                       <span class="badge badge-info" style="float:right" data-toggle="modal" data-target="#selectedItemsModal"> <a href="javascript:void(0)" style="color:white">Düzenle</a> </span>
                `;
        }else{
            document.getElementById('selectedItemsArea').innerHTML = `
                    <span class="badge badge-primary" style="float:right" data-toggle="modal" data-target="#selectedItemsModal"> <a style="color:white" href="javascript:void(0)">Ekle</a> </span>
                `;
        }
    });

    document.getElementById('couponSelectedOnlyCategories_').addEventListener('click', (e) => {
        const value = e.target.value;
        if(value == 'true'){
            document.getElementById('selectedCategoriesOnlyArea').innerHTML = `
                       <span class="badge badge-danger" style="float:right;margin-left:10px" > <a href="javascript:void(0)" onclick="handleCancel(3)" style="color:white">Sil</a> </span>
                       <span class="badge badge-info" style="float:right" data-toggle="modal" data-target="#selectedCategories"> <a href="javascript:void(0)" style="color:white">Düzenle</a> </span>
                `;
        }else{
            document.getElementById('selectedCategoriesOnlyArea').innerHTML = `
                    <span class="badge badge-primary" style="float:right" data-toggle="modal" data-target="#selectedCategories"> <a style="color:white" href="javascript:void(0)">Ekle</a> </span>
                `;
        }
    });

    handleMinPrice = (e) => {
        const value = e.value;
        //infoMinPrice

        document.getElementById('infoMinPrice').innerHTML = `${value} TL'den büyük olmalı`


        if(document.getElementById('couponMinPrice_').value == 'true'){
            if(document.getElementById('coupunPriceType').value == 'TL'){
                const minPrice = document.getElementById('couponMinPrice').value;
                if(parseInt(value) > parseInt(minPrice)){
                    Snackbar.show({text: `Kupon fıyatı, ${minPrice} TL'den düşük olmalı`})
                    document.getElementById('coupunPriceUnit').value = (parseInt(minPrice)-1);
                }
            }
        }
    }

    document.getElementById('infoMinPrice').innerHTML = `${document.getElementById('coupunPriceUnit').value} TL'den büyük olmalı`

    couponMinPriceSave = async () => {
        try{
            document.getElementById('couponMinPriceSaveBtn').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            const minPriceValue = document.getElementById('couponMinPrice').value;

            if(minPriceValue.trim() == ''){
                Snackbar.show({text: 'Minumum fiyat giriniz', duration: 4000});
                document.getElementById('couponMinPriceSaveBtn').innerHTML = `Kaydet`;
                return false
            }else{

                if(
                    document.getElementById('coupunPriceType').value == 'TL'
                ){
                    if(parseInt(document.getElementById('coupunPriceUnit').value) > parseInt(minPriceValue)){
                        Snackbar.show({text: 'Kupon fiyatindan daha düşük girdiniz', duration: 4000});
                        document.getElementById('couponMinPriceSaveBtn').innerHTML = `Kaydet`;
                        return false
                    }
                }

                    document.getElementById('couponMinPrice_').value = 'true';
                    document.getElementById('couponMinPrice_').click();
                    document.getElementById('couponMinPriceSaveBtn').innerHTML = `Kaydet`;
                    Snackbar.show({text: 'Min. fiyat eklendi', duration:4000})


            }


        }catch(e){
            console.log(e);
        }
    }

    couponSelectedItemsSave = async () => {
        try{
            document.getElementById('couponSelectedItemsSaveBtn').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            const selecteds = getSelectedValues(document.getElementById('couponSelectedItems'));
            if(selecteds.length == 0){
                Snackbar.show({text: 'En az bir ürün girin', duration: 4000});
                document.getElementById('couponSelectedItemsSaveBtn').innerHTML = `Kaydet`;
                return false
            }

            if(

                document.getElementById('couponSelectedOnlyCategories_').value == 'true'
                ||
                document.getElementById('couponSelectedOnlyItems_').value == 'true'

            ){
                Snackbar.show({text: 'Bu koşul ile çakışan koşullar var', duration:4000})
                document.getElementById('couponSelectedItemsSaveBtn').innerHTML = `Kaydet`;
                return false;
            }

            document.getElementById('couponSelectedItems_').value = 'true';
            document.getElementById('couponSelectedItems_').click();
            document.getElementById('couponSelectedItemsSaveBtn').innerHTML = `Kaydet`;
            Snackbar.show({text: 'Koşul eklendi', duration:4000})
        }catch(e) {
            console.log(e);
        }
    }

    couponSelectedOnlyItemsSave = async () => {
        try{
            document.getElementById('couponSelectedOnlyItemsSaveBtn').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            const selecteds = getSelectedValues(document.getElementById('couponSelectedOnlyItems'));
            if(selecteds.length == 0){
                Snackbar.show({text: 'En az bir ürün girin', duration: 4000});
                document.getElementById('couponSelectedOnlyItemsSaveBtn').innerHTML = `Kaydet`;
                return false
            }

            if(

                document.getElementById('couponSelectedOnlyCategories_').value == 'true'
                ||
                document.getElementById('couponSelectedItems_').value == 'true'

            ){
                Snackbar.show({text: 'Bu koşul ile çakışan koşullar var', duration:4000})
                document.getElementById('couponSelectedOnlyItemsSaveBtn').innerHTML = `Kaydet`;
                return false;
            }

            document.getElementById('couponSelectedOnlyItems_').value = 'true';
            document.getElementById('couponSelectedOnlyItems_').click();
            document.getElementById('couponSelectedOnlyItemsSaveBtn').innerHTML = `Kaydet`;
            Snackbar.show({text: 'Koşul eklendi', duration:4000})
        }catch(e) {
            console.log(e);
        }
    }

    couponSelectedCategoriesSave = async () => {
        try{
            document.getElementById('couponSelectedCategoriesSaveBtn').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            const selecteds = getSelectedValues(document.getElementById('couponSelectedCategories'));
            if(selecteds.length == 0){
                Snackbar.show({text: 'En az bir kategori girin', duration: 4000});
                document.getElementById('couponSelectedCategoriesSaveBtn').innerHTML = `Kaydet`;
                return false
            }

            if(

                document.getElementById('couponSelectedOnlyItems_').value == 'true'
                ||
                document.getElementById('couponSelectedItems_').value == 'true'

            ){
                Snackbar.show({text: 'Bu koşul ile çakışan koşullar var', duration:4000})
                document.getElementById('couponSelectedCategoriesSaveBtn').innerHTML = `Kaydet`;
                return false;
            }

            document.getElementById('couponSelectedOnlyCategories_').value = 'true';
            document.getElementById('couponSelectedOnlyCategories_').click();
            document.getElementById('couponSelectedCategoriesSaveBtn').innerHTML = `Kaydet`;
            Snackbar.show({text: 'Koşul eklendi', duration:4000})
        }catch(e) {
            console.log(e);
        }
    }

    fetchProducts = async () => {
       try{
           const products = await fetch(`${API_URL}/api/product/${BRANCH_ID}`, {
               method:'GET',
               headers:{
                   'x-api-key': API_KEY
               }
           });
           return products.json();
       }catch(e){
           return e;
       }
    }

    setProductsToSelect = async () => {
        try{
            const select = document.getElementById('couponSelectedOnlyItems');
            const select2 = document.getElementById('couponSelectedItems');
            const products = await fetchProducts();
            products.data.map(e => {
               const option = document.createElement('option');
               const option2 = document.createElement('option');
               option.value = e._id;
               option2.value = e._id;
               option.innerHTML = e.product_name;
               option2.innerHTML = e.product_name;
               select.append(option);
               select2.append(option2);
            });
        }catch(e){
            console.log(e);
        }
    }

    setCategoriesToSelect = async () => {
        try{
            const select = document.getElementById('couponSelectedCategories');
            const categories = await fetchBranchCategories();
            categories.data.map(e => {
                const option = document.createElement('option');
                option.value = e._id;
                option.innerHTML = e.category_name;
                select.append(option);
            });
        }catch(e){
            console.log(e);
        }
    }

    setProductsToSelect();

    setCategoriesToSelect();

    $("#couponWizard").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        cssClass: 'pill wizard',
        onFinished: saveCoupon,
        onStepChanging:function(d){
            return true
        }
    });
}
