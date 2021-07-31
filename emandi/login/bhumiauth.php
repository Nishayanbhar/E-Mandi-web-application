<?php
include 'config.php';  
$bhm = $_REQUEST["bhm"];
$hint="";
$msg="";
if($bhm!="")
{
$result = mysqli_query($link,"select * from bhumi_table where bhumino='$bhm'");
//$row = mysqli_fetch_assoc($result);
while($row = mysqli_fetch_assoc($result))
{
	if($row["bhumino"]==$bhm)
	{
		$hint=$row["bhumino"];
		$msg="Farmer available";
	}
}

echo $hint;


?> 