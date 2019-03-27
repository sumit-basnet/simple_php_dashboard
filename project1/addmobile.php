<?php
session_start(); 
include("dbconnection.php");
$str="";
$errmsg = "";
$mobile_name="";
$mobile_model="";
$category_id="";
$user_id="";

// =============================================
//                  insert DATA
// ================================================
if(isset($_POST['submit'])){
  $mobile_name=$_POST['mobile_name'];
  $mobile_model=$_POST['mobile_model'];
  $category_id=$_POST['category-id'];
  $mob_description=$_POST['mob_description'];
  echo $mobile_name;
  $user_id=$_SESSION['id'];
  $random_str=md5($mobile_name.time());
  $image_url='images/'.$random_str.$_FILES['file']['name'];
  $data=move_uploaded_file($_FILES['file']['tmp_name'] , $image_url);
  if($data){
    $query=" INSERT INTO mobiles(mobile_name,mobile_model,mob_description,category_id,user_id,image) VALUES ('".$mobile_name."','".$mobile_model."','".$mob_description."','".$category_id."','".$user_id."','".$image_url."')  ";
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
    $errmsg= "data not found ";
  }


}else{
  $errmsg= "submit error";
}


// =============================================
//                  GET DATA
// ================================================


$query=" SELECT * FROM categories ";
$result=mysqli_query($con,$query);

if($result){
  if(mysqli_num_rows($result)>0){
    while ($row=mysqli_fetch_assoc($result)) {
      $category_name=$row['category_name'];
      $cat_description=$row['cat_description'];
      $category_id=$row['id'];
      $str.='<option value="'.$category_id.'">'.$category_name.'</option>';          

    }

  }else{
    $errmsg="data not found";
  }
}else{
  $errmsg="database error";
}
?>





                          <!-- ===================================================
                                          HTML

                         ==================================================== -->


                         <!DOCTYPE html>
                         <html lang="en">
                         <head>
                          <meta charset="utf-8">
                          <meta http-equiv="X-UA-Compatible" content="IE=edge">
                          <meta name="viewport" content="width=device-width, initial-scale=1">
                          <title>Admin Area | categories</title>
                          <!-- Bootstrap core CSS -->
                          <link href="css/bootstrap.min.css" rel="stylesheet">
                          <link href="css/style.css" rel="stylesheet">
                          <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
                        </head>
                        <body class="body1">



                          <header id="header">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-10">
                                  <h1><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Add<small>Mobile </small></h1>

                                </div>

                                <br>


                                <a href="logout.php" class="pull-right btn btn-danger btn-sm" >logout<span class="badge"></span></a>


                              </div>
                            </header>



                            <section id="main">
                              <div class="container">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="list-group">
                                      <a href="#" class="list-group-item active main-color-bg">
                                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                                      </a>
                                      <a href="category.php" class="list-group-item"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> categories <span class="badge"></span></a>
                                      <a href="mobile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Mobiles<span class="badge"></span></a>
                                      <!-- <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">203</span></a> -->
                                    </div>


                                  </div>
                                  <div class="col-md-9">
                                    <!-- Website Overview -->
                                    <div class="panel panel-default">
                                      <div class="panel-heading main-color-bg">
                                        <h3 class="panel-title">Add Mobiles</h3>
                                      </div>
                                      <div class="panel-body">
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
                                                  <form action="addmobile.php" method="post" name="news-form" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                      <input type="text" id="article-title" class="form-control" name="mobile_name" placeholder="Mobile name here...">
                                                      <br>
                                                      <input type="text" id="article-title" class="form-control" name="mobile_model" placeholder="Mobile model here...">
                                                    </div>
                                                    <input type="file" class="btn" name="file"></br>
                                                    <div>
                                                      <textarea class="textarea" name="mob_description" name="editor1" placeholder="Your Description goes here..." style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                    </div>

                                                  </div>
                                                  <div class="box-footer clearfix">
                                                    <span class="alert alert-green"></span>
                                                    <span class="alert alert-red"></span>                    
                                                    <button type="submit" name="submit" id="submit" class="pull-right btn btn-primary" id="saveArticle">Add mobile <i class="fa fa-arrow-circle-right"></i></button>
                                                  </div>
                                                </div>
                                              </section><!-- col-md-7 -->
                                              <section class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="box box-success">
                                                  <div class="box-header">
                                                    <i class="fa fa-picture-o"></i>
                                                    <h3 class="box-title">Category</h3>
                                                  </div>
                                                  <div class="box-body" id="featured-image-box">
                                                    <div class="form-group">Select Category:
                                                      <select name ="category-id" id="category-list">
                                                        <?php echo $str; ?>
                                                      </select>
                                                    </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </section><!-- col-md-5 -->
                                          </section><!-- /.content -->
                                        </div><!-- /.content-wrapper -->

 <!-- ================================================================================== -->



                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </section>

<!--   <footer id="footer">
    <p>Copyright AdminStrap, &copy; 2017</p>
  </footer> -->


  <style>
   .modal-title {
    margin: 0;
    line-height: 1.42857143;

  }

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
  #footer{
   /* background:#605f5f;*/
   background:rgba(109, 104, 104, 0.52);
   color:#ffffff;
   text-align:center;

   padding: 18px;
   margin-top: 20px;
 }

 .main-color-bg {
  background-color: rgba(50, 91, 119, 0.78) !important;
  border-color: #001e36 !important;
  color: #f1f5f8 !important;
}

.panel-body {
  padding: 15px;
  background-color: rgba(3, 48, 69, 0.28);
  color: #012437;
}
.btn-info {
  color: #fafcfe;
  background-color: #31778c;
  border-color: #394554;

}


</style>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>

  <script>
   CKEDITOR.replace( 'editor1' );
 </script>