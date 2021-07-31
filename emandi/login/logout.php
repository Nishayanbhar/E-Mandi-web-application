<?php

// Initialize the session

session_start();

 

// Unset all of the session variables

$_SESSION = array();

 

// Destroy the session.

session_destroy();
echo "<script> alert('Thank You For Using E-Mandi.'); window.location.href='../index.php'; </script> ";

?>

