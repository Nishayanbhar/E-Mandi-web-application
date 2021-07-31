<?php
session_start();
include 'config.php';  

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['adharno']) || empty($_SESSION['adharno']) || empty($_SESSION['user_type_id']))
{
  header("location: ../login/login.php");
  exit;
}
$userad=$_SESSION['adharno'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{

$farmername = trim($_POST["farmername"]);
$image = trim($_POST["image"]);
$prequantity = trim($_POST["prequantity"]);
$price = trim($_POST["price"]);
$vegname= trim($_GET['vegname']);
$ad= trim($_GET['ad']);
$quantity= (isset($_POST["quantity"]) ? $_POST['quantity'] :0);
     // BEACUSE IT WAS GIVING NULL ERROR
$flag=0;
if($ad!='' && $userad!='')
{
$sqli="select * from cart where user_adharno='$userad' && farmer_adharno='$ad' && vname='$vegname' && paymentstatus='NO'";
$result = mysqli_query($link,$sqli);
$row = mysqli_fetch_assoc($result);
if($row!='' && $vegname==$row['vname'])
{	

	$quantity=$quantity+$row['quantity'];
	$sql = "UPDATE cart SET price='$price',paymentstatus='NO',quantity='$quantity' WHERE user_adharno='$userad' && farmer_adharno ='$ad' && vname='$vegname'";
	mysqli_query($link,$sql);
	$flag=1;
}
else
{
	$sql = "INSERT into cart(user_adharno,farmer_adharno,farmername,vname,image,price,paymentstatus,quantity,deliverystatus,userdel) values ('$userad','$ad','$farmername','$vegname','$image','$price','NO','$quantity','NO',0)";
	mysqli_query($link,$sql);
	$flag=1;
}

}
if($flag==1)
{

echo "<script> alert('Add Successfully.'); window.location.href='cart.php'; </script> ";   
}
else
{
echo "<script> alert('You are Not Valid User'); window.location.href='../login/login.php'; </script> ";   
}

}

?> 