
<?php
include('header.php');
if($_SESSION['admin_approve']!="admin"){
    
    header('location:error.php');
}
$add="pending";
   $sql=$con->query("SELECT * FROM booked_table INNER JOIN hotel_table ON booked_table.`hotel_id`=hotel_table.`hotel_id` where `admin_approve`='$add'");

?>
<div class="container col-lg-12">
     <table width="100%" class="table">
     	<tr>
     		<th>User_id</th>
     		<th>Hotel_id</th>
     		<th>Checkin_date</th>
     		<th>Checkout_date</th>
     		<th>No_of_adult</th>
     		<th>No_of_teen</th>
     		<th>No_of_child</th>
     		
            <th>Price</th>
            <th>Status</th>

     	</tr>
        <?php while($row=mysqli_fetch_array($sql)){ ?>
     	<tr>
            <td><?php 

            echo $row['user_id']; ?></td>
     		<td><?php echo $row['hotel_name']; ?></td>
     		<td><?php echo $row['checkin_date']; ?></td>
     		<td><?php echo $row['checkout_date']; ?></td>
     		<td><?php echo $row['Number_of_adult']; ?></td>
     		<td><?php echo $row['Number_of_teen']; ?></td>
     		<td><?php echo $row['Number_of_child']; ?></td>
     		
            <td><?php echo $row['price']; ?></td>
            <td>
            	<form action="hotel_approve.php" method="post">
            		<input type="hidden" name="booked_id" value="<?php echo $row['booked_id']; ?>">
            		<input type="hidden" name="approve" value="approved">
                    	<!-- <option name="approve" value="pending">Pending</option>
            			<option name="approve" value="approved">Approved</option>
            		</select> -->
            		<input type="submit" name="" class="btn btn-success" value="Approve it!">
            	</form>
            </td>     		
     	</tr>
     <?php } ?>
     </table>
 </div>

<?php include('footer.php'); ?>