<?php
include('db.php');
// include('')
// if($_SESSION['admin_approve']!="admin"){
	
// 	header('location:error.php');
// }
$add="pending";
$sql=$con->query("SELECT count(booked_id) From booked_table where `admin_approve`='$add'");
$rr=mysqli_fetch_array($sql);
// print_r($rr);
// exit();
// $sqll=$con->query("SELECT `checkin`")
$sqql=$con->query("SELECT MONTH(NOW()) as mon");
$rt=mysqli_fetch_array($sqql);
$as="approved";
$squql=$con->query("SELECT count(booked_id) from booked_table where MONTH(approved_date)='$rt[mon]' and `admin_approve`='$as'");
$rtr=mysqli_fetch_array($squql);
// print_r($rtr);
// exit();
   if($_POST){

   }

?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
<style>
body {
    font-family: 'Aclonica';font-size: 22px;
}
.box1{
	/*background-color: red;*/

	width:300px;
	height: 150px;
    border: 1px solid black;
    box-sizing: border-box;
    background-color:rgba(0,70,100,1); 
}
.box2{
	/*background-color: blue;*/
	width:300px;
	height: 150px;
    border: 1px solid black;
    box-sizing: border-box;
    background-color: rgba(0,70,100,1);
}
.center{
	/*color: white;*/
    margin: 50px 125px;
}
/*.row{
	border: 1px solid black;
	box-sizing: border-box;
}*/
</style>
</head>
<body>
	<div class="container">
	<div class="row col-lg-12">
	       <div class="col-lg-4">
             <h1>Pending Booking</h1>
      		  <div class="box1">
      		  	<div class="center">
      		   <h1><label style="color: red"><?php echo $rr[0];?></label></h1>
      		  </div></div>
           </div>
			<div class="col-lg-8">
				<h1>Confirm Booking Of This Month</h1>
      				<div class="box2">
      					<div class="center">
      						<h1><label style="color: red"><?php echo $rtr[0];?></label></h1>
      					</div>
      				</div>
            </div>
      </div>

</div>
<div class="container">
	<div class="col-lg-12">
		filter
    <form action="" method="post">
      
      City <SELECT><?php $sqlll=$con->query("SELECT * from hotel_table");
      while($row=mysqli_fetch_array($sqlll)){?>
      <option name="city" value="<?php echo $row['city'];?>"><?php echo $row['city']; ?></option><?php }?></SELECT> 
      Country <SELECT><?php $sqlll=$con->query("SELECT * from hotel_table");
       while($row=mysqli_fetch_array($sqlll)){?>
      <option name="country" value="<?php echo $row['country'];?>"><?php echo $row['country']; ?></option><?php }?></SELECT> 
      Hotel Name <SELECT><?php  
      $sqlll=$con->query("SELECT * from hotel_table");
      while($row=mysqli_fetch_array($sqlll)){?>
      <option name="hotel_name" value="<?php echo $row['hotel_name'];?>"><?php echo $row['hotel_name']; ?></option><?php }?></SELECT> 
      Status<SELECT><?php $sqlll=$con->query("SELECT * from booked_table");
       while($row=mysqli_fetch_array($sqlll)){?> 
      <option name="admin_approve" value="<?php echo $row['admin_approve'];?>"><?php echo $row['admin_approve']; ?></option><?php }?></SELECT>
      User <SELECT><?php  $sqlll=$con->query("SELECT * from hotel_table");
      while($row=mysqli_fetch_array($sqlll)){?>
      <option name="city" value="<?php echo $row['city'];?>"><?php echo $row['city']; ?></option><?php }?></SELECT>
      
      <input type="Submit" name="">
    </form>
	</div>
</div>
</body>
</html>
