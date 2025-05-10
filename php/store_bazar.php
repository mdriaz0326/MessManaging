<?php
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
GetConn();


if($connect){
$exists = mysqli_query($connect,"select 1 from daily_bazar");
	if($exists == FALSE)
	{
// sql to create table
$sql3 = "CREATE TABLE daily_bazar (
	   id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		ManagerID INT(10) NOT NULL,
		purchasers VARCHAR(32) NOT NULL,
		purchases_date VARCHAR(15) NOT NULL,
		token_no VARCHAR(15) NOT NULL,
    total VARCHAR(15) NOT NULL,

		reg_date TIMESTAMP,
		FOREIGN KEY ManagerMember(ManagerID)
	    REFERENCES mess_manager(id)
	    ON UPDATE CASCADE
	    ON DELETE CASCADE
		
)AUTO_INCREMENT=10";

}

$exists = mysqli_query($connect,"select 1 from bazar_info");
	if($exists == FALSE)
	{
// sql to create table
$sql4 = "CREATE TABLE bazar_info (
	   id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		ManagerID INT(10) NOT NULL,
		purchasers VARCHAR(32) NOT NULL,
		token_no VARCHAR(15) NOT NULL,
    item_name VARCHAR(15) NOT NULL,
    price VARCHAR(15) NOT NULL,
		reg_date TIMESTAMP,
		FOREIGN KEY ManagerMember(ManagerID)
	    REFERENCES mess_manager(id)
	    ON UPDATE CASCADE
	    ON DELETE CASCADE
		
)AUTO_INCREMENT=10";
}

if ((mysqli_multi_query($connect, $sql3)) && (mysqli_multi_query($connect, $sql4))) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}

	

}

 if(!empty ($_POST)){

$purchasers=clean($_POST['purchasers']);
$date=$_POST['purchases_date'];
$token=clean($_POST['token']);

session_start();
$ManagerID=$_SESSION ['logged_ManagerID'];
$x= count($_POST['items']);
$total= array_sum($_POST['price']);

for($i=0;$i<$x;$i++){

$items[$i]=$_POST['items'][$i];
$price[$i]=$_POST['price'][$i];


}
$sql="INSERT INTO bazar_info (ManagerID,purchasers,token_no,item_name,price) VALUES";

for($i=0;$i<$x;$i++){
 $sql .= "('$ManagerID','$purchasers','$token','$items[$i]','$price[$i]'),";

}
$sql=rtrim($sql,",");

$sql2="INSERT INTO daily_bazar (ManagerID, purchasers, token_no, total, purchases_date) VALUES ('$ManagerID', '$purchasers', '$token', '$total', '$date')";
$c=1;

$data_update ="UPDATE bazar_list  SET status = '$c' WHERE ManagerID = '$ManagerID' AND token_no='$token' ";

if((mysqli_multi_query($connect,$sql)) && (mysqli_multi_query($connect,$sql2)) && (mysqli_multi_query($connect,$data_update))){

		    	$_SESSION ['success_msg'] = "Bazar List Records Updated Successfully.";
			 	header ("Location: ../bazar_details.php?token=$token");
			} else {
		    	echo "Error updating record: " . mysqli_error($connect);
		    	header("../insert_bazar.php");
			}


}

?>