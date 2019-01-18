<?php 
include('db.php');
if($_SESSION['admin_approve']!="admin"){
	
	header('location:error.php');
}
if($_POST['approve']=="approved"){
	$booked_id=$_POST['booked_id'];
	$approve=$_POST['approve'];
	$sql=$con->query("UPDATE booked_table SET `admin_approve`='$approve',`approved_date`=NOW() where `booked_id`='$booked_id'");
	if($sql){
		echo "booking data inserted.";
		header('location:admin_hotel_view_for_approve.php');
	}
	else{
		echo "booking data inserted ".mysqli_error($con);
	}
}

?>