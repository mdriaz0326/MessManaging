<?php
$logout = $_GET ["action"];
if($logout = 'logout'){
session_start ();
session_destroy ();
header ("Location:../manager/login.php");
}
 ?>