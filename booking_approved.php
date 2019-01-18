<style>
	
	body{
		background-image: url(book.jpg);
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
$add="approved";
   $sql=$con->query("SELECT * FROM booked_table INNER JOIN hotel_table ON booked_table.`hotel_id`=hotel_table.`hotel_id` where `admin_approve`='$add'");
?>
<div class="container">
<table width="100%"class="table">
	<tr>
		<th>Checkin Date</th>
 			<th>Checkout Date</th>
 			<th>City</th>
 			<th>Country</th>
 			
 			<th>Hotel Name</th>
 			
 			
 			<th>Total Price</th>
 			<th>Book Now</th>
	</tr>
	<?php while($row=mysqli_fetch_array($sql)){ ?>
	<tr>
		<td><?php echo $row['checkin_date']; ?></td>
		<td><?php echo $row['checkout_date']; ?></td>
		<td><?php echo $row['city']; ?></td>
		<td><?php echo $row['country']; ?></td>
		
		<td><?php echo $row['hotel_name']; ?></td>
 		<td><?php echo $row['price']; ?></td>	
 			<td><?php echo $row['admin_approve']; ?></td>
	</tr>
<?php } ?>
</table>
</div>















<?php include('user_footer.php');?>