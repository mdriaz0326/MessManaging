<?php
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
OnlyMangerEntry('../manager/mess_director_login.php');

GetConn();
if($connect){

	$exists = mysqli_query($connect,"select 1 from bazar_list");
	if($exists == FALSE)
	{
// sql to create table
$sql = "CREATE TABLE bazar_list (
	   id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		ManagerID INT(10) NOT NULL,
		purchasers VARCHAR(32) NOT NULL,
		token_no VARCHAR(15) NOT NULL,
    date VARCHAR(15) NOT NULL, 
    status VARCHAR(15) NOT NULL, 
		reg_date TIMESTAMP,
		FOREIGN KEY ManagerMember(ManagerID)
	    REFERENCES mess_manager(id)
	    ON UPDATE CASCADE
	    ON DELETE CASCADE
		
)AUTO_INCREMENT=10";

if (mysqli_query($connect, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}

}
}

 if(!empty ($_POST)){
session_start();
$ManagerID=$_SESSION ['logged_ManagerID'];
$x= count($_POST['name']);

$n=range(10000,100000);
shuffle($n);


for($i=0;$i<$x;$i++){
$token[$i]=$ManagerID.$n[$i];

 $purchasers[$i]=clean($_POST['name'][$i]);
 $date[$i]=$_POST['date'][$i];

}
$sql="INSERT INTO bazar_list (ManagerID, purchasers,date,token_no) VALUES";

for($i=0;$i<$x;$i++){
 $sql .= "('$ManagerID','$purchasers[$i]','$date[$i]','$token[$i]'),";

}
$sql=rtrim($sql,",");



if(mysqli_multi_query($connect,$sql)){

		    	$_SESSION ['success_msg'] = "Bazar List Records Updated Successfully.";
			 	header ("Location: ../bazar_list.php");
			} else {
		    	echo "Error updating record: " . mysqli_error($connect);
		    	header("../manager/bazar_list_creator.php");
			};

}



?>