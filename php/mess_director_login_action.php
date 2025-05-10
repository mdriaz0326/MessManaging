<?php
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");

GetConn();
if (isset($_POST)){
	

   $mobile=$_POST["mobile"];
	$password=$_POST["password"];
   $mess_id=$_POST["mess_id"];

	$data_match = "Select * FROM mess_director WHERE mess_id='$mess_id' AND mobile='$mobile' AND password= '$password'";
	$match_result = mysqli_query($connect,$data_match);
	$match_count = mysqli_num_rows($match_result);
	$row=mysqli_fetch_assoc($match_result);
	if($match_count == 1){

		session_start ();
		$_SESSION ['logged_director_id']  = $row["director_id"];
		$_SESSION ['director_login_success']  = true; 	
		header ("Location:../manager/index.php");
		$_SESSION ['success_msg'] ="You have successfully logged In as a Director of this mess.";

	}
	else{
		session_start ();
		$_SESSION ['error_msg'] = "No matches found.Please try again.";
		header ("Location:../manager/mess_director_login.php");

	}
}else{
	mysql_errno()."Server Connection ERROR.";
}
?>