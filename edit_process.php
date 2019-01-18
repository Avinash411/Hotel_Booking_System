<?php
include('db.php');
if($_SESSION['admin_approve']!="admin"){
    
    header('location:error.php');
}

if($_POST){
	$hotel_id=$_POST['hotel_id'];
    // echo $hotel_id;
    // exit();
	$hotel_name=$_POST['hotel_name'];
	
	$city=$_POST['city'];
	$country=$_POST['country'];
	$adult=$_POST['adult'];
	$teen=$_POST['teen'];
	$child=$_POST['child'];
    
$file=$_FILES['fily'];
// print_r($file);
// exit();    
if($file['name']!="" and $file['name']!="null"){
// echo "hhhhhh";
// exit();
$hotel_id=$_POST['hotel_id'];
   

    $filename=$_FILES['fily']['name'];
    $filetmp_name=$_FILES['fily']['tmp_name'];
    $filesize=$_FILES['fily']['size'];
    $fileerror=$_FILES['fily']['error'];
    $filetype=$_FILES['fily']['type'];
    
    $fileext=explode('.',$filename);

    $fileActualext=strtolower(end($fileext));

    $allowed=array('jpeg','png','jpg');

    if(in_array($fileActualext,$allowed)){
      if($fileerror==0){
       $filenewname=uniqid('',true).".".$fileActualext;
       $desitation="upload/".$filenewname;
       
      
       // print_r($filedesitation);
       // exit();
       move_uploaded_file($filetmp_name, $desitation);
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
    //  echo "your file is not actual type";
    // }
   }}

    
    $sql=$con->query("UPDATE hotel_table SET `hotel_name`='$hotel_name',`hotel_image`='$desitation',`city`='$city',`country`='$country' where `hotel_id`='$hotel_id'");}
    else{
        $sql=$con->query("UPDATE hotel_table SET `hotel_name`='$hotel_name',`city`='$city',`country`='$country' where `hotel_id`='$hotel_id'");
    }
    // print_r("UPDATE hotel_price_table SET `adult_price`='$adult',`teen_price`='$teen',`child_price`='$child' where `hotel_id`='$hotel_id'");
    // exit();

    
    $sqql=$con->query("UPDATE hotel_price_table SET `adult_price`='$adult',`teen_price`='$teen',`child_price`='$child' where `hotel_id`='$hotel_id'");

     if($sql){
     	echo "hotel table update";
     }
     else{
     	echo "hotel table is not update ".msqli_error($con);
     }
if($sqql){
     	echo "hotel price table update";
     header('location:list_of_hotel.php');
     }
     else{
     	echo "hotel price table is not update ".msqli_error($con);
     }
}
?>