<?php
include('db.php');
if($_POST){
	$id=$_POST['hotel_id'];
    $del="delete";
	$sql=$con->query("UPDATE hotel_table SET `soft_delete`='$del' where `hotel_id`='$id'");
	//$sqll=$con->query("DELETE FROM hotel_price_table where `hotel_id`='$id'");
    if($sql){
    	echo "hotel deleted ";
    	header('location:list_of_hotel.php');

    }
    else{
       echo "hotel is not deleted. ".mysqli_error($con);
    }
}
?>