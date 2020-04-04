


 google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Media', 'GB'],
            ['Audio', 1100],
            ['Video', 460],
            ['Photo', 340],
            ['Other', 100]
        ]);

        var options = {
            pieHole: 0.4,
            legend: 'none',
            pieSliceText: 'none',
            width: 220,
            height: 220,
            slices: {0: {color: '#4daf7b'}, 1: {color: '#e6623d'}, 2: {color: '#ebc85e'}, 3: {color: '#f4ede7'}},
            chartArea:{left:"10px", top:"10px", width:"92%", height:"92%"}
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);

        var data2 = google.visualization.arrayToDataTable([
            ['Month', 'Traffic'],
            ['June',  1100],
            ['July',  1580],
            ['August',  1300],
            ['September',  1430]
        ]);

        var options2 = {
            width: 220,
            height: 220,
            legend: 'none',
            colors: ['#4daf7b'],
            chartArea:{left:0, top:0, width:"100%", height:"100%"},
            hAxis:{textPosition:"none", gridlines:{color:"#fff"}, baselineColor:"#4daf7b"},
            vAxis:{textPosition:"none", gridlines:{color:"#fff"}, baselineColor:"#4daf7b"}
        };

        var chart2 = new google.visualization.ColumnChart(document.getElementById('columnchart'));
        chart2.draw(data2, options2);
    }


/*morris */


Morris.Donut({
    element: 'pie-chart',
    data: [
        {
            label: "Friends",
            value: 30
        },
        {
            label: "Allies",
            value: 15
        },
        {
            label: "Enemies",
            value: 45
        },
        {
            label: "Neutral",
            value: 10
        }
  ]
    
});

var data = [
        {
            y: '2014',
            a: 500,
            b: 900
        },
        {
            y: '2015',
            a: 650,
            b: 750
        },
        {
            y: '2016',
            a: 500,
            b: 500
        },
        {
            y: '2017',
            a: 750,
            b: 600
        },
        {
            y: '2018',
            a: 800,
            b: 650
        },
        {
            y: '2019',
            a: 900,
            b: 700
        },
        {
            y: '2020',
            a: 1000,
            b: 750
        },
        {
            y: '2021',
            a: 1150,
            b: 750
        },
        {
            y: '2022',
            a: 1200,
            b: 850
        },
        {
            y: '2023',
            a: 1450,
            b: 850
        },
        {
            y: '2024',
            a: 160,
            b: 950
        }
    ],
    config = {
        data: data,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Total Upload', 'Total Download'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        behaveLikeLine: true,
        resize: true,
        pointFillColors: ['#1980ad'],
        pointStrokeColors: ['green'],
        lineColors: ['orange', 'purple']
    };
config.element = 'area-chart';
Morris.Area(config);