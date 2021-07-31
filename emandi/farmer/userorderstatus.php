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

				 $id=$_REQUEST['id'];
				 $uad=$_REQUEST['uad'];
				 $fad=$_REQUEST['fad'];
				 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>E-Mandi</title>

<!-- CSS -->
<style>
body{
  background-image: url('../img/statusbg.jpg');
}
.myForm {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
width: 30em;
padding: 1em;
border: 1px solid #ccc;
}

.myForm * {
box-sizing: border-box;
}

.myForm fieldset {
border: none;
padding: 0;
}

.myForm legend,
.myForm label {
padding: 0;
font-weight: bold;

}

.myForm label.choice {
font-size: 0.9em;
font-weight: normal;
}

.myForm input[type="text"],
.myForm input[type="tel"],
.myForm input[type="email"],
.myForm input[type="datetime-local"],
.myForm select,
.myForm textarea {
display: block;
width: 100%;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
padding: 0.3em;
}

.myForm textarea {
height: 100px;
}

.myForm button {
padding: 1em;
border-radius: 0.5em;
background: #eee;
border: none;
font-weight: bold;
margin-top: 1em;
}

.myForm button:hover {
background: #ccc;
cursor: pointer;
}
</style>

</head>
<body>
<center>
 <form class="myForm" method="post" action="" enctype='multipart/form-data' >
 <h3><font color="white"><u>*ORDER DELIVEY STATUS*</u></h3>
	
<p>
<label>DELIVEY status
<select id="status" name="status">
<option value="YES" >YES</option>
<option value="NO" >NO</option>

</select>
</label> 
</p>
</font>

<p><button type="submit" name="submit">Submit</button></p>
<p><button type ="button" onclick="window.location.href='view_order.php';">Back</button></p>
</form>
</center>
</body>
</html>
<?php
include('config.php');
 if(isset($_POST['submit']))
 {
	 $status=$_POST['status']; 
	 
	 if($uad!='' && $status!='')
	{
	$sql = "UPDATE cart SET deliverystatus='$status' WHERE id='$id' && user_adharno ='$uad'";
    mysqli_query($link,$sql);
	
	$sql = "UPDATE payment SET deliverystatus='$status' WHERE fadharno='$fad' && uadharno ='$uad'";
    mysqli_query($link,$sql);
	  
	$flag=1;
	}
	else
	{
		echo "<script> alert('You are not Valid User); window.location.href='../index.php'; </script> ";
	}
	if($flag==1)
	{ 
	echo "<script> alert('Update Successfully'); window.location.href='view_order.php'; </script> ";   
	}
	else
	{
	echo "<script> alert('Update Fail'); window.location.href='view_order.php'; </script> ";     
	}
 }

?>