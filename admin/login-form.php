<?php
include_once('dblogin.php');

if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pwd'];
    
    $object = new User();
    $object->Login($uname, $pass);
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body class="form-body">
<div class="container main-section">
	<div class="row">
		<div class="col-md-12 text-center user-login-header">
			<h1>Open Access Cardiac Rehabilitation</h1>
		
		</div>
	</div>
	<div class="row">
    <form  method="post" action="login-form.php">
		<div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4 col-sm-offset-2 login-image-main text-center">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 user-image-section">
					<img src="images/businessman.png" />
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 user-login-box">
					<div class="form-group">
				  		<input type="text" class="form-control" placeholder="User Name" id="usr" name="uname" />
					</div>
					<div class="form-group">
				  		<input type="password" class="form-control" placeholder="Password" id="usr" name="pwd" />
					</div>
					<input type="submit" name="submit" class="btn btn-defualt" value="Login" />
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 last-part">
					<p>Not registered?<a href="#"> Create an account</a></p>
				</div>
			</div>
		</div>
        </form>
	</div>
</div>
</body>
</html>

