<?php 
include('db.php');
if($_POST){
	$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);

	$password=$_POST['password'];
	$re_password=$_POST['re_password'];
	if($password!=$re_password){
		echo "enter same password";
		header('location:sign_up_form.html');
	}
	$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	$age=$_POST['age'];
	if(filter_var($age, FILTER_VALIDATE_INT) != 0 && empty(filter_var($age, FILTER_VALIDATE_INT))){
     echo "Enter valid age.";
     header('location:sign_up_form.html');
	}
	$gender=$_POST['gender'];
	$mail=filter_var($_POST['mail'],FILTER_SANITIZE_EMAIL);
	if(empty(filter_var($mail,FILTER_VALIDATE_EMAIL))){
		echo "enter valid email.";
	}
	
	$contact=$_POST['contact'];
	if(empty(filter_var($contact,FILTER_VALIDATE_INT))){
		echo "enter valid contect.";
	}
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
    // echo $filedesitation;
    // exit();
   }}
    $app="not_approve";
   $sql=$con->query("INSERT INTO user_details (`username`,`password`,`name`,`age`,`gender`,`mail`,`contact`,`user_approve`,`user_image`) VALUES ('$username','$password','$name','$age','$gender','$mail','$contact','$app','$filedesitation')" );
   if($sql){
   	echo "inerted level completed";
   	header('location:sign_in.html');
   }
   else{
   	echo "insert level in trouble ".mysqli_error($con);
   }
}
?>