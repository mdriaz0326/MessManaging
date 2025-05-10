<?php

include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
OnlyMangerEntry('../manager/mess_director_login.php');
GetConn();
if($connect){

	$exists = mysqli_query($connect,"select 1 from mess_member");
	if($exists == FALSE)
	{
// sql to create table
$sql = "CREATE TABLE mess_member (
	   id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		ManagerID INT(10) NOT NULL,
		name VARCHAR(32) NOT NULL,
		mobile VARCHAR(15) NOT NULL,
		reg_date TIMESTAMP,
		FOREIGN KEY ManagerMember(ManagerID)
	    REFERENCES mess_manager(id)
	    ON UPDATE CASCADE
	    ON DELETE CASCADE
		
)AUTO_INCREMENT=527674000";

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
for($i=0;$i<$x;$i++){
 $name[$i]=clean($_POST['name'][$i]);
 $mobile[$i]=clean($_POST['mobile'][$i]);
}
}
$sql="INSERT INTO mess_member (ManagerID,name,mobile) VALUES";

for($i=0;$i<$x;$i++){
 $sql .= "('$ManagerID','$name[$i]','$mobile[$i]'),";

}
$sql=rtrim($sql,",");
if(mysqli_multi_query($connect,$sql)){

    $data_select="SELECT * FROM mess_manager WHERE  id = $ManagerID"; 
    $data_store=mysqli_query($connect,$data_select);
    $team_details=mysqli_fetch_assoc($data_store);
    $total = $team_details['total_member'];
$new=$total+$x;

$data_send ="UPDATE mess_manager  SET total_member = '$new' WHERE id = '$ManagerID' ";


			if (mysqli_query($connect, $data_send)) {
		    	$_SESSION ['success_msg'] = "New Records Updated Successfully.";
			 	header ("Location: ../manager/index.php");
			} else {
		    	echo "Error updating record: " . mysqli_error($connect);
		    	header("../manager/memeber_entry.php");
			}




}



?>