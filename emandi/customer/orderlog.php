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
				 $vegname=$_REQUEST['vn'];

	$flag=0;
   if($id!='' && $vegname!='') 
   {
        $sql = "update cart set userdel='1'  WHERE id ='$id' && vname='$vegname'";
		mysqli_query($link,$sql);
		$flag=1;
   }
   else
   {
	   echo "<script type='text/javascript'> alert('You are Not Valid User.'); window.location.href='../login/login.php'; </script> ";
   }

 
   if ($flag==1)
   {
      echo "<script type='text/javascript'> alert('Order Deleted Successfully.'); window.location.href='order.php';</script>";
   }
   else
   {
      echo "<script type='text/javascript'> alert('Product Not Deleted.'); window.location.href='order.php';</script> ";
   }
   mysqli_close($link);
?>