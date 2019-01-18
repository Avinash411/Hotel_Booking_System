<?php
include('db.php');
if($_POST){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql=$con->query("SELECT * FROM user_details where `username`='$username' and `password`='$password'");
	$find=mysqli_fetch_array($sql);
	if(isset($find)){
		if($find[user_approve]==="admin"){
      $_SESSION['user_id']=$find[user_id];

      $_SESSION['admin_approve']=$find[user_approve];
      header('location:admin_view.php');}
        else{
       $_SESSION['user_id']=$find[user_id];
        $_SESSION['user_approve']=$find[user_approve];
        header('location:user_view.php');
        }
   
   
	}
	else{

    
		echo "user in login trouble".mysqli_error($con);
	}
}
?>
<?php
if(!empty($_SESSION['user_id'])){
    $id_se=$_SESSION['user_id'];
    $sqll=$con->query("SELECT * from user_details where `user_id`='$id_se'");
   //print_r("SELECT * from user_details where `id`='$id_se'");
    $see=mysqli_fetch_array($sqll);
     
    if(isset($see)){
        
        if($see[user_approve]==="admin"){
      $_SESSION['user_id']=$see[user_id];

      $_SESSION['admin_approve']=$see[user_approve];
      header('location:admin_view.php');}
        else{
       $_SESSION['user_id']=$see[user_id];
       $_SESSION['user_approve']=$find[user_approve];
        header('location:user_view.php');
        }
   
   
	}
    }
    

?>
