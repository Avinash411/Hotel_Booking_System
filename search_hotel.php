

<?php
function find_day($checkin_date,$checkout_date){
$earlier = new DateTime($checkin_date);
$later = new DateTime($checkout_date);
$diff = $later->diff($earlier)->format("%a");
 return $diff;
}
function find_price($base_price,$no_people,$day){
return $base_price*$no_people*$day;
// return $p;
}

?>



<?php
include('db.php');
include('user_header.php');
include('user_navbar.php');

    if($_POST){
    	// $user_id=$_SESSION['hotel_id'];
    	$checkin_date=$_POST['checkin_date'];
       
    	$checkout_date=$_POST['checkout_date'];
    	$city=$_POST['city'];
    	$country=$_POST['country'];
    	 $number_of_adult=$_POST['number_of_adult'];
    	 $number_of_teen=$_POST['number_of_teen'];
    	 $number_of_child=$_POST['number_of_child'];

    	$sql=$con->query("SELECT * FROM hotel_table INNER JOIN hotel_price_table ON hotel_table.`hotel_id`=hotel_price_table.`hotel_id` where `city`='$city' and `country`='$country'");

    	//$arr=mysqli_fetch_array($sql);
    	
    	// $ad=$arr['adult_price'];
    	// $at=$arr['teen_price'];
    	// $ac=$arr['child_price'];
    	
    	

    	//     $diff=find_day($checkin_date,$checkout_date);
    	// $price=find_price($ad,$number_of_adult,$diff)+find_price($at,$number_of_teen,$diff)+find_price($ac,$number_of_child,$diff);
          

     //       echo $price*$diff;
     //       exit();
 


    


    }
 ?>
 
 <div class="container">
    <h3><em>Search as..</em></h3>
 	<table width=100% class="table">
 		<tr>
 			<th>Checkin Date</th>
 			<th>Checkout Date</th>
 			<th>City</th>
 			<th>Country</th>
 			<th>No_Of_Adult</th>
 			<th>No_Of_Teen</th>
 			<th>No_Of_Child</th>
 		</tr>
 		<tr>
 			<td><?php echo $checkin_date; ?></td>
 			<td><?php echo $checkout_date; ?></td>
 			<td><?php echo $city; ?></td>
 			<td><?php echo $country; ?></td>
 			<td><?php echo $number_of_adult; ?></td>
 			<td><?php echo $number_of_teen; ?></td>
 			<td><?php echo $number_of_child; ?></td>
 		</tr>
 	</table>
 </div>
    
 <div class="container">
    <h3><em>Results..</em></h3>
 	<table width="100%" class="table">
 		<tr>
 			<th>Hotel Name</th>
 			<th>Hotel Image</th>
 			<th>Per Adult Rs</th>
 			<th>Per Teen Rs</th>
 			<th>Per Child Rs</th>
 			<th>Total Price</th>
 			<th>Book Now</th>

 		</tr>
 		<?php 
 		while($row=mysqli_fetch_array($sql)){ ?>
 		<tr>
 			<td><?php echo $row['hotel_name']; ?></td>
 			<td><img src="<?php echo $row['hotel_image']; ?>" width=150 height=150></td>
 			<td><?php echo $row['adult_price']; ?></td>
 			<td><?php echo $row['teen_price']; ?></td>
 			<td><?php echo $row['child_price']; ?></td>
 			<td>
 				<?php
               $ad=$row['adult_price'];
    		   $at=$row['teen_price'];
    	       $ac=$row['child_price'];
               $diff=find_day($checkin_date,$checkout_date);

               $price=find_price($ad,$number_of_adult,$diff)+find_price($at,$number_of_teen,$diff)+find_price($ac,$number_of_child,$diff);
               if($price==0){
                $_SESSION['search']="enter valid information";
                header('location:user_search.php');
               }
               echo $price;
 				?>
 			</td>
 			<td>
 				<form action="booking_complete.php" method="post">
 					<input type="hidden" name="checkin_date" value="<?php echo $checkin_date; ?>">

 					<input type="hidden" name="checkout_date" value="<?php echo $checkout_date; ?>">
 					<input type="hidden" name="number_of_adult" value="<?php echo $number_of_adult; ?>">
 					<input type="hidden" name="number_of_teen" value="<?php echo $number_of_teen; ?>">
 					<input type="hidden" name="number_of_child" value="<?php echo $number_of_child; ?>">
                    <input type="hidden" name="hotel_id" value="<?php echo $row['hotel_id']; ?>">
                    <input type="hidden" name="hotel_price_id" value="<?php echo $row['hotel_price_id']; ?>">
                    <input type="hidden" name="per_adult" value="<?php echo $row['adult_price']; ?>">
                    <input type="hidden" name="per_teen" value="<?php echo $row['teen_price']; ?>">
                    <input type="hidden" name="per_child" value="<?php echo $row['child_price']; ?>">
                    <input type="hidden" name="user_id" value="">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <input type="submit" name="" class="btn btn-success" value="Book">

 				</form>
 			</td>
 		</tr>
 		<?php } ?>
 	
 	</table>
 </div>









<?php include('user_footer.php');?>