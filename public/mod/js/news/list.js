window.onload = () => {

    const loadingSpin = document.getElementById('loadingSpin');

    const categories = [];


    BrandEditSave = async (brand_id, brand_name) => {
        try{
            const brand = await fetch(`${API_URL}/api/brand`, {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    brand_id,
                    brand_name,
                })
            });
            return brand.json();
        }catch (e) {
            return e;
        }
    }

    fetchNews = async() => {
        try{
            const brand = await fetch(`${API_URL}/api/news/all/${BRANCH_ID}`, {
                method:'GET',
                headers:{
                    'x-api-key': API_KEY
                }
            });
            return brand.json();
        }catch (e) {
            return e;
        }
    }

    clickBrandEditSave = async (e) => {
        try{
            document.getElementById('EDIT_brandSaveBtn').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            const brandid = e.getAttribute('data-brandid');
            const brandname = document.getElementById('EDIT_brandname').value;
            const save = await BrandEditSave(brandid, brandname);
            const refresh = await insertBrands();
            console.log(save);
            await sendLog(USER_ID, BRANCH_ID, 2, `<b>${brandname} </b> markası düzenlendi! <span style="font-size: 1px">(${brandid})</span>`);
            document.getElementById('EDIT_brandSaveBtn').innerHTML = `Kaydet`;
        }catch(e){
            console.log(e);
        }
    }

    clickBrandEdit = async (e) => {
        const brandid = e.getAttribute('data-brandid');
        try{
            document.getElementById('loadingSpinForEdit').style.display = 'block';
            const brand = await fetchNews(brandid);
            const e = brand.data[0];
            document.getElementById('EDIT_brandname').value = e.brand_name;
            document.getElementById('EDIT_brandSaveBtn').setAttribute('data-brandid', e._id);

            document.getElementById('loadingSpinForEdit').style.display = 'none';

        }catch(e){
            console.log(e);
        }
    }

    handleRemove = async e => {
        try{
            const id = e.getAttribute('data-brandid');
            await fetch(`${API_URL}/api/news`, {
                method:"DELETE",
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key':API_KEY,
                },
                body:JSON.stringify({
                    news_id:id
                })
            });
            await sendLog(USER_ID, BRANCH_ID, 3, `<b>Kullanıcı haber sildi</b>`);

            Snackbar.show({text:'Haber silindi', duration:4000});
            await insertBrands()
        }catch(e){
            console.log(e);
        }
    }

    viewImageClick = e => {
        document.getElementById('viewImgSrc').src = e.getAttribute('data-image');
    }

    clickChangeImage_ = (e) => {
        const id = e.getAttribute('data-newsid');
        document.getElementById('EDIT_imageSaveBtn').setAttribute('data-newsid', id);
    }
    uploadImage = async (category_image) => {
        try{
            const upload = await fetch('/api/category/upload',{
                method:'POST',
                headers:{
                    'Content-Type':'application/json'
                },
                body: JSON.stringify({
                    dataimage: category_image,
                    width:355,
                    height:200
                })
            });
            return upload.json();
        }catch(e){
            console.log(e);
        }
    }

    clickChangeImage = (e) => {
        const id = e.getAttribute('data-newsid');
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

                    await fetch(`${API_URL}/api/news/changeimage`, {
                        method:'PUT',
                        headers:{
                            'Content-Type':'application/json',
                            'x-api-key':API_KEY
                        },
                        body:JSON.stringify({
                            news_id:id,
                            image:CATEGORY_IMAGE_DIR+uploade.status.imagename
                        })
                    })

                    await insertBrands();
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

    insertBrands = async () => {
        try{
            loadingSpin.style.display = 'block';
            const brands = await fetchNews();
            console.log(brands);

            const data = [];



            brands.data.forEach(e => {

                let imageArea = `
                <a href="javascript:void(0);" data-toggle="modal" onclick="viewImageClick(this)" data-target="#viewImage" data-image='${PANEL_URL}${e.news_image}' >Gör</a>
            `
                let process = `
            <div class="dropdown custom-dropdown mx-auto">
                 <a class="dropdown-toggle" style="float:right" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                 </a>

                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                     <a class="dropdown-item" data-toggle="modal" data-target="#imagePlay" href="javascript:void(0);" onclick="clickChangeImage_(this)"  data-newsid="${e._id}">Resmi değiştir</a>
                     <a class="dropdown-item" href="javascript:void(0);" onclick="handleRemove(this)" data-brandid="${e._id}"  data-type="editcategory">Sil</a>
                 </div>
             </div>`;
                data.push([e.news_name, imageArea,e.news_status == true ? 'Yayında' : 'Yayında değil', dateParse(e.news_date), process]);
            });

            $('#html5-extension').DataTable( {
                data:data,
                destroy: true,
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
    }

    insertBrands();

}
