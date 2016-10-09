<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">

<head>

    <link rel="stylesheet" href="form.css">

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" / >
    <meta http-equiv="refresh" content="150">
    <title>DHT22 Chart</title>

    <figure>
        <input type=button value="First Chart" onClick="showTable();">

    </figure>

    <figure>
        <input type=button value="Second Chart" onClick="showTable2();">

    </figure>

    <figure>
        <input type=button value="Third Chart" onClick="showTable3();">
    </figure>



    <h1>First Chart</h1>
    <script type="text/javascript" src="JS/jquery.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            var options = {
                chart: {
                    zoomType: 'xy',
                    alignTicks: true,
                    renderTo: 'container',
                    type: 'scatter',
                    marginRight: 80,


                    marginBottom: 55
                },
                title: {
                    text: 'DHT22 Chart',
                    x: -20 //center
                },


                xAxis: {
                    crosshair: true,

                    type: 'datetime',
                    tickInterval: 80,
                    labels: {
//                      format: '{value: %H:%M}',
                        dateTimeLabelFormats: {
                            day: '%H:%M'
                        }
//              align: 'right',
//              rotation: -90,
                    }
                },

                yAxis: [{
                    title: {
                        tickInterval: 0.1,
                        text: '°C/%',
                        rotation: 0,
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },

                    {
                        title: {
                            tickInterval: 0.1,
                            text: '°C/%',
                            rotation: 0,
                        },
                        linkedTo:0,
                        opposite:true
                    }],
                tooltip: {
                    shared: true
                },
                legend: {
                    enabled: true,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
//                    x: 0,
                    y: 20,
                    borderWidth: 0
                },

                series: []
            }

            $.getJSON("datatemphumi.php", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[2];
                options.series[1] = json[3];
                chart = new Highcharts.Chart(options);
            });
        });
    </script>

    <script src="JS/highcharts.js""></script>
    <script src="JS/exporting.js"></script>

</head>

<div id="container" style="min-width: 200px; height: 400px; margin: 0 auto"></div>


<h1>Second Chart</h1>

<script type="text/javascript" src="JS/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {

        var options = {
            chart: {
                zoomType: 'xy',
                alignTicks: true,
                renderTo: 'container2',
                type: 'scatter',
                marginRight: 80,


                marginBottom: 55
            },
            title: {
                text: 'DHT22 Chart',
                x: -20 //center
            },


            xAxis: {
                crosshair: true,

                type: 'datetime',
                tickInterval: 80,
                labels: {
//                      format: '{value: %H:%M}',
                    dateTimeLabelFormats: {
                        day: '%H:%M'
                    }
//              align: 'right',
//              rotation: -90,
                }
            },

            yAxis: [{
                title: {
                    tickInterval: 0.1,
                    text: '°C/%',
                    rotation: 0,
                },
                labels: {
                    overflow: 'justify'
                }
            },

                {
                    title: {
                        tickInterval: 0.1,
                        text: '°C/%',
                        rotation: 0,
                    },
                    linkedTo:0,
                    opposite:true
                }],
            tooltip: {
                shared: true
            },
            legend: {
                enabled: true,
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
//                    x: 0,
                y: 20,
                borderWidth: 0
            },

            series: []
        }

        $.getJSON("datatemphumi.php", function(json) {
            options.xAxis.categories = json[4]['data'];
            options.series[0] = json[6];
            options.series[1] = json[7];
            chart = new Highcharts.Chart(options);
        });
    });
</script>

<script src="JS/highcharts.js""></script>



<div id="container2" style="min-width: 200px; height: 400px; margin: 0 auto"></div>


    <!--
/*
<h1>Third Chart</h1>

<script type="text/javascript" src="JS/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {

        var options = {
            chart: {
                zoomType: 'xy',
                alignTicks: true,
                renderTo: 'container3',
                type: 'scatter',
                marginRight: 80,


                marginBottom: 55
            },
            title: {
                text: 'DHT22 Chart',
                x: -20 //center
            },


            xAxis: {
                crosshair: true,

                type: 'datetime',
                tickInterval: 80,
                labels: {
//                      format: '{value: %H:%M}',
                    dateTimeLabelFormats: {
                        day: '%H:%M'
                    }
//              align: 'right',
//              rotation: -90,
                }
            },

            yAxis: [{
                title: {
                    tickInterval: 0.1,
                    text: '°C/%',
                    rotation: 0,
                },
                labels: {
                    overflow: 'justify'
                }
            },

                {
                    title: {
                        tickInterval: 0.1,
                        text: '°C/%',
                        rotation: 0,
                    },
                    linkedTo:0,
                    opposite:true
                }],
            tooltip: {
                shared: true
            },
            legend: {
                enabled: true,
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
//                    x: 0,
                y: 20,
                borderWidth: 0
            },

            series: []
        }

        $.getJSON("datatemphumi.php", function(json) {
            options.xAxis.categories = json[0]['data'];
            options.series[0] = json[2];
            options.series[1] = json[3];
            chart = new Highcharts.Chart(options);
        });
    });
</script>

<script src="JS/highcharts.js""></script>
<script src="JS/highcharts.js""></script>


<div id="container3" style="min-width: 200px; height: 400px; margin: 0 auto"></div>

*/

//-->
<script language="JavaScript">
    <!--
    function showTable() {

        if(document.getElementById('container').style.display=='none') {
            document.getElementById('container').style.display='inline';
        } else {
            document.getElementById('container').style.display='none';
        }
        return;
    }
    //-->
</script>

<script language="JavaScript">
    <!--
    function showTable2() {

        if(document.getElementById('container2').style.display=='none') {
            document.getElementById('container2').style.display='inline';
        } else {
            document.getElementById('container2').style.display='none';
        }
        return;
    }
    //-->
</script>

<!--
<script language="JavaScript">
    <!--
    function showTable3() {

        if(document.getElementById('container3').style.display=='none') {
            document.getElementById('container3').style.display='inline';
        } else {
            document.getElementById('container3').style.display='none';
        }
        return;
    }

</script>
   //-->



</html>
