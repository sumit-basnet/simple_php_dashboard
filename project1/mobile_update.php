<?php
session_start(); 
include("dbconnection.php");
$str="";
$errmsg = "";
$mobile_name="";
$mobile_model="";
$mob_description="";
$category_id="";
$user_id="";
$id="";

// =============================================
//                  update DATA
// ================================================
// =============================================
//                  GET DATA
// ================================================

if(isset($_GET['id'])){
if(isset($_GET['method'])=="update"){
$id=$_GET['id'];

$query=" SELECT * FROM mobiles WHERE id=" .$id;
$result=mysqli_query($con,$query);

if($result){
  if(mysqli_num_rows($result)>0){
    while ($row=mysqli_fetch_assoc($result)) {

  $mobile_name=$row['mobile_name'];
  $mobile_model=$row['mobile_model'];
  // $category_id=$row['category-id'];
  $mob_description=$row['mob_description'];
      // $str.='<option value="'.$category_id.'">'.$category_name.'</option>';          

    }

  }
  }else{
      $errmsg="database error";
}

}



}elseif(isset($_POST['submit'])){
  $mobile_name=$_POST['mobile_name'];
  $mobile_model=$_POST['mobile_model'];
  $category_id=$_POST['category_id'];
  $mob_description=$_POST['mob_description'];
  echo $mobile_name;
  $user_id=$_SESSION['id'];
  
  
    $query=" UPDATE mobiles SET(mobile_name,mobile_model,mob_description,category_id,user_id) VALUES ('".$mobile_name."','".$mobile_model."','".$mob_description."','".$category_id."','".$user_id."'')  ";
    $result=mysqli_query($con,$query);
    print_r($result);
    if($result){
      echo "data added successfully";
      header('location:mobile.php');
    }else{
      echo "data not added successfully";
      echo '<p style="color:white;margin-left:100px;>'.$query.'</p>';
    }


  

}else{
  $errmsg= "submit error";
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
				<div class="col-md-12">
			<div class="row">
					<h1 class="text-center"> Update <small>category</small></h1>
				</div>
			</div>
		</div>
	</header>

	
	<!-- ========================================================================= -->

                                        <div class="content-wrapper">    
                                          <!-- Main content -->
                                          <section class="content">
                                            <!-- quick CMS widget -->
                                            <section class="col-md-8 col-sm-8 col-xs-12">
                                              <div class="box box-info">
                                                <div class="box-header">
                                                  <i class="fa fa-edit"></i>
                                                  <!-- <h3 class="box-title">Add Article</h3> -->
                                                  <p style="color:red"><?php echo $errmsg; ?></p>
                                                </div>
                                                <div class="box-body">
                                                  <form action="mobile_update.php" method="post" name="news-form" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                      <input type="text" id="article-title" class="form-control" name="mobile_name" value="<?php echo $mobile_name; ?>">
                                                      <br>
                                                      <input type="text" id="article-title" class="form-control" name="mobile_model" value="<?php echo $mobile_model; ?>">
                                                    </div>
                                                    <br>
                                                    <div>
                                                      <textarea class="textarea" name="mob_description" name="editor1" value="<?php echo $mob_description; ?>"  style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                    </div>

                                                  </div>
                                                  <div class="box-footer clearfix">
                                                    <span class="alert alert-green"></span>
                                                    <span class="alert alert-red"></span>                    
                                                    <button type="submit" name="submit" id="submit" class="pull-left btn btn-success" id="saveArticle">update mobile <i class="fa fa-arrow-circle-right"></i></button>
                                                  </div>
                                                </div>
                                              </section><!-- col-md-7 -->
                                              <section class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="box box-success">
                                                  
                                                  <div class="box-body" id="featured-image-box">
                                                    
                                                  </form>
                                                </div>
                                              </div>
                                            </section><!-- col-md-5 -->
                                          </section><!-- /.content -->
                                        </div><!-- /.content-wrapper -->

 <!-- ================================================================================== -->



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