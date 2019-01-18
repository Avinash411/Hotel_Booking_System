<?php 
include('db.php');
if($_SESSION['admin_approve']!="admin"){
	
	header('location:error.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin_view</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php include('admin_navbar.php');?>

