
<?php 
include('header.php');
if($_SESSION['admin_approve']!="admin"){
	
	header('location:error.php');
}
$del="available";
$sql=$con->query("SELECT * FROM hotel_table INNER JOIN hotel_price_table ON hotel_table.`hotel_id`=hotel_price_table.`hotel_id` where `soft_delete`='$del'");

?>

   <div class="container">
<table width=100% class="table">
	<tr>
		<th>Hotel Name</th>
		<th>Image</th>
		<th>City</th>
		<th>Country</th>
		<th>Adult_rate</th>
		<th>Teen_rate</th>
		<th>Child_rate</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<tr>
		<?php 

		while($row=mysqli_fetch_array($sql)){

			?>
			<td><?php echo $row['hotel_name']; ?></td>
			<td>
				<?php
				if($row['hotel_image']!=""){?>
               	 <img src="<?php echo $row['hotel_image']; ?>" width=150 height=150><?php
               	}
               	else{
               		echo "no image uploaded";
               	}
				?></td>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['country']; ?></td>
			<td><?php echo $row['adult_price']; ?></td>
			<td><?php echo $row['teen_price']; ?></td>
			<td><?php echo $row['child_price']; ?></td>
            
		     <td>
		     	<form action="edit.php" method="post">
		     		<input type="hidden" name="hotel_id" value="<?php echo $row['hotel_id'];?>">
		     		
		     		<input type="submit" name="" class="btn btn-success" value="Edit">
		     	</form>
		     </td>
		     <td>
		     	<form action="delete.php" method="post">
		     		<input type="hidden" name="hotel_id" value="<?php echo $row['hotel_id'];?>">
		     		
		     		<input type="submit" name="" class="btn btn-danger" value="Delete">
		     	</form>
		     </td>



	

	</tr>
		<?php }?>
</table>
</div>

<?php include('footer.php');?>