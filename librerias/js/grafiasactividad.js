// JavaScript Document

$(document).ready(function(e) {
    $.ajax({
        type:"POST",
        url: BASE_URL+"ApiGraficas/experiencia",
        cache:false,
        success:function(cont){
            data = JSON.parse(cont);
            // console.log();
            Highcharts.chart('experiencia', {
                chart: {
                  backgroundColor: '#A3A3A3',
                    type: 'column',
                    options3d: {
                        enabled: true,
                        alpha: 15,
                        beta: 15,
                        viewDistance: 25,
                        depth: 40
                    }
                },
                title: {
                    text: 'Obtener Experiencia',
                    style: {
                        fontSize: '20px',
                        color: '#FFFFFF'
                    }
                },
                xAxis: {
                    categories: ['TC1', 'TC2', 'TC3', 'TC4', 'TC5', 'TC6'],
                    labels: {
                        skew3d: true,
                        style: {
                            fontSize: '16px',
                            color: '#FFFFFF'
                        }
                    }
                },
                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Porcentaje',
                        skew3d: true,
                        style: {
                            fontSize: '16px',
                            color: '#FFFFFF'
                        }
                    },
                    labels: {
                        format: '{value}%',
                        style: {
                            fontSize: '12px',
                            color: '#FFFFFF'
                         }
                    }
                },
                tooltip: {
                    headerFormat: '<b>{point.key}</b><br>',
                    pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y}%'
                },
                colors: ['#51a4ab', '#f33e3c'],
                plotOptions: {
                    bar: {
                        colorByPoint: true,
                        stacking: 'normal',
                        depth: 40
                    },
                    series: {
                        dataLabels: {
                           enabled: true,
                           inside: true,
                           style: {
                               fontWeight: 'bold',
                               color: '#FFFFFF'
                           }
                        }
                    }
                },
                    series: [{
                            name: 'creditosTC',
                            data: data.creditosTC,
                            stack: 'creditosTC'
                    },  {
                            name: 'creditosMateria',
                            data: data.creditosMateria,
                            stack: 'creditosMateria'
                    }],

                    legend: {
            itemStyle: {
                color: 'white'
            }
        }
            });

        }   // success
    }); 

    });
