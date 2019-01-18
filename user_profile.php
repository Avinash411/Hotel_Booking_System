<style>
	
	body{
		/*background-image: url(ttt.jpg);*/
		/*background-size: cover;*/
	}
</style>
<?php 
include('db.php');
if(empty($_SESSION['user_id'])){
	
	header('location:sign_in.html');
}
include('user_header.php');
include('user_navbar.php');
$user_id=$_SESSION['user_id'];
$sql=$con->query("SELECT * FROM user_details where `user_id`='$user_id'");

?>

<div class="container">
 <div class="row col-md-12">
 	<?php while($row=mysqli_fetch_array($sql)){?>
 	<div class="col-md-4">
 		<?php
				if($row['user_image']!=""){?>
               	 <img src="<?php echo $row['user_image']; ?>" width=150 height=150><?php
               	}
               	else{
               		echo "<em>no image uploaded</em>";
               	}
				?>
 	</div>
 	<div class="col-md-1"></div>
<div class="col-md-5">
	<strong><em>Username</em>: </strong><em><?php echo $row['username']; ?></em><br>

	<strong><em>Password</em>: </strong><?php echo $row['password']; ?><br>
		<strong><em>Name</em>: </strong><?php echo $row['name']; ?><br>
		<strong><em>Age</em>: </strong><?php echo $row['age']; ?><br>
		<strong><em>Gender</em>: </strong><em><?php echo $row['gender']; ?></em><br>
		<strong><em>E-mail</em>: </strong><em><?php echo $row['mail']; ?></em><br>
		<strong><em>Contact No.</em>: </strong><em><?php echo $row['contact']; ?></em><br>
		<strong><em>Status</em>: </strong><em><?php echo $row['user_approve']; ?></em>
		<a href="user_edit.php"><button type="button" class="btn btn-primary" style="float: right;">Edit Profile</button></a>
</div>
<?php } ?>
 </div>

	
</div>








<?php 

include('user_footer.php');?>