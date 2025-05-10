<?php

 include (dirname(__DIR__)."/function/function.php");
GetConn();
if($connect){
	$exists = mysqli_query($connect,"select 1 from mess_manager");
	if($exists == FALSE)
	{
// sql to create table
$sql = "CREATE TABLE mess_manager (
		id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		mess_name VARCHAR(32) NOT NULL,
		name VARCHAR(32) NOT NULL,
		email VARCHAR(50) NOT NULL,
		mobile VARCHAR(15) NOT NULL UNIQUE KEY,
		username VARCHAR(15) NOT NULL UNIQUE KEY,
		password VARCHAR(15) NOT NULL,
		birthday VARCHAR(15) NOT NULL,
		total_member INT(15) NOT NULL,
		reg_date TIMESTAMP


)AUTO_INCREMENT=767400";

if (!mysqli_query($connect, $sql)) {

    echo "Error creating table: " . mysqli_error($connect);
}

}


if(!empty ($_POST)){

		$MessName= clean($_POST ["MessName"]);
		$fullName= clean($_POST ["fullName"]);
		$mobile= clean($_POST ["mobile"]);
     $username= clean($_POST ["username"]);
		$email= clean($_POST ["email"]); 
		$bd= clean($_POST ["bd"]);
		$password= $_POST ["password"];
		$confirmPassword= $_POST ["confirmPassword"];
		$five_minutes = $now + (5 * 60)-15; 
		$date = date('d/m/Y h:i A', $five_minutes); 


		//chk_exists_mobile
		$count=CheckSameValue('mess_manager','mobile',$mobile);

		if ($count >0){
			session_start ();
			$_SESSION ['error_msg'] = "Phone no already used by someone.";
			header ("Location: ../manager/registration.php");
			die(mysqli_error());
		}

		$count=CheckSameValue('mess_manager', 'username',$username);

		if ($count >0){
			session_start ();
			$_SESSION ['error_msg'] = "Username Already Used. Please Choose Another.";
			header ("Location: ../manager/registration.php");
			die(mysqli_error());
		}

		else{

			if($password != $confirmPassword){
				session_start ();
				$_SESSION ['error_msg'] = "Password and Confirm Password didn't match.";
				header ("Location: ../manager/registration.php");
				die(mysqli_error());
			}else{

				if(strlen($password)<5){
					session_start ();
					$_SESSION ['error_msg'] = "Password is too short.Use at least 5 character.";
					header ("Location: ../manager/registration.php");
					 die(mysqli_error());
				}

			}

		}

			$data_send ="INSERT INTO mess_manager (id,mess_name,name,mobile, username,email,birthday,password) 
			VALUES
			(NULL,'$MessName','$fullName','$mobile','$username','$email','$bd','$password')";


			if (mysqli_query ($connect,$data_send)){
				session_start ();
				$_SESSION ['success_msg'] = "Congratulations..!! You have registered successfully.";
				header ("Location: ../manager/registration_info_message.php");
			}
			else{
				session_start ();
				$_SESSION ['error_msg'] = "Something went wrong. Please try again";
				 echo mysqli_error($connect);
				header ("Location: ../manager/registration.php");
			}



		}//postNotEmpty


}//connect


?>