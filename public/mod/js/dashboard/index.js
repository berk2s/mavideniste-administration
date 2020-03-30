/*
    =================================
        Revenue Monthly | Options
    =================================
*/

fetch(`${API_URL}/api/statement/weekly`, {
    method:'GET',
    headers:{
        'x-api-key': API_KEY
    }
})
    .then((data) => data.json())
    .then((data) => {
        console.log(data)
        var options1 = {
            chart: {
                fontFamily: 'Nunito, sans-serif',
                height: 365,
                type: 'area',
                zoom: {
                    enabled: false
                },
                dropShadow: {
                    enabled: true,
                    opacity: 0.3,
                    blur: 5,
                    left: -7,
                    top: 22
                },
                toolbar: {
                    show: false
                },
                events: {
                    mounted: function(ctx, config) {
                        const highest1 = ctx.getHighestValueInSeries(0);
                        const highest2 = ctx.getHighestValueInSeries(1);

                        ctx.addPointAnnotation({
                            x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
                            y: highest1,
                            label: {
                                style: {
                                    cssClass: 'd-none'
                                }
                            },
                            customSVG: {
                                SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                cssClass: undefined,
                                offsetX: -8,
                                offsetY: 5
                            }
                        })

                        ctx.addPointAnnotation({
                            x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
                            y: highest2,
                            label: {
                                style: {
                                    cssClass: 'd-none'
                                }
                            },
                            customSVG: {
                                SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                cssClass: undefined,
                                offsetX: -8,
                                offsetY: 5
                            }
                        })
                    },
                }
            },
            colors: ['#1b55e2', '#e7515a'],
            dataLabels: {
                enabled: false
            },
            markers: {
                discrete: [{
                    seriesIndex: 0,
                    dataPointIndex: 7,
                    fillColor: '#000',
                    strokeColor: '#000',
                    size: 5
                }, {
                    seriesIndex: 2,
                    dataPointIndex: 11,
                    fillColor: '#000',
                    strokeColor: '#000',
                    size: 4
                }]
            },
            subtitle: {
                text: 'Haftalık Ciro',
                align: 'left',
                margin: 0,
                offsetX: -10,
                offsetY: 35,
                floating: false,
                style: {
                    fontSize: '14px',
                    color:  '#888ea8'
                }
            },
            title: {
                text: data[0]+data[1]+data[2]+data[3]+data[4]+data[5]+data[6]+' TL',
                align: 'left',
                margin: 0,
                offsetX: -10,
                offsetY: 0,
                floating: false,
                style: {
                    fontSize: '25px',
                    color:  '#bfc9d4'
                },
            },
            stroke: {
                show: true,
                curve: 'smooth',
                width: 2,
                lineCap: 'square'
            },
            series: [{
                name: 'Haftalık Ciro',
                data: data
            }],
            xaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    show: true
                },
                labels: {
                    offsetX: 0,
                    offsetY: 5,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Nunito, sans-serif',
                        cssClass: 'apexcharts-xaxis-title',
                    },
                }
            },
            yaxis: {
                labels: {
                    formatter: function(value, index) {
                        return (value) + ' TL'
                    },
                    offsetX: -22,
                    offsetY: 0,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Nunito, sans-serif',
                        cssClass: 'apexcharts-yaxis-title',
                    },
                }
            },
            grid: {
                borderColor: '#191e3a',
                strokeDashArray: 5,
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: false,
                    }
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: -10
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                offsetY: -50,
                fontSize: '16px',
                fontFamily: 'Nunito, sans-serif',
                markers: {
                    width: 10,
                    height: 10,
                    strokeWidth: 0,
                    strokeColor: '#fff',
                    fillColors: undefined,
                    radius: 12,
                    onClick: undefined,
                    offsetX: 0,
                    offsetY: 0
                },
                itemMargin: {
                    horizontal: 0,
                    vertical: 20
                }
            },
            tooltip: {
                theme: 'dark',
                marker: {
                    show: true,
                },
                x: {
                    show: false,
                }
            },
            fill: {
                type:"gradient",
                gradient: {
                    type: "vertical",
                    shadeIntensity: 1,
                    inverseColors: !1,
                    opacityFrom: .28,
                    opacityTo: .05,
                    stops: [45, 100]
                }
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    legend: {
                        offsetY: -30,
                    },
                },
            }]
        }
        /*
            ================================
                Revenue Monthly | Render
            ================================
        */
        var chart1 = new ApexCharts(
            document.querySelector("#revenueMonthly"),
            options1
        );

        chart1.render();
    })

fetch(`${API_URL}/api/statement/totalorder`, {
    method:'GET',
    headers:{
        'x-api-key': API_KEY
    }
})
    .then((data) => data.json())
    .then((data) => {
        document.getElementById('totalOrder').innerHTML = data.totalorder;


        console.log(data)
        /*
    =============================
        Total Orders | Options
    =============================
*/
        var d_2options2 = {
            chart: {
                id: 'sparkline1',
                group: 'sparklines',
                type: 'area',
                height: 280,
                sparkline: {
                    enabled: true
                },
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: 'Sipariş',
                data: [data.result[0]+'', data.result[1]+'', data.result[2]+'', data.result[3]+'', data.result[4]+'', data.result[5]+'', data.result[6]+'']
            }],
            labels: ['1', '2', '3', '4', '5', '6', '7'],
            xaxis: {
                formatter: function(value, index) {
                    return (value) + ' tane'
                },
            },
            grid: {
                padding: {
                    top: 125,
                    right: 0,
                    bottom: 36,
                    left: 0
                },
            },
            fill: {
                type:"gradient",
                gradient: {
                    type: "vertical",
                    shadeIntensity: 1,
                    inverseColors: !1,
                    opacityFrom: .40,
                    opacityTo: .05,
                    stops: [45, 100]
                }
            },
            tooltip: {
                x: {
                    show: false,
                },
                theme: 'dark'
            },
            colors: ['#fff']
        }


        /*
            ============================
                Total Orders | Render
            ============================
        */
        var d_2C_2 = new ApexCharts(document.querySelector("#total-orders"), d_2options2);
        d_2C_2.render();


    })

