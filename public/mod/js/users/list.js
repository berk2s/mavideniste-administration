window.onload = () => {

    fetchUsers = async () => {
        try{
            const result = await fetch(`${API_URL}/api/p/user/branch/${BRANCH_ID}`, {
                method:'GET',
                headers:{
                    'x-api-key': API_KEY
                }
            });
            return result.json()
        }catch(e){
            console.log(e)
        }
    }

    handleUserSendNotificationClick = (e) => {
        const token = e.getAttribute('data-token');
        document.getElementById('saveSendNotification').setAttribute('data-token', token);
        document.getElementById('userNameText').innerHTML = e.getAttribute('data-username');
        document.getElementById('aSendNotification').click()
    }

    handleSendSMS = (e) => {
        const phone_number = e.getAttribute('data-phonenumber');
        document.getElementById('saveSendSMS').setAttribute('data-phonenumber', phone_number);
        document.getElementById('aSendSms').click()
    }

    clickSendSMS= async (e) => {
        try{
            //sendSMS_Desc
            document.getElementById('saveSendSMS').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            const phone_number = e.getAttribute('data-phonenumber');

            const desc = document.getElementById('sendSMS_Desc').value;

            if(desc.trim() == ''){
                Snackbar.show({text: 'İlgili alanları doldurunuz', duration: 4000});
                document.getElementById('saveSendSMS').innerHTML = 'Yolla';
            }else {

                const send = await fetch(`${API_URL}/api/notification/sms/user`, {
                    method: 'POST',
                    headers: {
                        'Content-Type':'application/json',
                        'x-api-key': API_KEY
                    },
                    body:JSON.stringify({
                        phone_number:phone_number,
                        body:desc
                    })
                });
                document.getElementById('saveSendSMS').innerHTML = 'Yolla';
                Snackbar.show({text: 'SMS gönderildi.', duration: 4000});

            }

        }catch(e){
            console.log(e);
        }
    }

    clickSendNotification = async (e) => {
        try{
            document.getElementById('saveSendNotification').innerHTML = `<div class="spinner-border text-white mr-2 align-self-center loader-sm" style="width:20px;height:20px"></div>`;
            const token = e.getAttribute('data-token');
            const title = document.getElementById('Notification_Title').value;
            const desc = document.getElementById('Notification_Desc').value;

            if(title.trim() == '' || desc.trim() == ''){
                Snackbar.show({text: 'İlgili alanları doldurunuz', duration: 4000});
                document.getElementById('saveSendNotification').innerHTML = 'Yolla';
            }else {

                const send = await fetch(`${API_URL}/api/notification/push/user`, {
                    method: 'POST',
                    headers: {
                        'Content-Type':'application/json',
                        'x-api-key': API_KEY
                    },
                    body:JSON.stringify({
                        token:token,
                        title:title,
                        body:desc
                    })
                });
                document.getElementById('saveSendNotification').innerHTML = 'Yolla';
                Snackbar.show({text: 'Bildirim gönderildi.', duration: 4000});

            }

        }catch(e){
            console.log(e);
        }
    }

    setReadyPage = async () => {
        try{
            document.getElementById('loadingSpin').style.display = 'block';
            const users = await fetchUsers();
            const data = [];
            users.data.map(e => {
                let process = `
                     <div class="dropdown custom-dropdown mx-auto">
                         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                         </a>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                             <a
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#fadeinModal"
                                href="javascript:void(0);"
                                >Düzenle</a>

                                <a
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#fadeinModal"
                                href="javascript:void(0);"
                                data-username="${e.name_surname}"
                                onclick="handleUserSendNotificationClick(this)"
                                data-token="${e.token}"
                                >Bildirim gönder</a>

                                <a
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#fadeinModal"
                                href="javascript:void(0);"
                                data-username="${e.name_surname}"
                                onclick="handleSendSMS(this)"
                                data-phonenumber="9${e.phone_number}"
                                >SMS gönder</a>

                               <a
                                class="dropdown-item"
                                href="javascript:void(0);"
                                >Sil</a>
                          </div>
                     </div>
                `;
                data.push([e.name_surname, e.email_address, e.phone_number, e.which_platform, dateParse(e.createdAt), process]);
            });
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
            } );
            document.getElementById('loadingSpin').style.display = 'none';
        }catch(e){
            console.log(e);
        }
    };

    setReadyPage()
}
