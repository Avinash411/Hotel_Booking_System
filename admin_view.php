<style>
	body{
		background-image: url(bbs.jpg);
		background-size: cover;
	}
</style>
<?php 
include('header.php');

if($_SESSION['admin_approve']!="admin"){
	
	header('location:error.php');
}
$approve="not_approve";
$sql=$con->query("SELECT COUNT(`user_id`) FROM user_details where `user_approve`='$approve'");
$new_user=mysqli_fetch_array($sql);

$add="pending";
   $sqll=$con->query("SELECT COUNT(`booked_id`) FROM booked_table  where `admin_approve`='$add'");
   //print_r(mysqli_fetch_array($sqll));
   $appro=mysqli_fetch_array($sqll);
?>

<div class="container">
<div class="row">
 
<div class="card" style="width: 18rem;margin:0px 125px;">
  <img class="card-img-top" src="newuser.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">New User</h5>
    <p class="card-text"><?php echo $new_user[0]; ?></p>
    <a href="admin_new_user_view.php" class="btn btn-primary">Approve it!</a>
  </div>
</div>

<div class="card" style="width: 18rem; margin:0px 100px;">
  <img class="card-img-top" src="newbook.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">New Booking</h5>
    <p class="card-text"><?php echo $appro[0]; ?></p>
    <a href="admin_hotel_view_for_approve.php" class="btn btn-primary">Approve it!</a>
  </div>
</div>
</div> 
  
<div style="color: white;">
	<h3>Introdution</h3>
<p>This is admin part where admin can add ,edit and delete hotel information. </p>
</div>
	</div>




<?php include('footer.php');?>

