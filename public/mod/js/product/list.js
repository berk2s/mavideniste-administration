window.onload = async () => {

    const loadingSpin = document.getElementById('loadingSpin');

    const weightTypes = [
        ['kg', 'Kilogram (kg)'],
        ['g', 'Gram (g)'],
        ['mg', 'Miligram (mg)'],
        ['L', 'Litre (L)'],
        ['cL', 'Santilite (cL)'],
        ['mL', 'Mililitre (mL)'],
        ['adet', 'Adet'],
    ];

    handleCatChange = async e => {
        const value = document.getElementById('productCategory').value;
        const subCategroies = await fetchSubCategories(value);

        const subSelect = document.getElementById('productSubCategory');
        subSelect.innerHTML = '';

        subCategroies.data.map(e => {
            const option = document.createElement('option');
            option.value = e._id;
            option.innerHTML = e.sub_category_name;
            subSelect.append(option)
        });
    }

    readyProducts = async () => {
        try{
            loadingSpin.style.display = 'block';
            const products = await fetchProducts();
            const productsData = products.data;
            const data = [];
            await productsData.forEach((e) => {
                let listPrice;
                let discountText;
                let unitWeightText;
                let discountPriceText;
                let productStatus;
                let changeStatusText;
                if(e.product_discount != null){
                    discountText = `<span style="color:#28a745">${parseInt(e.product_discount)}</span>`;
                    discountPriceText = `${e.product_discount_price}`
                }else{
                    discountText = `<span style="color:#dc3545">YOK</span>`;
                    discountPriceText = `<span style="color:#dc3545">YOK</span>`;
                }

                if(e.product_status == true){
                    productStatus = `<span style='color:green'>Yayında</span>`
                    changeStatusText = `Yayından kaldır`
                }else{
                    productStatus = `<span style='color:red'>Yayında Değil</span>`
                    changeStatusText = `Yayına al`
                }

                unitWeightText = `${e.product_unit_weight} ${e.product_unit_type}`

                let process = `
                     <div class="dropdown custom-dropdown mx-auto">
                         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                         </a>

                         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                             <a
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#fadeinModal"
                                href="javascript:void(0);"
                                data-productid="${e._id}"

                                data-productname="${e.product_name}"
                                data-productcategory="${e.category_id}"
                                data-subcategoryid="${e.sub_category_id}"
                                data-productbrand="${e.brand == null ? null : e.brand.brand_id}"
                                data-productweightype="${e.product_unit_type}"
                                data-productunitweight="${e.product_unit_weight}"
                                data-productamount="${e.product_amonut}"

                                onclick="clickProductEdit(this)"

                                >Düzenle</a>
                             <a
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#productDetail"
                                href="javascript:void(0);"
                                data-productid='${e._id}'
                                data-productname='${e.product_name}'
                                data-productdiscount='${e.product_discount}'
                                data-productdiscountprice='${e.product_discount_price}'
                                data-productunitweight='${e.product_unit_weight}'
                                data-productunittype='${e.product_unit_type}'
                                data-productlistprice='${e.product_list_price}'
                                data-productamount='${e.product_amonut}'
                                data-productdate='${dateParse(e.product_date)}'
                                data-productcategory='${e.category == null ? 'YOK' : e.category.category_name}'
                                data-productbrand='${e.brand == null ? 'YOK' : e.brand.brand_name}'
                                data-productstatus='${e.product_status}'
                                onclick='clickProductDetail(this)'
                                >Detaylar</a>
                             <a
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#setDiscount"
                                href="javascript:void(0);"
                                onclick="clickSetProductDiscount(this)"
                                data-productid="${e._id}"
                                data-productname="${e.product_name}"
                                data-productlistprice="${e.product_list_price}"
                                data-productdiscount="${e.product_discount}"
                                data-productdiscountprice="${e.product_discount_price}"
                                data-productstatustext="${productStatus}"
                                >İndirim</a>
                             <a class="dropdown-item" data-toggle="modal" data-target="#imagePlay" href="javascript:void(0);" data-productid="${e._id}" onclick="clickProductImage(this);" data-image="${e.product_image}" data-productid="${e._id}">Ürün Resmi</a>
                             <a class="dropdown-item" href="javascript:void(0);" data-productid="${e._id}" onclick="clickChangeStatusProduct(this)" data-currentstatus="${e.product_status}">${changeStatusText}</a>
                             <a class="dropdown-item" href="javascript:void(0);" data-productid="${e._id}" onclick="clickDeleteProduct(this)">Sil</a>
                          </div>
                     </div>
                `;

                data.push([e.product_name, e.category == null ? 'YOK' : e.category.category_name, e.subcategory == null ? 'YOK' : e.subcategory.sub_category_name, e.brand == null ? 'YOK' : e.brand.brand_name, e.product_list_price, discountPriceText, discountText, unitWeightText, e.product_amonut, productStatus, process]);
            });

            $('#html5-extension').DataTable( {
                destroy:true,
                data:data,
                dom:"<'row'<'col-sm-12 col-md-8'l  ><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p> <'col-md-12 mx-auto float-right p-0' <'mx-auto'B> >>",
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'btn' },
                        { extend: 'csv', className: 'btn' },
                        { extend: 'excel', className: 'btn' },
                        { extend: 'print', className: 'btn' },
                    ]
                },
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "_PAGE_ .sayfa",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Ara...",
                    "sLengthMenu": "Listele :  _MENU_",
                },
                "language": {
                    "zeroRecords": "Hiç sonuç bulunamadı"
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 10
            } );
            loadingSpin.style.display = 'none';
        }catch(e){
            console.log(e);
        }
    };

    clickProductDetail = (e) => {
        document.getElementById('DETAIL_productname').innerHTML = e.getAttribute('data-productname');
        document.getElementById('DETAIL_productcategory').innerHTML = e.getAttribute('data-productcategory');
        document.getElementById('DETAIL_productbrand').innerHTML = e.getAttribute('data-productcategory');
        document.getElementById('DETAIL_productlistprice').innerHTML = e.getAttribute('data-productlistprice')+' TL';

        document.getElementById('DETAIL_productweightunittype').innerHTML = e.getAttribute('data-productunittype');
        document.getElementById('DETAIL_productunitweight').innerHTML = e.getAttribute('data-productunitweight');
        document.getElementById('DETAIL_productamount').innerHTML = e.getAttribute('data-productamount');

        if(e.getAttribute('data-productstatus') == 'true'){
            document.getElementById('DETAIL_productstatus').innerHTML = 'Yayında'
        }else{
            document.getElementById('DETAIL_productstatus').innerHTML = 'Yayında değil'
        }

        if(e.getAttribute('data-productdiscountprice') == 'null'){
            document.getElementById('DETAIL_productdiscountprice').innerHTML = 'İndirim Yok'
        }else{
            document.getElementById('DETAIL_productdiscountprice').innerHTML = e.getAttribute('data-productdiscountprice')+' TL'
        }

        if(e.getAttribute('data-productdiscount') == 'null'){
            document.getElementById('DETAIL_productdiscount').innerHTML = 'İndirim Yok'
        }else{
            document.getElementById('DETAIL_productdiscount').innerHTML = e.getAttribute('data-productdiscount')+'%'
        }

        document.getElementById('DETAIL_productdate').innerHTML = e.getAttribute('data-productdate');
    }

    document.getElementById('DISCOUNT_switch').addEventListener('change', () => {
        const value = document.getElementById('DISCOUNT_switch').checked;

        if(document.getElementById('DISCOUNT_listprice').value.trim() == '' || parseInt(document.getElementById('DISCOUNT_listprice').value) == 0){
            Snackbar.show({text: 'İndirim için liste fiyatı girin.', duration: 4000});
            document.getElementById('DISCOUNT_switch').checked = false;
            return false;
        }

        if(value == true){

            document.getElementById('discountPriceArea').style.filter = 'none';
            document.getElementById('discountPercentageArea').style.filter = 'none';
            document.getElementById('DISCOUNT_discountprice').disabled = false;
            document.getElementById('DISCOUNT_discount').disabled = false;
        }else{
            document.getElementById('DISCOUNT_discountprice').value = 0;
            document.getElementById('DISCOUNT_discount').value = 0;

            document.getElementById('discountPriceArea').style.filter = 'blur(4px)';
            document.getElementById('discountPercentageArea').style.filter = 'blur(4px)';
            document.getElementById('DISCOUNT_discountprice').disabled = true;
            document.getElementById('DISCOUNT_discount').disabled = true;
        }
    })

    putCategories = async (id) => {
        try{
            const category = await fetchBranchCategories();
            const categorySelect = document.getElementById('productCategory');
            category.data.forEach(e => {
                const option = document.createElement('option');

                if(id == e._id)
                    option.selected = true;

                option.value = e._id;
                option.innerHTML = e.category_name;
                categorySelect.append(option);
            });
            return category;
        }catch(e){
            console.log(e);
        }
    };

    putBrands = async (id) => {
        try{
            const brand = await fetchBrands();
            const brandSelect = document.getElementById('productBrand');
            brand.data.forEach(e => {
                const option = document.createElement('option');

                if(id == e._id)
                    option.selected = true;

                option.value = e._id;
                option.innerHTML = e.brand_name;
                brandSelect.append(option);
            });
            return brand;
        }catch(e){
            console.log(e);
        }
    };

    putWeightUnitTypes = async (id) => {
        weightTypes.map(e => {
            const option = document.createElement('option');

            if(e[0] == id)
                option.selected = true;

            option.value = e[0];
            option.innerHTML = e[1];
            document.getElementById('productUnitType').append(option);
        });
    }

    fetchSubCategories = async (category_id) => {
        try{
            const subs = await fetch(`${API_URL}/api/subcategory/${category_id}`,{
                method:'GET',
                headers:{
                    'x-api-key':API_KEY
                }
            });
            return subs.json();
        }catch(e){
            console.log(e);
        }
    }


    clickProductEdit = async(e) => {
        try{
            document.getElementById('loadingSpinForEdit').style.display = 'block';
            const productid = e.getAttribute('data-productid');
            const productname = e.getAttribute('data-productname');
            const productcategory = e.getAttribute('data-productcategory');
            const productsubcategory = e.getAttribute('data-subcategoryid');


            console.log(productsubcategory)
            console.log(typeof productsubcategory)

            if(productcategory != 'null'){
                const subCategroies = await fetchSubCategories(productcategory);

                const subSelect = document.getElementById('productSubCategory');
                subSelect.innerHTML = '';

                subCategroies.data.map(e => {
                    const option = document.createElement('option');

                    if(productsubcategory == e._id){
                        option.selected = true;
                    }

                    option.value = e._id;
                    option.innerHTML = e.sub_category_name;
                    subSelect.append(option)
                });
            }

            const productbrand = e.getAttribute('data-productbrand');
            const productweightype = e.getAttribute('data-productweightype');
            const productunitweight = e.getAttribute('data-productunitweight');
            const productamount = e.getAttribute('data-productamount');
            document.getElementById('EDIT_productSaveBtn').setAttribute('data-productid', productid);
            document.getElementById('productName').value = productname;
            document.getElementById('productUnitWeight').value = productunitweight;
            document.getElementById('productAmount').value = productamount;

            await putCategories(productcategory);
            await putBrands(productbrand);
            await putWeightUnitTypes(productweightype);

            document.getElementById('loadingSpinForEdit').style.display = 'none';
        }catch(e){
            console.log(e);
        }
    };

    clickProductEditSave = async (e) => {
        try{
            document.getElementById('EDIT_productSaveBtn').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;

            const productid = e.getAttribute('data-productid');
            const productName = document.getElementById('productName').value;
            const productCategory = document.getElementById('productCategory').value;
            const productBrand = document.getElementById('productBrand').value;
            const productUnitType = document.getElementById('productUnitType').value;
            const productUnitWeight = document.getElementById('productUnitWeight').value;
            const productAmount = document.getElementById('productAmount').value;

            const subCat = document.getElementById('productSubCategory').value;

            if(
                productName.trim() == ''
                ||
                productUnitType.trim() == ''
                ||
                productAmount.trim() == ''
            ){
                Snackbar.show({text:'İlgili alanları boş bırakmayınız.', duration:4000})
            }else{
                await editProduct(subCat, productName, productCategory, productBrand, productUnitType, productUnitWeight, productAmount, productid);
                await readyProducts();
            }

            document.getElementById('EDIT_productSaveBtn').innerHTML = `Kaydet`;

        }catch(e){
            console.log(e);
        }
    }

    clickSetProductDiscount = async (e) => {
        try{
            document.getElementById('loadingSpinForDiscount').style.display = 'block';
            const productid = e.getAttribute('data-productid');
            const productname = e.getAttribute('data-productname');
            const productlistprice = e.getAttribute('data-productlistprice');
            const productdiscount = e.getAttribute('data-productdiscount');
            const productdiscountprice = e.getAttribute('data-productdiscountprice');
            const productstatustext = e.getAttribute('data-productstatustext');

            if(productdiscount == 'null'){
                document.getElementById('DISCOUNT_discountprice').value = 0;
                document.getElementById('DISCOUNT_discount').value = 0;
                document.getElementById('DISCOUNT_switch').checked = false;
                document.getElementById('discountPriceArea').style.filter = 'blur(4px)';
                document.getElementById('discountPercentageArea').style.filter = 'blur(4px)';
                document.getElementById('DISCOUNT_discountprice').disabled = true;
                document.getElementById('DISCOUNT_discount').disabled = true;
            }else{
                document.getElementById('DISCOUNT_discountprice').value = productdiscountprice;
                document.getElementById('DISCOUNT_discount').value = productdiscount;
                document.getElementById('DISCOUNT_switch').checked = true;
                document.getElementById('discountPriceArea').style.filter = 'none';
                document.getElementById('discountPercentageArea').style.filter = 'none';
                document.getElementById('DISCOUNT_discountprice').disabled = false;
                document.getElementById('DISCOUNT_discount').disabled = false;

                document.getElementById('discountText').innerHTML = `<b><span style='font-family:Arial'>₺</span>${productlistprice}</b> liste fiyatının <b>%${productdiscount}</b> indirim ile yeni fiyatı <b><span style='font-family:Arial'>₺</span>${productdiscountprice}</b> `

            }

            document.getElementById('DISCOUNT_productname').value = productname;
            document.getElementById('DISCOUNT_listprice').value = productlistprice;
            document.getElementById('DISCOUNT_productStatusText').innerHTML = productstatustext;
            document.getElementById('DISCOUNT_btn').setAttribute('data-productid', productid);

            document.getElementById('loadingSpinForDiscount').style.display = 'none';
        }catch(e){
            console.log(e);
        }
    }

    clickProductImage = (e) => {
        document.getElementById('loadingImageViewForEdit').display = 'block';
        const image = e.getAttribute('data-image');
        document.getElementById('imageShowSrc').src = image;
        document.getElementById('loadingImageViewForEdit').display = 'none';
        document.getElementById('EDIT_imageSaveBtn').setAttribute('data-productid', e.getAttribute('data-productid'))
    };

    clickChangeImage = async (e) => {
        try{
            document.getElementById('EDIT_imageSaveBtn').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            const file = document.getElementById('productFile');
            if(file.files.length == 0){
                Snackbar.show({text: 'Lütfen bir resim yükleyin.', duration:4000});
                document.getElementById('EDIT_imageSaveBtn').innerHTML = 'Kaydet';
            }else{
                const reader = new FileReader();
                reader.onload = async () => {
                    const image = reader.result;

                    const uploade = await uploadImage(image, e.getAttribute('data-productid'));
                    await changeImageName(uploade.status.imagename, e.getAttribute('data-productid'));
                    await readyProducts();
                    document.getElementById('EDIT_imageSaveBtn').innerHTML = 'Kaydet';
                    document.getElementById('clearImage').click();
                    Snackbar.show({text:'Resim güncellendi.', duration: 4000})
                }
                reader.readAsDataURL(file.files[0]);
            }
        }catch(e){
            console.log(e);
        }
    }

    changeImageName = async(name, productid) => {
        try{
            const update = await fetch(`${API_URL}/api/product/edit/image`, {
                method: 'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    imagename: `${PRODUCT_IMAGE_DIR}${name}`,
                    product_id: productid
                })
            })
            return update.json()
        }catch(e){
            return e;
        }
    }

    uploadImage = async(image, productid) => {
        try{
            const upload = await fetch(`/api/product/upload`,{
                method:'POST',
                headers:{
                    'Content-Type':'application/json'
                },
                body: JSON.stringify({
                    dataimage:image
                })
            });
            return upload.json();
        }catch(e){
            return e;
        }
    }

    clickChangeStatusProduct = async (e) => {
        try{
            loadingSpin.style.display = 'block';
            const productid = e.getAttribute('data-productid');
            const currentstatus = e.getAttribute('data-currentstatus');
            let to;

            if(currentstatus == 'true')
                to = false;
            else
                to = true;

            const status = await changeStatus(productid, to);
            await readyProducts();
            console.log(status);
        }catch(e){
            console.log(e);
        }
    };

    clickDeleteProduct = async (e) => {
        try{
            loadingSpin.style.display = 'block';
            const productid = e.getAttribute('data-productid');
            const deleteit = await deleteProduct(productid);
            await readyProducts();
            console.log(deleteit);
        }catch(e){
            console.log(e);
        }
    }

    changeStatus = async (product_id, to) => {
        try{
            const changeStatus = await fetch(`${API_URL}/api/product/edit/status`, {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY,
                },
                body:JSON.stringify({
                    product_id:product_id,
                    status:to
                })
            });
            return changeStatus.json();
        }catch(e){
            return e;
        }
    }

    deleteProduct = async (product_id) => {
        try{
            const deleteProduct = await fetch(`${API_URL}/api/product/${product_id}`, {
                method:'DELETE',
                headers:{
                    'x-api-key': API_KEY
                }
            });
            return deleteProduct.json();
        }catch(e){
            return e;
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

    document.getElementById('DISCOUNT_listprice').addEventListener('input', () => {
        discountCalc();
    });
    document.getElementById('DISCOUNT_discountprice').addEventListener('change', () => {
        if(document.getElementById('DISCOUNT_discountprice').value.trim() == ''){
            document.getElementById('DISCOUNT_discountprice').value = 0
        }
    })
    document.getElementById('DISCOUNT_discountprice').addEventListener('input', () => {
        if (document.getElementById('DISCOUNT_discountprice').value.trim() != '') {
            const listPrice = parseFloat(document.getElementById('DISCOUNT_listprice').value);
            const discountPrice = parseFloat(document.getElementById('DISCOUNT_discountprice').value);

            if(listPrice == 0 || document.getElementById('DISCOUNT_listprice').value.trim() == ''){
                Snackbar.show({text: 'İndirim için bir liste fiyatı girin.', duration: 1500});
            }

            if (listPrice > discountPrice) {

                const variation = (listPrice - discountPrice);

                const unitPrice = (listPrice / 100);
                const crossInt = (variation / unitPrice); // percentage

                if(discountPrice == 0){
                    document.getElementById('DISCOUNT_discount').value = 0;
                    document.getElementById('discountText').innerHTML = '';
                }else {

                    document.getElementById('DISCOUNT_discount').value = crossInt.toFixed(2);
                    // discountCalc();
                    document.getElementById('discountText').innerHTML = `<b><span style="font-family: Arial">₺</span>${listPrice}</b> liste fiyatının <b>%${parseFloat(crossInt).toFixed(2)}</b> indirim ile yeni fiyatı <b><span style="font-family: Arial">₺</span>${discountPrice.toFixed(2)}</b>`;
                }
            } else {
                document.getElementById('DISCOUNT_discount').value = 0;
                document.getElementById('DISCOUNT_discountprice').value = 0;
                //    discountCalc();
            }
        }else if(document.getElementById('DISCOUNT_discount') == 0){
            //document.getElementById('productDiscount').value = 0;
            //discountCalc();
        }else{
            document.getElementById('DISCOUNT_discount').value = 0;
            document.getElementById('discountText').innerHTML = '';
            //discountCalc();
        }
    });
    document.getElementById('DISCOUNT_discount').addEventListener('change', (e) => {

        if(document.getElementById('DISCOUNT_discount').value.trim() == '')
            document.getElementById('DISCOUNT_discount').value = 0;

        if(parseInt(document.getElementById('DISCOUNT_discount').value.trim()) == 0){
            document.getElementById('DISCOUNT_discountprice').value = 0;
        }

    });
    document.getElementById('DISCOUNT_discount').addEventListener('input', (e) => {
        discountCalc()
    });
    document.getElementById('DISCOUNT_discount').addEventListener('keyup', (e) => {
        discountCalc()
    });
    document.getElementById('DISCOUNT_discount').addEventListener('keydown', (e) => {
        discountCalc()
    });
    document.querySelector('.downProductDiscount').addEventListener('click', () => {
        discountCalc()
    })
    document.querySelector('.upProductDiscount').addEventListener('click', () => {
        discountCalc()
    })
    discountCalc = () => {
        if(document.getElementById('DISCOUNT_discount').value > 100){
            document.getElementById('DISCOUNT_discount').value = 100;
        }


        if(parseInt(document.getElementById('DISCOUNT_discount').value.trim()) == 0){
            document.getElementById('DISCOUNT_discountprice').value = 0;
        }

        const discountPercentage = (parseInt(document.getElementById('DISCOUNT_discount').value)/100);
        const discountText = document.getElementById('DISCOUNT_discount').value;
        const productListPrice = parseFloat(document.getElementById('DISCOUNT_listprice').value);


        if(
            document.getElementById('DISCOUNT_listprice').value.trim() == ''
            ||
            document.getElementById('DISCOUNT_listprice').value == 0
        ){
            if(document.getElementById('DISCOUNT_discount').value != 0)
                Snackbar.show({text: 'İndirim için bir liste fiyatı girin.', duration: 1500});

            document.getElementById('DISCOUNT_discount').value = 0;
            document.getElementById('discountText').innerHTML = '';

        }else {
            if (
                document.getElementById('DISCOUNT_discount').value.trim() != ''
            ) {
                if(document.getElementById('DISCOUNT_discountprice').value != '0' || document.getElementById('DISCOUNT_discount').value != '0') {
                    const minusPrice = (productListPrice * discountPercentage);
                    const newPrice = productListPrice - minusPrice;
                    document.getElementById('discountText').innerHTML = `<b><span style="font-family: Arial">₺</span>${productListPrice}</b> liste fiyatının <b>%${parseFloat(discountText).toFixed(2)}</b> indirim ile yeni fiyatı <b><span style="font-family: Arial">₺</span>${newPrice.toFixed(2)}</b>`;
                    document.getElementById('DISCOUNT_discountprice').value = newPrice.toFixed(2);
                }
            }else{
                document.getElementById('discountText').innerHTML = '';
            }
        }

    }

    clickDiscountEditSave = async (e) => {
        try{
            document.getElementById('DISCOUNT_btn').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            const productid = e.getAttribute('data-productid');
            const listprice = document.getElementById('DISCOUNT_listprice').value;
            const discountprice = document.getElementById('DISCOUNT_discountprice').value;
            const discount = document.getElementById('DISCOUNT_discount').value;
            let discountprice_;
            let discount_;

            if(listprice.trim() == '0'){
                Snachbar.show({text:'Lütfen fiyat için gerçekci bir değer girin', duration: 4000})
                return false;
            }

            if(discountprice.trim() == '0'){
                discountprice_ = null
            }else{
                discountprice_ = parseFloat(discountprice);
            }

            if(discount.trim() == '0'){
                discount_ = null;
            }else{
                discount_ = parseFloat(discount);
            }

            await updateDiscount(parseFloat(listprice), discountprice_, discount_, productid);
            await readyProducts();
            document.getElementById('DISCOUNT_btn').innerHTML = 'Kaydet'
        }catch(e){
            console.log(e);
        }
    }

    updateDiscount = async (listprice, discountprice, discount, productid) => {
        try{
            const update = await fetch(`${API_URL}/api/product/edit/discount`, {
                method: 'PUT',
                headers:{
                    'Content-Type': 'application/json',
                    'x-api-key': API_KEY
                },
                body: JSON.stringify({
                    product_id: productid,
                    product_list_price: listprice,
                    product_discount_price: discountprice,
                    product_discount: discount
                })
            })
        }catch(e){
            return e;
        }
    }

    editProduct = async (subCat, productName, productCategory, productBrand, productUnitType, productUnitWeight, productAmount, productid) => {
        try{
            const update = await fetch(`${API_URL}/api/product/edit`, {
               method:'PUT',
               headers:{
                   'Content-Type':'application/json',
                   'x-api-key': API_KEY
               },
               body:JSON.stringify({
                   product_id: productid,
                   product_name: productName,
                   category_id: productCategory,
                   brand_id: productBrand,
                   product_unit_type: productUnitType,
                   product_unit_weight: productUnitWeight,
                   product_amonut: productAmount,
                   sub_category_id:subCat
               })
            });
            return update.json();
        }catch(e){
            res.json(e);
        }
    }

    await readyProducts();

}
