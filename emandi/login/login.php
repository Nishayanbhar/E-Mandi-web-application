<?php
// Include config file
session_start();
 

require_once 'config.php';

// Define variables and initialize with empty values

$ckrole = $adharno = $password ="";

$role_err = $adharno_err = $password_err ="";



// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST")
{



// Check if username is empty

if(empty(trim($_POST["adharno"])))
{

    $adharno_err = 'Please enter Adhar No.';

}
 else
{
		$adharno = trim($_POST["adharno"]);
}



// Check if password is empty

if(empty(trim($_POST['password'])))
{

    $password_err = 'Please enter your password.';

} else{

    $password = trim($_POST['password']);

}
if(empty(trim($_POST['role'])))
{

    $role_err = 'Please select your role.';

} 
else{
	$ckrole=trim($_POST['role']);
}


// Validate credentials

if(empty($adharno_err) && empty($password_err))
{

    // Prepare a select statement
	if($ckrole==1)
	{
		$sql = "SELECT name,adharno, password,user_type_id FROM admin WHERE adharno = ?";
	}
	elseif($ckrole==4)
	{
		$sql = "SELECT name,adharno, password,user_type_id,status FROM users WHERE adharno = ?";
	}
	elseif($ckrole==3)
	{
		$sql = "SELECT name,adharno, password,user_type_id,status FROM farmer WHERE adharno = ?";
		
	}
	else{
		echo " not valid";
	}
	
    if($stmt = mysqli_prepare($link, $sql))
	{

        // Bind variables to the prepared statement as parameters

        mysqli_stmt_bind_param($stmt,"s",$param_adharno);

        

        // Set parameters

        $param_adharno = $adharno;

        

        // Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt))
		{
			
            // Store result

            mysqli_stmt_store_result($stmt);

            

            // Check if username exists, if yes then verify password

            if(mysqli_stmt_num_rows($stmt) == 1)
			{                    

                // Bind result variables
			if($ckrole==1)
			{
				mysqli_stmt_bind_result($stmt,$name,$adharno,$hashed_password,$usertype);
			}
			else{
				mysqli_stmt_bind_result($stmt,$name,$adharno,$hashed_password,$usertype,$status);
			}
			
                

                if(mysqli_stmt_fetch($stmt))
				{
					      

                    if($password==$hashed_password)
					{   
						 //session_start();
                        $_SESSION['adharno'] = $adharno;
						$_SESSION['name'] = $name;
						$_SESSION['user_type_id'] = $usertype;
						$role=$_SESSION['user_type_id'];
						$status=$status;
						
						if($role==1)
						{
							echo "<script> alert('Login Successfully');window.location.href='../admin/admin.php'; </script> ";  
						
						}
						elseif($role==3)
						{
							 if($status=='OFF' && $usertype=3)
							{
								echo "<script> alert('Yor not Active User Contact Admin');window.location.href='login.php'; </script>";
								session_destroy();
							}
							else
							{
							  echo "<script> alert('Login Successfully');window.location.href='../farmer/farmer.php'; </script> "; 
							}								
						}
						elseif($role==4)
						{
							echo "<script> alert('Login Successfully');window.location.href='../customer/customer.php'; </script> ";
							
						}
						else
						{
							echo "<script> alert('Your Not Valid User'); window.location.href='login.php'; </script> ";
							session_destroy();
						}
					  
                    } 
					else
					{

                        // Display an error message if password is not valid

                        $password_err = 'The password you entered was not valid.';

                    }

                }

            } 
			else
			{

                // Display an error message if username doesn't exist

                $adharno_err= 'The Adhar No you entered was not valid.';

            }

        }
		else
		{

            echo "Oops! Something went wrong. Please try again later.";

        }
		mysqli_stmt_close($stmt);

    }

    

    // Close statement

    

}



// Close connection

mysqli_close($link);

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>Login</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="stylesheet" href="./sl.css">
</head>

<body>
	<div class="image">
		<a href="../index.php">  <img src="../img/emandi_logo.png" alt="E-mandi" height="150" width="300">  </a>
	</div>
<div class="wrapper">

    <h2>Login</h2>

    <p>Please fill in your credentials to login.</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	
		<div class="form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">

            <label>Please Select Role:</label>

            <select id="role" name="role" class="form-control">
				<option value="1" >ADMIN</option>
				<option value="3" >FARMER</option>
				<option value="4" >USER</option>
			</select>

            <span class="help-block"><?php echo $role_err; ?></span>

        </div>
		
        <div class="form-group <?php echo (!empty($adharno_err)) ? 'has-error' : ''; ?>">

            <label>Adhar no:</label>

            <input type="text" name="adharno"class="form-control" oninput="this.value = this.value.replace(/\D/g, '').split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join('-')" maxLength="14" value="<?php echo $adharno; ?>">

            <span class="help-block"><?php echo $adharno_err; ?></span>

        </div>    

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

            <label>Password:</label>

            <input type="password" name="password" class="form-control">

            <span class="help-block"><?php echo $password_err; ?></span>

        </div>

        <div class="form-group">

            <input type="submit" class="btn btn-primary" value="Login">

        </div>

        <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>

    </form>

</div>    

</body>

</html>


