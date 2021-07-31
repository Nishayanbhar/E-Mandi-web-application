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

$role= ($_SESSION['user_type_id']);
if($role!=1)
{
  header("location: ../login/login.php");
  exit;
}

$result = mysqli_query($link,"SELECT count(*) as count FROM users");
if (mysqli_num_rows($result) == 1)
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        $allusers= $row['count'];
    }
}

$result = mysqli_query($link,"SELECT count(*) as count FROM users where user_type_id=4");
if (mysqli_num_rows($result) == 1) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        $numusers= $row['count'];
    }
} 

$result = mysqli_query($link,"SELECT count(*) as count FROM farmer where user_type_id=3");
if (mysqli_num_rows($result) == 1) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
	{
         $allfarmers= $row['count'];
    }
} 

$result = mysqli_query($link,"SELECT count(*) as count FROM vegetable");
if (mysqli_num_rows($result) == 1) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
	{
         $vegetable= $row['count'];
    }
} 

$result = mysqli_query($link,"SELECT count(*) as count FROM payment");
if (mysqli_num_rows($result) == 1) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
	{
         $payment= $row['count'];
    }
} 

$result = mysqli_query($link,"SELECT count(*) as count FROM feedback");
if (mysqli_num_rows($result) == 1) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
	{
         $feedback= $row['count'];
    }
} 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
  
    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Rushi">
      <title>E-Mandi</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="./css/style.css" rel="stylesheet" type="text/css">
      <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
      
    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="../css/footer.css">

  </head>

  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          

          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="../index.php">Welcome, ADMIN</a></li>
            <li><a href="../login/logout.php">Logout</a></li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> E-Mandi <small>Manage Your Site</small></h1>
          </div>
        </div>
      </div>
    </header>
<br>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </div>
  </section>


<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
      <a href="../index.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        Dashboard <span class="badge"></span>
      </a>
      <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> All Customer<span class="badge"> <?php echo $numusers; ?></span></a>
      <a href="allfarmer.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> All Farmers <span class="badge"> <?php echo $allfarmers; ?></span></a>
	  <a href="vegetables.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Vegetables<span class="badge"> <?php echo $vegetable; ?></span></a>
	  <a href="allorder.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> All Orders <span class="badge"> <?php echo $payment; ?></span></a>
	  <a href="feedback.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Feedback <span class="badge"> <?php echo $feedback; ?></span></a>
    </div>

      
      </div>
      <div class="col-md-9">
          <div class="panel panel-default">
  <div class="panel-heading" style="background-color:  #095f59;">
    <h3 class="panel-title"><font color="white">Overview</font></h3>
  </div>
  <div class="panel-body">
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $allusers+$allfarmers; ?></h2>
       <h4>Total Users</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2>  <?php echo $numusers; ?></h2>
       <h4>Customer</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><?php echo $allfarmers; ?></h2>
       <h4>All Farmer</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><?php echo $vegetable; ?></h2>
       <h4>All Vegetables</h4>
     </div>
   </div>
  </div>
</div>
<!--Latest User-->
<div class="panel panel-default">
  <div class="panel-heading"style="background-color:  #095f59;">
    <h3 class="panel-title"><font color="white">Latest Farmer</font></h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover">
       <tr>
	    <th>7/12 NO</th>
        <th>NAME</th>
		<th>ADHAR NO</th>
        <th>MOBILE NO</th>
        <th>STATUS</th>
      </tr>
      <?php
        $result = mysqli_query($link,"SELECT * FROM farmer where user_type_id=3 && status='OFF' order by createdate LIMIT 5 ");
        if (mysqli_num_rows($result)) 
		{

            // output data of each row
            while($row = mysqli_fetch_assoc($result) )
				{
                echo '
                 <tr>
				  <td>'.$row['bhumino'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['adharno'].'</td>
                  <td>'.$row['mobileno'].'</td>
                  <td>'.$row['status'].'</td>
                </tr>
                ';         
                   }
				   
        }
		else
		{
			 echo "<td><font color='red'>No New Farmer Request</font></td>";
		}
      ?>
   
    </table>

  </div>
</div>

      </div>
    </div>
  </div>
</section>
<!-- footer -->
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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
