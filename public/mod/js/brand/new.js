window.onload = () => {

    clickBrandAdd = async () => {
        try{
            const brandname = document.getElementById('brandName').value;
            if(brandname.trim() == ''){
                Snackbar.show({text: 'İlgili alanları doldurunuz', duration: 4000});
            }else {
                const add = await addBrand(brandname);
                await sendLog(USER_ID, BRANCH_ID, 1, `<b>${brandname}</b> markası eklendi!`);
                Snackbar.show({text: 'Marka eklendi!', duration: 4000});
            }
        }catch(e){
            console.log(e);
        }
    }

    addBrand = async (brand_name) => {
        try{
            const add = await fetch(`${API_URL}/api/brand`, {
                method:'POST',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY,
                },
                body: JSON.stringify({
                    brand_name: brand_name,
                    branch_id: BRANCH_ID
                })
            })
            return add.json();
        }catch(e){
            return e;
        }
    }

}
