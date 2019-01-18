<?php

function del($user_id){
include('db.php');	
if($_SESSION['admin_approve']!="admin"){
	
	header('location:error.php');
}
$user_id=$_SESSION['user_id'];
$del="delete";
	$sql=$con->query("UPDATE user_details SET `soft_delete`='$del' where `user_id`='$user_id'");
	if($sql){
		echo "user deleted";
		
	}
	else{
		echo "user is not deleted. ".mysqli_error($con);
	}
}
if($_POST['new_user']){
	del($_POST['user_id']);
	header('location:admin_new_user_view.php');
}
if($_POST['user']){
del($_POST['user_id']);
	header('location:admin_user_view.php');	
}
?>
