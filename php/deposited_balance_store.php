<?php
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
OnlyMangerEntry('../manager/mess_director_login.php');
GetConn();

if($connect){
$exists = mysqli_query($connect,"select 1 from balance_deposit");
	if($exists == FALSE)
	{
// sql to create table
$sql_tbl= "CREATE TABLE balance_deposit (
	   id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		ManagerID INT(10) NOT NULL,
		depositor VARCHAR(32) NOT NULL,
		deposits_date VARCHAR(15) NOT NULL,
		amount VARCHAR(15) NOT NULL,

		sub_date TIMESTAMP,
		FOREIGN KEY ManagerMember(ManagerID)
	    REFERENCES mess_manager(id)
	    ON UPDATE CASCADE
	    ON DELETE CASCADE
		
)AUTO_INCREMENT=1";

}

if (mysqli_multi_query($connect, $sql_tbl)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}




if(!empty ($_POST)){

		$depositor= clean($_POST ["depositor"]);
		$deposits_date= $_POST ["deposits_date"];
		$amount= clean($_POST ["amount"]);

session_start();
$ManagerID=$_SESSION ['logged_ManagerID'];

$sql="INSERT INTO balance_deposit (ManagerID, depositor, amount,deposits_date) VALUES ('$ManagerID','$depositor','$amount','$deposits_date')";



if(mysqli_multi_query($connect,$sql)){

		    	$_SESSION ['success_msg'] = number_format($amount) ." Taka Deposited  Successfully.";
			 	header ("Location: ../members/view.php?id=$depositor");
			} else {
		    	echo "Error updating record: " . mysqli_error($connect);
		    	header("../manager/deposit.php");
			}


}
}

?>