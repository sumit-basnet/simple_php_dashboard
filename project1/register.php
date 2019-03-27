<?php
include("dbconnection.php");
$email="";
$password="";
$flag=0;
$errormsg="";

if(isset($_POST['submit'])){
	
	
		$email=$_POST['email'];
	$password=$_POST['password'];
	$flag=1;	
	
	
	if($flag==1){
	// INSERT INTO `user1`(`id`, `email`, `password`) VALUES ([value-1],[value-2],[value-3])
		$query="INSERT INTO users(email , password) VALUES( '".$email."' , '".$password."') ";
		$data=mysqli_query($con,$query);
		if($data){
			$errormsg= "<br> data inserted ";
		}else{
			$errormsg= "<br> data not inserted";
		}
	}
	

	
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>register</title>


	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- <link href="css/style.css" rel="stylesheet">    -->
	<script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>
<body class="body1">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

		</div>
		<div id="navbar" class="collapse navbar-collapse">

		</div><!--/.nav-collapse -->
	</div>

	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center"> Mobile Bazzar <small>Registration</small></h1>
				</div>
			</div>
		</div>
	</header>

	<section id="main">
		<div class="container">


			<div class="row">
				<div class="col-md-4 col-md-offset-4">

				<br><br><br><br>


				 <div class="login-box">
				 <br><br>
    	
				<form id="login" action="register.php" method="POST" class="well">
						<span style="color:red"><?php echo $errormsg; ?></span>
						<div class="form-group has-feedback">
						
							<label>Email Address</label>

							<input name= "email" type="text" class="form-control" placeholder="Enter Email" required>
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<label>Password</label>
							<input name="password" type="password" class="form-control" placeholder="Password" required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>

						</div> <div class="row">

						<div class="col-xs-4">
							<button type="submit" name ="submit" class="btn btn-success btn-block btn-flat btn-sm">Register</button>


						</div><!-- /.col -->
					</div>
					<!-- <button type="submit" class="btn btn-default btn-block">Login</button> -->
				</form>
			</div>
			</div><!-- /.login-box -->
		</div>
	</div>
</section>


<style>
	
#header{
  background:rgba(109, 104, 104, 0.52);
  /*background:transparent;*/

  color:#ffffff;
  padding-bottom: 10px;
  margin-bottom: 15px;
}

	.well {
    min-height: 20px;
    padding: 26px;
    margin-bottom: 20px;
    background-color: rgba(181, 175, 175, 0.46);
    border: 1px solid #001d35;
    border-radius: 20px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}

.main-color-bg{
  background-color: #e74c3c !important;
  border-color: #c0392b !important;
  color:#ffffff !important;
}

.body1{
  background:url("images/loginbg.jpg");
}


</style>
<script>
	CKEDITOR.replace( 'editor1' );
</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>