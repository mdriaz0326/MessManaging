<?php
session_start();
include ("$_SERVER[DOCUMENT_ROOT]/mess_bazar/function/function.php");

GetConn(); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $mobile   = trim($_POST["mobile"]);
    $password = trim($_POST["password"]);
    $mess_id  = trim($_POST["mess_id"]);

    $stmt = mysqli_prepare($connect, "SELECT * FROM mess_director WHERE mess_id = ? AND mobile = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "sss", $mess_id, $mobile, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['logged_director_id'] = $row["director_id"];
        $_SESSION['director_login_success'] = true;
        $_SESSION['success_msg'] = "You have successfully logged in as a Director of this mess.";

        header("Location: ../manager/index.php");
        exit();
    } else {
        $_SESSION['error_msg'] = "No matches found. Please try again.";
        header("Location: ../manager/mess_director_login.php");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
} else {
    echo "Invalid request method.";
}
