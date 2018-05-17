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
    
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="css/jke-d3-ecg.css">
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
                <div class="col-md-4 table-bordered ecg-table">
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
                    <div class="dose-graph">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        <script>
                        
                            window.onload = function () {

                            var chart = new CanvasJS.Chart("chartContainer", {
                            	animationEnabled: true,
                            	theme: "light2",
                            	title:{
                            		text: "Dose chart"
                            	},
                            	axisY:{
                            		includeZero: false
                            	},
                            	data: [{        
                            		type: "line",       
                            		dataPoints: [
                            			{ y: 450 },
                            			{ y: 450},
                            			{ y: 570, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
                            			{ y: 480 },
                            			{ y: 490 },
                            			{ y: 500 },
                            			{ y: 480 },
                            			{ y: 480 },
                            			{ y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
                            			{ y: 500 },
                            			{ y: 480 },
                            			{ y: 510 }
                            		]
                            	}]
                            });
                            chart.render();
                            
                            }

                        </script>
                    
                    
                    </div>
                </div>
           
            </div>
         </div>
         
         <div class="row" id="dose-data-wrapper">
            
            <div class="col-md-4">
            
                <h4>PRESCRIPTION</h4>
                <p><b>%HRR:</b> X %HRR</p>
                <p><b>Duration:</b> Y min</p>

            
            </div>
            
            <div class="col-md-4">
            
                 <h4>COMMENTS</h4>
                 <p>Time-stamped comments recorded by exercise specialist during workout.</p>
               
            </div>
            
             <div class="col-md-4">
            
                 <h4>COACHING MESSAGES</h4>
                 <p>00:45 Good morning NAME, great to see you out there! Let’s start with 5 minutes at 40% HRR to warm-up,
                  then our target will be 40 minutes at 50 to 55% HRR, and we’ll finish off with a 5 minute cool-down. Let’s get started!</p>

                <p>05:07 Hi NAME, you’ve warmed up well this morning, and your heart and muscles will be primed to increase
                 the intensity level. We’re aiming to stay at 50 to 55% HRR for the next 40 minutes, so let’s increase your
                  speed a little bit more. Great work, go for it!</p>

                <p>14:58 Hi NAME, you’re working at 53% HRR so…</p>

                
            </div>
         
         </div>

        


      
        
        </body>
</html>