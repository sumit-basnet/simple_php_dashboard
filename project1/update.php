<?php
include("dbconnection.php");
$category_name="";
$category1_name="";

$cat_description="";
$flag=0;
$errormsg="";

if(isset($_GET['id'])){
	$id=$_GET['id'];

	$query="SELECT*FROM categories WHERE id=".$id;
	$result=mysqli_query($con,$query);
	if($result){
		if(mysqli_num_rows($result)>0){
			while ($row=mysqli_fetch_assoc($result)) {

				$category_name=$row['category_name'];
				$cat_description=$row['cat_description'];

			}

		}
	}else{
		echo "data not found";
	}

}elseif(isset($_POST['submit'])){
	
	$id=$_POST['id'];
	$category1_name=$_POST['category_name'];
	$cat_description=$_POST['cat_description'];
	$flag=1;	
	
	
	if($flag==1){
	
		$query="UPDATE categories SET  category_name='".$category1_name."' , cat_description='".$cat_description."' WHERE id= ".$id;

		$data=mysqli_query($con,$query);
		if($data){
			$errormsg= "<br> data inserted ";
			header('location:category.php');
		}else{
			$errormsg= "<br> data not inserted";
		}
	}	
}else{
	echo "not submitted";
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
					<h1 class="text-center"> Update <small>category</small></h1>
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

						<form id="login" action="update.php" method="POST" class="modal-content">
							<span style="color:red"><?php echo $errormsg; ?></span>
							<div class="form-group has-feedback">

								<label>Category Name</label>

								<input type="text" name="category_name" class="form-control" value="<?php echo $category_name; ?>">
								<span class="glyphicon glyphicon-pencil form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label>Category Description</label>
								<!-- <input name="textbox" type="password" class="form-control" placeholder="Password" required> -->
								<textarea class="form-control" rows="10" name="cat_description" id="cat_description" value="<?php echo $cat_description; ?>"><?php echo $cat_description; ?></textarea>

								<span class="glyphicon glyphicon-font form-control-feedback"></span>

							</div> <div class="row">

							<div class="col-xs-4">
								<button type="submit" name ="submit" class="btn btn-success btn-block btn-flat btn-sm">Update</button>
								<input type="hidden" name="id" value="<?php echo $id; ?>">


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

	.modal-content {
		position: inherit;
		background-color: rgba(251, 251, 251, 0.23);
		-webkit-background-clip: padding-box;
		background-clip: padding-box;
		border: 1px solid #999;
		border: 1px solid rgba(0,0,0,.2);
		border-radius: 6px;
		outline: 0;
		-webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
		box-shadow: 0 3px 9px rgba(0,0,0,.5);
		height: 373px;
		padding-left: 10px;
		padding-right: 5px;
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