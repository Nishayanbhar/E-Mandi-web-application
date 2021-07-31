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


$result = mysqli_query($link,"SELECT count(*) as count FROM users");
if (mysqli_num_rows($result) == 1) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        $numusers= $row['count'];
    }
} 

$result = mysqli_query($link,"SELECT count(*) as count FROM vegetable ");
if (mysqli_num_rows($result) == 1)
	{
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
	{
        $numvegetables= $row['count'];
    }
} 




 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
  
    <title>E-Mandi</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="rushi">
      <title>E-Mandi</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="./css/style.css" rel="stylesheet" type="text/css">
      <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
     
    


    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="./admin.css">
    

    <link rel="stylesheet" href="../css/footer.css">
  <style>
.button{
    border-radius:3px;
    border:0px;
    background-color:black;
    color:white;
    padding:10px 20px;
    letter-spacing: 1px;
}
</style>  

  
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
          <ul class="nav navbar-nav">
            <li ><a href="admin.php"><font size="4px">Back to Dashboard</font></a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="../index.php">Welcome, ADMIN</a></li>
            <li><a href="../login/logout.php">Logout</a></li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table table-striped table-hover">
         <tr>
		<th>SR NO</th>
        <th>NAME</th>
        <th>ADHAR NO</th>
		<th>MOBILE NO</th>
        <th>ADDRESS</th>
        <th>CITY</th>
		<th>ZIP</th>
		<th>ENTRY DATE</th>
		<th>DELETE</th>
      </tr>
      <?php

	        $rowperpage = 10;
            $rowone= 0;
			// Previous Button
            if(isset($_POST['but_prev']))
			{
                $rowone = $_POST['rowone'];
                $rowone -= $rowperpage;
                if( $rowone < 0 )
				{
                    $rowone = 0;
                }
            }

            // Next Button
            if(isset($_POST['but_next']))
			{
                $rowone = $_POST['rowone'];
                $allcount = $_POST['allcount'];

                $val = $rowone + $rowperpage;
                if( $val < $allcount )
				{
                    $rowone = $val;
                }
            }
			
			$sql = "SELECT COUNT(*) AS cntrows FROM users where user_type_id=4";
            $result = mysqli_query($link,$sql);
            $fetchresult = mysqli_fetch_array($result);
            $allcount = $fetchresult['cntrows'];
	  
	  $flag=0;
         $sql="SELECT * FROM users where user_type_id=4 ORDER BY id ASC limit $rowone,".$rowperpage;
		 $result = mysqli_query($link,$sql);
         $sno = $rowone + 1;
        if (mysqli_num_rows($result)) 
		{
			$flag=1;

            // output data of each row
            while($row = mysqli_fetch_array($result))
				{
                echo '
                 <tr>
				  <td>'.$sno.'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['adharno'].'</td>
                  <td>'.$row['mobileno'].'</td>
                  <td>'.$row['address'].'</td>
				  <td>'.$row['city'].'</td>
				  <td>'.$row['zip'].'</td>
				  <td>'.$row['createdat'].'</td>
				  <td><a href="delete_user.php?id='.$row['adharno'].'"><font color="red">delete</font></a></td>
                </tr>
                ';  $sno++;       
                   }
        }
		if($flag!=1)
		{
			echo '<td><font size="3px" color="red">No Users Added</font></td>';
		}
			
      ?>

   
    </table>

  </div>
</div>
<form method="post" action="" >
            <div id="div_pagination" align="center">
                <input type="hidden" name="rowone" value="<?php echo $rowone; ?>">
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                <input type="submit" class="button"name="but_prev" value="Previous">
                <input type="submit" class="button" name="but_next" value="Next">
            </div>
        </form>
</body>
</html>