<?php
include_once "../database.php";

$fullname =  $_POST['fullname'];
$username =  $_POST['username'];
$user_password = $_POST['user_password'];
$conf_passwd = $_POST['r_conf_passwrd'];
$user_address =  $_POST['user_address'];
$contact_no = $_POST['contact_no'];
$email = $_POST['email'];

function chk_pass($p1, $p2) {
  return ($p1 == $p2) ? 1:0;
}

    if(!chk_pass($passwd, $conf_passwd)){
        header("location: sign-up.php?error=password_mismatch");
        die;
    }

//This will check if the username is already existing
$sql_chk_user = "SELECT user_info_id FROM user_info
                  WHERE `username` = '$username'";
//this will execute the SQL above.
$sql_result = mysqli_query($conn, $sql_chk_user);
//This will count the result of the above SQL
$count_result = mysqli_num_rows($sql_result);

if($count_result > 0){
    //user already exists
    header("location: sign-up.php?error=user_already_exist");
}
else {
    //user can register
    $sql_new_user = "INSERT INTO `user_info`
                      (`username`, `user_password`, `fullname`, `user_address`, `contact_no`, `email`)
                     VALUES
                      ('$username','$user_password','$fullname','$user_address','$contact_no','$email')
                     ";
    $execute_query = mysqli_query($conn,$sql_new_user);
    
    if(!$execute_query){
       header("location: sign-up.php?error=Insert_Failed");
    }
    else{
       header("location: login_customer.php?msg=successfully_registered");
    }
    
}
                    
