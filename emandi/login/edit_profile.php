<?php
// Include config file
session_start();
require_once 'config.php';

 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['adharno']) || empty($_SESSION['adharno']) || empty($_SESSION['user_type_id']))
{
  header("location: ../login/login.php");
  exit;
}
$name_err =  $password_err = $confirm_password_err =  $address_err = $city_err = $mobileno_err = $zip_err="";
$user= ($_SESSION['name']);
$role= ($_SESSION['user_type_id']);

				 $id=$_REQUEST['id'];
				 $name=$_REQUEST['nm'];
				 $role=$_REQUEST['role'];
		if($role==4)
		{
			$sql = "SELECT * FROM users WHERE adharno ='$id' && user_type_id='$role'";
			$result = mysqli_query($link,$sql);
			$row = mysqli_fetch_assoc($result);
		}
		if($role==3)
		{
			$sql = "SELECT * FROM farmer WHERE adharno ='$id' && user_type_id='$role'";
			$result = mysqli_query($link,$sql);
			$row = mysqli_fetch_assoc($result);
		}

if(isset($_POST['update']))
{
	
//Validate Name
if(empty(trim($_POST['name'])))
{

    $name_err = "Please enter a Full Name.";     
}
else
{
    $name=trim($_POST['name']);
}

if(empty(trim($_POST['mobileno'])))
{

    $mobileno_err = "Please enter a Mobile No.";     
}
else
{
    $mobileno=trim($_POST['mobileno']);
}

if(empty(trim($_POST['city'])))
{

    $city_err = "Please enter a City.";     
}
else
{
    $city=trim($_POST['city']);
}

if(empty(trim($_POST['zip'])))
{

    $zip_err = "Please enter a Zip Code.";     
}
else
{
    $zip=trim($_POST['zip']);
}

if(empty(trim($_POST['address'])))
{

    $address_err = "Please enter a address.";     
}
else
{
    $address=trim($_POST['address']);
}


// Check input errors before inserting in database
$flag=0;
if(empty($name_err) &&  empty($city_err && empty($mobileno_err) && empty($zip)))
{ 
	if($role==4)
	{
	$flag=1;
    $sql = "UPDATE users SET name='$name',address='$address',city='$city',mobileno='$mobileno',zip='$zip' WHERE adharno='$id' && user_type_id ='$role'";
	mysqli_query($link,$sql);
	}
	else
	{
	$flag=1;
    $sql = "UPDATE farmer SET name='$name',address='$address',city='$city',mobileno='$mobileno',zip='$zip' WHERE adharno='$id' && user_type_id ='$role'";
	mysqli_query($link,$sql);
	}

}
else
{
	echo "<script> alert('You are not Valid User'); </script> ";
}
if($flag==1)
{
	if($role==3)
	{
		echo "<script> alert('Profile Update Successfully');window.location.href='../farmer/farmer.php'; </script> ";
	}
	if($role==4)
	{
		echo "<script> alert('Profile Update Successfully');window.location.href='../customer/customer.php'; </script> ";
	}
}
else
{
	echo "<script> alert('Profile not update);</script> ";
}
}
?>




<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>Update Profile</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="stylesheet" href="./sl.css">

</head>

<body>

    <div class="image">

		<a href="../index.php">  <img src="../img/emandi_logo.png" alt="E-mandi"height="150" width="300">  </a>
	</div>

<div class="wrapper">

    <h2>Update Profile</h2>

    
     <form method="post" action="" enctype='multipart/form-data' >
	 <?php if($role==3){?>
	   <div class="form-group <?php echo (!empty($bhumi_rr)) ? 'has-error' : ''; ?>">

            <label>7/12 No:</label>

            <input type="text" name="bhumino" class="form-control" value="<?php echo $row["bhumino"]; ?>" readonly><h5>7/12 No cannot be changed</h5>

        </div>
	 <?php }?>
		
	   <div class="form-group <?php echo (!empty($adharno_err)) ? 'has-error' : ''; ?>">

            <label>Adhar Card No:</label>

            <input type="text" name="adharno" class="form-control" value="<?php echo $row["adharno"]; ?>" readonly><h5>Adharno cannot be changed</h5>

            

        </div>
        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
            <label>Full Name:</label>

            <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>" >

            <span class="help-block"><?php echo $name_err; ?></span>

        </div>    
						
		<div class="form-group <?php echo (!empty($mobileno_err)) ? 'has-error' : ''; ?>">

            <label>Mobile No:</label>

            <input type="text" name="mobileno" class="form-control" value="<?php echo $row["mobileno"]; ?>" >

            <span class="help-block"><?php echo $mobileno_err; ?></span>

        </div>

		
		<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">

            <label>Address:</label>

            <input type="text" name="address" class="form-control" value="<?php echo $row["address"]; ?>" >

            <span class="help-block"><?php echo $address_err; ?></span>

        </div>
		
		<div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">

            <label>City:</label>

            <input type="text" name="city" class="form-control" value="<?php echo $row["city"];?>" >

            <span class="help-block"><?php echo $city_err; ?></span>

        </div>

		
		<div class="form-group <?php echo (!empty($zip_err)) ? 'has-error' : ''; ?>">

            <label>Zip:</label>

            <input type="text" name="zip" class="form-control" value="<?php echo $row["zip"]; ?>">

            <span class="help-block"><?php echo $zip_err; ?></span>

        </div>

        <div class="form-group">

            <input type="submit" name="update" class="btn btn-primary" value="UPDATE" >  

        </div>
    </form>
	<?php
	$curr_password_err=$curr_password=$incorrect_pass=$new_password_err=$cornf_password_err=$cornf_password='';
	if(isset($_POST['changepass']))
    {
		if(empty(trim($_POST['curr_password'])))
		{

          $curr_password_err = "Please enter a Password.";     
		}
		else
		{
		  $curr_password=trim($_POST['curr_password']);
		  
		  //for new password check
		  if(empty(trim($_POST['new_password'])))
		{

          $new_password_err = "Please enter a New Password.";     
		}
		else
		{
		  $new_password=trim($_POST['new_password']);
		}
		
		if(empty(trim($_POST['cornf_password'])))
		{

          $cornf_password_err = "Please enter a cornfirm Password.";     
		}
		else
		{
		  $cornf_password= trim($_POST['cornf_password']);

			if($new_password != $cornf_password)
			{

			  $cornf_password_err = 'Password did not match.';

			}
		}
		  
		  if($id!='' && $role!='')
		{
			if($role==4)
			{
				$sql = "SELECT * FROM users WHERE adharno ='$id' && user_type_id='$role'";
			}
			else
			{
				$sql = "SELECT * FROM farmer WHERE adharno ='$id' && user_type_id='$role'";
			}
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
			$check=0;
			if($curr_password==$row["password"])
			{
				
				if($id!='' && $role!='')
				{
				if($role==4)
				{
					$sqli = "UPDATE users SET password='$new_password' WHERE adharno='$id' && user_type_id ='$role'";
				}
				else
				{
					$sqli = "UPDATE farmer SET password='$new_password' WHERE adharno='$id' && user_type_id ='$role'";
				}
				$check=1;
	            mysqli_query($link,$sqli);
				}
				else
				{
					echo "<script> alert('Update not Successfully'); </script> ";   
				}
				if($check==1)
				{
					echo "<script> alert('Password change Successfully');window.location.href='../login/logout.php'; </script> ";   
				}
			}
			else
			{
				$curr_password_err="Incorrect Password";
			}
		}
		}
		
		
		
		
		
	}
	?>
	  <form method="post" action="" enctype='multipart/form-data' >
	 <h3>Change Your Password</h3>
	   <div class="form-group <?php echo (!empty($curr_password_err)) ? 'has-error' : ''; ?>">

            <label>old password:</label>

            <input type="password" name="curr_password" class="form-control" >

            <span class="help-block"><?php echo $curr_password_err;?></span>

        </div>
		<div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">

            <label>new password:</label>

            <input type="password" name="new_password" class="form-control" >

            <span class="help-block"><?php echo $new_password_err; ?></span>

        </div>
		<div class="form-group <?php echo (!empty($cornf_password_err)) ? 'has-error' : ''; ?>">

            <label>confirm password:</label>

            <input type="password" name="cornf_password" class="form-control" >

            <span class="help-block"><?php echo $cornf_password_err; ?></span>

        </div>
		<div class="form-group">

            <input type="submit" name="changepass" class="btn btn-primary" value="Change Password" >  

        </div>
	</form>
</div> 
</body>

</html>


