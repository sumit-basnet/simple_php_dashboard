<?php 
include("dbconnection.php");

$category_name="";
$cat_description="";
$errmsg="";
$str="";
$id="";

// =============================================
// for adding an category and its description
// ================================================
if(isset($_POST['submit'])){

  $category_name=$_POST['category_name'];
  $cat_description=$_POST['cat_description'];
  $query="INSERT INTO categories(category_name,cat_description) VALUES('".$category_name."' , '".$cat_description."') ";
  $result=mysqli_query($con,$query);
  // if($result)
  // {
  //   $errmsg= "data added";
  // }else{
  //   $errmsg= "data not added";
  // }

}

// =============================================
// for deleting an category and its description
// ================================================
if (isset($_GET['id'])){
    if($_GET['method']=="delete"){
        $id=$_GET['id'];
        $query="DELETE FROM categories WHERE id=".$id;
        $result=mysqli_query($con,$query);
    }

}


// =============================================
// for updating an category and its description
// ================================================

    
        

// now updating the data


        if(isset($_POST['update'])){

            $category_name=$_POST['category_name'];
            $cat_description=$_POST['cat_description'];
            $id=$_POST['id'];
            $query="UPDATE categories SET category_name='".$category_name."' , cat_description='".$cat_description."' WHERE id= '".$id."' ";
            

            // $query="UPDATE categories SET category_name='".$category_name."' , cat_description='".$cat_description."' WHERE id=".$category_id;
            $result=mysqli_query($con,$query);

            if($result){
                $errmsg="data updated ".$query;
            }else{
                $errmsg="data not updated";
            }

        }
       




// =============================================
// for Displaying an category and its description
// ================================================


$query=" SELECT*FROM categories ";
$result=mysqli_query($con,$query);
if($result){
  if(mysqli_num_rows($result)>0){
    while ($row=mysqli_fetch_assoc($result)) {
      $category_name=$row['category_name'];
      $cat_description=$row['cat_description'];
      $category_id=$row['id'];


      $str.="<tr>";
      $str.="<td>".$category_name."</td>";
      $str.="<td>".$cat_description."</td>";
             // <a href="" data-toggle="modal" data-target="#add-category" class="btn btn-primary btn-flat pull-left">Add category</a>
              // javascript:;

      $str.="<td><a href='update.php?method=update&&id=".$category_id."' cat_description='".$cat_description."' category_name='".$category_name."' category_id='".$category_id."' class='update btn btn-success btn-sm' style='margin-right:15px;'  >edit</a> ";
      $str.="<a href='category.php?method=delete&&id=".$category_id."' class='btn btn-danger btn-sm' style='margin-right:15px;'>delete</a> ";
      $str.="</tr>";  

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
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Categories<small>Managment </small></h1>

                  </div>

                  <br>

        <!-- ===================================================
          MODAL

          ==================================================== -->
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add Category</button>
          <a href="logout.php" class="btn btn-danger btn-sm" >logout<span class="badge"></span></a>

          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">



             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <!-- <label><font color="black"> Add categories</font></label> -->
               <h4 class="modal-title"><font color="black"> Add categories</font></h4>  
             </div>
             <div class="modal-body">
              <form method="POST" action="category.php">
                <label><font color="black"> Category Names</font></label>
                <input type="text" name="category_name" class="form-control" id ="category_name" value="<?php echo $category_name; ?>">



                <label><font color="black"> Category Desc:</font></label>    
                <textarea class="form-control" rows="7" name="cat_description" id="cat_description" value="<?php echo $cat_description; ?>"><?php echo $cat_description; ?></textarea>
              </div>

              <div class="modal-footer">

                <button type="submit" class="btn btn-success btn-sm" name="submit" id="add">Add</button> 
                <!-- <input type="submit" name="submit" value="add" > -->
                <input type="hidden" name="id" id="category_id">

                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">close</button>
              </form>

            </div>



          </div>
        </div>
      </div>
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
              <h3 class="panel-title">Edit Category</h3>
            </div>
            <div class="panel-body">

              <br>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Category description</th>
                    <th>Action</th>
                    <th></th>
                  </tr>  
                  <?php echo $errmsg; ?> 
                </thead>
                <tbody>
                  <?php echo $str; ?>

                </tbody>

                
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <p>Copyright AdminStrap, &copy; 2017</p>
  </footer>


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
   margin-top: 200px;
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