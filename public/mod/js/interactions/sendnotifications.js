window.onload = () => {

    document.getElementById('sendNotificationBtn').addEventListener('click', async () => {

        try{

            const title = document.getElementById('notificationTitleInput').value;
            const desc = document.getElementById('notificationDescInput').value;
            if(desc.trim() == ''){
                Snackbar.show({text: 'İlgili alanları doldurunuz', duration: 4000});
                return false;
            }else{
                document.getElementById('sendNotificationBtn').value = '...'

                const sendPush = await fetch(`${API_URL}/api/notification/push`, {
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json',
                        'x-api-key': API_KEY
                    },
                    body:JSON.stringify({
                        group:TOPIC_EVERYBODY,
                        title:title,
                        body:desc,
                        branch_id: BRANCH_ID
                    })
                });

                console.log(sendPush);
                await sendLog(USER_ID, BRANCH_ID, 1, `<b>Kullanıcı bildirim gönderdi. <br /> Başlık: ${title} <br/> İçerik: ${desc} </b>`);
                Snackbar.show({text: 'Bildirim gönderildi', duration: 4000});

                document.getElementById('sendNotificationBtn').value = 'Bildirimi gönder';

            }


        }catch(e){
            console.log(e);
        }

    });

}
