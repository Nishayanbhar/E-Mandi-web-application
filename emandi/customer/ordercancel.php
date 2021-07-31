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
		
	
		$sql = "select * from cart WHERE id ='$id' && vname='$vegname' && deliverystatus='NO'";
		$result =mysqli_query($link,$sql);
		while($row = mysqli_fetch_array($result))
		{
			$vegname=$row['vname'];
			$price=$row['price'];
			$quantity=$row['quantity'];
			$uadhar=$row['user_adharno'];
			$fadhar=$row['farmer_adharno'];
		}
		
		$sql = "select * from vegetable WHERE adharno ='$fadhar' && vname='$vegname' && price='$price'";
		$result =mysqli_query($link,$sql);
		while($row = mysqli_fetch_array($result))
		{
			$vquantity=$row['quantity'];
			$vprice=$row['price'];
		}
		$updateq=$quantity+$vquantity;
		$sql = "update vegetable set quantity='$updateq' WHERE adharno ='$fadhar' && vname='$vegname' && price='$vprice'";
		mysqli_query($link,$sql);
		
        $sql = "delete from cart WHERE id ='$id' && vname='$vegname'";
		mysqli_query($link,$sql);
		
		$total=$price*$quantity;
		$sql = "update from payment set deliverystatus='Cancel' WHERE total_price ='$total' && uadharno='$uadhar' && fadharno='$fadhar' && quantity='$quantity'";
		$op=mysqli_query($link,$sql);
		echo '<script>alert("Welcome to Geeks for Geeks '.$op.'")</script>';
		$flag=1;
   }
   else
   {
	   echo "<script type='text/javascript'> alert('You are Not Valid User.'); window.location.href='../login/login.php'; </script> ";
   }

 
   if ($flag==1)
   {
      echo "<script type='text/javascript'> alert('Order Cancel Successfully.'); window.location.href='order.php';</script>";
   }
   else
   {
      echo "<script type='text/javascript'> alert('Product Not Cancel.'); window.location.href='order.php';</script> ";
   }
   mysqli_close($link);
?>