window.onload = () => {

    const loadingSpin = document.getElementById('loadingSpin');

    clickCategoryEditSave = async (e) => {
        try{
            const category_id = e.getAttribute('data-categoryid');
            const category_name = document.getElementById('EDIT_categoryName').value;
            const status = document.getElementById('EDIT_categoryStatus').checked;
            const fetchPost = await editCategory(category_id, category_name, status)
            console.log(fetchPost);
            BranchCategories();
        }catch (e) {
            console.log(e);
        }
    }

    clickCategoryEdit = async (e) => {

        const categoryid = e.getAttribute('data-categoryid');
        document.getElementById('loadingSpinForEdit').style.display = 'block';
        try{
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

    insertLiveOrder = (category_id, category_name, category_image, status_) => {
        const liveOrders = document.getElementById('categoryListTable');
        const row = liveOrders.insertRow(1);
        const categoryname = row.insertCell(0);
        const categoryimage = row.insertCell(1);
        const status = row.insertCell(2);
        const process = row.insertCell(3);

        categoryname.innerHTML = `<span style='color:white'>${category_name}</span>`;
        categoryimage.innerHTML = `<a href="${category_image}" target="_blank">Gör</a>`;

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
                     <a class="dropdown-item" data-toggle="modal" data-target="#fadeinModal" href="javascript:void(0);" onclick="clickCategoryEdit(this)" data-categoryid="${category_id}" data-type="editcategory">Düzenle</a>
                     <a class="dropdown-item" href="javascript:void(0);" data-type="categorystatuschange" data-categoryid="${category_id}">${statusProcessText}</a>
                     <a class="dropdown-item" href="/kategori/sil/${category_id}">Sil</a>
                 </div>
             </div>
        `;

    }

    fetchBranchCategories = async () => {
        try{
            const result =  await fetch(`${API_URL}/api/p/category/${BRANCH_ID}`, {
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
            const result = await fetch(`${API_URL}/api/p/category/get/${category_id}`, {
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

    editCategory = async (category_id, category_name, status) => {
        try{
            const fetchPost = await fetch(`${API_URL}/api/p/category/edit`, {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    category_id,
                    category_name,
                    status
                }),
            });
            return fetchPost.json();
        }catch (e) {
            return e;
        }
    }

    BranchCategories = () => {
        fetchBranchCategories()
            .then((res) => {
                loadingSpin.style.display = 'none';
                console.log(res);
                res.data.forEach((e) => {
                    insertLiveOrder(e._id, e.category_name, e.category_image, e.status);
                })
            })
    }

    BranchCategories();

};
