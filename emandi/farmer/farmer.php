<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['adharno']) || empty($_SESSION['adharno']) || empty($_SESSION['user_type_id']))
{
  header("location: ../login/login.php");
  exit;
}

$user= ($_SESSION['name']);
$role= ($_SESSION['user_type_id']);
$adharno=($_SESSION['adharno']);
?>

<!DOCTYPE html>
<html lang="en">
   <head>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="rushi">
      <title>Farmer</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="../css/style.css" rel="stylesheet" type="text/css">
      <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
       <link href="../css/footer.css" rel="stylesheet"/>
      <script src="..js/footer.js"></script>
    
    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="../css/mid/bootstrap.css">

    <!-- Main css   -->
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
                 <li><h3>An E-vegetable Market</h3></li>
            </ul>
            <ul class="topBarNav pull-right">
              
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down ml-5"></i></span> </a>
                  <ul class="dropdown-menu w-150" role="menu">
                    <li><a href="../login/edit_profile.php?id=<?php echo $adharno;?>&&role=<?php echo $role;?>&&nm=<?php echo $user;?>">Update Profile</a>
                     </li>
                   <li><a href="./view_product.php">Farmer Dashboard</a>
                     </li>
                     <li><a href="../login/logout.php">Logout</a>
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
                 <a href="../farmer/famer.php"><img width="180px" src="../img/emandi_logo.png" alt="E-Mandi"></a>
               </div>
               <!-- end col -->
               <div class="col-sm-7 vertical-align text-center">
                  <form method="post" action="" enctype='multipart/form-data'>
                     <div class="row grid-space-1">
                        <div class="col-sm-6">
                           <input type="text" name="keyword" class="form-control input-lg" placeholder="Search">
                        </div>
                        <!-- end col -->
                        
                        <!-- end col -->
                        <div class="col-sm-3">
                           <input type="submit" name="submit" class="btn btn-default btn-block btn-lg" value="Search">
                        </div>
                        <!-- end col -->
                     </div>
                     <!-- end row -->
                  </form>
               </div>
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
                  <li><a href="farmer.php" class="dropdown-toggle" >Home</a></li>
                  <li><a href="../feedback_form/formpage.php" class="dropdown-toggle">FeedBack</a></li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
      </nav>

<!-- START OF NATURES BASKET -->

 <section class="women-accessories-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline women_head">
                        <h2>Products</h2>
                    </div>
                    <div class="product-tab">
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                  <?php 
                                    include './config.php';
                                     if(isset($_POST['submit']))
									 {
										 $keyword=$_POST['keyword'];
										 $result = mysqli_query($link,"SELECT * FROM vegetable where vname like '%$keyword%'");
									 }
									else
									{
										$result = mysqli_query($link,"SELECT * FROM vegetable");
									}

                                    if (mysqli_num_rows($result)) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result))
											{

                                            $vegname= $row["vname"];
                                            $image= $row["image"]; 
											$farmername=$row["farmername"];
											$price=$row["price"];
											$quantity=$row["quantity"];
											if($quantity==0)
											{
                                            echo '<div class="col-md-3 col-sm-3 col-xs-12" >
                                              <div class="women-single" " >
												<div class="border border-dark" style="height:246px;">
													<img src="./'.$image.'" alt="" style="max-width:100%;max-height:246px;">
                                                </div>
                                                   
                                                  <div class="hot-wid-rating">
													<h4 style="color:black;margin-left:0.1%;font-weight:bold;">Farmer:-'.$farmername.'</h4>
													<h4 style="color:red;margin-left:3%;font-weight:bold;font-size:20px;">₹'.$price.'</h4>
                                                      <h4><a href="./singlepro.php?vegname='.$vegname.'&image='.$image.'" style="color:black;margin-left:33%;font-weight:bold;font-size:15px;">'.
                                                      $vegname.'
                                                      </a></h4>
                                                     
                                                  </div>
                                                   <img src="../img/soldout.gif">
                                                   
                                              
                                              </div>
                                           </div>';
											}
											else
											{
												 echo '<div class="col-md-3 col-sm-3 col-xs-12" >
                                              <div class="women-single" " >
												<div class="border border-dark" style="height:246px;">
													<img src="./'.$image.'" alt="" style="max-width:100%;max-height:246px;">
                                                </div>
                                                   
                                                  <div class="hot-wid-rating">
													<h4 style="color:black;margin-left:0.1%;font-weight:bold;">Farmer:-'.$farmername.'</h4>
													<h4 style="color:red;margin-left:3%;font-weight:bold;font-size:20px;">₹'.$price.'</h4>
                                                      <h4><a href="./singlepro.php?vegname='.$vegname.'&image='.$image.'" style="color:black;margin-left:33%;font-weight:bold;font-size:15px;">'.
                                                      $vegname.'
                                                      </a></h4>
                                                     
                                                  </div>
                                                    <form method="post" action="#">
                                                        <button class="button button1" type="submit" name="buy">Buy This Item</a></button> 
                                                    </form>
                                                   
                                              
                                              </div>
                                           </div>';
											}
                                           
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                  ?>
                                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- END OF NATURES BASKET -->


<!-- START OF FOOTER -->

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
      <script src="./js/jquery.js"></script>
      <script src="./js/bootstrap.js"></script>
      <script src="./js/hover.js"></script>

   </body>
</html>
