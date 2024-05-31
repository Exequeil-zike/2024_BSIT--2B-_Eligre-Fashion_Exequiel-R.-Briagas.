<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image" href="./images/icon.jpg">
    <title>Eligere</title>
    <style>
    body{
            background:url('./images/nnn.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 88%;
            font-family: sans-serif;
        }
    </style>

</head>

<body>
 
<?php
include_once "database.php";
session_start();

if(isset($_POST['f_payment_method'])){
    $payment_method = $_POST['f_payment_method'];
    $order_ref_number = $_POST['f_order_ref_number'];
    $user_id = $_SESSION['user_info_id'];
    $alt_receiver = $_POST['f_alt_receiver'];
    $alt_address = $_POST['f_alt_address'];
    $shipper_id = $_POST['f_ship_option'];
    $total_amt_to_pay = $_POST['f_total_amt_to_pay'];
    
    if( $payment_method == "1" ){ 
    //check if payment method is gcash
    ?>
      <div class="card p-2">
       <h3 class="display-3">Input Gcash Payment Details</h3>
        <form action="process_gcash_payment.php" method="POST">
           
        <div class="container">
  <form>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center">Gcash Payment</h2>
        <p class="text-center">Total Amount to Pay: <b>Php <?php echo number_format($total_amt_to_pay,2); ?></b></p>
        <p class="text-center">Please scan the QR code below to pay the exact amount:</p>
        <img src="./images/gcash-qr.jpg" alt="GCash QR Code" width="200" class="mx-auto d-block">
        <br><br>
        <p class="text-center">Account Name: Eligere</p>
        <hr>
        <input type="hidden" name="f_total_amt_to_pay" value="<?php echo $total_amt_to_pay; ?>">
        <input type="hidden" name="f_payment_method" value="<?php echo $payment_method; ?>">
        <input type="hidden" name="f_order_ref_number" value="<?php echo $order_ref_number; ?>">
        <input type="hidden" name="f_alt_receiver" value="<?php echo $alt_receiver; ?>">
        <input type="hidden" name="f_alt_address" value="<?php echo $alt_address; ?>">
        <input type="hidden" name="f_shipper_id" value="<?php echo $shipper_id; ?>">
        
        <div class="form-group">
          <input type="text" class="form-control" name="f_gcash_ref_num" placeholder="Gcash Reference Number">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="f_gcash_acc_name" placeholder="Gcash Account Sender Name">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="f_gcash_acc_num" placeholder="Gcash Account Number">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="f_gcash_amt_sent" placeholder="Gcash Amount Sent">
        </div>
        <div class="text-center">
          <input type="submit" value="Submit" class="btn btn-beige">
        </div>
      </div>
    </div>
  </form>
</div>

<style>
    .display-3{
      font-size:30px;
      font-weight: bold;
    }

    .container {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: #f5f5f5;
  border: 1px solid #ddd;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
  position: relative;
  margin-bottom: 20px;
}

.form-control {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 100%;
}

.form-label {
  position: absolute;
  top: 0;
  left: 10px;
  font-size: 16px;
  color: #666;
  transition: 0.2s ease-in-out;
}

.form-control:focus + .form-label {
  top: -10px;
  font-size: 14px;
  color:#a37251;
}

.btn-beige {
  background-color:  #a37251;
  color: black;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 15px;
}

.btn-beige:hover {
  background-color: #f0f0f0;
  color: #666;
}

.mx-auto {
  margin-left: auto;
  margin-right: auto;
}

.d-block {
  display: block;
}
</style>


    <?php 
    die();                            
    }
    
        
    $sql_update_order = "UPDATE `orders`
                            SET `order_phase` = 2
                              , `payment_method` = '$payment_method'
                              , `order_ref_number` = '$order_ref_number'
                              , `alternate_receiver` = '$alt_receiver'
                              , `alternate_address` = '$alt_address'
                              , `shipper_id` = '$shipper_id'
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
?>
<script src="../js/bootstrap.js"></script>
</body>
</html>

