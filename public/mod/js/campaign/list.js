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

    fetchCampaign = async() => {
        try{
            const brand = await fetch(`${API_URL}/api/campaign/all/${BRANCH_ID}`, {
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
            const brand = await fetchBrand(brandid);
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
            await fetch(`${API_URL}/api/campaign`, {
                method:"DELETE",
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key':API_KEY,
                },
                body:JSON.stringify({
                    campaign_id:id
                })
            });
            await sendLog(USER_ID, BRANCH_ID, 3, `<b>Kullanıcı kampanya sildi. </b>`);

            Snackbar.show({text:'Kampanya silindi', duration:4000});
            await insertBrands()
        }catch(e){
            console.log(e);
        }
    }

    handleImageView = (e) => {

        document.getElementById('imageView').src = e.getAttribute('data-image');
    }

    clickChangeImage = async (e) => {
        try{
            document.getElementById('changeImageBtn').innerHTML = '...';
            if(document.getElementById('campaignImage').files.length == 0){
                Snackbar.show({text:'Lütfen boş bırakmayın', duration:4000});
            }else{
                const reader = new FileReader();
                reader.onload = async () => {
                  const image = reader.result;
                  const imageData = await uploadImage(image);
                  const lastImage = CATEGORY_IMAGE_DIR+imageData.status.imagename;
                  await fetch(`${API_URL}/api/campaign/changeimage`, {
                      method:'PUT',
                      headers:{
                          'Content-Type':'application/json',
                          'x-api-key':API_KEY
                      },
                      body:JSON.stringify({
                          campaign_id:e.getAttribute('data-campaignid'),
                          image:lastImage
                      })
                  });
                    await sendLog(USER_ID, BRANCH_ID, 2, `<b>Kullanıcı kampanya resmini düzenledi. </b>`);

                    Snackbar.show({text:'Güncelleme başarılı', duration:4000});

                };
                reader.readAsDataURL(document.getElementById('campaignImage').files[0])
            }
            document.getElementById('changeImageBtn').innerHTML = 'Kaydet';
        }catch(e){
            console.log(e);
        }
    }

    handleClickChangeImage = (e) => {
        document.getElementById('changeImageBtn').setAttribute('data-campaignid', e.getAttribute('data-campaignid'));
    }

    insertBrands = async () => {
        try{
            loadingSpin.style.display = 'block';
            const brands = await fetchCampaign();
            console.log(brands.data);

            const data = [];



            brands.data.forEach(e => {
                let process = `
            <div class="dropdown custom-dropdown mx-auto">
                 <a class="dropdown-toggle" style="float:right" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                 </a>

                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                     <a class="dropdown-item" data-toggle="modal" data-target="#fadeinModal" href="javascript:void(0);"
                       onclick="handleEditCampaign(this)"
                       data-campaignid="${e._id}"
                       data-campaignname="${e.campaign_name}"
                       data-campaignshortdesc="${e.campaign_short_desc}"
                       data-campaigntype="${e.campaign_type}"
                       data-campaigndesc="${e.campaign_desc}"
                       >Düzenle</a>
                     <a class="dropdown-item" data-toggle="modal" data-target="#changeimage" onclick="handleClickChangeImage(this)" data-campaignid="${e._id}" href="javascript:void(0);">Resmi değiştir</a>
                     <a class="dropdown-item" href="javascript:void(0);" onclick="handleRemove(this)" data-brandid="${e._id}"  data-type="editcategory">Sil</a>
                 </div>
             </div>`;
                data.push([e.campaign_name, e.campaign_short_desc, e.campaign_type == 0 ? 'Standart' : 'Açıklamalı', e.campaign_desc, `<a  data-toggle="modal" data-target="#image" href="javascript:void(0);" onclick="handleImageView(this)" data-image="${e.campaign_image}" >Gör</a>`, dateParse(e.campaign_date), process]);
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

    handleEditCampaign = (e) => {
        const campaignid = e.getAttribute('data-campaignid');
        const campaignname = e.getAttribute('data-campaignname');
        const campaignshortdesc = e.getAttribute('data-campaignshortdesc');
        const campaigntype = e.getAttribute('data-campaigntype');
        const campaigndesc = e.getAttribute('data-campaigndesc');

        if(parseInt(campaigntype) == 1){
            document.getElementById('campaignDescArea').style.display = 'block';
        }

        document.getElementById('EDIT_save').setAttribute('data-campaignid', campaignid);

        document.getElementById('EDIT_campaignname').value = campaignname;
        document.getElementById('EDIT_campaignshortdesc').value = campaignshortdesc;
        document.getElementById('EDIT_campaigndesc').innerHTML = campaigndesc != 'null' ? campaigndesc : '';

        document.getElementById('EDIT_campaigntype').value = campaigntype;

    }

    handleChangeType = async (e) => {
        const value = document.getElementById('EDIT_campaigntype').value;
        if(parseInt(value) == 0){
            document.getElementById('campaignDescArea').style.display = 'none';
        }else {
            document.getElementById('campaignDescArea').style.display = 'block';

        }
    }

    clickHandleCampaignSave = async e => {
        try{
            document.getElementById('EDIT_save').innerHTML = '...'

            const campaignid = e.getAttribute('data-campaignid');

            const campaignname = document.getElementById('EDIT_campaignname').value;
            const campaignshortdesc = document.getElementById('EDIT_campaignshortdesc').value;
            const campaigntype = document.getElementById('EDIT_campaigntype').value;
            const campaigndesc = document.getElementById('EDIT_campaigndesc').value;

            await fetch(`${API_URL}/api/campaign`, {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key':API_KEY
                },
                body:JSON.stringify({
                    campaign_id:campaignid,
                    campaign_name:campaignname,
                    campaign_short_desc:campaignshortdesc,
                    campaign_type:campaigntype,
                    campaign_desc:campaigntype == 1 ? campaigndesc : null
                })
            })
            await sendLog(USER_ID, BRANCH_ID, 2, `<b>Kullanıcı ${campaign_name} kampanyasını düzenledi. </b>`);
            insertBrands();
            document.getElementById('EDIT_save').innerHTML = 'Kaydet'
        }catch(e){
            console.log(e);
        }
    }

    insertBrands();

    uploadImage = async (image) => {
        try{
            const upload = await fetch(`/api/category/upload`, {
                method:'POST',
                headers:{
                    'Content-Type':'application/json'
                },
                body: JSON.stringify({
                    dataimage: image,
                    width:355,
                    height:172,
                })
            });
            return upload.json();
        }catch(e){
            return e;
        }
    };
}
