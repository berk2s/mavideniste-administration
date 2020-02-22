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
            document.getElementById('productUnitType').value = '';
            document.getElementById('productUnitWeight').value = '';
            document.getElementById('productAmount').value = '';
            document.getElementById('clearImage').click();
            await putCategories();
            await putBrands();

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

    document.getElementById('productListPrice').addEventListener('input', () => {
        discountCalc();
    })

    document.getElementById('productDiscount').addEventListener('change', (e) => {

        if(document.getElementById('productDiscount').value.trim() == '')
            document.getElementById('productDiscount').value = 0;

    });
    document.getElementById('productDiscount').addEventListener('input', (e) => {
        discountCalc()
    });

    document.querySelector('.downProductDiscount').addEventListener('click', () => {
        discountCalc()
    })

    document.querySelector('.upProductDiscount').addEventListener('click', () => {
        discountCalc()
    })

    discountCalc = () => {
        if(document.getElementById('productDiscount').value > 100){
            document.getElementById('productDiscount').value = 100;
        }


        const discountPercentage = (parseInt(document.getElementById('productDiscount').value)/100);
        const discountText = document.getElementById('productDiscount').value;
        const productListPrice = parseInt(document.getElementById('productListPrice').value);

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
                const minusPrice = (productListPrice * discountPercentage);
                const newPrice = productListPrice - minusPrice;
                document.getElementById('discountText').innerHTML = `<b><span style="font-family: Arial">₺</span>${productListPrice}</b> liste fiyatının <b>%${discountText}</b> indirim ile yeni fiyatı <b><span style="font-family: Arial">₺</span>${newPrice.toFixed(2)}</b>`;
            }else{
                document.getElementById('discountText').innerHTML = '';
            }
        }
    }
}
