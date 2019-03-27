<?php

session_start();
include("dbconnection.php");
$errormsg="";
$email="";
$password="";

if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $query="SELECT * FROM users WHERE email='".$email."' AND password='".$password."'  ";
  $result=mysqli_query($con,$query);

  if($result){
    if(mysqli_num_rows($result)>0){
      while ($row=mysqli_fetch_assoc($result)) {
      // $errormsg= "user found";
        $id=$row['id'];
      }
      $_SESSION['id']=$id;
      header("location:category.php");
    }else{
      $errormsg= "users not found";
    }
  }
}
// else{
//   $errormsg = "database error";
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Area | Account Login</title>

  <!-- Bootstrap core CSS -->


  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">   
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>
<body class="body1" >

  <!-- <img="images/loginbg.jpg"> -->

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
          <h1 class="text-center"> Mobile Bazzar <small>Admin Login</small></h1>
        </div>
      </div>
    </div>
  </header>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">

          <br><br>
          <form id="login" method="POST" action="login.php" class="well">
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
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div><!-- /.col -->
          

          <!-- <button type="submit" class="btn btn-default btn-block">Login</button> -->
          <a href="register.php" class='update btn btn-success btn-sm'>Register Now</a><br>
        </form>

      </div>
    </div>
  </div>
</section>
<br><br><br>
<footer id="footer">
  <p>Copyright MobileBazzar, &copy; 2017</p>
</footer>

<!-- ===================================================
          STYLING 

          ==================================================== -->


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

            #footer{
             /* background:#605f5f;*/
             background:rgba(109, 104, 104, 0.52);
             color:#ffffff;
             text-align:center;

             padding: 18px;
             margin-top: 54px;
           }
           /*=========================================================================*/


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