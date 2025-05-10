<?php
include("{$_SERVER['DOCUMENT_ROOT']}/mess_bazar/function/function.php");
GetConn();

if($connect){
	$exists = mysqli_query($connect,"select 1 from mess_director");
	if($exists == FALSE)
	{
// sql to create table
$sql = "CREATE TABLE mess_director (
		id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		mess_id VARCHAR(32) NOT NULL UNIQUE KEY,
    director_id VARCHAR(32) NOT NULL UNIQUE KEY,
		email VARCHAR(50) NOT NULL UNIQUE KEY,
	  mobile VARCHAR(15) NOT NULL UNIQUE KEY,
    password VARCHAR(15) NOT NULL,
    reg_date TIMESTAMP

)AUTO_INCREMENT=1";

if (!mysqli_query($connect, $sql)) {

    echo "Error creating table: " . mysqli_error($connect);
}

}


if(!empty ($_POST)){

		$mess_id= clean($_POST ["mess_id"]);

		$mobile= clean($_POST ["mobile"]);

		$email= clean($_POST ["email"]); 

		$password= $_POST ["password"];
		$confirmPassword= $_POST ["confirmPassword"];

     session_start();
     $logged_ManagerID= $_SESSION['logged_ManagerID'];
     $ran_num= rand(1000,10000);
     $director_id=$logged_ManagerID.$ran_num;
		//chk_exists_mobile
		$count=CheckSameValue(mess_director,mobile,$mobile);

		if ($count >0){
			session_start ();
			$_SESSION ['error_msg'] = "Phone no already used by someone.";
			header ("Location: ../manager/mess_director_signup.php");
			die(mysqli_error());
		}


		else{

			if($password != $confirmPassword){
				session_start ();
				$_SESSION ['error_msg'] = "Password and Confirm Password didn't match.";
				header ("Location: ../manager/mess_director_signup.php");
				die(mysqli_error());
			}else{

				if(strlen($password)<5){
					session_start ();
					$_SESSION ['error_msg'] = "Password is too short.Use at least 5 character.";
					header ("Location: ../manager/mess_director_signup.php");
					 die(mysqli_error());
				}

			}



			$data_send ="INSERT INTO mess_director (id,mess_id, director_id, mobile, email, password) 
			VALUES
			(NULL,'$mess_id','$director_id','$mobile','$email','$password')";


			if (mysqli_query ($connect,$data_send)){
				session_start ();
				$_SESSION ['success_msg'] = "Congratulations..!! You have Registered Successfully as a Director of this Please LogIn";
				header ("Location: ../manager/mess_director_login.php");
			}
			else{
				session_start ();
				$_SESSION ['error_msg'] = "Something went wrong. Please try again";
				 die(mysqli_error());
				header ("Location: ../manager/mess_director_signup.php");
			}

}

		}//postNotEmpty


}//connect


?>