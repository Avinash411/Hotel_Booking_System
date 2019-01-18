<?php
include('header.php');
if($_SESSION['admin_approve']!="admin"){
  
  header('location:error.php');
}
?>
	<div class="container">
		<h1><strong><em><label>Add New Hotel</label></em></strong></h1>
	       <form action="add_hotel_process.php" method="post" enctype="multipart/form-data">
          <div class="col-lg-4 col-xs-12">
         
          <div class="form-gruop">
          <label><em>Hotel Name</em></label>
          <input type="text" placeholder="Hotel Name" class="form-control" name="hotel_name">
      </div>
      <div class="form-gruop">
          <label><em>Upload Hotel Image</em></label>
          <input type="file" class="form-control" name="file">
      </div>
      <div class="form-gruop">
          <label><em>City</em></label>
          <input type="text" placeholder="City" class="form-control" name="city">
      </div>
      <div class="form-gruop">
          <label><em>Country</em></label>
          <input type="text" placeholder="Country" class="form-control" name="country">
      </div>
      <div class="form-gruop">
          <label><em>Adult Rate</em></label>
          <input type="text" placeholder="Adult Rate" class="form-control" name="adult_rate">
      </div>
      <div class="form-gruop">
          <label><em>Teen Rate</em></label>
          <input type="text" placeholder="Teen Rate" class="form-control" name="teen_rate">
      </div>
      <div class="form-gruop">
          <label><em>Child Rate</em></label>
          <input type="text" placeholder="Child Rate" class="form-control" name="child_rate">
      </div>
        <div class="from-group">
        <br><input type="submit" class="btn btn-success" name="sub" value="Add hotel">
        </div>
      </div>
       </form>
       </div>


<?php include('footer.php'); ?>