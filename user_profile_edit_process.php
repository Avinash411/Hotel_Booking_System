<?php 
include('db.php');
if(empty($_SESSION['user_id'])){
	
	header('location:sign_in.html');
}
if($_POST){
	$user_id=$_SESSION['user_id'];
		$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);

	$password=$_POST['password'];
	$re_password=$_POST['re_password'];
	if($password!=$re_password){
		echo "enter same password";
		header('location:user_edit.php');
	}
	$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	$age=$_POST['age'];

	if(filter_var($age, FILTER_VALIDATE_INT) != 0 && empty(filter_var($age, FILTER_VALIDATE_INT))){
     echo "Enter valid age.";
     //header('location:sign_up_form.html');
	}
	$gender=$_POST['gender'];
	// echo $gender;
	// exit();
	$mail=filter_var($_POST['mail'],FILTER_SANITIZE_EMAIL);
	if(empty(filter_var($mail,FILTER_VALIDATE_EMAIL))){
		echo "enter valid email.";
	}
	$contact=$_POST['contact'];
	if(empty(filter_var($contact,FILTER_VALIDATE_INT))){
		echo "enter valid contect.";
	}
	$file=$_FILES['fily'];
 // / print_r($_FILES['fily']);
  // exit();
// print_r($file);
// exit();    
if($file['name']!="" and $file['name']!="null"){
// echo "hhhhhh";
// exit();
//$hotel_id=$_POST['hotel_id'];
   

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

    
$sql=$con->query("UPDATE user_details SET `username`='$username',`password`='$password',`name`='$name',`age`='$age',`gender`='$gender',`mail`='$mail',`contact`='$contact',`user_image`='$desitation' where `user_id`='$user_id'" );
}
    else{
        $sql=$con->query("UPDATE user_details SET `username`='$username',`password`='$password',`name`='$name',`age`='$age',`gender`='$gender',`mail`='$mail',`contact`='$contact' where `user_id`='$user_id'" );
    }
    // print_r("UPDATE user_details SET `username`='$username',`password`='$password',`name`='$name',`age`='$age',`gender`='$gender',`mail`='$mail',`contact`='$contact' where `user_id`='$user_id'");
    // exit();
   
   if($sql){
   	echo "user profile update level completed";
   	header('location:user_profile.php');
   }
   else{
   	echo "update level in trouble ".mysqli_error($con);
   }
}

?>