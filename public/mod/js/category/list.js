window.onload = () => {

    const loadingSpin = document.getElementById('loadingSpin');

    clickCategoryEditSave = async (e) => {
        try{
            document.getElementById('EDIT_categorySaveBtn').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            if(document.getElementById('EDIT_categoryfile').files.length != 0){
                let file = '';
                const reader = new FileReader();
                reader.onload = function(){
                    const dataURL = reader.result;
                    document.getElementById('imageBase64').value = dataURL;

                    fetch('/api/upload',{
                        method:'POST',
                        headers:{
                            'Content-Type':'application/json'
                        },
                        body: JSON.stringify({
                            dataimage: document.getElementById('imageBase64').value
                        })
                    })
                    .then((res) => {
                         return res.json();
                    })
                    .then(async (res) => {
                        const category_id = e.getAttribute('data-categoryid');
                        const category_name = document.getElementById('EDIT_categoryName').value;
                        const status = document.getElementById('EDIT_categoryStatus').checked;
                        const fetchPost = await editCategory(category_id, category_name, CATEGORY_IMAGE_DIR+res.status.imagename, status)
                        BranchCategories();
                        document.getElementById('EDIT_categorySaveBtn').innerHTML = 'Kaydet';
                        Snackbar.show({text: category_name+' kategorisi düzenlendi!', duration: 4000});
                    })

                };
                reader.readAsDataURL(document.getElementById('EDIT_categoryfile').files[0]);

            }else{
                const category_id = e.getAttribute('data-categoryid');
                const category_name = document.getElementById('EDIT_categoryName').value;
                const status = document.getElementById('EDIT_categoryStatus').checked;
                const fetchPost = await editCategory(category_id, category_name, null, status)
                BranchCategories();
                document.getElementById('EDIT_categorySaveBtn').innerHTML = 'Kaydet';
                Snackbar.show({text: category_name+' kategorisi düzenlendi!', duration: 4000});
            }


        }catch (e) {
            console.log(e);
        }
    }

    clickCategoryEdit = async (e) => {

        const categoryid = e.getAttribute('data-categoryid');
        document.getElementById('loadingSpinForEdit').style.display = 'block';

        try{
            document.getElementById('clearImage').click();
            const {data:{category_name, status, _id}} = await fetchCategory(categoryid);
            document.getElementById('EDIT_categoryName').value = category_name;
            document.getElementById('EDIT_categorySaveBtn').dataset.categoryid = _id;
            if(status == true) {
                document.getElementById('EDIT_categoryStatus_TEXT').innerHTML = 'Yayında';
                document.getElementById('EDIT_categoryStatus').checked = true;
            }else{
                document.getElementById('EDIT_categoryStatus_TEXT').innerHTML = 'Yayında değil';
                document.getElementById('EDIT_categoryStatus').checked = false;
            }
            document.getElementById('loadingSpinForEdit').style.display = 'none';
        }catch(e){
            console.log(e);
        }

    };

    clickDeleteCategory = async (e) => {
        try{
            const categoryid = e.getAttribute('data-categoryid');
            const categoryname = e.getAttribute('data-category_name');
            const deleteit = await deleteCategory(categoryid, categoryname);
            console.log(deleteit);
            BranchCategories();
            Snackbar.show({text: 'Kategori silindi.', duration: 4000});
        }catch(e){
            console.log(e);
        }
    }

    clickImageShow = (e) => {
        const imgurl = e.getAttribute('data-imageurl');
        document.getElementById('imageShowSrc').src = imgurl;
    }

    clickChangeStatus = async (e) => {
        try{
            const category_id = e.getAttribute('data-categoryid');
            const currentstatus = e.getAttribute('data-currentstatus');
            const category_name = e.getAttribute('data-category_name');
            let to;

            if(currentstatus == 'true')
                to = false;
            else
                to = true;

            const result = await changeStatus(category_id, category_name, to);
            BranchCategories();
            Snackbar.show({text: 'Kategori durumu düzenlendi.', duration: 4000});

        }catch(e){
            console.log(e);
        }
    }

    clickDeleteImage = async(e) => {
        try{
            const category_id = e.getAttribute('data-categoryid');
            const categoryname = e.getAttribute('data-category_name');
            const result = await deleteImage(category_id, categoryname);
            BranchCategories();
            Snackbar.show({text: 'Kategori resmi silindi.', duration: 4000});
        }catch(e){
            console.log(e);
        }
    }

    insertCategories = (category_id, category_name, category_image, status_) => {
        const liveOrders = document.getElementById('categoryListTable');
        const row = liveOrders.insertRow(1);
        const categoryname = row.insertCell(0);
        const categoryimage = row.insertCell(1);
        const status = row.insertCell(2);
        const process = row.insertCell(3);
        let deleteImageDOM = '';
        categoryname.innerHTML = `<span style='color:green'>${category_name}</span>`;


        if(category_image == null) {
            categoryimage.innerHTML = `<span style="color:red">Resim yok</span>`;
        }else {
            categoryimage.innerHTML = `<a
             data-toggle="modal"
             data-target="#imagePlay"
             href="javascript:void(0);"
             onclick="clickImageShow(this)"
             data-imageurl="${PANEL_URL}${category_image}"
             >Gör</a>`;

             deleteImageDOM = `
                    <a
                    class="dropdown-item"
                    href="javascript:void(0);"
                    onclick="clickDeleteImage(this)"
                    data-categoryid="${category_id}"
                    data-category_name="${category_name}"
                    >
                        Resmi Kaldır
                    </a>`

        }

        let statusProcessText='';

        if(status_ == true) {
            status.innerHTML = `<span style='color:green'>Yayında</span>`;
            statusProcessText = `Yayından kaldır`;
        }else{
            status.innerHTML = `<span style='color:red'>Yayında değil</span>`;
            statusProcessText = `Yayına al`;
        }



        process.classList.add('text-center');
        process.innerHTML = `
             <div class="dropdown custom-dropdown mx-auto">
                 <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                 </a>

                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                     <a class="dropdown-item" data-toggle="modal" data-target="#fadeinModal" href="javascript:void(0);" onclick="clickCategoryEdit(this)" data-categoryid="${category_id}" data-category_name="${category_name}" data-type="editcategory">Düzenle</a>
                     <a class="dropdown-item" href="javascript:void(0);" onclick="clickChangeStatus(this)" data-currentstatus='${status_}' data-categoryid="${category_id}" data-category_name="${category_name}">${statusProcessText}</a>
                     ${deleteImageDOM}
                     <a class="dropdown-item" href="javascript:void(0);" data-categoryid="${category_id}" onclick="clickDeleteCategory(this)" data-category_name="${category_name}">Sil</a>
                 </div>
             </div>
        `;

    }

    fetchBranchCategories = async () => {
        try{
            const result =  await fetch(`${API_URL}/api/category/${BRANCH_ID}`, {
                method:'GET',
                headers:{
                    'x-api-key': API_KEY
                }
            });
            return result.json();
        }catch(e){
            return e;
        }
    }

    fetchCategory = async (category_id) => {
        try{
            const result = await fetch(`${API_URL}/api/category/p/get/${category_id}`, {
                method:'GET',
                headers:{
                    'x-api-key': API_KEY
                }
            });
            return result.json();
        }catch(e){
            return e;
        }
    }

    editCategory = async (category_id, category_name, category_image=null, status) => {
        try{
            const fetchPost = await fetch(`${API_URL}/api/category/p/edit`, {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    category_id,
                    category_name,
                    category_image,
                    status
                }),
            });
            await sendLog(USER_ID, BRANCH_ID, 2, `<b>${category_name} </b> kategorisi düzenlendi! <span style="font-size: 1px">(${category_id})</span>`);
            return fetchPost.json();
        }catch (e) {
            return e;
        }
    }

    deleteCategory = async (category_id, category_name) => {
        try{
            const result = await fetch(`${API_URL}/api/category/p/delete/${category_id}`, {
                method:'DELETE',
                headers:{
                    'x-api-key': API_KEY
                }
            });
            await sendLog(USER_ID, BRANCH_ID, 3, `<b>${category_name} </b> kategorisi silindi! <span style="font-size: 1px">(${category_id})</span>`);
            return result.json();
        }catch(e) {
            return e;
        }
    }

    deleteImage = async (category_id, category_name) => {
        try{
            const result = await fetch(`${API_URL}/api/category/p/delete/image`, {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    category_id:category_id
                })
            });
            await sendLog(USER_ID, BRANCH_ID, 3, `<b>${category_name} (${category_id})</b> kategorisinin resmi silindi! <span style="font-size: 1px">(${category_id})</span>`);
            return result.json();
        }catch(e) {
            return e;
        }
    }

    changeStatus = async (category_id, category_name, to) => {
        try{
            const result = await fetch(`${API_URL}/api/category/p/edit/status`, {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    category_id:category_id,
                    status:to
                })
            });
            let msgto = '';

            if(to == true)
                msgto = 'aktif';
            else
                msgto = 'pasif';

            await sendLog(USER_ID, BRANCH_ID, 2, `<b>${category_name}</b> kategorisi ${msgto} duruma getirildi! <span style="font-size: 1px">(${category_id})</span>`);
            return result.json();
        }catch(e) {
            return e;
        }
    }

    BranchCategories = () => {
        fetchBranchCategories()
            .then((res) => {
                loadingSpin.style.display = 'none';
                clearTable('categoryListTable')
                res.data.forEach((e) => {
                    insertCategories(e._id, e.category_name, e.category_image, e.status);
                })
            })
    }

    BranchCategories();

};
