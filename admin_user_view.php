
<?php
include('header.php');
if($_SESSION['admin_approve']!="admin"){
	
	header('location:error.php');
}
$approve_state="approved";
$sql=$con->query("SELECT * FROM user_details where `user_approve`='$approve_state'");
?>
<div class="container">
	<table width=100% class="table">
	<tr>
		<th>User_id</th>
		<th>User_name</th>
		<th>Password</th>
		<th>Name</th>
		<th>Image</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Mail</th>
		<th>Contact No.</th>
		<th>User Approve</th>
		
		<th>Delete</th>
	</tr>
	
		<?php while($row=mysqli_fetch_array($sql)){ ?>
			<tr>
				<td><?php echo $row['user_id']; ?></td>
		<td><?php echo $row['username']; ?></td>
		<td><?php echo $row['password']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td>
				<?php
				if($row['user_image']!=""){?>
               	 <img src="<?php echo $row['user_image']; ?>" width=150 height=150><?php
               	}
               	else{
               		echo "no image uploaded";
               	}
				?></td>
		<td><?php echo $row['age']; ?></td>
		<td><?php echo $row['gender']; ?></td>
		<td><?php echo $row['mail']; ?></td>
		<td><?php echo $row['contact']; ?></td>
		<td><?php echo $row['user_approve']; ?></td>
		<td>
			<form action="user_delete_by_admin.php" method="post">
				<input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
				<input type="Submit" name="user"  class="btn btn-danger" value="Delete">
			</form>
		</td>
	</tr>
	<?php }?>
	
</table>
</div>
<?php include('footer.php');
?>