<?php
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');

GetConn();
$id=$_GET['id'];
session_start();
$logged_ManagerID=$_SESSION['logged_ManagerID'];
if($connect){
	
$exists = mysqli_query($connect,"select 1 from member_profile");
	
if($exists == FALSE)
	{
// sql to create table
$sql= "CREATE TABLE member_profile (
	   
id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
ManagerID INT(10) NOT NULL,
MemberID INT(10) NOT NULL,
name VARCHAR(32) NOT NULL,
mobile VARCHAR(32) NOT NULL,
bd VARCHAR(32) NOT NULL,
email VARCHAR(50) NOT NULL,
blood VARCHAR(15) NOT NULL,
update_time VARCHAR(15) NOT NULL,
sub_date TIMESTAMP,

FOREIGN KEY ManagerMember(ManagerID)
REFERENCES mess_manager(id)
ON UPDATE CASCADE
ON DELETE CASCADE
)AUTO_INCREMENT=1";



if (mysqli_query($connect, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}
}

if(!empty ($_POST)){
$name= clean($_POST ["name"]);
$mobile= clean($_POST ["mobile"]);
$email= $_POST ["email"];
$bd= clean($_POST ["bd"]);
$blood= $_POST ["blood"];
$date=date("Y/m/d");


$update_main ="UPDATE mess_member  SET name = '$name', mobile='$mobile' WHERE id = '$id' ";

$count=CheckSameValue(member_profile,MemberID,$id);
if($count==0){
$update_info="INSERT INTO member_profile (ManagerID, MemberID,name,email,mobile,bd,blood,update_time) VALUES ('$logged_ManagerID','$id','$name','$email','$mobile','$bd','$blood','$date')";


}else{

$update_info ="UPDATE member_profile  SET name = '$name', mobile='$mobile', email = '$email', bd='$bd', blood = '$blood', update_time='$date' WHERE MemberID = '$id' ";

}


	 if ((mysqli_multi_query ($connect,$update_main)) && (mysqli_multi_query ($connect,$update_info))){
   session_start ();
$_SESSION ['success_msg'] = "Records Updated Successfully.";
	 header ('Location: ../members/view.php?id='.$id);
		 }
	 else{
   session_start ();
$_SESSION ['error_msg'] = "Something Went Wrong. Please Try Again.";
	 header ('Location: ../members/update_profile.php?id='.$id);
	 }
	 

}
}
		