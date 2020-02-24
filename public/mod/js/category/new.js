window.onload = () => {
    clickCategoryPreview = () => {

        if(
            document.getElementById('NEW_categoryfile').files.length == 0
                &&
            document.getElementById('categoryName').value.trim() == '')
        {
            Snackbar.show({text: 'İlgili alanları doldurunuz', duration: 4000});

        }else {
            const reader = new FileReader();
            reader.onload = () => {
                const dataimg = reader.result;
                document.getElementById('previewIMG').src = dataimg;
                document.getElementById('previewCatName').innerHTML = document.getElementById('categoryName').value;
            }
            reader.readAsDataURL(document.getElementById('NEW_categoryfile').files[0]);
            document.getElementById('previewCategoryADOM').click();
        }

    }

    clickCategoryAdd = async () => {
        try{
            if(
                document.getElementById('NEW_categoryfile').files.length != 0
                &&
                document.getElementById('categoryName').value.trim() != ''
            ){
                document.getElementById('btnAddCategory').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
                const reader = new FileReader();
                reader.onload = async () => {
                    const dataimg = reader.result;
                    const imageUpload = await categoryAddImage(dataimg);
                    await categoryAdd(document.getElementById('categoryName').value, CATEGORY_IMAGE_DIR+imageUpload.status.imagename, BRANCH_ID);
                    document.getElementById('btnAddCategory').innerHTML = 'Kaydet';
                    Snackbar.show({text: 'Kategori başarılı şekilde eklendi', duration: 4000});
                }
                reader.readAsDataURL(document.getElementById('NEW_categoryfile').files[0]);
            }else{
                Snackbar.show({text: 'İlgili alanları doldurunuz', duration: 4000});
            }
        }catch(e){
            console.log(e);
        }
    }

    categoryAdd = async (category_name, category_image, branch_id) => {
        try{
            const addcategory = await fetch(`${API_URL}/api/category`,{
                method:'POST',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    category_name: category_name,
                    branch_id:branch_id,
                    category_image:category_image
                })
            });
            await sendLog(USER_ID, BRANCH_ID, 1, `<b>${category_name}</b> kategorisi eklendi!`);
            return addcategory.json();
        }catch(e){
            console.log(e);
        }
    }

    categoryAddImage = async (category_image) => {
        try{
            const upload = await fetch('/api/category/upload',{
                method:'POST',
                headers:{
                    'Content-Type':'application/json'
                },
                body: JSON.stringify({
                    dataimage: category_image
                })
            });
            return upload.json();
        }catch(e){
            console.log(e);
        }
    }
}
