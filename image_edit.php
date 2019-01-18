<?php 
include('db.php');
if($_SESSION['admin_approve']!="admin"){
  
  header('location:error.php');
}
if($_POST){
$file=$_POST['fily'];
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
   $sql=$con->query("UPDATE hotel_table SET `hotel_image`='$desitation' where `hotel_id`='$hotel_id'");
   if($sql){
   	header('location:edit.php');
   }
   else {
   	echo "error".mysqli_error($con);
   }
}

?>