window.onload = async () => {

    const categories = await fetchBranchCategories();
    categories.data.map(e => {
        const option = document.createElement('option');
        option.value = e._id;
        option.innerHTML = e.category_name;
        document.getElementById('categoryList').append(option)
    })


    clickCategoryAdd = async () => {
        try{
            if(
                document.getElementById('categoryName').value.trim() != ''
            ){
                const categoryID = document.getElementById('categoryList').value;
                document.getElementById('btnAddCategory').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;

                await categoryAdd(document.getElementById('categoryName').value, categoryID, BRANCH_ID);
                document.getElementById('btnAddCategory').innerHTML = 'Kaydet';
                Snackbar.show({text: 'Alt kategori başarılı şekilde eklendi', duration: 4000});

            }else{
                Snackbar.show({text: 'İlgili alanları doldurunuz', duration: 4000});
            }
        }catch(e){
            console.log(e);
        }
    }

    categoryAdd = async (category_name, categoryID, branch_id) => {
        try{
            const addcategory = await fetch(`${API_URL}/api/subcategory`,{
                method:'POST',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    sub_category_name: category_name,
                    branch_id:branch_id,
                    category_id:categoryID
                })
            });
            await sendLog(USER_ID, BRANCH_ID, 1, `<b>${category_name}</b> alt kategorisi eklendi!`);
            return addcategory.json();
        }catch(e){
            console.log(e);
        }
    }

}
