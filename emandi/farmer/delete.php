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
				 $vname=$_REQUEST['pname'];
				 $index=$_REQUEST['in'];

	$flag=0;
   if($adhar!='' && $id!='' && $vname!='') 
   {
        $sql = "DELETE FROM vegetable WHERE adharno ='$id' && vname='$vname' && id='$index'";
		mysqli_query($link,$sql);
		$flag=1;
   }
   else
   {
	   echo "<script type='text/javascript'> alert('You are Not Valid User.'); window.location.href='view_product.php'; </script> ";
   }

 
   if ($flag==1)
   {
      echo "<script type='text/javascript'> alert('Product Deleted Successfully.'); window.location.href='view_product.php';</script>";
   }
   else
   {
      echo "<script type='text/javascript'> alert('Product Not Deleted.'); window.location.href='view_product.php';</script> ";
   }
   mysqli_close($link);
?>