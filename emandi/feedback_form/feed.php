
<?php
include('config.php');

$flag=0;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  
 $param_name = trim($_POST["name"]);
 $param_mobileno = trim($_POST["mobileno"]);
 $param_rating = trim($_POST["rating"]);
 $param_feedback = trim($_POST["feedback"]);

 if($param_name!='' && $param_mobileno!='')
 {
$stmt = mysqli_prepare($link, "insert into feedback(name,mobileno,rating,comment)values(?,?,?,?)");
mysqli_stmt_bind_param($stmt, "ssss",$param_name,$param_mobileno,$param_rating,$param_feedback);
mysqli_stmt_execute($stmt);
$flag=1;
 }
//mysqli_stmt_execute($stmt);


        if($flag==1)
		{
			echo "<script> alert('Thank you For Giving Your Feedback'); window.location.href='../index.php'; </script> ";
        }
		else
		{

            echo "Something went wrong. Please try again later.";

        }

        mysqli_stmt_close($stmt);

 mysqli_close($link);
}

?>


