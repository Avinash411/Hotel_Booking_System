<style>
	
  body{
    background-image: url(rtr.jpeg);
    background-size: cover;
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
$row=mysqli_fetch_array($sql);
?>
<div class="container">
  <label><em><strong><h2>Edit Profile</h2></strong></em></label>
  <div class="col-lg-4 col-xs-12">
  	<form action="user_profile_edit_process.php" method="post" enctype="multipart/form-data">
  		<div class="form-group">
  			<label><em>Username</em></label>
  			<input type="text" placeholder="username" class="form-control" name="username" value="<?php echo $row['username']; ?>"required>
  		</div>
  		<div class="form-group">
  			<label><em>Password</em></label>
  			<input type="text" placeholder="password" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
  		</div>
  		<div class="form-group">
  			<label><em>Re-password</em></label>
  			<input type="text" placeholder="Re-password" class="form-control" name="re_password" required>
  		</div>
  		<div class="form-group">
  			<label><em>Name</em></label>
  			<input type="text" placeholder="name" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
  		</div>

      <div class="form-gruop">
          <label><em>Current Image: </em></label>
          <?php
           if($row['user_image']!=""){?>
            <img src="<?php echo $row['user_image']; ?>" width=150 height=150>
          <?php }
          else{
            echo "<em>No Image Uploaded</em>";
          }
          ?>
          
          <!-- <label><em>Change Image</em></label> -->
          <input type="file" class="form-control" name="fily" value="<?php echo $row['user_image']; ?>"> 
                </div>
      
  		<div class="form-group">
  			<label><em>Age</em></label>
  			<input type="text" placeholder="age" class="form-control" name="age" value="<?php echo $row['age']; ?>" required>
  		</div>
  		<div class="form-group">
  			<label><em>Gender</em></label>
  			<input type="text" placeholder="gender" class="form-control" name="gender" value="<?php echo $row['gender']; ?>" required>
  		</div>
  		<div class="form-group">
  			<label><em>E-mail</em></label>
  			<input type="text" placeholder="mail" class="form-control" name="mail" value="<?php echo $row['mail']; ?>" required>
  		</div>
  		<div class="form-group">
  			<label><em>Contact</em></label>
  			<input type="text" placeholder="contact" class="form-control" name="contact" value="<?php echo $row['contact']; ?>" required>
  		</div>
  		<input type="submit" class="btn btn-success" name="" value="edit!">
  	</form>
  </div>

	</div>





<?php include('user_footer.php');?>