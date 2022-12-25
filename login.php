<?php
include_once 'includes/config.php';

$config = new Config();
$db = $config->getConnection();
	
if($_POST){
	
	include_once 'includes/login.inc.php';
	$login = new Login($db);

	$login->userid = $_POST['username'];
	$login->passid = md5($_POST['password']);
	
	if($login->login()){
		echo "<script>location.href='index.php'</script>";
	}
	
	else{
		echo "<script>alert('Cek Kembali Data Anda')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tiket Servis Kendaraan Operasional Shopee Xpress</title>
    <link rel="shortcut icon" href="images/spx.png" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="../img/ikmi2.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <body style="background: #FF7000;">
  
	
	
    <div class="container">
		<div class="row">
		  <div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>
		  <div class="col-xs-12 col-sm-4 col-md-4">
		  	
		  	<div style="margin-top: 100px;" class="panel panel-default"><div class="panel-body">
		  		

			<meta name="viewport" content="width=device-width, initial-scale=1">
				<style>
					.avatar {
  					vertical-align: middle;
  					width: 150px;
  					height: 150px;
  					border-radius: 50%;
  					display:block;
  					margin:0 auto 10px
					}
				</style>
					<img src="images/spx.png" alt="avatar" class="avatar">
				
					<br>

		  		<div class="text-center"><h4><b>Sistem Informasi Pembuatan Tiket Servis Kendaraan Operasional Shopee Xpress</b></h4></div>
		  		<br>
		  		
		  		<form method="post">




				  <div class="form-group">
				    <label for="InputUsername1">Username</label>
				    <input type="text" class="form-control" name="username"  id="InputUsername1" placeholder="Username">
				    
				  </div>
				  <div class="form-group">
				    <label for="InputPassword1">Password</label>
				    <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Password">
				  </div>
				  <button type="submit" class="btn btn-primary btn-rounded">Masuk</button>
				</form>
		  	</div></div>
		  	
		  </div>
		  <div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>