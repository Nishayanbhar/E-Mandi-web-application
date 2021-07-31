<?php   
session_start();            
include 'config.php';  

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['adharno']) || empty($_SESSION['adharno']) || empty($_SESSION['user_type_id']))
{
  header("location: ../login/login.php");
  exit;
}
$user= ($_SESSION['name']);
$role= ($_SESSION['user_type_id']);
$adharno=($_SESSION['adharno']);


// If session variable is not set it will redirect to login page

  $vegname=$_GET['vegname'];
  $ad=$_GET['ad'];
  $id=$_GET['id'];



$result = mysqli_query($link,"SELECT * FROM farmer where adharno= '$ad'");
if (mysqli_num_rows($result) == 1) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        $mobileno= $row['mobileno'];
		$adharno= $row['adharno'];
    }
}     

$result = mysqli_query($link,"SELECT * FROM vegetable where adharno= '$ad' && vname='$vegname' && id='$id'");
if (mysqli_num_rows($result) == 1) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        $image= $row['image'];
		$farmername= $row['farmername'];
		$price= $row['price'];
		$prequantity=$row['quantity'];
		$currentdate= $row['currentdate'];
		$expiredate= $row['expiredate'];
    }
}         

 
?>


<!DOCTYPE html>
<html lang="en">
   <head >

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Rushi">
      <title>E-Mandi</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="../css/style.css" rel="stylesheet" type="text/css">
      <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
       <link href="../css/footer.css" rel="stylesheet"/>
      <script src="..js/footer.js"></script>

    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="../css/mid/bootstrap.css">
    
    <!-- Main css   -->
    <link rel="stylesheet" href="../css/singlepro.css">
    <link rel="stylesheet" href="../css/mid/responsive.css">


<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<!------ Include the above in your HEAD tag ---------->
</head>
   <body onload='loadregions()' >
   
      <!--=========-TOP_BAR============-->
      <nav class="topBar">
         <div class="container">
            <ul class="list-inline pull-left hidden-sm hidden-xs">
               
                 <li><h3>An e-Vegetable Market</h3></li>
            </ul>
            <ul class="topBarNav pull-right">
 
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down ml-5"></i></span> </a>
                  <ul class="dropdown-menu w-150" role="menu">
					 <li><a href="../login/edit_profile.php?id=<?php echo $adharno;?>&&role=<?php echo $role;?>&&nm=<?php echo $user;?>">Update Profile</a>
                     </li>
                    <li>
					   <a href="#">My Orders</a>
                     </li>
                     <li><a href="../login/logout.php">Logout</a>
                     </li>
                     
                  
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-shopping-basket mr-5"></i> <span class="hidden-xs">
                  Cart <i class="fa fa-angle-down ml-5"></i>
                  </span> </a>
                  <ul class="dropdown-menu w-150" role="menu">
                     <li><a href="cart.php">View Cart</a>
                     </li>
                     <li><a href="checkout.php">Check Out</a>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
      </nav>
      <!--=========-TOP_BAR============-->
      <!--=========MIDDEL-TOP_BAR============-->
      <div class="middleBar">
         <div class="container">
            <div class="row display-table">
               <div class="col-sm-3 vertical-align text-left hidden-xs">
                  <a href="./index.php"><img width="180px" src="../img/emandi_logo.png" alt="E-Mandi"></a>
               </div>
               <!-- end col -->
               
               <!-- end col -->
               <!-- end col -->
            </div>
            <!-- end  row -->
         </div>
      </div>
      <nav class="navbar navbar-main navbar-default" role="navigation" style="opacity: 1;">
         <div class="container">
            <!-- Brand and toggle -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>             
            </div>
            <!-- Collect the nav links,  -->
            <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
               <ul class="nav navbar-nav">
                  <li><a href="customer.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Home</a></li>
                  <li><a href="feedback_form/formpage.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">FeedBack</a></li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
      </nav> 

<!-- START OF singleproduct  -->


<div >
         <div class="container">
            <div class="row">
                      <?php 
                           
                          echo '
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="women-single">
                                          <a ><img  width="250px" src="../farmer/'.$image.'" alt="">
                                          </a>

                                          <div class="hot-wid-rating">
                                              <h4><a  style="color:black;margin-left:33%;font-weight:bold;text-transform: uppercase;">'.
                                              $vegname.'
                                              </a></h4>
                                             
                                          </div>
                                      
                                      </div>
                                </div>';

                        ?>

                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="single-product-content">
                              <div class="product-review">
                                 
                                 <h4>Vegetable Details</h4>

                                 <div class="govtPrice" >
                                    <p id="test">Buy Fresh Vegetable</p>
                                 </div>
                                 <p>First shown dealer is the best according to price.</p>

                              </div>
                              
                            <form action="addtocartdb.php?vegname=<?php echo $vegname;?>&&ad=<?php echo $ad;?>" method="post">
                              <div class="single-color">
							  <p>Farmer Name:</p>
                                     <h5 ><?php echo $farmername; ?></h5>
									 <input type="hidden" name="farmername" value="<?php echo $farmername; ?>">
									 <input type="hidden" name="prequantity" value="<?php echo $prequantity; ?>">
									  <input type="hidden" name="image" value="<?php echo $image; ?>">
                                    <p>Farmer Contact No:</p>
									<h5 name="mobileno"><?php echo $mobileno; ?></h5>
									
                                    <p>Price:</p>
									<h5 ><?php echo "₹".$price; ?></h5>
									<input type="hidden" name="price" value="<?php echo $price; ?>">
									
                                  <p>Sell date</p>
								  <h5><?php echo $currentdate; ?></h5>
								  
								   <p>Expire Date</p>
								  <h5><?php echo $expiredate;?></h5>
                                </div>
                     
                                 <div class="single-color last-color-child">
                                 <div class="size-heading">
                                    <h5>Qty in Kgs :</h5>
                                 </div>
                                 <div class="size-down">
                                    <input name="quantity" type="number" step="1" min="1" max="119" name="quantity[113]" value="1" title="Qty" class="input-text qty text" size="4">
                                 </div>
                                  <div class="cart-form">
                                    <button type="submit" name="submit" class="btn btn-default">Add to Cart </button>
                                   </div>
                                
                              </div>
                                </form>
                                 
                              </div>
                             
                              

                           </div>
                          
                        </div>
                     </div>
                  </div>
                    
               </div>
            </div>
         </div>
      </div>

<!-- END OF singleproduct  -->



<!-- START OF FOOTER -->

<div class="footer-bottom">
        <div class="container">
               <div class="row">
                  <div class="col-sm-6 ">
                     <div class="copyright-text">
                        <p>CopyRight © 2017 Digital All Rights Reserved</p>
                     </div>
                  </div> <!-- End Col -->
          
               </div>
            </div>
    </div>
   </div>

   <!-- END OF FOOTER -->
      <script src="../js/jquery.js"></script>
      <script src="../js/bootstrap.js"></script>
      <script src="../js/hover.js"></script>

 
   </body>
</html>