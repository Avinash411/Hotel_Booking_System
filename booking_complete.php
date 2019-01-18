<?php
include('db.php');
if(empty($_SESSION['user_id'])){
    
    header('location:sign_in.html');
}
if($_POST){
	$checkin_date=$_POST['checkin_date'];
       
        $checkout_date=$_POST['checkout_date'];
    	 $number_of_adult=$_POST['number_of_adult'];
    	$number_of_teen=$_POST['number_of_teen'];
    	$number_of_child=$_POST['number_of_child'];
        $hotel_id=$_POST['hotel_id'];
        $hotel_price_id=$_POST['hotel_price_id'];
         $per_adult=$_POST['per_adult'];
    	 $per_teen=$_POST['per_teen'];
    	 $per_child=$_POST['per_child'];
    	 $user_id=$_SESSION['user_id'];
    	 $price=$_POST['price'];
         $approve="pending";
         // print_r("INSERT INTO booked_table (`checkin_date`,`checkout_date`,`number_of_adult`,`number_of_teen`,`number_of_child`,`hotel_price_id`,`individual_rate_adult`,`individual_rate_teen`,`individual_rate_child`,`admin_approve`,`user_id`,`price`,`hotel_id`) VALUES ('$checkin_date','$checkout_date','$number_of_adult','$number_of_teen','$number_of_child','$hotel_price_id','$per_adult','$per_teen','$per_child','$approve','$user_id','$price','$hotel_id')");
         // exit();
    	 $sql=$con->query("INSERT INTO booked_table (`checkin_date`,`checkout_date`,`number_of_adult`,`number_of_teen`,`number_of_child`,`hotel_price_id`,`individual_rate_adult`,`individual_rate_teen`,`individual_rate_child`,`admin_approve`,`user_id`,`price`,`hotel_id`) VALUES ('$checkin_date','$checkout_date','$number_of_adult','$number_of_teen','$number_of_child','$hotel_price_id','$per_adult','$per_teen','$per_child','$approve','$user_id','$price','$hotel_id')");
if($sql){
	echo "inserted";
 header('location:pending_booking.php');
} else{
	echo "error in booking table iserting level".mysqli_error($con);
}   	

}
?>