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
             }
         ]
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
         data: [18, 89, 35, 100, 42, 48, 66]
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

 //vertical Tab
 $(document).ready(function() {

     var w = $(window).width();
     var s = screen.width
     var width = (w > 0) ? w : s;
     //$("project figure img").
     $("project figure img").css('width', '155%');

     $("div.bhoechie-tab-menu>div.list-group>a").on("click", function(e) {
         e.preventDefault();
         $(this).siblings('a.active').removeClass("active");
         $(this).addClass("active");
         var index = $(this).index();
         $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
         $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
     });
 });