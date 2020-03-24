window.onload = async () => {
    const branchDefaultProvince = document.getElementById('branchDefaultProvince').value;
    const branchDefaultCounty = document.getElementById('branchDefaultCounty').value;

    const branchProvince = document.getElementById('branchProvince');
    const branchCounty = document.getElementById('branchCounty');

    fetchCounties = async (id) => {
        try{
            const data = await fetch('/api/location/county/'+id, {
                method:'GET'
            });
            return data.json()
        }catch(e){
            console.log(e);
        }
    }

    fetchProvinces = async () => {
        try{
            const data = await fetch('/api/location/province', {
                method:'GET'
            })
            return data.json();
        }catch(e){
            console.log(e);
        }
    }

    const provinces = await fetchProvinces();



    document.getElementById('branchProvince').addEventListener('change', async (e) => {
        const province_id = (e.target.value);
        const branchCountySelect = document.getElementById('branchCounty');

        const county = await fetchCounties(province_id)
        branchCountySelect.innerHTML = ''
        county.map(e => {
            const option = document.createElement('option')
            option.value = e.id;
            option.innerHTML = e.ilce_adi;
            branchCountySelect.append(option)
        })

    });

    provinces.map(e => {
        const option = document.createElement('option');

        option.value = e.id;
        option.innerHTML = e.il_adi;

        if(parseInt(option.value) == parseInt(branchDefaultProvince)){
            option.selected = true;
        }

        branchProvince.append(option);

    })

    const counties = await fetchCounties(branchDefaultProvince);

    counties.map(e => {
        const option = document.createElement('option');

        option.value = e.id;
        option.innerHTML = e.ilce_adi;

        if(parseInt(option.value) == parseInt(branchDefaultCounty)){
            option.selected = true;
        }

        branchCounty.append(option);
    });


}
