window.onload = () => {

    const loadingSpin = document.getElementById('loadingSpin');

    fetchUsers = async () => {
        try{
            const users = await fetch(`${API_URL}/api/p/user`, {
                method:'GET',
                headers:{
                    'x-api-key': API_KEY
                },
            });
            return users.json();
        }catch(e){
            console.log(e)
        }
    }

    putUserDatasToSelect = (data) => {
        data.map(e => {
            const {name_surname, _id, phone_number} = e;
            const option = document.createElement('option');

            option.value = _id;
            option.innerHTML = `${name_surname} (${phone_number})`;

            document.getElementById('CREATE_users').append(option);
        })
    }

    userGroups = async () => {
        try{
            const groups = await fetch(`${API_URL}/api/notification/topic`, {
                method:'GET',
                headers:{
                    'x-api-key': API_KEY
                },
            });

            return groups.json();
        }catch(e){
            console.log(e);
        }
    }

    setReadyPage = async () => {
        try{
            const users = await fetchUsers();
            const groups = await userGroups();
            const data = [];
            groups.data.map(e => {
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
                                href="javascript:void(0);"
                                >Sil</a>
                          </div>
                     </div>
                `;
                data.push([e.group_name, e.group_desc, e.group_branch, e.group_users.length, dateParse(e.group_date), process]);
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
            putUserDatasToSelect(users.data);
        }catch(e){
            console.log(e);
        }
    };

    postUserGroup = async (name, desc, users) => {
        try{
            const usergroup = await fetch(`${API_URL}/api/notification/topic`, {
                method:'POST',
                headers:{
                    'Content-Type':'application/json',
                    'x-api-key': API_KEY
                },
                body:JSON.stringify({
                    group_name: name,
                    group_desc: desc,
                    group_branch: BRANCH_ID,
                    group_users: users
                })
            });
            return usergroup.json();
        }catch(e){
            console.log(e);
        }
    }

    clickUserGroupsSave = async () => {
        try{
            $.blockUI({
                message: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
                fadeIn: 800,
                overlayCSS: {
                    backgroundColor: '#191e3a',
                    opacity: 0.4,
                    zIndex: 1200,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    color: '#fff',
                    zIndex: 1201,
                    padding: 0,
                    backgroundColor: 'transparent'
                },
            });

            const group_name  = document.getElementById('CREATE_groupname').value;
            const group_desc  = document.getElementById('CREATE_groupdesc').value;
            const group_users_ = document.getElementById('CREATE_users');
            const group_users = getSelectedValues(group_users_);

            const postit = await postUserGroup(group_name, group_desc, group_users);

            console.log(postit);

            $.unblockUI();
        }catch(e){
            console.log(e);
        }
    }

    setReadyPage()

}
