//<!-- Custom geochart Chart  -->


function drawRegionsMap() {

    var data = google.visualization.arrayToDataTable([
                ['Country', 'Popularity'],
                ['Germany', 200],
                ['United States', 300],
                ['Brazil', 400],
                ['Canada', 500],
                ['France', 600],
                ['Turkey', 700]
            ]);

    var options = {
         width: '100%',
        height: '100%'
    };

    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

    chart.draw(data, options);
    
}

$(window).on("resize",function(){
 drawRegionsMap();
  
});

$(window).on("throttledresize", function (event) {
    var options = {
        width: '100%',
        height: '100%'
    };

    var data = google.visualization.arrayToDataTable([]);
    drawRegionsMap(data, options);
});


//<!-- Custom Gauge Chart  -->
//google.charts.load('current', {'packages':['gauge']});


function drawChart() {

    var data = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Memory', 80],
                ['CPU', 55],
                ['Network', 68]
            ]);

    var options = {
        width: '100%',
        height: '100%',
        redFrom: 90,
        redTo: 100,
        yellowFrom: 75,
        yellowTo: 90,
        minorTicks: 5
    };

    var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

    chart.draw(data, options);

    setInterval(function () {
        data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
        chart.draw(data, options);
    }, 13000);
    setInterval(function () {
        data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
        chart.draw(data, options);
    }, 5000);
    setInterval(function () {
        data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
        chart.draw(data, options);
    }, 26000);
}

$(window).on("resize",function(){
 drawChart();
  
});
//<!-- Custom Area Chart   -->

//<!-- Custom Bubble Chart  -->



function drawSeriesChart() {

    var data = google.visualization.arrayToDataTable([
                ['ID', 'Life Expectancy', 'Fertility Rate', 'Region', 'Population'],
                ['CAN', 80.66, 1.67, 'North America', 33739900],
                ['DEU', 79.84, 1.36, 'Europe', 81902307],
                ['DNK', 78.6, 1.84, 'Europe', 5523095],
                ['EGY', 72.73, 2.78, 'Middle East', 79716203],
                ['IRN', 72.49, 1.7, 'Middle East', 73137148],
                ['TRY', 68.09, 4.77, 'Asia', 31090763],
                ['ISR', 81.55, 2.96, 'Middle East', 7485600],
                ['RUS', 68.6, 1.54, 'Europe', 141850000],
                ['USA', 78.09, 2.05, 'North America', 307007000]
            ]);

    var options = {
        title: 'Correlation between life expectancy, fertility rate ' +
            'and population of some world countries (2017)',
        hAxis: {
            title: 'Life Expectancy'
        },
        vAxis: {
            title: 'Fertility Rate'
        },
        bubble: {
            textStyle: {
                fontSize: 11
            }
        }
    };

    var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
    chart.draw(data, options);
}
$(window).on("resize",function(){
 drawSeriesChart();
  
});
//<!-- Custom Sankey  Chart  -->

function drawChartsankey() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'From');
    data.addColumn('string', 'To');
    data.addColumn('number', 'Weight');
    data.addRows([
          ['A', 'X', 5],
          ['A', 'Y', 7],
          ['A', 'Z', 6],
          ['B', 'X', 2],
          ['B', 'Y', 9],
          ['B', 'Z', 4]
        ]);

    // Sets chart options.
    var options = {
         width: '100%',
        height: '100%'
    };

    // Instantiates and draws our chart, passing in some options.
    var chart = new google.visualization.Sankey(document.getElementById('sankey_basic'));
    chart.draw(data, options);
}
$(window).on("resize",function(){
 drawChartsankey();
  
});

//<!-- Custom jquery.circle-diagram  -->

$(function () {


    $('#diagram-id-1').circleDiagram({
        "percent": "42%",
        "size": "170",
        "borderWidth": "15",
        "bgFill": "#19222a",
        "frFill": "#32936F",
        "textSize": "35",
        "textColor": "#32936F"
    });
    $('#diagram-id-2').circleDiagram({
        "percent": "55,3%",
        "size": "170",
        "borderWidth": "15",
        "bgFill": "#19222a",
        "frFill": "#681f88",
        "textSize": "35",
        "textColor": "#681f88"
    });

    $('#diagram-id-3').circleDiagram({
        "percent": "79%",
        "size": "170",
        "borderWidth": "15",
        "bgFill": "#19222a",
        "frFill": "#c19317",
        "textSize": "35",
        "textColor": "#c19317"
    });
});


 $(document).on("ready",function() {
            //<!-- Progressbar -->
            $('.progress .progress-bar').progressbar();

            google.charts.load('current', {
                'packages': ['geochart', 'gauge', 'corechart', 'sankey'],
                'callback': drawRegionsMap,
                drawChart,
                drawSeriesChart,
                drawChartsankey
            });
            // <!-- Custom geochart Chart  -->
            google.charts.setOnLoadCallback(drawRegionsMap);
            //   !-- Custom Area Chart   -->

            // <!-- Custom Gauge Chart  -->
            google.charts.setOnLoadCallback(drawChart);
            //   <!-- Custom Bubble Chart  -->
            google.charts.setOnLoadCallback(drawSeriesChart);

            //   <!-- Custom Sankey  Chart  -->
            google.charts.setOnLoadCallback(drawChartsankey);
        });
        /*Chartis*/
        var data12 = {
            labels: ['W1', 'W2', 'W3', 'W4', 'W5'],
            series: [
                [42, -18, 54, -88, 60]
            ]
        };

        var options12 = {
            high: 100,
            low: -100,
            axisX: {
                labelInterpolationFnc: function(value, index) {
                    return index % 2 === 0 ? value : null;
                }
            }
        };
        new Chartist.Bar('.ct-chart12', data12, options12);

        var data13 = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            series: [
                [5, 4, 3, 7, 5],
                [3, 2, 9, 5, 4]
            ]
        };

        var options13 = {
            seriesBarDistance: 10
        };

        var responsiveOptions13 = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];

