<?php
session_start();
  if (!isset($_SESSION["success"]))
   {
      header("location: login-form.php");
   }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Open Access</title>
        <!-- .css style -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <script type="text/javascript" src="js/customscript.js"></script>
        <link type="text/css" rel="stylesheet" href="style.css">


        <style>
        .button {
            position: relative;
            background-color: #4CAF50;
            border: none;
            font-size: 8px;
            color: #FFFFFF;
            padding: 10px;
            width: 80px;
            text-align: center;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            text-decoration: none;
            overflow: hidden;
            cursor: pointer;
            float: left;
        }

        .button:after {
            content: "";
            background: #90EE90;
            display: block;
            position: absolute;
            padding-top: 300%;
            padding-left: 350%;
            margin-left: -20px!important;
            margin-top: -120%;
            opacity: 0;
            transition: all 0.8s
        }

        .button:active:after {
            padding: 0;
            margin: 0;
            opacity: 1;
            transition: 0s
        }
        </style>
        
          
        <!-- Plotly.js -->
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <!-- Canvas.js -->
        <script type="text/javascript" src="canvasjs.min.js"></script>
        </head>

        <body>
        <div class="container">
        <!----Navigation section----->
        <div class="row">
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="index.php">Open Access Cardiac</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Monitor</a></li>
                  <li><a href="#">Review</a></li>
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">Settings</a></li>
                  
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
              </div>
            </nav>
           
        </div>
        
            <div class="row participant-details">
                <div class="col-md-12">
                    <div class="col-md-8 participant-name"><h4>Participant Name: Rahul Shrestha</h4></div>
                    <div class="col-md-4 calendar-date"><h4>Calendar </h4><input id="date" type="date"/></div>
                    
                </div>
             </div>   
            <div class="row" id="circle-days">
                <div class="col-md-12 days-active">
                   <a href="#" class="circle">M</a>
                   <a href="#" class="circle">T</a>
                   <a href="#" class="circle">W</a>
                   <a href="#" class="circle">T</a>
                   <a href="#" class="circle">F</a>
                   <a href="#" class="circle">S</a>
                   <a href="#" class="circle">S</a>
                   <a href="#" class="circle">M</a>
                   <a href="#" class="circle">T</a>
                   <a href="#" class="circle">W</a>
                   <a href="#" class="circle black-circle">T</a>
                   <a href="#" class="circle black-circle">F</a>
                   <a href="#" class="circle black-circle">S</a>
                   <a href="#" class="circle black-circle">S</a>
                   <a href="#" class="circle black-circle">M</a>
                   <a href="#" class="circle black-circle">T</a>
                   <a href="#" class="circle black-circle">W</a>
                   <a href="#" class="circle black-circle">T</a>
                   <a href="#" class="circle black-circle">F</a>
                   <a href="#" class="circle black-circle">S</a>
                   <a href="#" class="circle black-circle">S</a>
                   <a href="#" class="circle black-circle">M</a>
                   <a href="#" class="circle black-circle">T</a>
                   <a href="#" class="circle black-circle">W</a>
                   <a href="#" class="circle black-circle">T</a>
                   <a href="#" class="circle black-circle">F</a>
                   <a href="#" class="circle black-circle">S</a>
                   <a href="#" class="circle black-circle">S</a>
                      
                   
                    
                    
                </div>
            </div>
            
        <div class="row">
            <div class="col-md-12">
           
            <div class="col-md-4 table-box table-bordered">
             <h4>Patient Data</h4>
                <table class="table">
                <thead>
                    <tr>
                        <th><a class="trigger" href="ecg.php">HRR%</a></th>
                        <th>51% up</th>
                    </tr>
                </thead>    
                    <tr>
                        <td><a class="trigger" href="dose.php">Dose</a></td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Km</td>
                        <td>75</td>
                    </tr>
                    <tr>
                        <td>Km/h</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>0</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-8">
                <div id="myHistogram" style="height: 30%;"></div>
                <div class="ecg-animate" style="display: none;">
                <h3>ECG</h3>
                
                            	<!-- Placeholder for the ECG chart -->
            	<div class="jke-ecgChart"></div>
            
            	<!-- Include dependencies -->
            	<script src="js/lib/jquery.min.js"></script>
            	<script src="js/lib/jquery-ui-widget.min.js"></script>
            	<script src="js/lib/d3.min.js"></script>
            
            	<!-- Include jke-d3-ecg and initialize the chart -->
            	<script src="js/jke-d3-ecg.min.js"></script>
            	<script>
            		$('.jke-ecgChart').ecgChart();
            	</script>
            
            	<!-- Include a data source to feed the ECG chart with data -->
            	<!-- In a real application this should probably be done using a WebSocket -->
            	<script src="js/datasource.js"></script>  
            </div>
                
                
            </div>
            </div>
            <script type="text/javascript">
        //Histogram part
        var trace = {
          x: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
          y : [Math.floor(Math.random() * 101),
               Math.floor(Math.random() * 101),
               Math.floor(Math.random() * 101),
               Math.floor(Math.random() * 101),
               Math.floor(Math.random() * 101),
               Math.floor(Math.random() * 101),
               Math.floor(Math.random() * 101)],

          name: '%HRR',
          marker: {color: 'rgb(55, 83, 109)'},
          type: 'bar'
        };
        var data = [trace];
        var layout = {
          xaxis: {tickfont: {
              size: 14,
              color: 'rgb(107, 107, 107)'
            }},
          yaxis: {
            titlefont: {
              size: 16,
              color: 'rgb(107, 107, 107)'
            },
            tickfont: {
              size: 14,
              color: 'rgb(107, 107, 107)'
            }
          },
          legend: {
            x: 0,
            y: 1.0,
            bgcolor: 'rgba(255, 255, 255, 0)',
            bordercolor: 'rgba(255, 255, 255, 0)'
          },
          barmode: 'group',
          bargap: 0.15,
          bargroupgap: 0.1
        };
        Plotly.newPlot('myHistogram', data, layout);


        // ECG part
        var xAxisStripLinesArray = [];
        var yAxisStripLinesArray = [];
        var dps = [];
        var dataPointsArray = [];
        for (var i = 0; i < 101; i++) {
          var newdataPointsArray = Math.floor(Math.random() * -4.5) + 4;
          dataPointsArray.push(newdataPointsArray);
        }


        var chart = new CanvasJS.Chart("ECG",
        	{
          		title:{
              	text:"ECG Report",
              },
              subtitles:[{
                  text: "Patient Name: XXX",
                  horizontalAlign: "left",
                },
                {
                  text: "Age: X-Years",
                  horizontalAlign: "left",
                },
                 {
                  text: "Doctor Sign",
                  horizontalAlign: "right",
                  verticalAlign: "bottom",
                },
        			],
              axisY:{
              	stripLines:yAxisStripLinesArray,
                gridThickness: 2,
                gridColor:"#DC74A5",
                lineColor:"#DC74A5",
                tickColor:"#DC74A5",
                labelFontColor:"#DC74A5",
              },
              axisX:{
              	stripLines:xAxisStripLinesArray,
                gridThickness: 2,
                gridColor:"#DC74A5",
                lineColor:"#DC74A5",
                tickColor:"#DC74A5",
                labelFontColor:"#DC74A5",
              },
              data: [
              {
                type: "spline",
                color:"black",
                dataPoints: dps
              }
              ]
            });

        addDataPointsAndStripLines();
        chart.render();

        function addDataPointsAndStripLines(){
        		//dataPoints
            for(var i=0; i<dataPointsArray.length;i++){
                dps.push({y: dataPointsArray[i]});
            }
            //StripLines
            for(var i=0;i<3000;i=i+100){
              if(i%1000 != 0)
                  yAxisStripLinesArray.push({value:i,thickness:0.7, color:"#DC74A5"});
            }
            for(var i=0;i<1400;i=i+20){
              if(i%200 != 0)
                  xAxisStripLinesArray.push({value:i,thickness:0.7, color:"#DC74A5"});
            }
        }


        //button function
        function HRR_button() {
          document.getElementById("ECG").hidden = true;
          document.getElementById("myHistogram").hidden = false;
          document.getElementById("HRR_button").style.background = "grey";
          document.getElementById("ECG_button").style.background = "#4CAF50";
        }
        function ECG_button() {
          document.getElementById("myHistogram").hidden = true;
          document.getElementById("ECG").hidden = false;
          document.getElementById("HRR_button").style.background = "#4CAF50";
          document.getElementById("ECG_button").style.background = "grey";
        }

        </script>
        </div>
        
        <div class="row">
            
           
            <div class="col-md-12">
                
                <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Date</th>
                        <th>HR</th>
                        <th>HR up</th>
                        <th>Min</th>
                        <th>Status</th>
                        <th>Comments</th>
                        
                    </tr>
                </thead>  
                 <tr>
                        <td>Thomas</td>
                        <td>Man</td>
                        <td>4/15/2018</td>
                        <td>40</td>
                        <td>34</td>
                        <td>0.002</td>
                        <td>Partial</td>
                        <td>N/A</td>
                 </tr>
                  <tr>
                        <td>Goerge</td>
                        <td>Man</td>
                        <td>4/15/2018</td>
                        <td>40</td>
                        <td>34</td>
                        <td>0.002</td>
                        <td>Partial</td>
                        <td>N/A</td>
                 </tr>
                  <tr>
                        <td>Amber</td>
                        <td>Man</td>
                        <td>4/15/2018</td>
                        <td>40</td>
                        <td>34</td>
                        <td>0.002</td>
                        <td>Partial</td>
                        <td>N/A</td>
                 </tr>
                  <tr>
                        <td>Mathew</td>
                        <td>Man</td>
                        <td>4/15/2018</td>
                        <td>40</td>
                        <td>34</td>
                        <td>0.002</td>
                        <td>Partial</td>
                        <td>N/A</td>
                 </tr>
                  <tr>
                        <td>Robert</td>
                        <td>Man</td>
                        <td>4/15/2018</td>
                        <td>40</td>
                        <td>34</td>
                        <td>0.002</td>
                        <td>Partial</td>
                        <td>N/A</td>
                 </tr>
                  <tr>
                        <td>Jaames</td>
                        <td>Man</td>
                        <td>4/15/2018</td>
                        <td>40</td>
                        <td>34</td>
                        <td>0.002</td>
                        <td>Partial</td>
                        <td>N/A</td>
                 </tr>
                  <tr>
                        <td>Rob</td>
                        <td>Man</td>
                        <td>4/15/2018</td>
                        <td>40</td>
                        <td>34</td>
                        <td>0.002</td>
                        <td>Partial</td>
                        <td>N/A</td>
                 </tr>
                    
                </table> 
                
            </div>
            </div>
        
        </div>

      
        
        </body>
</html>
