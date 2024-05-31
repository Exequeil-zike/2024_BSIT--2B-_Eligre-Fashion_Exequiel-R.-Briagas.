<?php
if(isset($_POST['u_item_name'])){
    include_once "database.php";
    
    $item_id = $_POST['u_item_id'];
    $item_name = $_POST['u_item_name'];
    $item_desc = $_POST['u_item_desc'];
    $item_price = $_POST['u_item_price'];
    
    $sql_update_item = "UPDATE `items`
                           SET `item_name`='$item_name'
                              , `item_desc`='$item_desc'
                              , `item_price`='$item_price'
                        WHERE items_id ='$item_id'";
    //echo $sql_update_item;
    if(mysqli_query($conn, $sql_update_item)) {
        header("location: shopping.php?update_status=1");
    }

    
}