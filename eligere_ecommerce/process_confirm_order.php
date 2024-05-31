    <?php 
              //confirm order
 if(isset($_GET['confirm_order'])){
include_once "database.php";
         $ord_num=$_GET['confirm_order'];
         
         $sql_update_order="UPDATE `orders`
                                SET `order_phase` = '3'
                               WHERE `order_ref_number` = '$ord_num';
                               ";
         $try = mysqli_query($conn, $sql_update_order);
     
         if($try){
          header("location: shopping.php?manageorder&orderphase=2&status=successful");   
         }
         
}
 if(isset($_GET['ship_order'])){
include_once "database.php";
         $ord_num=$_GET['ship_order'];
         
         $sql_update_order="UPDATE `orders`
                                SET `order_phase` = '4'
                               WHERE `order_ref_number` = '$ord_num';
                               ";
         $try = mysqli_query($conn, $sql_update_order);
     
         if($try){
          header("location: shopping.php?manageorder&orderphase=4&status=successful");   
         }
         
}
 if(isset($_GET['complete_order'])){
include_once "database.php";
         $ord_num=$_GET['complete_order'];
         
         $sql_update_order="UPDATE `orders`
                                SET `order_phase` = '5'
                               WHERE `order_ref_number` = '$ord_num';
                               ";
         $try = mysqli_query($conn, $sql_update_order);
     
         if($try){
          header("location: shopping.php?manageorder&orderphase=5&status=successful");   
         }
         
}
 if(isset($_GET['cancel_order'])){
include_once "../db.php";
         $ord_num=$_GET['cancel_order'];
         
         $sql_update_order="UPDATE `orders`
                                SET `order_phase` = '0'
                               WHERE `order_ref_number` = '$ord_num';
                               ";
         $try = mysqli_query($conn, $sql_update_order);
     
         if($try){
          header("location: shopping.php?manageorder&orderphase=1&status=successful");   
         }
         
}
?>