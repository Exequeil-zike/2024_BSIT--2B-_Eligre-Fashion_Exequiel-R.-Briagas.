<?php
include_once "database.php";
session_start();

if(isset($_POST['f_order_ref_number'])){
    $ord_ref_num = $_POST['f_order_ref_number'];
    $user_id = $_SESSION['user_info_id'];
    $alt_rec = $_POST['f_alt_receiver'];
    $alt_add = $_POST['f_alt_address'];
    $shipper_id = $_POST['f_shipper_id'];
    $payment_method = $_POST['f_payment_method'];
    $gcash_ref_num = $_POST['f_gcash_ref_num'];
    $gcash_acc_name = $_POST['f_gcash_acc_name'];
    $gcash_acc_num = $_POST['f_gcash_acc_num'];
    $gcash_amt_sent = $_POST['f_gcash_amt_sent'];    
    $total_amt_to_pay = $_POST['f_total_amt_to_pay'];
    
    if($total_amt_to_pay > $gcash_amt_sent){
        header("location: shopping.php?page=home&msg=Amount is Insufficient.");
        die();
    }
        
    $sql_update_order = "UPDATE `orders`
                            SET `order_phase` = 2
                              , `order_ref_number` = '$ord_ref_num'
                              , `payment_method` = '$payment_method'
                              , `order_ref_number` = '$order_ref_num'
                              , `alternate_receiver` = '$alt_rec'
                              , `alternate_address` = '$alt_add'
                              , `shipper_id` = '$shipper_id'
                              , `gcash_ref_num` = '$gcash_ref_num'
                              , `gcash_account_name` = '$gcash_acc_name'
                              , `gcash_account_number` = '$gcash_acc_num'
                              , `gcash_amount_sent` = '$gcash_amt_sent'
                          WHERE `user_id` = '$user_id' 
                            AND `order_phase` = '1'
                          ";
    $execute_update_order = mysqli_query($conn, $sql_update_order);
    
    if($execute_update_order == 1){
        header("location: shopping.php?page=home&msg=1");
    }
    else{
        header("location: shopping.php?page=home&msg=2");
    }
}


