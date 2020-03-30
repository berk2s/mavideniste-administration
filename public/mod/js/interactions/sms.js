//smsContent
window.onload = () => {

    document.getElementById('sendNotificationBtn').addEventListener('click', async () => {

        try{

            const desc = document.getElementById('smsContent').value;
            if(desc.trim() == ''){
                Snackbar.show({text: 'İlgili alanları doldurunuz', duration: 4000});
                return false;
            }else{
                document.getElementById('sendNotificationBtn').value = '...'

                const sendPush = await fetch(`${API_URL}/api/notification/sms`, {
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json',
                        'x-api-key': API_KEY
                    },
                    body:JSON.stringify({
                        body:desc,
                        branch_id: BRANCH_ID
                    })
                });

                console.log(sendPush);
                await sendLog(USER_ID, BRANCH_ID, 1, `<b>Kullanıcı SMS gönderdi. <br /> İçerik: ${desc} </b>`);

                Snackbar.show({text: 'SMS gönderildi', duration: 4000});

                document.getElementById('sendNotificationBtn').value = 'SMS gönder';

            }


        }catch(e){
            console.log(e);
        }

    });

}
