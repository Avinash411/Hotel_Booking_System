<?php 
 include('header.php');
if($_SESSION['admin_approve']!="admin"){
  
  header('location:error.php');
}
if($_POST){
	$hotel_id=$_POST['hotel_id'];
	//$hotel_price_id=$_POST['hotel_price_id'];
    
    $sql=$con->query("SELECT * from hotel_table INNER JOIN hotel_price_table ON hotel_table.`hotel_id`=hotel_price_table.`hotel_id` where hotel_table.`hotel_id`='$hotel_id'");
    $row=mysqli_fetch_array($sql);
     // print_r($row);
     // exit();
}
//include('header.php');
?>


	<div class="container">
		<h1><strong><em><label>Edit Previous Information Of Hotel</label></em></strong></h1>
    <form action="edit_process.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="hotel_id" value="<?php echo $row['hotel_id']; ?>">
	<div class="col-lg-4 col-xs-12">
	
	<div class="form-gruop">
          <label><em>Hotel Name</em></label>
          <input type="text" placeholder="Hotel Name" class="form-control" name="hotel_name" value="<?php echo $row['hotel_name']; ?>">
      </div>


      <!-- <form accept="image_edit.php" method="post" > -->
      <div class="form-gruop">
          <label><em>Current Image</em></label>
          <?php
           if($row['hotel_image']!=""){?>
            <img src="<?php echo $row['hotel_image']; ?>" width=150 height=150>
          <?php }
          else{
            echo "no image uploaded";
          }
          ?>
          
          <!-- <label><em>Change Image</em></label> -->
          <input type="file" class="form-control" name="fily" value="<?php echo $row['hotel_image']; ?>"> 
                </div>
      <!-- <input type="Submit" name="image" class="btn btn-secondary" value="Change Image">
      </form>
 -->
      
      <div class="form-gruop">
          <label><em>City</em></label>
          <input type="text" placeholder="Hotel Name" class="form-control" name="city" value="<?php echo $row['city']; ?>">
      </div>
      <div class="form-gruop">
          <label><em>Country</em></label>
          <input type="text" placeholder="Hotel Name" class="form-control" name="country" value="<?php echo $row['country']; ?>">
      </div>
      <div class="form-gruop">
          <label><em>Adult Rate</em></label>
          <input type="text" placeholder="Hotel Name" class="form-control" name="adult" value="<?php echo $row['adult_price']; ?>">
      </div>
      <div class="form-gruop">
          <label><em>Teen Rate</em></label>
          <input type="text" placeholder="Hotel Name" class="form-control" name="teen" value="<?php echo $row['teen_price']; ?>">
      </div>
      <div class="form-gruop">
          <label><em>Child Rate</em></label>
          <input type="text" placeholder="Hotel Name" class="form-control" name="child" value="<?php echo $row['child_price']; ?>">
      </div>
       <br><input type="Submit" class="btn btn-success" name="" value="Replace it!">
	</div>
</form>
</div>
<?php include('footer.php'); ?>