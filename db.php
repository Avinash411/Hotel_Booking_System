<?php
session_start(); 
$servername="localhost";
$username="root";
$password="";
$dbname="Hotel";

$con=new mysqli($servername,$username,$password,$dbname);
if(!isset($con)){
	echo "db is not connected. ".mysqli_error($con);
}

	// print_r($_SESSION);

?>