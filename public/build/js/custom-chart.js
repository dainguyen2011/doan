 Chart.defaults.global.legend = {
     enabled: false
 };

 // Line chart
 var ctx = document.getElementById("lineChart");
 var lineChart = new Chart(ctx, {
     type: 'line',
     data: {
         labels: ["January", "February", "March", "April", "May", "June", "July"],
         datasets: [{
                 label: "My First dataset",
                 fillColor: "rgba(106, 48, 48, 0.2)",
                 strokeColor: "rgba(220,220,220,1)",
                 pointColor: "rgba(220,220,220,1)",
                 pointStrokeColor: "#fff",
                 pointHighlightFill: "#fff",
                 pointHighlightStroke: "rgba(220,220,220,1)",
                 data: [65, 59, 80, 81, 56, 55, 40]
        },
             {
                 label: "My Second dataset",
                 fillColor: "rgba(128, 32, 198, 2)",
                 strokeColor: "rgba(128, 32, 198, 2)",
                 pointColor: "rgba(128, 32, 198, 2)",
                 pointStrokeColor: "#89729E",
                 pointHighlightFill: "#fff",
                 pointHighlightStroke: "rgba(151,187,205,1)",
                 data: [40, 30, 45, 18, 92, 50, 35]
        }]
     },
 });

 // Bar chart
 var ctx = document.getElementById("mybarChart");
 var mybarChart = new Chart(ctx, {
     type: 'bar',
     data: {
         labels: ["January", "February", "March", "April", "May", "June", "July"],
         datasets: [{
             label: '# of Votes',
             backgroundColor: "#89729E",
             data: [40, 30, 45, 18, 92, 50, 35]
          }, {
             label: '# of Votes',
             backgroundColor: "#317589",
             data: [70, 42, 25, 62, 72, 34, 5]
          }]
     },

     options: {
         scales: {
             yAxes: [{
                 ticks: {
                     beginAtZero: true
                 }
            }]
         }
     }
 });

 // Doughnut chart
 var ctx = document.getElementById("canvasDoughnut");
 var data = {
     labels: [
          "Wisteria Color",
          "Fresh  Color",
          "Harbor  Color",
          "Thousand herb Color",
          "Red plum Color"
        ],
     datasets: [{
         data: [120, 50, 140, 180, 100],
         backgroundColor: [
            "#89729E",
            "#5B8930",
            "#757D75",
            "#317589",
            "#DB5A6B"
          ],
         hoverBackgroundColor: [
            "#5D3F6A",
            "#48929B",
            "#BFBFBF",
            "#F9690E",
            "#4B77BE"
          ]

        }]
 };


 var canvasDoughnut = new Chart(ctx, {
     type: 'doughnut',
     tooltipFillColor: "rgba(51, 51, 51, 0.55)",
     data: data
 });

 // Radar chart
 var ctx = document.getElementById("canvasRadar");
 var data = {
     labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
     datasets: [{
         label: "My First dataset",
         backgroundColor: "rgba(100, 12, 155, 0.2)",
         borderColor: "rgba(120, 191, 153, 0.8)",
         pointBorderColor: "rgba(186, 31, 61, 0.31)",
         pointBackgroundColor: "rgba(171, 232, 6, 0.8)",
         pointHoverBackgroundColor: "#fff",
         pointHoverBorderColor: "rgb(103, 96, 96)",
          data: [ 18, 89, 35, 100,42, 48, 66]
        }, {
         label: "My Second dataset",
         backgroundColor: "rgba(38, 185, 154, 0.2)",
         borderColor: "rgba(38, 185, 154, 0.85)",
         pointColor: "rgba(38, 185, 154, 0.85)",
         pointStrokeColor: "#fff",
         pointHighlightFill: "#fff",
         pointHighlightStroke: "rgba(151,187,205,1)",
         data: [42, 48, 66, 18, 89, 35, 100]
        }]
 };

 var canvasRadar = new Chart(ctx, {
     type: 'radar',
     data: data,
 });

 // Pie chart
 var ctx = document.getElementById("pieChart");
 var data = {
     datasets: [{
         data: [120, 50, 140, 180, 100],
         backgroundColor: [
            "#89729E",
            "#5B8930",
            "#757D75",
            "#317589",
            "#DB5A6B"
          ],
         label: 'My dataset' // for legend
        }],
     labels: [
          "Wisteria Color",
          "Fresh  Color",
          "Harbor  Color",
          "Thousand herb Color",
          "Red plum Color"
        ]
 };

 var pieChart = new Chart(ctx, {
     data: data,
     type: 'pie',
     otpions: {
         legend: false
     }
 });

 // PolarArea chart
 var ctx = document.getElementById("polarArea");
 var data = {
     datasets: [{
         data: [120, 50, 140, 180, 100],
         backgroundColor: [
            "#89729E",
            "#5B8930",
            "#757D75",
            "#317589",
            "#DB5A6B"
          ],
         label: 'My dataset'
        }],
     labels: [
           "Wisteria Color",
          "Fresh  Color",
          "Harbor  Color",
          "Thousand herb Color",
          "Red plum Color"
        ]
 };

 var polarArea = new Chart(ctx, {
     data: data,
     type: 'polarArea',
     options: {
         scale: {
             ticks: {
                 beginAtZero: true
             }
         }
     }
 });
