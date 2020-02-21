clearTable = (id) => {
    var tableHeaderRowCount = 1;
    var table = document.getElementById(id);
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
    }
}

sendLog = async (user_id, branch_id, log_type, log_msg) => {
    try{
        const log = await fetch(`/api/user/log`,{
            method:'POST',
            headers:{
                'Content-Type':'application/json'
            },
            body: JSON.stringify({
                user_id: user_id,
                branch_id: branch_id,
                log_type: log_type,
                log_msg: log_msg
            })
        });
        return log.json();
    }catch(e){
        return e;
    }
}
