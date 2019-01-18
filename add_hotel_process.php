<?php
include('db.php');
if($_SESSION['admin_approve']!="admin"){
	
	header('location:error.php');
}
if($_POST){
	
	$hotel_name=$_POST['hotel_name'];
	
	$city=$_POST['city'];
	$country=$_POST['country'];
	$adult_rate=$_POST['adult_rate'];
	$teen_rate=$_POST['teen_rate'];
	$child_rate=$_POST['child_rate'];
	



	$file=$_FILES['file']; 
	$filename=$_FILES['file']['name'];
	$filetmp_name=$_FILES['file']['tmp_name'];
	$filesize=$_FILES['file']['size'];
	$fileerror=$_FILES['file']['error'];
	$filetype=$_FILES['file']['type'];
	
	$fileext=explode('.',$filename);

	$fileActualext=strtolower(end($fileext));

	$allowed=array('jpeg','png','jpg');

	if(in_array($fileActualext,$allowed)){
      if($fileerror==0){

       $filenewname=uniqid('',true).".".$fileActualext;

       $filedesitation="upload/".$filenewname;
       
      
       // print_r($filedesitation);
       // exit();
       move_uploaded_file($filetmp_name, $filedesitation);
 //       echo $filedesitation;
 //   echo "<br>ijjifjwifj";
 //       exit();
 //      echo "file uploaded";
       
 //      }
 //      else{
 //        echo "uploading error problem";
 //      }
	// }
	// else{
	// 	echo "your file is not actual type";
	// }
   }}

$del="available";
	$sql=$con->query("INSERT INTO hotel_table (`hotel_name`,`hotel_image`,`city`,`country`,`soft_delete`) VALUES('$hotel_name','$filedesitation','$city','$country','$del')");

// print_r("INSERT INTO hotel_table (`hotel_name`,`hotel_image`,`city`,`country`) VALUES('$hotel_name','$filedesitation','$city','$country')");
// exit();
	if(!isset($sql)){
		echo "hotel information insert level in trouble ".mysqli_error($con);
	}
	$sqlll=$con->query("SELECT hotel_id from hotel_table order by hotel_id desc limit 1");
	$last_insert_id=mysqli_fetch_array($sqlll);
      $h=$last_insert_id['hotel_id'];
	// exit();
	
	$sqll=$con->query("INSERT INTO hotel_price_table (`adult_price`,`teen_price`,`child_price`,`hotel_id`) VALUES ('$adult_rate','$teen_rate','$child_rate','$h')");
	if($sqll){
		echo "price inserted";
		header('location:add_hotel.php');
	}
	else{
		echo "price insert level in trouble ".mysqli_error($con);
	}
}
?>