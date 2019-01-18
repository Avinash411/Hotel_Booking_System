<?php
include('header.php');
if($_SESSION['admin_approve']!="admin"){
	
	header('location:error.php');
}
?>

<form action="admin_hotel_view_for_approve.php" method="post">
<input type="Submit" class="btn btn-primary" name="" value="Booking for approve!">

</form>
<form action="admin_hotel_view_for_approved.php" method="post">
<br>	
<input type="Submit" class="btn btn-secondary" name="" value="Approved Booking!">

</form>

<!-- <a href="admin_hotel_view_for_approve.php"></a> -->



































<?php include('footer.php');?>