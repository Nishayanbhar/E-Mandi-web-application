<?php
// Initialize the session
session_start();
 
include 'config.php';

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['adharno']) || empty($_SESSION['adharno']) || empty($_SESSION['user_type_id']))
{
  header("location: ../login/login.php");
  exit;
}
$user=$_SESSION['name'];
$role= ($_SESSION['user_type_id']);
$adharno=($_SESSION['adharno']);
?>


<!DOCTYPE html>
<html lang="en">
   <head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
      <script src="../js/footer.js"></script>    
	   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"> </script>
                   <script >
 
							function show1()
							{
								document.getElementById('new').style.display = 'block';
								document.getElementById('old').style.display = 'none';
								 //$("#new").show();
								  //$("#old").hide();
								 
							}
							function show2()
							{
								//$("#old").show();
								//$("#new").hide();
								 document.getElementById('old').style.display = 'block';
						         document.getElementById('new').style.display = 'none';
							}
						</script>
    <link rel="stylesheet" href="../css/mid/style(1).css">
    <link rel="stylesheet" href="../css/mid/responsive.css">




<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<!------ Include the above in your HEAD tag ---------->

<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    margin-left: 18%;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}


.button1:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>


   </head>
   <body>
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
                    <li><a href="cart.php">My Orders</a>
                     </li>
                     <li><a href="../login/logout.php">Logout</a>
                     </li>
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
                     <li><a href="checkout.html">Check Out</a>
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
                  <li><a href="customer.php" class="dropdown-toggle"   data-close-others="false">Home</a></li>
                  <li><a href="../feedback_form/formpage.html" class="dropdown-toggle"   data-close-others="false">FeedBack</a></li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
      </nav> 
								
<!-- START OF NATURES BASKET -->
<form action="payment.php" method="post">
  <div>
    <!-- BILL-SHIP-AREA   -->
    <section class="bill-ship section-padding">
        <div class="container">
            <div class="row">
                 <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="headline">
                        <h2>Order summary</h2>
                    </div>
                    <div class="summary">
                        <h2>Products<span>Total</span></h2>
                        <?php
                        include 'config.php';
                                    $result = mysqli_query($link,"select * from cart where user_adharno='$adharno' && paymentstatus='NO'");
                                    $total=0;
									$cnt=0;
                                    if (mysqli_num_rows($result))
										{
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) 
										{
											$pid= $row["id"];
                                            $vegname= $row["vname"];
                                            $quantity=$row["quantity"];
                                            $price=$row["price"];
											$fadharno=$row["farmer_adharno"];
											$total_product=$quantity*$price;
                                            $total=$total+$total_product;
                                            echo '<p>'.$vegname.' ( '.$quantity.' )<span> ₹ '.$total_product.'</span> </p>';
											$cnt++;
											
                                          }
										  echo "$cnt";
                                        }
                                        else
										{
									     ?>
										 <input type="text" name="noproduct" hidden value="no product" >
                                          <?php
                                         echo "<td><font color='red'>0 Products in your Cart</font></td>";
                                          
                                        }
                        ?>
						
		                          
                        <h3 class="line">Cart subtotal<span>₹ <?php echo $total;  ?></span></h3>
                        <h3 class="line2">Shipping<span class="mcolor">Free shipping</span></h3>
                        <h5>Order Total Price<span>  ₹ <?php echo $total;  ?></span></h5>
						<input type="text" name="total_price" hidden value="<?php echo $total;?>" >
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="headline">
                       <h2>Shipping address</h2>
                   </div>
				 
		                           <?php 
								 
								    $result = mysqli_query($link,"select * from users where adharno='$adharno' && user_type_id='4'");
								         
                                        while($row = mysqli_fetch_assoc($result))
										{
											$name=$row["name"];
											$add=$row["address"];
											$city=$row["city"];
											$zip=$row["zip"];
											$mobile=$row["mobileno"];
											
										}
								  
								  
								   ?>
								
                    <div class="Shipping" id="shippingadd">
                      <input type="radio" name="isPrimary" id="member_1" value="yes" checked onclick="javascript:show2();"> Ship to Primary Address
                      <input type="radio" name="isPrimary" id="member_0" value="no" onclick="javascript:show1();"> Ship to New Address
                      <div id="old">
						<div  class="ship-single" >
							  <input type="text" name="fadharno" hidden value="<?php echo $fadharno;?>" >
							  <input type="text" name="pid" hidden value="<?php echo $pid;?>" >
							  <input type="text" name="vname" hidden value="<?php echo $vegname;?>" >
							  <input type="text" name="price" hidden value="<?php echo $price;?>" >
							  <input type="text" name="quantity" hidden value="<?php echo $quantity;?>" >
                              <input type="text" name="name" placeholder="Full Name"  value="<?php echo $name;?>">
							  
                                <input type="text" name="address" placeholder="Address" value="<?php echo $add;?>">
                            
                                <input type="text" name="city" placeholder="City" value="<?php echo $city;?>">
                         
                             </div>
                        <div class="ship-tow" >
                            <div class="ship-left">
                                
                                <input type="text" name="zip" placeholder="Postcode / ZIP" value="<?php echo $zip;?>">
                            
                            </div>
                            <div class="ship-right">
                                
                                <input type="text" name="mobileno" placeholder="Mobile No" value="<?php echo $mobile;?>">
                            
                            </div>

                        </div>
					</div>
					
					    <div id="new" style="display:none">
						<div  class="ship-single" >
							
                              <input type="text" name="new_name" placeholder="Full Name">
							  
                                <input type="text" name="new_address" placeholder="Address" >
                            
                                <input type="text" name="new_city" placeholder="City" >
                         
                             </div>
                        <div class="ship-tow" >
                            <div class="ship-left">
                                
                                <input type="text" name="new_zip" placeholder="Postcode / ZIP" >
                            
                            </div>
                            <div class="ship-right">
                                
                                <input type="text" name="new_mobileno" placeholder="Mobile No" >
                            
                            </div>

                        </div>
					</div>
                  </div>
                   
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">

                </div>
            </div>
        </div>
    </section>
    <!-- BILL-SHIP-AREA:END   --> 
  
    <!-- PAYMENT-AREA   --> 
    <section class="payment-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline">
                        <h2>Select Payment Mode</h2>
                    </div>
                    <div class="payment">
                    <div class="bank">
                        <input type="radio"  name="optradio" value="upi">&nbsp&nbsp BHIM UPI ID<br>
                        <div class="b_text"><p></p></div>
                    </div>
                    <div class="bank-radio">
                        <label>
                            <input type="radio" name="optradio" value="cash">Cash On Delivery</label>
                        <br>
                        <label>
                            <input type="radio" name="optradio" value="paytm">PayTM<img width ="60px"src="../checkout_files/paytm.png" alt="">
                        </label><br>
                        <label>
                            <input type="radio" name="optradio" value="card">Paypal<img src="../checkout_files/master-card.png" alt="">
                        </label><br>
                        <button type="submit" name="submit" class="btn btn-default right-cart">Place order</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- PAYMENT-AREA:END   -->
    </div>
 </form>

<!-- END OF NATURES BASKET -->
      <div class="clearfix"></div>
   </div>
</div>

</div>
<div class="footer-bottom">
        <div class="container">
               <div class="row">
                  <div class="col-sm-6 ">
                     <div class="copyright-text">
                        <p>CopyRight © 2020 Digital All Rights Reserved</p>
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
