window.onload = async () => {
    document.getElementById('branchProvince').addEventListener('change', async (e) => {
        const province_id = (e.target.value);
        const branchCountySelect = document.getElementById('branchCounty');

        const county = await getCounty(province_id)
        branchCountySelect.innerHTML = ''
        county.map(e => {
            const option = document.createElement('option')
            option.value = e.id;
            option.innerHTML = e.ilce_adi;
            branchCountySelect.append(option)
        })

    });

    document.getElementById('branchProvince_1').selected = true

    getCounty = async id => {
        try{
            const county = await fetch(`/api/location/county/${id}`, {
                method:'GET'
            });
            return county.json();
        }catch (e) {
            console.log(e);
        }
    }

    const county = await getCounty(1)
    document.getElementById('branchCounty').innerHTML = ''
    let i = 0;
    county.map(e => {
        const option = document.createElement('option');
        if(i == 0){
            option.selected = true
        }
        option.value = e.id;
        option.innerHTML = e.ilce_adi;
        document.getElementById('branchCounty').append(option);
        i++;
    })
}
