<?php
// Initialize the session
session_start();
include 'config.php';

 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['adharno']) || empty($_SESSION['adharno']) || empty($_SESSION['user_type_id']))
{
  header("location: ../login/login.php");
  exit;
}
   $uadharno = $_SESSION['adharno'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{	$addr=trim($_POST["isPrimary"]);
    $noproduct=trim($_POST["noproduct"]);
  if($noproduct!="no product")
  {
	if($addr=="yes")
	{	
	$name = trim($_POST["name"]);
	$fadharno = trim($_POST["fadharno"]);
	$address = trim($_POST["address"]);
	$city = trim($_POST["city"]);
	$zip = trim($_POST["zip"]);
	$mobileno = trim($_POST["mobileno"]);
	$payment = trim($_POST["optradio"]);
	$total_price=trim($_POST["total_price"]);
	$pvname = trim($_POST["vname"]);
	$pprice = trim($_POST["price"]);
	$pquantity = trim($_POST["quantity"]);
	$pid = trim($_POST["pid"]);
	

	
	  $sql = "INSERT into payment(payment_id,uadharno,fadharno,name,vname,price,quantity,total_price,address,city,zip,mobileno,paymentmode,paymentstatus,deliverystatus) values ('$pid','$uadharno','$fadharno','$name','$pvname','$pprice','$pquantity','$total_price','$address','$city','$zip','$mobileno','$payment','YES','NO')";
	  mysqli_query($link,$sql);
	
	$sql3 = "select * from cart WHERE user_adharno='$uadharno'";
	$result=mysqli_query($link,$sql3);
	while($row = mysqli_fetch_assoc($result)) 
	  {
											
            $vegname= $row["vname"];
            $quantity=$row["quantity"];
			$fadharno=$row["farmer_adharno"];
		  $sql = "select * from vegetable WHERE adharno='$fadharno' && vname='$vegname'";
		  $resulte=mysqli_query($link,$sql); 
             while($rowv = mysqli_fetch_assoc($resulte)) 
	         {
		         $vegquantity=$rowv["quantity"];
				 $total_quantity=$vegquantity-$quantity;
			     $sql1 = "UPDATE vegetable SET quantity='$total_quantity' WHERE adharno='$fadharno' && vname='$vegname'";
	             mysqli_query($link,$sql1);
				
	         }
			  
      }

	$sql2 = "UPDATE cart SET paymentstatus='YES' WHERE user_adharno='$uadharno'";
	mysqli_query($link,$sql2);
	
	echo "<script> alert('Order Successfully'); window.location.href='customer.php'; </script> ";
	
	}
	else
	{
	$new_name = trim($_POST["new_name"]);
	$fadharno = trim($_POST["fadharno"]);
	$new_address = trim($_POST["new_address"]);
	$new_city = trim($_POST["new_city"]);
	$new_zip = trim($_POST["new_zip"]);
	$new_mobileno = trim($_POST["new_mobileno"]);
	$payment = trim($_POST["optradio"]);
	$total_price=trim($_POST["total_price"]);
	$pid = trim($_POST["pid"]);
	
	$sql = "INSERT into payment(payment_id,uadharno,fadharno,name,total_price,address,city,zip,mobileno,paymentmode,paymentstatus,deliverystatus) values ('$pid','$uadharno','$fadharno','$new_name','$total_price','$new_address','$new_city','$new_zip','$new_mobileno','$payment','YES','NO')";
	mysqli_query($link,$sql);
	
	$sql3 = "select * from cart WHERE user_adharno='$uadharno'";
	$result=mysqli_query($link,$sql3);
	while($row = mysqli_fetch_assoc($result)) 
	  {
											
            $vegname= $row["vname"];
            $quantity=$row["quantity"];
			$fadharno=$row["farmer_adharno"];
		  $sql = "select * from vegetable WHERE adharno='$fadharno' && vname='$vegname'";
		  $resulte=mysqli_query($link,$sql); 
             while($rowv = mysqli_fetch_assoc($resulte)) 
	         {
		         $vegquantity=$rowv["quantity"];
				 $total_quantity=$vegquantity-$quantity;
			     $sql1 = "UPDATE vegetable SET quantity='$total_quantity' WHERE adharno='$fadharno' && vname='$vegname'";
	             mysqli_query($link,$sql1);
				
	         }
			  
      }

	$sql2 = "UPDATE cart SET paymentstatus='YES' WHERE user_adharno='$uadharno'";
	mysqli_query($link,$sql2);
	
	echo "<script> alert('Order Successfully'); window.location.href='customer.php'; </script> ";
	}
	


  }
  else
  {
	  echo "<script> alert('Please Add Some Product'); window.location.href='customer.php'; </script> ";
  }

}



?> 