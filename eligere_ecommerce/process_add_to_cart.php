<?php
include "database.php";
session_start();

if(isset($_GET['item_id'])){
    $user_id = $_SESSION['user_info_id'];
    $item_id = $_GET['item_id'];
    $item_qty = $_GET['cart_qty'];
    
    $sql_add_to_cart = "INSERT INTO `orders`
           (`user_id`, `item_id`, `item_qty`)
           VALUES
           ('$user_id','$item_id','$item_qty')";
    $execute_cart = mysqli_query($conn, $sql_add_to_cart);
    
    if($execute_cart){
        header("location: shopping.php?page=home&cart_status=item_{$item_id}_added_to_cart");
    }
}


