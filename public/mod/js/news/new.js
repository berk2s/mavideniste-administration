window.onload = () => {
    clickNewsAdd = () => {

        const newsname = document.getElementById('newsName').value;
        const image = document.getElementById('NEW_newsfile');

        if(
            newsname.trim() == ''
            ||
            image.files.length == 0
        ){
            Snackbar.show({text:'Bazı boş alanlar var', duration:4000})
        }else{
            //newsAddImage
            const reader = new FileReader();
            reader.onload =async (e) => {
                const dataimg = reader.result;
                const imageUpload = await newsAddImage(dataimg);
                const imageName = CATEGORY_IMAGE_DIR+imageUpload.status.imagename;
                await fetch(`${API_URL}/api/news`, {
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json',
                        'x-api-key':API_KEY
                    },
                    body:JSON.stringify({
                        news_name: newsname,
                        news_image: imageName,
                        branch_id: BRANCH_ID
                    })
                })
                await sendLog(USER_ID, BRANCH_ID, 1, `<b>Kullanıcı haber ekledi</b>`);
                Snackbar.show({text: 'Haber başarılı şekilde eklendi', duration: 4000});
            };
            reader.readAsDataURL(document.getElementById('NEW_newsfile').files[0]);
        }
    }

    newsAddImage = async (category_image) => {
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
}
