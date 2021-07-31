<?php
session_start();
// Initialize the session
 include '../login/config.php';

 // If session variable is not set it will redirect to login page
if(!isset($_SESSION['adharno']) || empty($_SESSION['adharno']) || empty($_SESSION['user_type_id']))
{
  header("location: ../login/login.php");
  exit;
}
$adharno= ($_SESSION['adharno']);
$user= ($_SESSION['name']);
$role= ($_SESSION['user_type_id']);

if(isset($_GET['empty']))
{
    echo('<script>alert("Cart is Empty")</script>');
}



if (isset($_POST['clearCart']))
{
         
             $stmt = mysqli_prepare($link,"delete from cart where user_adharno='$adharno' and paymentstatus='NO'");
             if(mysqli_stmt_execute($stmt))
			 {
                echo('<script>alert("Cart Cleared")</script>');

            } 
			else
			{
               echo('<script>alert("Something went wrong. Please try again later.")</script>');
            }
            }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>E-Mandi|Cart</title>
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
      <script src="./js/footer.js"></script>
      <!-- Bootstrap css      -->
      <link rel="stylesheet" href="../css/mid/bootstrap.css">
      <!-- Main css   -->
      <link rel="stylesheet" href="../css/mid/style(1).css">
      <link rel="stylesheet" href="../css/mid/responsive.css">
      <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <!--FAV ICON-->
      <link rel="apple-touch-icon" sizes="57x57" href="../img/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="../img/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="../img/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="../img/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="../img/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="../img/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="../img/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="../img/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="../img/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
      <link rel="manifest" href="../img/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="../img/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
   </head>
   <body>

      <!--=========-TOP_BAR============-->
      <nav class="topBar">
         <div class="container">
            <ul class="list-inline pull-left hidden-sm hidden-xs">
                 <li><h3>An E-vegetable Market</h3></li>
            </ul>
            <ul class="topBarNav pull-right">
              
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down ml-5"></i></span> </a>
                  <ul class="dropdown-menu w-150" role="menu">
                    
                    <li><a href="../login/edit_profile.php?id=<?php echo $adharno;?>&&role=<?php echo $role;?>&&nm=<?php echo $user;?>">Update Profile</a>
                     </li>
                   <li><a href="order.php">My Order</a>
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
                  <a href="customer.php"><img width="180px" src="../img/emandi_logo.png" alt="E-Mandi"></a>
               </div>
               <!-- end col -->
            </div>
            <!-- end  row -->
         </div>
      </div>
      <nav class="navbar navbar-main navbar-default" role="navigation" style="opacity: 1;">
         <div class="container">
            <!-- Brand and toggle -->
          
            <!-- Collect the nav links,  -->
            <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
               <ul class="nav navbar-nav">
                  <li><a href="customer.php" class="dropdown-toggle"   data-close-others="false">Home</a></li>
                  <li><a href="../feedback_form/formpage.php" class="dropdown-toggle"  data-close-others="false">FeedBack</a></li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
      </nav>
      <!-- START OF NATURES BASKET -->
      <!-- PAGE-TITLE-AREA:END -->
      <!-- BREADCRUMBS -->
      <!-- BREADCRUMBS:END -->
      <!-- SHOPING-CART-AREA   -->
      <div class="shoping-cart section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="headline">
                     <h2>Shopping cart</h2>
                  </div>
                  <div class="table-responsive">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
						      <th class="cart-product item">SR NO</th>
                              <th class="cart-product item">Product</th>
                              <th class="cart-product-name item">Vegetable Name</th>
                              <th class="cart-qty item">Quantity</th>
                              <th class="cart-unit item">Unit price</th>
                              <th class="cart-delivery item">Delivery info</th>
                              <th class="cart-sub-total last-item">Sub total</th>
							  <th class="cart-product-name item">Action</th>
                           
                           </tr>
                        </thead>
                        <!-- /thead -->
                        <tfoot>
                           <tr>
                              <td colspan="7">
                                 <div class="shopping-cart-btn">
                                   
                                    <a href="customer.php" type="button" class="btn btn-default left-cart">Continue Shopping</a>

                                     <form action="" id="form1" method="post">
                                       <input name="clearCart" type="submit" class="btn btn-default right-cart"  value ="Clear shopping cart"   
                                       onclick="return confirm('Are you sure want to clear cart?')"
                                       />
                                    </form>
                                    
                                 </div>
                                 <!-- /.shopping-cart-btn -->
                              </td>
                           </tr>
                        </tfoot>
                        <tbody>
                          <?php
                              include 'config.php';
                                       $totalprice=0;
										$adharno=$_SESSION['adharno'];

                            $result1 = mysqli_query($link,"select * from cart where user_adharno='$adharno' && paymentstatus='NO'");

                              if (mysqli_num_rows($result1)) 
							  {
                              // output data of each row
							  $srno=0;
                                while($row = mysqli_fetch_assoc($result1)) 
								{ 
							          $srno++;
                                      $vegname= $row["vname"];
                                      $price= $row["price"];
                                      $quantity=$row["quantity"];
                                      $totalprice= $totalprice+ $quantity*$price;
                                      $image=$row["image"];
									  $id=$row["id"];
									  $farmername=$row["farmername"];
                                      echo ' 

                                            <tr>
													<td class="cart-product-quantity">
                                                       <div class="quant-input">
                                                         '.$srno.'
                                                       </div>
                                                    </td>
                                                    <td class="cart-image">
                                                       <a class="entry-thumbnail">
                                                       <img src="../farmer/'.$image.'" width="100px" alt="">
                                                       </a>
                                                    </td>
                                                    <td class="cart-product-name-info">
                                                       <div class="cc-tr-inner">
                                                          <h4 class="cart-product-description"><a>'.$vegname.'</a></h4>
                                                         
                                                       </div>
                                                    </td>
                                                    <td class="cart-product-quantity">
                                                       <div class="quant-input">
                                                         '.$quantity.'
                                                       </div>
                                                    </td>
                                                    <td class="cart-product-price">
                                                       <div class="cc-pr">₹'.$price.'</div>
                                                    </td>
                                                    <td class="cart-product-delivery">
													   <font color="black">Farmer Name:-  '.$farmername.'</font>
													  <div class="cc-pr">  <font color="blue">Free shipping</font></div>
                                                    </td>
                                                    <td class="cart-product-sub-total">
                                                       <div class="cc-pr"> ₹ '.$quantity*$price.'</div>
                                                    </td>
													<td class="cart-product-sub-total">
                                                       <div class="cc-pr"><a href="delete_product.php?ad='.$adharno.'&&vn='.$vegname.'&&id='.$id.'"><span class="glyphicon glyphicon-trash"></span></a>
                                                       </div>
                                                    </td>
                                                  
                                          </tr>

                                            ';                                                  

                                      }
                                }
								else
								{
									echo '<td><font color="red">No Product In Cart</font></td>';
									
								}

                          ?>                          
                        </tbody>
                        <!-- /tbody -->
                     </table>
                     <!-- /table -->
                  </div>
               </div>
            </div>
         </div>
      </div>
	  
      <!-- SHOPING-CART-AREA:END   -->
      <!-- SHOPING-CART-BOTTOM-AREA   -->
      <div class="shoping-cart-bottom-area">
         <div class="container">
            <div class="row" >
               <div >
                  <div class="checkout">
                     <p>Subtotal<span>₹<?php  echo $totalprice ?></span>
                     </p>
                     <h4>Grandtotal<span>₹<?php  echo $totalprice ?></span></h4>
					 <?php if($totalprice>=2){?>
                     <a href="checkout.php" type="button" class="btn btn-default right-cart">Proceed to checkout</a>
					 <?php }
					 else
					 {?>
						 <a href="customer.php"><img src="./cartimg.gif" height="150" width="150"></a><h5>~~ Please Till 300 Rs Or More ~~</h5>
					<?php }
					 ?>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Entire FOOTER:END -->
      <!-- jQuery latest -->
      <script type="text/javascript" src="./cart/jQuery.2.1.4.js.download"></script>
      <!-- js Modernizr -->
      <script src="./cart/modernizr-2.6.2.min.js.download"></script>
      <!-- Bootsrap js -->
      <script src="./cart/bootstrap.min.js.download"></script>
      <!-- Plugins js -->
      <script src="./cart/plugins.js.download"></script>
      <!-- Custom js -->
      <script src="./cart/main.js.download"></script>
      <!-- END OF NATURES BASKET -->
      <!--start of footer -->
      <div class="footer-bottom">
         <div class="container">
            <div class="row">
               <div class="col-sm-6 ">
                  <div class="copyright-text">
                     <p>CopyRight © 2021 Digital All Rights Reserved</p>
                  </div>
               </div>

            </div>
         </div>
      </div>
      </div>
      <!-- end of footer -->
      <script src="./js/jquery-3.1.1.js"></script>
      <script src="./js/bootstrap.js"></script>
      <script src="../js/hover.js"></script>
   </body>
</html>