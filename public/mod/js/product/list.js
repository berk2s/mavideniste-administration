window.onload = () => {

    const loadingSpin = document.getElementById('loadingSpin');

    var data = [
        [
            "Tiger Nixon",
            "Tiger Nixon",
            "Tiger Nixon",
            "Tiger Nixon",
            "Tiger Nixon",
            "Tiger Nixon",
            "Tiger Nixon",
            "Tiger Nixon",
            "Tiger Nixon",
            "Tiger Nixon",
        ],


    ]
    $('#html5-extension').DataTable( {
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

    fetchProducts = async () => {
        try{
            //`${API_URL}/api/category/${BRANCH_ID}`,
        }catch(e){
            return e;
        }
    }

}
