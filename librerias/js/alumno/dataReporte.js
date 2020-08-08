$(document).ready(function() {
        // create canvas function from highcharts example http://jsfiddle.net/highcharts/PDnmQ/
        (function(H) {
            H.Chart.prototype.createCanvas = function(divId) {
                var svg = this.getSVG(),
                    width = parseInt(svg.match(/width="([0-9]+)"/)[1]),
                    height = parseInt(svg.match(/height="([0-9]+)"/)[1]),
                    canvas = document.createElement('canvas');

                canvas.setAttribute('width', width);
                canvas.setAttribute('height', height);

                if (canvas.getContext && canvas.getContext('2d')) {

                    canvg(canvas, svg);

                    return canvas.toDataURL("image/jpeg");

                } 
                else {
                    alert("Tú navegador no soporta esta carácteristica, por favor actualiza tu navegador");
                    return false;
                }

            }
        }(Highcharts));

        $('#export_all').click(function() {
            var doc = new jsPDF();

            // chart height defined here so each chart can be palced
            // in a different position
            var chartHeight = 80;

            // All units are in the set measurement for the document
            // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
            doc.setFontSize(28);
            doc.text(35, 25, "REPORTES INSCRIPCIONES");

            //loop through each chart
            $('.myChart').each(function(index) {
                var imageData = $(this).highcharts().createCanvas();

                // add image to doc, if you have lots of charts,
                // you will need to check if you have gone bigger 
                // than a page and do doc.addPage() before adding 
                // another image.

                /**
                 * addImage(imagedata, type, x, y, width, height)
                 */
                doc.addImage(imageData, 'JPEG', 45, (index * chartHeight) + 40, 120, chartHeight);
            });


            //save with name
            doc.save('reportes.pdf');
        });


        //charts
        $('#chart1').highcharts({
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            title: {
                text: 'Calificaciones',
                x: -20 //center
            },
            subtitle: {
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ]
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Tokyo',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'New York',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'London',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });


        $('#chart2').highcharts({
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            title: {
                text: 'Creditos completados',
                x: -20 //center
            },
            subtitle: {
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ]
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Tokyo',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'New York',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'London',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });
    });