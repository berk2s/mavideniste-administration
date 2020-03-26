window.onload = () => {

    handleShortDesc = e => {
        const value = document.getElementById('campaignShortDesc').value;

        const elem = document.getElementById('restCharacter');

        if(parseInt(value.length) <= 91){
            elem.innerHTML = 91-parseInt(value.length);
        }else{
            document.getElementById('campaignShortDesc').value=  value.substring(0, value.length-1)
        }

    }
    document.getElementById('campaignDescArea').style.display = 'none';

    campaignTypeChange = e => {
        const value = document.getElementById('campaignType').value;
        if(parseInt(value) == 0)
            document.getElementById('campaignDescArea').style.display = 'none';
        else
            document.getElementById('campaignDescArea').style.display = 'block';
    }

    campaignSave = async () => {
        try{
            const campaign_name = document.getElementById('campaignTitle').value;
            const campaign_short_desc = document.getElementById('campaignShortDesc').value;
            const campaign_type = document.getElementById('campaignType').value;
            const campaign_desc = document.getElementById('couponDesc').value;
            const campaign_image = document.getElementById('NEW_campaignImage');

            if(
                campaign_name.trim() == ''
                ||
                campaign_short_desc.trim() == ''
                ||
                campaign_image.files.length == 0
            ){
                Snackbar.show({text:'Bazı boş alanlar var', duration:4000})
                return false
            }else{

                const reader = new FileReader();

                reader.onload = async () => {

                    const image = reader.result;
                    const imageData = await uploadImage(image);

                    const campaignSave_ = await fetch(`${API_URL}/api/campaign`,{
                        method:'POST',
                        headers:{
                            'Content-Type':'application/json',
                            'x-api-key':API_KEY
                        },
                        body:JSON.stringify({
                            campaign_name:campaign_name,
                            campaign_short_desc:campaign_short_desc,
                            campaign_type:campaign_type,
                            campaign_desc:campaign_desc,
                            campaign_image:PRODUCT_IMAGE_DIR+imageData.status.imagename
                        })
                    });

                    Snackbar.show({text:'Kampanya başarılı şekilde eklendi.', duration:4000})

                }
                reader.readAsDataURL(campaign_image.files[0]);


            }

        }catch(e){
            console.log(e);
        }
    }

    $("#couponWizard").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        cssClass: 'pill wizard',
        onFinished: campaignSave,

        onStepChanging:function(d){
            return true
        }
    });

    uploadImage = async (image) => {
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
}
