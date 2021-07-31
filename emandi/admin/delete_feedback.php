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
	$flag=0;
   if($id!='') 
   {
        $sql = "DELETE FROM feedback WHERE id ='$id'";
		mysqli_query($link,$sql);
		$flag=1;
   }
   else
   {
	   echo "<script type='text/javascript'> alert('You are Not Valid User.'); window.location.href='../login/login.php'; </script> ";
   }

 
   if ($flag==1)
   {
      echo "<script type='text/javascript'> alert('Deleted Successfully.'); window.location.href='feedback.php';</script>";
   }
   else
   {
      echo "<script type='text/javascript'> alert('Not Deleted.'); window.location.href='feedback.php';</script> ";
   }
   mysqli_close($link);
?>