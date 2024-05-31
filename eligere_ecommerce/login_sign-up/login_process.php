<?php
session_start(); //start session
include_once "../database.php";

$username = mysqli_real_escape_string($conn, $_POST['username']);
$user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

$sql_check_user_info = "SELECT *
                              FROM `user_info`
                            WHERE `username` = '$username'
                              AND `user_password` = '$user_password'
                            ";
$sql_result = mysqli_query($conn, $sql_check_user_info);
$count_result = mysqli_num_rows($sql_result);

if ($count_result == 1) {
    //existing user
    $row = mysqli_fetch_assoc($sql_result);

    //create session variables
    $_SESSION['user_info_id'] = $row['user_info_id'];
    $_SESSION['username'] = $username;
    $_SESSION['user_info_user_password'] = $row['user_password'];
    $_SESSION['user_info_fullname'] = $row['fullname'];
    $_SESSION['user_info_user_address'] = $row['user_address'];
    $_SESSION['user_info_contact_no'] = $row['contact_no'];
    $_SESSION['user_info_user_type'] = $row['user_type'];
    $_SESSION['user_info_email'] = $row['email'];

    if ($_SESSION['user_info_user_type'] == 'A') {
        //admin
        header("location: ../admin.php");
    } else if ($_SESSION['user_info_user_type'] == 'C') {
        //shopping list
        header("location: ../shopping.php");
    }
} else {
    //username and password does not exist
    header("location: registration.php?error=user_not_exist");
}
?>

