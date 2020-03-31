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

                    fetch('/api/category/upload',{
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

                        const subCategories = getSelectedValues(document.getElementById('EDIT_subcategories'))

                        const subs = await fetchSubCategories(category_id);

                        const deleteSubs = subs.data.map(e => e._id).filter(e => subCategories.indexOf(e) === -1);

                        console.log(deleteSubs);

                        const fetchPost = await editCategory(category_id, category_name,deleteSubs, CATEGORY_IMAGE_DIR+res.status.imagename, status)
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

                const subCategories = getSelectedValues(document.getElementById('EDIT_subcategories'))


                const subs = await fetchSubCategories(category_id);

                const deleteSubs = subs.data.map(e => e._id).filter(e => subCategories.indexOf(e) === -1);

                console.log(deleteSubs);
                const fetchPost = await editCategory(category_id, category_name,deleteSubs, document.getElementById('EDIT_currentimage').value, status)

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

            const subs = await fetchSubCategories(categoryid);
            const subSelect = document.getElementById('EDIT_subcategories');
            subSelect.innerHTML = ''
            document.getElementById('EDIT_currentimage').value = e.getAttribute('data-categoryimage');

            subs.data.map(e => {
                const option = document.createElement('option');
                option.value = e._id;
                option.innerHTML = e.sub_category_name;
                option.selected = true;
                subSelect.append(option);
            })

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

    insertCategories = (category_id, category_name, category_image, status_, subs) => {
        const liveOrders = document.getElementById('categoryListTable');
        const row = liveOrders.insertRow(1);
        const categoryname = row.insertCell(0);
        const categoryimage = row.insertCell(1);
        const sub = row.insertCell(2);
        const status = row.insertCell(3);
        const process = row.insertCell(4);
        let deleteImageDOM = '';

        categoryname.innerHTML = `<span style='color:green'>${category_name}</span>`;

        subs.data.map(e => {
            sub.innerHTML += `<span style="color:white">${e.sub_category_name}, </span>`
        })

       // sub.innerHTML = `<li>${JSON.stringify(subs.data)}</li>`

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
                     <a class="dropdown-item" data-toggle="modal" data-target="#fadeinModal" href="javascript:void(0);" onclick="clickCategoryEdit(this)" data-categoryid="${category_id}" data-category_name="${category_name}" data-categoryimage="${categoryimage}" data-type="editcategory">Düzenle</a>
                     <a class="dropdown-item" href="javascript:void(0);" onclick="clickChangeStatus(this)" data-currentstatus='${status_}' data-categoryid="${category_id}" data-category_name="${category_name}">${statusProcessText}</a>
                     ${deleteImageDOM}
                     <a class="dropdown-item" href="javascript:void(0);" data-categoryid="${category_id}" onclick="clickDeleteCategory(this)" data-category_name="${category_name}">Sil</a>
                 </div>
             </div>
        `;

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

    editCategory = async (category_id, category_name,deleteSubs, category_image=null, status) => {
        try{
            const fetchPost = await fetch(`${API_URL}/api/category/p/edit`, {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    category_id:category_id,
                    category_name:category_name,
                    category_image:category_image,
                    status:status,
                    delete_subs:deleteSubs
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

    clickDeleteSub = async (category_id) => {
        try{

        }catch(e){
            console.log(e);
        }
    }

    BranchCategories = () => {
        fetchBranchCategories()
            .then(async (res) => {
                loadingSpin.style.display = 'none';
             //   clearTable('categoryListTable');


              //  const data = [];

                const mapProsmise = res.data.map(async (e) => {
                    return new Promise(async (resolve, reject) => {
                        const category_id = e._id
                        const category_name = e.category_name
                        const status_ = e.status
                        const subs = await fetchSubCategories(e._id);
                        let categoryname = `<span style='color:green'>${e.category_name}</span>`;
                        let sub = '';

                        const subsPromise = subs.data.map(e => {
                            return new Promise((resolve, reject) => {
                                sub += `${e.sub_category_name},`
                                resolve(true);
                            })
                        });
                        await Promise.all(subsPromise);

                        console.log(sub)

                        let categoryimage = '';
                        let deleteImageDOM = ''
                        if(e.category_image == null) {
                            categoryimage = `<span style='color:red'>Resim yok</span>`;
                        }else {
                            categoryimage = `<a
             data-toggle='modal'
             data-target='#imagePlay'
             href='javascript:void(0);'
             onclick='clickImageShow(this)'
             data-imageurl='${PANEL_URL}${e.category_image}'
             >Gör</a>`;
                            deleteImageDOM = `
                    <a
                    class='dropdown-item'
                    href='javascript:void(0);'
                    onclick='clickDeleteImage(this)'
                    data-categoryid='${category_id}'
                    data-category_name='${category_name}'
                    >
                        Resmi Kaldır
                    </a>`
                        }
                        let statusProcessText='';
                        let status=''
                        if(status_ == true) {
                            status = `<span style='color:green'>Yayında</span>`;
                            statusProcessText = `Yayından kaldır`;
                        }else{
                            status = `<span style='color:red'>Yayında değil</span>`;
                            statusProcessText = `Yayına al`;
                        }
                        let process = '';
                        process = `
                         <div class="dropdown custom-dropdown mx-auto">
                             <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                             </a>

                             <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                 <a class="dropdown-item" data-toggle="modal" data-target="#fadeinModal" href="javascript:void(0);" onclick="clickCategoryEdit(this)" data-categoryid="${category_id}" data-category_name="${category_name}" data-categoryimage="${e.categoryimage}" data-type="editcategory">Düzenle</a>
                                 <a class="dropdown-item" href="javascript:void(0);" onclick="clickChangeStatus(this)" data-currentstatus='${status_}' data-categoryid="${category_id}" data-category_name="${category_name}">${statusProcessText}</a>
                                 ${deleteImageDOM}
                                 <a class="dropdown-item" href="javascript:void(0);" data-categoryid="${category_id}" onclick="clickDeleteCategory(this)" data-category_name="${category_name}">Sil</a>
                             </div>
                         </div>
                    `;

                        resolve([e.category_name, categoryimage, sub, status, dateParse(e.created_at), process]);
                        //             resolve(true)
                    });
                });


                const data = await Promise.all(mapProsmise);

                return data;
            })
            .then((data) => {
                console.log(data)
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
                });
            })


    }

    BranchCategories();




};
