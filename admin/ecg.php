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
                <table class="table">
                <thead>
                    <tr>
                        <th><a class="trigger" href="ecg.php">HRR%</a></th>
                        <th>51% up</th>
                    </tr>
                </thead>    
                    <tr>
                        <td>Dose</td>
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
                <div class="ecg-animate">
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
         </div>
         
         <div class="row">
            
            <div class="col-md-6">
            
                <h4>SYMPTOMS, ECG</h4>
                <p>Angina-mild, barely noticable</p>
            
            </div>
            
            <div class="col-md-6">
            
                 <h4>COMMENTS</h4>
                 <p>05:07 Hi NAME, you’ve warmed up well this morning, and your heart
                  and muscles will be primed to increase the intensity level. We’re aiming
                  to stay at 50 to 55% HRR for the next 40 minutes, so let’s increase your
                   speed a little bit more. Great work, go for it!</p>
                   
                 <p>Hi NAME, you’re working at 53% HRR so…</p>  
            
            
            </div>
         
         </div>

        


      
        
        </body>
</html>