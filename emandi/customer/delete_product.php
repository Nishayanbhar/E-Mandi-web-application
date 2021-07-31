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

				 $ad=$_REQUEST['ad'];
				 $vegname=$_REQUEST['vn'];
				 $id=$_REQUEST['id'];

	$flag=0;
   if($ad!='' && $id!='' && $vegname!='') 
   {
        $sql = "DELETE FROM cart WHERE user_adharno ='$ad' && vname='$vegname' && id='$id'";
		mysqli_query($link,$sql);
		$flag=1;
   }
   else
   {
	   echo "<script type='text/javascript'> alert('You are Not Valid User.'); window.location.href='view_product.php'; </script> ";
   }

 
   if ($flag==1)
   {
      echo "<script type='text/javascript'> alert('Product Deleted Successfully.'); window.location.href='cart.php';</script>";
   }
   else
   {
      echo "<script type='text/javascript'> alert('Product Not Deleted.'); window.location.href='cart.php';</script> ";
   }
   mysqli_close($link);
?>