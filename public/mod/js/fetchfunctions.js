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
};

dateParse = (date) => {
    const date_ = date.split('T');
    const date_2 = date_[1].split('.');

    return date_[0]+' '+date_2[0];
}

checkNumeric = (e) => {
    const value = e.value;
    if(isNaN(value)){
        let newVal = '';
        for(let i = 0;i<(value.length-1);i++){
            newVal += e.value[i];
        }
        e.value = newVal;
    }
    e.value = e.value.trim();
}

clearNumericTrimToZero = (e) => {
    const value = e.value;
    if(e.value.trim() == '')
        e.value = 0
}

fetchBranchCategories = async () => {
    try{
        const result =  await fetch(`${API_URL}/api/category/${BRANCH_ID}`, {
            method:'GET',
            headers:{
                'x-api-key': API_KEY
            }
        });
        return result.json();
    }catch(e){
        return e;
    }
};

fetchBrands = async () => {
    try{
        //`${API_URL}/api/category/${BRANCH_ID}`,
        const brands = await fetch(`${API_URL}/api/brand/${BRANCH_ID}`, {
            method:'GET',
            headers:{
                'x-api-key': API_KEY
            }
        });

        return brands.json();
    }catch(e){
        return e;
    }
};

getSelectedValues = (el) => {
    var result = [];
    var options = el && el.options;
    var opt;

    for (var i=0, iLen=options.length; i<iLen; i++) {
        opt = options[i];
        if (opt.selected) {
            result.push(opt.value || opt.text);
        }
    }
    return result;
}
