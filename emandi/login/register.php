<?php

// Include config file

require_once 'config.php';

// Define variables and initialize with empty values

$bhumino = $name  = $adharno = $role =  $password = $confirm_password = $address = $city = $mobileno = $zip="";

$bhumi_err = $name_err = $adharno_err = $role_err  = $password_err = $confirm_password_err =  $address_err = $city_err = $mobileno_err = $zip_err="";
// Processing form data when form is submitted

if(isset($_POST['submit1']))
{
//Validate Name

if(empty(trim($_POST['bhumino'])))
{

    $bhumi_err = "Please enter 7/12 No.";     
}
else
{
	$sql = "SELECT bhumino FROM bhumi_table WHERE bhumino = ?";
	if($stmt = mysqli_prepare($link, $sql))
	{
		
        // Bind variables to the prepared statement as parameters

        mysqli_stmt_bind_param($stmt, "s", $param_bhumino);
        // Set parameters
        $param_bhumino = trim($_POST['bhumino']);

        // Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt))
		{
			

            /* store result */
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1)
			{
				
				$sql = "SELECT bhumino FROM farmer WHERE bhumino = ?";
				if($stmt = mysqli_prepare($link, $sql))
				{
					mysqli_stmt_bind_param($stmt, "s", $param_bhumino);
					// Set parameters
					$param_bhumino = trim($_POST['bhumino']);
					if(mysqli_stmt_execute($stmt))
					{
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 1)
						{
							$bhumi_err=$param_bhumino. " " ."is 7/12 No Already Exist";
						}
						else
						{
							$bhumino = trim($_POST['bhumino']);
						}
					}
				}
                
            }
			else
			{
                $bhumi_err = "Please Enter valid 7/12 No";

            }

        } else
		{

            echo "Oops! Something went wrong. Please try again later.";

        }

    }
    
}

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

  


// Validate password

if(empty(trim($_POST['password'])))
{

    $password_err = "Please enter a password.";     

}
else
{

    $password = trim($_POST['password']);

}

if(empty(trim($_POST['role'])))
{

    $role_err = "Please choose Your Type.";     

}
else
{

    $role = trim($_POST['role']);

}

// Validate confirm password

if(empty(trim($_POST["confirm_password"])))
{

    $confirm_password_err = 'Please Enter confirm password.';     

} 
else
{
	
    $confirm_password = trim($_POST['confirm_password']);

    if($password != $confirm_password)
	{

        $confirm_password_err = 'Password did not match.';

    }

}
if(empty(trim($_POST["adharno"])))
{

    $adharno_err = "Please enter a Adhar No.";

} 
else
{
	
    // Prepare a select statement
	if($role==4)
	{
		$sql = "SELECT adharno FROM users WHERE adharno = ?";
	
	}
	elseif($role==3)
	{
		$sql = "SELECT adharno FROM farmer WHERE adharno = ?";
	}
	else
	{
		$sql = "SELECT adharno FROM admin WHERE adharno = ?";
	}
    
	//$sql = "SELECT adharno FROM users WHERE adharno = ?";
    if($stmt = mysqli_prepare($link, $sql))
	{

        // Bind variables to the prepared statement as parameters

        mysqli_stmt_bind_param($stmt, "s", $param_adharno);
        // Set parameters
        $param_adharno = trim($_POST["adharno"]);

        // Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt))
		{

            /* store result */

            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1)
			{

                $adharno_err = "This Adhar No is already taken.";

            }
			else
			{
				
                 $adharno = trim($_POST["adharno"]);
				

            }

        } else
		{

            echo "Oops! Something went wrong. Please try again later.";

        }

    }

     

    // Close statement

    mysqli_stmt_close($stmt);


// Check input errors before inserting in database

if(empty($bhumi_err) && empty($name_err) && empty($password_err) && empty($confirm_password_err) && empty($adharno_err) && empty($city_err && empty($mobile_err)))
{ 

    // Prepare an insert statement
	if($role==3)
	{
		$sql = "INSERT INTO farmer (bhumino, name,adharno,password,address,city,mobileno,zip,user_type_id,status) VALUES (?,?, ?, ?,?,?,?,?,?,?)";
		if($stmt = mysqli_prepare($link, $sql))
	{
      
        // Bind variables to the prepared statement as parameters
		mysqli_stmt_bind_param($stmt, "ssssssssss", $param_bhumino,$param_name,$param_adharno,$param_password,$param_address,$param_city,$param_mobileno,$param_zip,$param_role,$status);

        // Set parameters
		$param_bhumino=$bhumino;

        $param_name = $name;

        $param_adharno = $adharno;
		
		$param_password = $password;
		
		$param_address= $address;
			
		$param_city = $city;
		
		$param_mobileno = $mobileno;
		
		$param_zip = $zip;
		
		$param_role= $role;
		
		$status="OFF";

        // Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt))
		{
            // Redirect to login page
		  echo "<script> alert('Registration Successfully'); window.location.href='./login.php'; </script> ";  
        } 
		else
		{

            echo "Something went wrong. Please try again later.";

        }
	}
	
	}
	else
	{
		
		
		$sql = "INSERT INTO users (name,adharno,password,address,city,mobileno,zip,user_type_id,status) VALUES (?, ?, ?,?,?,?,?,?,?)";
		
		if($stmt = mysqli_prepare($link, $sql))
	{
      
        // Bind variables to the prepared statement as parameters
		 mysqli_stmt_bind_param($stmt, "sssssssss", $param_name,$param_adharno,$param_password,$param_address,$param_city,$param_mobileno,$param_zip,$param_role,$status);

        // Set parameters
        
		
        $param_name = $name;

        $param_adharno = $adharno;
		
		$param_password = $password;
		
		$param_address= $address;
			
		$param_city = $city;
		
		$param_mobileno = $mobileno;
		
		$param_zip = $zip;
		
		$param_role= $role;
		
		$status="ON";

        // Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt))
		{
            // Redirect to login page
		  echo "<script> alert('Registration Successfully'); window.location.href='./login.php'; </script> ";  
        } 
		else
		{

            echo "Something went wrong. Please try again later.";

        }
	}
     
    

    }

     

    // Close statement
    
    mysqli_stmt_close($stmt);

}

// Close connection

mysqli_close($link);
}
}
// new form
if(isset($_POST['submit']))
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

  


// Validate password

if(empty(trim($_POST['password'])))
{

    $password_err = "Please enter a password.";     

}
else
{

    $password = trim($_POST['password']);

}

if(empty(trim($_POST['role'])))
{

    $role_err = "Please choose Your Type.";     

}
else
{

    $role = trim($_POST['role']);

}

// Validate confirm password

if(empty(trim($_POST["confirm_password"])))
{

    $confirm_password_err = 'Please Enter confirm password.';     

} 
else
{
	
    $confirm_password = trim($_POST['confirm_password']);

    if($password != $confirm_password)
	{

        $confirm_password_err = 'Password did not match.';

    }

}
if(empty(trim($_POST["adharno"])))
{

    $adharno_err = "Please enter a Adhar No.";

} 
else
{
	
    // Prepare a select statement
	if($role==4)
	{
		$sql = "SELECT adharno FROM users WHERE adharno = ?";
	
	}
	elseif($role==3)
	{
		$sql = "SELECT adharno FROM farmer WHERE adharno = ?";
	}
	else
	{
		$sql = "SELECT adharno FROM admin WHERE adharno = ?";
	}
    
	//$sql = "SELECT adharno FROM users WHERE adharno = ?";
    if($stmt = mysqli_prepare($link, $sql))
	{

        // Bind variables to the prepared statement as parameters

        mysqli_stmt_bind_param($stmt, "s", $param_adharno);
        // Set parameters
        $param_adharno = trim($_POST["adharno"]);

        // Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt))
		{

            /* store result */

            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1)
			{

                $adharno_err ="This Adhar No is already taken.";

            }
			else
			{
				
                 $adharno = trim($_POST["adharno"]);
				

            }

        } else
		{

            echo "Oops! Something went wrong. Please try again later.";

        }

    }

     

    // Close statement

    //mysqli_stmt_close($stmt);


// Check input errors before inserting in database

if(empty($bhumi_err) && empty($name_err) && empty($password_err) && empty($confirm_password_err) && empty($adharno_err) && empty($city_err && empty($mobile_err)))
{ 

    // Prepare an insert statement
	if($role==3)
	{
		$sql = "INSERT INTO farmer (bhumino, name,adharno,password,address,city,mobileno,zip,user_type_id,status) VALUES (?,?, ?, ?,?,?,?,?,?,?)";
		if($stmt = mysqli_prepare($link, $sql))
	{
      
        // Bind variables to the prepared statement as parameters
		mysqli_stmt_bind_param($stmt, "ssssssssss", $param_bhumino,$param_name,$param_adharno,$param_password,$param_address,$param_city,$param_mobileno,$param_zip,$param_role,$status);

        // Set parameters
		$param_bhumino=$bhumino;

        $param_name = $name;

        $param_adharno = $adharno;
		
		$param_password = $password;
		
		$param_address= $address;
			
		$param_city = $city;
		
		$param_mobileno = $mobileno;
		
		$param_zip = $zip;
		
		$param_role= $role;
		
		$status="OFF";

        // Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt))
		{
            // Redirect to login page
		  echo "<script> alert('Registration Successfully'); window.location.href='./login.php'; </script> ";  
        } 
		else
		{

            echo "Something went wrong. Please try again later.";

        }
	}
	
	}
	else
	{
		
		
		$sql = "INSERT INTO users (name,adharno,password,address,city,mobileno,zip,user_type_id,status) VALUES (?, ?, ?,?,?,?,?,?,?)";
		
		if($stmt = mysqli_prepare($link, $sql))
	{
      
        // Bind variables to the prepared statement as parameters
		 mysqli_stmt_bind_param($stmt, "sssssssss", $param_name,$param_adharno,$param_password,$param_address,$param_city,$param_mobileno,$param_zip,$param_role,$status);

        // Set parameters
        
		
        $param_name = $name;

        $param_adharno = $adharno;
		
		$param_password = $password;
		
		$param_address= $address;
			
		$param_city = $city;
		
		$param_mobileno = $mobileno;
		
		$param_zip = $zip;
		
		$param_role= $role;
		
		$status="ON";

        // Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt))
		{
            // Redirect to login page
		  echo "<script> alert('Registration Successfully'); window.location.href='./login.php'; </script> ";  
        } 
		else
		{

            echo "Something went wrong. Please try again later.";

        }
	}
     
    

    }

     

    // Close statement
    
    mysqli_stmt_close($stmt);

}

// Close connection

mysqli_close($link);
}
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>Sign Up</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="stylesheet" href="./sl.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
 
							function show1()
							{
								  
								document.getElementById('user').style.display = 'block';
								document.getElementById('farmer').style.display = 'none';
								 //$("#new").show();
								  //$("#old").hide();
								 
							}
							function show2()
							{
								//$("#old").show();
								//$("#new").hide();
								  
								 document.getElementById('farmer').style.display = 'block';
						         document.getElementById('user').style.display = 'none';
								 
							}

						</script>
</head>
<body>

    <div class="image">

		<a href="../index.php">  <img src="../img/emandi_logo.png" alt="E-mandi"height="150" width="300">  </a>
	</div>

<div class="wrapper">

    <h2>Sign Up</h2>

    <p>Please fill this form to create an account.</p>
	 <div class="form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
					<input type="radio"  name="role" checked onclick="javascript:show2();" value="3" <?php if (isset($role) && $role=="3") echo "checked";?>  />
							FARMER
					<input type="radio" name="role"  onclick="javascript:show1();" value="4" <?php if (isset($role) && $role=="4") echo "checked";?> />
							CUSTOMER
				<span class="help-block"><?php echo $role_err; ?></span>
	</div> 

	<div id="user" style="display:none";>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				
		
				<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
            <label>Full Name:</label>
				<input type="text" hidden name="role" value="4"/>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" >

            <span class="help-block"><?php echo $name_err; ?></span>

        </div>    
						
		<div class="form-group <?php echo (!empty($mobileno_err)) ? 'has-error' : ''; ?>">

            <label>Mobile No:</label>

            <input type="text" name="mobileno" oninput="this.value = this.value.replace(/\D/g,'').split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join('')" class="form-control" maxLength="10" value="<?php echo $mobileno; ?>" >

            <span class="help-block"><?php echo $mobileno_err; ?></span>

        </div>

        <div class="form-group <?php echo (!empty($adharno_err)) ? 'has-error' : ''; ?>">

            <label>Adhar Card No:</label>

            <input type="text" name="adharno" oninput="this.value = this.value.replace(/\D/g, '').split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join('-')" maxLength="14" class="form-control" value="<?php echo $adharno; ?>" >

            <span class="help-block" ><?php echo $adharno_err; ?></span>

        </div>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

            <label>Password:</label>

            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">

            <span class="help-block"><?php echo $password_err; ?></span>

        </div>

        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" >

            <label>Confirm Password:</label>

            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" >

            <span class="help-block"><?php echo $confirm_password_err; ?></span>

        </div>
		
		<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">

            <label>Address:</label>

            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" >

            <span class="help-block"><?php echo $address_err; ?></span>

        </div>
		
		<div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">

            <label>City:</label>

            <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" >

            <span class="help-block"><?php echo $city_err; ?></span>

        </div>

		
		<div class="form-group <?php echo (!empty($zip_err)) ? 'has-error' : ''; ?>">

            <label>Zip:</label>

            <input type="text" name="zip" class="form-control" value="<?php echo $zip; ?>">

            <span class="help-block"><?php echo $zip_err; ?></span>

        </div>
	<div class="form-group">

            <input type="submit" class="btn btn-primary" name="submit" value="Submit" >

            <input type="reset" class="btn btn-default" value="Reset">

        </div>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>

</form>
</div>

<div id="farmer" >
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<div class="form-group <?php echo (!empty($bhumi_err)) ? 'has-error' : ''; ?>">
            <label>7/12 No:</label>
				<input type="text" hidden name="role" value="3"/>
            <input type="text" name="bhumino" class="form-control"  value="<?php echo $bhumino; ?>" >
			
            <span class="help-block"><?php echo $bhumi_err; ?></span>

        </div>
        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
            <label>Full Name:</label>

            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" >

            <span class="help-block"><?php echo $name_err; ?></span>

        </div>    
						
		<div class="form-group <?php echo (!empty($mobileno_err)) ? 'has-error' : ''; ?>">

            <label>Mobile No:</label>

            <input type="text" name="mobileno" oninput="this.value = this.value.replace(/\D/g,'').split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join('')" class="form-control" maxLength="10" value="<?php echo $mobileno; ?>" >

            <span class="help-block"><?php echo $mobileno_err; ?></span>

        </div>

        <div class="form-group <?php echo (!empty($adharno_err)) ? 'has-error' : ''; ?>">

            <label>Adhar Card No:</label>

            <input type="text" name="adharno" oninput="this.value = this.value.replace(/\D/g, '').split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join('-')" maxLength="14" class="form-control" value="<?php echo $adharno; ?>" >

            <span class="help-block" ><?php echo $adharno_err; ?></span>

        </div>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

            <label>Password:</label>

            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">

            <span class="help-block"><?php echo $password_err; ?></span>

        </div>

        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" >

            <label>Confirm Password:</label>

            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" >

            <span class="help-block"><?php echo $confirm_password_err; ?></span>

        </div>
		
		<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">

            <label>Address:</label>

            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" >

            <span class="help-block"><?php echo $address_err; ?></span>

        </div>
		
		<div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">

            <label>City:</label>

            <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" >

            <span class="help-block"><?php echo $city_err; ?></span>

        </div>

		
		<div class="form-group <?php echo (!empty($zip_err)) ? 'has-error' : ''; ?>">

            <label>Zip:</label>

            <input type="text" name="zip" class="form-control" value="<?php echo $zip; ?>">

            <span class="help-block"><?php echo $zip_err; ?></span>

        </div>

        <div class="form-group">

            <input type="submit" class="btn btn-primary" name="submit1" value="Submit" >

            <input type="reset" class="btn btn-default" value="Reset">

        </div>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>

    </form>

</div> 
</div>
</body>

</html>


