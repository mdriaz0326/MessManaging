<?php

 include (dirname(__DIR__)."/php/connection.php");

function CallHeader(){
 include (dirname(__DIR__)."/includes/header.php");
}

function CallFooter(){
include (dirname(__DIR__)."/includes/footer.php");
}



function GetConn(){
global $connect;
}

function clean($value){
	$value = trim ($value);
	$value = stripslashes ($value);
	$value = strip_tags  ($value);
	return $value;
}


function GetTableInfo($table,$tbl_id,$qry_id){

global $connect;
session_start();
$logged_ManagerID=$_SESSION ['logged_ManagerID'];
$sql  = "SELECT * FROM $table WHERE $tbl_id=$qry_id AND ManagerID=$logged_ManagerID";
$result =  mysqli_query($connect, $sql);
$datas  = array();
if (mysqli_num_rows ($result) >0 ) {
while($row= mysqli_fetch_assoc($result)) {
$datas[] = $row;
	}
}

return $datas;
}

function CheckSameValue($table,$tbl_value,$qry_value){
    global $connect;
		$sql = "Select * FROM $table WHERE $tbl_value ='$qry_value'";
		$result = mysqli_query ($connect,$sql);
		$count = mysqli_num_rows($result);

   return $count;

}

function GetMemTableInfo($table,$tbl_id,$qry_id){

global $connect;
session_start();
$logged_ManagerID=$_SESSION ['logged_ManagerID'];
$sql  = "SELECT * FROM $table WHERE $tbl_id=$qry_id and ManagerID=$logged_ManagerID";
$result =  mysqli_query($connect, $sql);
$datas  = array();
if (mysqli_num_rows ($result) >0 ) {
while($row= mysqli_fetch_assoc($result)) {
$datas[] = $row;
	}
}

return $datas;
}

function GetNamebyID($table,$tbl_id,$qry_id){
global $connect;
$data_select="SELECT * FROM $table WHERE $tbl_id = $qry_id"; 
$data_store=mysqli_query($connect,$data_select);
$details=mysqli_fetch_assoc($data_store);
return $details;
}

function GetTableArray($table,$tbl_id,$qry_id){
global $connect;
$query = "SELECT * FROM $table WHERE $tbl_id=$qry_id  ORDER BY id ASC";
	 $match=mysqli_query ($connect,$query);
return $match;
}

function OnlyMemberEntry($location){
session_start ();
	 	 	if (!isset($_SESSION ['manager_login_success'])){
	 	 	session_start ();
	    $_SESSION ['error_msg']  = "You must login first..";
   	 header ("Location:$location");
	   die ();
	 	 	}

}

function OnlyMangerEntry($location){
session_start ();
	 	 	if (!isset($_SESSION ['director_login_success'])){
	 	 	session_start ();
	    $_SESSION ['error_msg']  = "Only Mess Director Can Enter That Page.</br> If you are the mess director please login here. Thanks";
   	 header ("Location:$location");
	   die ();
	 	 	}

}



?>