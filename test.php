<?php

session_start ();
include("DB connection.php"); 
if(isset($_REQUEST['update']))
{
$a = $_REQUEST['cemail'];
	$_SESSION["email"]= $a;
	header("location: customer-view.php");
}

if(isset($_REQUEST['reserve']))
{

	echo "aaaaaaaa";
    //echo 
	//$_SESSION['plate_id'] = $plate;
	//header("location: output-customer.php");
	
}




?>
