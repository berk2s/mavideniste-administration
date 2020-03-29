window.onload = () => {

    fetch(`${API_URL}/api/statement/category/all`, {
        method:'GET',
        headers:{
            'x-api-key':API_KEY
        }
    })
        .then(data => data.json())
        .then((data) => {
            var d_1options1 = {
                chart: {
                    height: 350,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                    dropShadow: {
                        enabled: true,
                        top: 1,
                        left: 1,
                        blur: 2,
                        color: '#acb0c3',
                        opacity: 0.7,
                    }
                },
                colors: ['#5c1ac3', '#ffbb44'],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontSize: '14px',
                    markers: {
                        width: 10,
                        height: 10,
                    },
                    itemMargin: {
                        horizontal: 0,
                        vertical: 8
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [ {
                    name: 'Satış',
                    data: data.lengths
                }],
                xaxis: {
                    categories: data.names,
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: 'vertical',
                        shadeIntensity: 0.3,
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 0.8,
                        stops: [0, 100]
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val
                        }
                    }
                }
            }
            var d_1C_3 = new ApexCharts(
                document.querySelector("#uniqueVisits"),
                d_1options1
            );
            d_1C_3.render();


            console.log(data);

            var d_1options1_ = {
                chart: {
                    height: 350,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                    dropShadow: {
                        enabled: true,
                        top: 1,
                        left: 1,
                        blur: 2,
                        color: '#acb0c3',
                        opacity: 0.7,
                    }
                },
                colors: ['#5c1ac3', '#ffbb44'],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontSize: '14px',
                    markers: {
                        width: 10,
                        height: 10,
                    },
                    itemMargin: {
                        horizontal: 0,
                        vertical: 8
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [ {
                    name: 'Miktar',
                    data: data.productlengths
                }],
                xaxis: {
                    categories: data.names,
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: 'vertical',
                        shadeIntensity: 0.3,
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 0.8,
                        stops: [0, 100]
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val
                        }
                    }
                }
            }
            var d_1C_3_ = new ApexCharts(
                document.querySelector("#countProduct"),
                d_1options1_
            );
            d_1C_3_.render();
        });


}
