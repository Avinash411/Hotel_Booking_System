<style>
     body{
          background-image: url(ggkj.jpeg);
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
// if($_POST){
//      $city=$_POST['city'];
//      $sql=$con->query("SELECT country FROM hotel_table where `city`='$city'");
//      $rr=mysqli_fetch_array($sql);
// }
?>
<div class="container">
<form action="search_hotel.php" method="post">
   	<div class="col-lg-4 col-xs-12">

     <label style="color:white"><em><strong><h2>Hotel Search</h2></strong></em></label>
     <div class="form-group">
          
     	<label style="color:white"><em>Checkin Date</em></label>
          <input type="date" class="form-control" name="checkin_date" value="<?php echo date('Y-m-d'); ?>"required>
     </div>
          <div class="form-group">
               <label style="color:white"><em>Checkout Date</em></label>
     	
     	<input type="date" class="form-control" name="checkout_date" value="" required>
          <small style="color: red;">Date should be choose by  date calender</small>
     </div>
          <div class="form-group">
     	<label style="color:white"><em>City</em></label>

          <!-- <form accept="" method="post"> -->
     	<input type="text" class="form-control" placeholder="City" name="city" required>
           <!-- <input type="submit" name="" value="city"> -->
     <!-- </form> -->
     </div>
          <div class="form-group">
     	<label style="color:white"><em>Country</em></label>

     	<input type="text" class="form-control" placeholder="Country" name="country" required>
     </div>
          <div class="form-group">
     	<label style="color:white"><em>Number Of Adult</em></label>

     	<input type="text" class="form-control" name="number_of_adult" placeholder="Number Of adult" required>
     </div>
     
          <div class="form-group">
               <label style="color:white"><em>Number Of Teen</em></label>
     	
     	<input type="text" class="form-control" name="number_of_teen" placeholder="Number Of Teen" required>
     </div>
     
          <div class="form-group">
               <label style="color:white"><em>Number Of Child</em></label>
     	
     	<input type="text" class="form-control" placeholder="Number Of Child" name="number_of_child" required>
     </div>
     <input type="Submit" class="btn btn-success" name="" value="find!">
</div>
</form>
</div>







<?php include('user_footer.php'); ?>