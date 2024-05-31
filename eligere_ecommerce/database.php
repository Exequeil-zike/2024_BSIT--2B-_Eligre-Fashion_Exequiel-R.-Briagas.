<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "db_eligere";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

function gen_order_ref_number($len){
    $alpha_num=array('A','B','C','D','E','F','G','H','I','J'
                     ,'K','L','M','N','O','P','Q','R','S','T'
                     ,'U','V','W','X','Y','Z','0','1','2','3'
                     ,'4','5','6','7','8','9','0');
    $key="";

    for ($i = 0; $i < $len; $i++){
        if($i%2 == 0 && $i > 0){
           $key .= $alpha_num[rand(0,25)];
        }
        else{
             $key .= $alpha_num[rand(26,sizeof($alpha_num)-1)];
        }
     }
    return $key;
}
?>