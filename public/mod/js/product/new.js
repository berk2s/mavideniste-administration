window.onload = async () => {

    readyComponents = async () => {
        try{
            document.getElementById('loadingSpin').style.display = 'block';
            document.getElementById('productName').value = '';
            document.getElementById('productCategory').value = '';
            document.getElementById('productBrand').value = '';
            document.getElementById('productListPrice').value = '';
            document.getElementById('productDiscount').value = 0;
            document.getElementById('discountText').innerHTML = '';
          //  document.getElementById('productUnitType').value = '';
            document.getElementById('productUnitWeight').value = '';
            document.getElementById('productAmount').value = '';
            document.getElementById('clearImage').click();
            await putCategories();
            await putBrands();
            document.getElementById('loadingSpin').style.display = 'none';
        }catch(e){
            console.log(e);
        }
    };

    putCategories = async () => {
        try{
            const category = await fetchBranchCategories();
            const categorySelect = document.getElementById('productCategory');
            category.data.forEach(e => {
                const option = document.createElement('option');
                option.value = e._id;
                option.innerHTML = e.category_name;
                categorySelect.append(option);
            });
            return category;
        }catch(e){
            console.log(e);
        }
    };

    putBrands = async () => {
        try{
            const brand = await fetchBrands();
            const brandSelect = document.getElementById('productBrand');
            brand.data.forEach(e => {
                const option = document.createElement('option');
                option.value = e._id;
                option.innerHTML = e.brand_name;
                brandSelect.append(option);
            });
            return brand;
        }catch(e){
            console.log(e);
        }
    };

    await readyComponents();

    addProductSave = async (e) => {
      try{
          document.getElementById('btnAddProduct').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;

          const product_name = document.getElementById('productName').value;
          const product_category = document.getElementById('productCategory').value;
          const product_brand = document.getElementById('productBrand').value;
          const product_list_price = document.getElementById('productListPrice').value;
          const product_discount_price = document.getElementById('productDiscountPrice').value;
          const product_discount = document.getElementById('productDiscount').value;
          const product_unit_type = document.getElementById('productUnitType').value;
          const product_unit_weight = document.getElementById('productUnitWeight').value;
          const product_amount = document.getElementById('productAmount').value;
          const image = document.getElementById('productFile');

          if(
              product_name.trim() == ''
              ||
              product_list_price.trim() == ''
              ||
              product_unit_weight.trim() == ''
              ||
              product_amount.trim() == ''
              ||
              image.files.length == 0
              ||
              product_list_price.trim() == '0'
          ){
              Snackbar.show({text: 'İlgili alanları boş bırakmayın.', duration: 4000});
              document.getElementById('btnAddProduct').innerHTML = 'Kaydet';
          }else{
              const reader = new FileReader();
              reader.onload = async () => {
                  const image = reader.result;
                  const imageData = await uploadProductImage(image);
                  const productData = await addProduct(product_name, product_category, product_brand, product_list_price, product_discount_price, product_discount, product_unit_type, product_unit_weight, product_amount, PRODUCT_IMAGE_DIR+imageData.status.imagename);
                  await readyComponents();
                  Snackbar.show({text:'Ürün başarılı şekilde eklendi.', duration:4000})
                  document.getElementById('btnAddProduct').innerHTML = 'Kaydet';
                  console.log(productData);
              }
              reader.readAsDataURL(image.files[0]);
          }


      }catch(e) {
          console.log(e);
      }
    };

    addProduct = async (product_name, product_category, product_brand, product_list_price, product_discount_price, product_discount, product_unit_type, product_unit_weight, product_amonut, image) => {
        try{
            let product_discount_price_ = null;
            let product_discount_ = null;

            if(parseFloat(product_discount) != 0)
                product_discount_ = parseFloat(product_discount);

            if(parseFloat(product_discount_price) != 0)
                product_discount_price_ = parseFloat(product_discount_price);

            const add = await fetch(`${API_URL}/api/product`, {
                method:'POST',
                headers:{
                    'Content-Type': 'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    branch_id: BRANCH_ID,
                    product_name: product_name,
                    category_id: product_category,
                    brand_id: product_brand,
                    product_list_price: parseFloat(product_list_price),
                    product_discount_price: product_discount_price_,
                    product_discount: product_discount_,
                    product_unit_type:product_unit_type,
                    product_unit_weight: parseFloat(product_unit_weight),
                    product_amonut: parseFloat(product_amonut),
                    product_image: image,
                })
            });
            return add.json();
        }catch(e){
            return e;
        }
    }

    uploadProductImage = async (image) => {
      try{
          const upload = await fetch(`/api/product/upload`, {
              method:'POST',
              headers:{
                  'Content-Type':'application/json'
              },
              body: JSON.stringify({
                  dataimage: image
              })
          });
          return upload.json();
      }catch(e){
          return e;
      }
    };

    clickProductPreview = () => {
        const product_name = document.getElementById('productName').value;
        const list_price = document.getElementById('productListPrice').value;
        const image = document.getElementById('productFile');
        if(product_name.trim() == '' || list_price.trim() == '' || image.files.length == 0){
            Snackbar.show({text:'En az ürün ismi, liste fiyati ve ürün resmini girmelisiniz.', duration: 4000})
        }else{
            const reader = new FileReader();
            reader.onload = () => {
                const result = reader.result;
                document.getElementById('previewIMG').src = result;
                document.getElementById('productNamePreview').innerHTML = product_name;
                document.getElementById('previewProductADOM').click();
            }
            reader.readAsDataURL(image.files[0]);
        }
    }

    document.getElementById('productListPrice').addEventListener('input', () => {
        discountCalc();
    });
    document.getElementById('productDiscountPrice').addEventListener('change', () => {
        if(document.getElementById('productDiscountPrice').value.trim() == ''){
            document.getElementById('productDiscountPrice').value = 0
        }
    })
    document.getElementById('productDiscountPrice').addEventListener('input', () => {
        if (document.getElementById('productDiscountPrice').value.trim() != '') {
            const listPrice = parseFloat(document.getElementById('productListPrice').value);
            const discountPrice = parseFloat(document.getElementById('productDiscountPrice').value);

            if(listPrice == 0 || document.getElementById('productListPrice').value.trim() == ''){
                Snackbar.show({text: 'İndirim için bir liste fiyatı girin.', duration: 1500});
            }

            if (listPrice > discountPrice) {

                const variation = (listPrice - discountPrice);

                const unitPrice = (listPrice / 100);
                const crossInt = (variation / unitPrice); // percentage

                if(discountPrice == 0){
                    document.getElementById('productDiscount').value = 0;
                    document.getElementById('discountText').innerHTML = '';
                }else {

                    document.getElementById('productDiscount').value = crossInt.toFixed(2);
                    // discountCalc();
                    document.getElementById('discountText').innerHTML = `<b><span style="font-family: Arial">₺</span>${listPrice}</b> liste fiyatının <b>%${parseFloat(crossInt).toFixed(2)}</b> indirim ile yeni fiyatı <b><span style="font-family: Arial">₺</span>${discountPrice.toFixed(2)}</b>`;
                }
            } else {
                document.getElementById('productDiscount').value = 0;
                document.getElementById('productDiscountPrice').value = 0;
                //    discountCalc();
            }
        }else if(document.getElementById('productDiscount') == 0){
            //document.getElementById('productDiscount').value = 0;
            //discountCalc();
        }else{
            document.getElementById('productDiscount').value = 0;
            document.getElementById('discountText').innerHTML = '';
            //discountCalc();
        }
    });
    document.getElementById('productDiscount').addEventListener('change', (e) => {

        if(document.getElementById('productDiscount').value.trim() == '')
            document.getElementById('productDiscount').value = 0;

        if(parseInt(document.getElementById('productDiscount').value.trim()) == 0){
            document.getElementById('productDiscountPrice').value = 0;
        }


    });
    document.getElementById('productDiscount').addEventListener('input', (e) => {
        discountCalc()
    });
    document.getElementById('productDiscount').addEventListener('keyup', (e) => {
        discountCalc()
    });
    document.getElementById('productDiscount').addEventListener('keydown', (e) => {
        discountCalc()
    });
    document.querySelector('.downProductDiscount').addEventListener('click', () => {
        discountCalc()
    })
    document.querySelector('.upProductDiscount').addEventListener('click', () => {
        discountCalc()
    })

    const checkboxes = document.querySelectorAll('input[data-type="isDiscount"]')

    checkboxes[0].addEventListener('click', (e) => {
        const val = e.target.checked;
        console.log('Hey');

        if(document.getElementById('productListPrice').value.trim() == ''){
            Snackbar.show({text: 'İndirim için liste fiyatı girin.', duration: 4000});
            document.getElementById('blurSwitch').checked = false;
            return false;
        }

        if(val == true){
            document.getElementById('filterBlurArea').style.filter = 'none';
            document.getElementById('switchArea').style.display = 'none';
            document.getElementById('areaSwitch').checked = true;
            document.getElementById('blurSwitch').checked = true;
            document.getElementById('labelAreaSwitch').style.opacity = 1
        }else{
            document.getElementById('filterBlurArea').style.filter = 'blur(4px)';
            document.getElementById('switchArea').style.display = 'flex';
            document.getElementById('blurSwitch').checked = false;
            document.getElementById('areaSwitch').checked = false;
            document.getElementById('labelAreaSwitch').style.opacity = 0;
            document.getElementById('productDiscountPrice').value = 0;
            document.getElementById('productDiscount').value = 0;
        }
    })

    checkboxes[1].addEventListener('click', (e) => {
        const val = e.target.checked;
        console.log('Hey')
        if(val == true){
            document.getElementById('filterBlurArea').style.filter = 'none';
            document.getElementById('switchArea').style.display = 'none';
            document.getElementById('areaSwitch').checked = true;
            document.getElementById('blurSwitch').checked = true;
            document.getElementById('labelAreaSwitch').style.opacity = 1
        }else{
            document.getElementById('filterBlurArea').style.filter = 'blur(4px)';
            document.getElementById('switchArea').style.display = 'flex';
            document.getElementById('blurSwitch').checked = false;
            document.getElementById('areaSwitch').checked = false;
            document.getElementById('labelAreaSwitch').style.opacity = 0;
            document.getElementById('productDiscountPrice').value = 0;
            document.getElementById('productDiscount').value = 0;
        }
    })
    discountCalc = () => {
        if(document.getElementById('productDiscount').value > 100){
            document.getElementById('productDiscount').value = 100;
        }

        if(parseInt(document.getElementById('productDiscount').value.trim()) == 0){
            document.getElementById('productDiscountPrice').value = 0;
        }

        const discountPercentage = (parseInt(document.getElementById('productDiscount').value)/100);
        const discountText = document.getElementById('productDiscount').value;
        const productListPrice = parseFloat(document.getElementById('productListPrice').value);


        if(
            document.getElementById('productListPrice').value.trim() == ''
            ||
            document.getElementById('productListPrice').value == 0
        ){
            if(document.getElementById('productDiscount').value != 0)
                Snackbar.show({text: 'İndirim için bir liste fiyatı girin.', duration: 1500});

            document.getElementById('productDiscount').value = 0;
            document.getElementById('discountText').innerHTML = '';

        }else {
            if (
                document.getElementById('productDiscount').value.trim() != ''
            ) {
                if(document.getElementById('productDiscountPrice').value.trim() != '0' || document.getElementById('productDiscount').value.trim() != '0') {
                    const minusPrice = (productListPrice * discountPercentage);
                    const newPrice = productListPrice - minusPrice;
                    document.getElementById('discountText').innerHTML = `<b><span style="font-family: Arial">₺</span>${productListPrice}</b> liste fiyatının <b>%${parseFloat(discountText).toFixed(2)}</b> indirim ile yeni fiyatı <b><span style="font-family: Arial">₺</span>${newPrice.toFixed(2)}</b>`;
                    document.getElementById('productDiscountPrice').value = newPrice.toFixed(2);
                }
            }else{
                document.getElementById('discountText').innerHTML = '';
            }
        }
    }
}
