<?php
include('db.php');
if($_SESSION['admin_approve']!="admin"){
    
    header('location:error.php');
}
if($_POST){
	$user_id=$_POST['user_id'];
	$approve=$_POST['approve'];
	$sql=$con->query("UPDATE user_details SET `user_approve`='$approve' where `user_id`='$user_id'");
    
    if($sql){
    	echo "user approved";
    	header('location:admin_new_user_view.php');
    }
    else{
    	echo "user approved level not complete. ".mysqli_error($con);
    }
}

?>