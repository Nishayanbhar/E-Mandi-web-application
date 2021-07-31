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
$adhar=$_SESSION['adharno'];
				 $id=$_REQUEST['id'];
	$flag=0;
   if($adhar!='' && $id!='') 
   {
        $sql = "DELETE FROM users WHERE adharno ='$id'";
		mysqli_query($link,$sql);
		$flag=1;
   }
   else
   {
	   echo "<script type='text/javascript'> alert('You are Not Valid User.'); window.location.href='users.php'; </script> ";
   }

 
   if ($flag==1)
   {
      echo "<script type='text/javascript'> alert('User Deleted Successfully.'); window.location.href='users.php';</script>";
   }
   else
   {
      echo "<script type='text/javascript'> alert('User Not Deleted.'); window.location.href='users.php';</script> ";
   }
   mysqli_close($link);
?>