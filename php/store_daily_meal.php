<?php
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");
OnlyMemberEntry('../manager/login.php');
OnlyMangerEntry('../manager/mess_director_login.php');

GetConn();


if($connect){
$exists = mysqli_query($connect,"select 1 from daily_meal");
	if($exists == FALSE)
	{
// sql to create table
$sql = "CREATE TABLE daily_meal (
	   id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		ManagerID INT(10) NOT NULL,
		person VARCHAR(32) NOT NULL,
		total_meal VARCHAR(15) NOT NULL,
		meal_date VARCHAR(15) NOT NULL,

		reg_date TIMESTAMP,
		FOREIGN KEY ManagerMember(ManagerID)
	    REFERENCES mess_manager(id)
	    ON UPDATE CASCADE
	    ON DELETE CASCADE
		
)AUTO_INCREMENT=1";

}


if (mysqli_multi_query($connect, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}


 if(!empty ($_POST)){

$date=$_POST['date'];

session_start();
$ManagerID=$_SESSION ['logged_ManagerID'];
$x= count($_POST['person']);


for($i=0;$i<$x;$i++){

$person[$i]=$_POST['person'][$i];
$total_meal[$i]=clean($_POST['total_meal'][$i]);


}
$sql="INSERT INTO daily_meal (ManagerID,person,total_meal,meal_date) VALUES";

for($i=0;$i<$x;$i++){
 $sql .= "('$ManagerID','$person[$i]','$total_meal[$i]','$date'),";

}
$sql=rtrim($sql,",");



if(mysqli_multi_query($connect,$sql)){

		    	$_SESSION ['success_msg'] = "Daily Meal Records Updated Successfully.";
			 	header ("Location: ../manager/index.php");
			} else {
		    	echo "Error updating record: " . mysqli_error($connect);
		    	header("../insert_daily_meal.php");
			}


}
}

?>