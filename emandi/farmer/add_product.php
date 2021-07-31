<?php
// Initialize the session
session_start();
 
include('config.php');

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['adharno']) || empty($_SESSION['adharno']) || empty($_SESSION['user_type_id']))
{
  header("location: ../login/login.php");
  exit;
}
$user= ($_SESSION['name']);
$role= ($_SESSION['user_type_id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Vegetables</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
	<script>
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgdis')
                        .attr('src', e.target.result)
                        .width(340)
                        .height(230);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
  </head>

  <body>
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="./farmer.php">
          <h1 class="tm-site-title mb-0">Farmer Dashboard</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fas fa-tachometer-alt"></i> Order
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_product.php" >
                <i class="far fa-file-alt"></i>
                <span> View Products  </span>
              </a>
             </li>
            <li class="nav-item">
              <a class="nav-link active" href="add_product.php">
                <i class="fas fa-shopping-cart"></i>Add Products
              </a>
            </li>
			<li class="nav-item">
                 <a class="nav-link" href="farmer.php">
                    <i class="far fa-user"></i>
                     Home
                 </a>
              </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="../login/logout.php">
               Farmer, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Vegetable</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form method="post" action="" enctype='multipart/form-data' >
                  <div class="form-group mb-3">
                    <label for="name">Vegetable Name </label>
                    <input name="pname"type="text" class="form-control validate" required/>
                  </div>
				  <div class="form-group mb-3">
                    <label for="price">Price Per Unit</label>
                    <input name="price" type="text" class="form-control validate" required/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="quantity">Quantity</label>
                    <input name="quantity" type="text" class="form-control validate" required/>
                  </div>
                  <div class="row">
				   <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="unit">Unit</label>
                          <input  name="unit" type="text" class="form-control validate" required/>
                        </div>
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="expire_date">Expire Date</label>
                          <input id="expire_date" name="expiredate" type="text" class="form-control validate" data-large-mode="true"/>
                        </div>
                  </div>
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
				 <input  id="imgdis" src="#" type="image" alt="" />
			 </div>
                <div class="custom-file mt-3 mb-3">
                  <input type="file" name="file" class="btn btn-primary btn-block mx-auto" onchange="readURL(this);" />
                </div>
              </div>
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Add Product </button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2020</b> All rights reserved. 
        </p>
        </div>
    </footer> 

    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() 
	  {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>

<?php

 if(isset($_POST['submit']))
 {
$adharno=$_SESSION['adharno'];	 
$product_name=$_POST['pname']; 
$price=$_POST['price'];
$unit=$_POST['unit'];
$quantity=$_POST['quantity'];
$expiredate=date('Y-m-d',(strtotime($_POST['expiredate'])));
				
                 $sqli ="SELECT vname FROM vegetable where vname ='$product_name' && adharno='$adharno'";
				 $result = mysqli_query($link, $sqli);
				 while($row = mysqli_fetch_assoc($result)) 
				{
					$oldproduct=$row["vname"];
				}

if($product_name==$oldproduct)
{
	echo "<script> alert('Already Exist this Product'); window.location.href='add_product.php'; </script> ";
}
else
{	
if($_FILES["file"]["name"]!='')
{	  
      $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");  
      $url="./product_image/";

      $upload_exts = end(explode("." ,$_FILES["file"]["name"]));
      $name=rand(455542,12556).''.date("Y_m_d");
      $image="$url$name.$upload_exts";
      $filename="$name.$upload_exts";
	  
      
      move_uploaded_file($_FILES["file"]["tmp_name"],"product_image/" . $filename); 
}
include('config.php');
	$flag=0;
	if($adharno!='' && $product_name!='')
	{
	$sql = "insert into vegetable(adharno,farmername,vname,image,price,unit,quantity,expiredate) values ('$adharno','$user','$product_name','$image','$price','$unit','$quantity','$expiredate')";
    mysqli_query($link,$sql);
	$flag=1;
	}
	else
	{
		echo "<script> alert('You are not Valid User); window.location.href='./index.php'; </script> ";
	}
	if($flag==1)
	{ 
	echo "<script> alert('Add Successfully.'); window.location.href='view_product.php'; </script> ";   
	}
	else
	{
	echo "<script> alert('Failed..!'); window.location.href='add_product.php'; </script> ";     
	}
 }
}

?>