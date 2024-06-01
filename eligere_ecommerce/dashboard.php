<?php 
include_once "database.php";
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Eligere</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<style>
            .btn-link {
              color: black;
              text-decoration: none;
              font-weight: bold;
            }
            .btn-link:hover {
               color: white;
            }
            .display-3 {
                font-weight: bold;   
            }
         </style>
   
   
       <div class="container mx-auto">
       <div class="row justify-content-center">
           <div class="col-8 mb-4">
           <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title">Total Sales</h5>
            <small class="small">Per Item</small>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                           <?php
                              $sql_get_totalsales = $sql_get_totalsales = "SELECT i.item_name, 
                              SUM(CASE WHEN op.order_phase_desc = 'Delivered' THEN o.item_qty ELSE 0 END) AS delivered_qty,
                              SUM(CASE WHEN op.order_phase_desc = 'Cancelled' THEN o.item_qty ELSE 0 END) AS cancelled_qty,
                              SUM(CASE WHEN op.order_phase_desc = 'Delivered' THEN i.item_price * o.item_qty ELSE 0 END) AS total_amt
                              FROM orders o
                              JOIN items i ON o.item_id = i.items_id
                              JOIN order_phase op ON o.order_phase = op.order_phase_id
                              GROUP BY i.item_name
                              ORDER BY i.item_name DESC";

                             $sales_result = mysqli_query($conn, $sql_get_totalsales);
                            ?>

                        <table class="table table-striped">
                          <tr>
                            <th>Date</th>
                            <th>Delivered Items</th>
                            <th>Cancelled Items</th>
                            <th>Total Sales</th>
                         </tr>
                  <?php
                      $total = 0.00;
                      while($rec = mysqli_fetch_assoc($sales_result)){
                     $total += $rec['total_amt'];
                   ?>
                 <tr>
                      <td><?php echo $rec['item_name'];?></td>
                      <td><?php echo $rec['delivered_qty'];?></td>
                      <td><?php echo $rec['cancelled_qty'];?></td>
                      <td><?php echo "Php ". number_format($rec['total_amt'],2);?></td>
                 </tr>
               <?php }?>

                 <tr>
                   <td colspan=4 class="bg-light"> <small class="float-end"><?php echo "Php ". number_format($total,2);?></small> </td>
                </tr>
                 </table>
                              

                               
                           </h1>
                       </div>
                   </div>
               
               
           </div>
           <div class="col-8 mb-4">
            <div class="card shadow-sm border-0">
              <div class="card-header bg-dark text-white">
            <h5 class="card-title">Total Sales</h5>
            <small class="small">Per Day</small>
             </div>
            <div class="card-body">
            <table class="table table-striped table-bordered">
                            <?php
                              $sql_get_totalsales = " SELECT i.item_name,
                              SUM(CASE WHEN op.order_phase_desc = 'Delivered' THEN o.item_qty ELSE 0 END) AS delivered_qty,
                              SUM(CASE WHEN op.order_phase_desc = 'Cancelled' THEN o.item_qty ELSE 0 END) AS cancelled_qty,
                              SUM(CASE WHEN op.order_phase_desc = 'Delivered' THEN i.item_price * o.item_qty ELSE 0 END) AS total_amt,
                              CAST(o.date_added AS DATE) AS transaction_date
                              FROM orders o
                              JOIN items i ON o.item_id = i.items_id
                              JOIN order_phase op ON o.order_phase = op.order_phase_id
                              GROUP BY i.item_name, CAST(o.date_added AS DATE)
                              ORDER BY i.item_name DESC , transaction_date DESC";
                             $sales_result = mysqli_query($conn, $sql_get_totalsales);
                            ?>
    
              <table class="table table-striped">
                    <tr>
                      <th>Date</th>
                      <th>Delivered Items</th>
                      <th>Cancelled Items</th>
                      <th>Total Sales</th>
                    </tr>
                 <?php 
                    $total = 0.00;
                  while($rec = mysqli_fetch_assoc($sales_result)){
                  $total += $rec['total_amt'];?>
                 <tr>
                  <td><?php echo $rec['transaction_date'];?></td>
                  <td><?php echo $rec['delivered_qty'];?></td>
                  <td><?php echo $rec['cancelled_qty'];?></td>
                  <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                 </tr>      
                         
                 <?php } ?>
   
         <tr>
             <td colspan=4 class="bg-light"> <small class="float-end"><?php echo "Php " . number_format($total,2);?></small> </td>
         </tr>
     </table>
                               
                           </h1>
                       </div>
                   </div>

               
           </div>
           <div class="col-8 mb-4">
         <div class="card shadow-sm border-0">
          <div class="card-header bg-dark text-white">
            <h5 class="card-title">Total Sales</h5>
            <small class="small">Per Order</small>
           </div>
          <div class="card-body">
                           <?php
                              $sql_get_totalsales = "SELECT o.order_ref_number,
                              SUM(CASE WHEN op.order_phase_desc = 'Delivered' THEN o.item_qty ELSE 0 END) AS delivered_qty,
                              SUM(CASE WHEN op.order_phase_desc = 'Delivered' THEN i.item_price * o.item_qty ELSE 0 END) AS total_amt,
                              SUM(CASE WHEN op.order_phase_desc = 'Cancelled' THEN o.item_qty ELSE 0 END) AS cancelled_qty
                              FROM orders o
                              JOIN items i ON o.item_id = i.items_id
                              JOIN order_phase op ON o.order_phase = op.order_phase_id
                              GROUP BY o.order_ref_number
                              ORDER BY o.order_ref_number DESC";
                              $sales_result = mysqli_query($conn, $sql_get_totalsales);
                            ?>


                            <table class="table table-striped">
                             <tr>
                              <th>Order Reference Number</th>
                              <th>Delivered Item Qty</th>
                              <th>Cancelled Item Qty</th>
                              <th>Total Sales</th>
                            </tr>
                             
                             <?php 
                               $total = 0.00;
                               while($rec = mysqli_fetch_assoc($sales_result)){
                               $total += $rec['total_amt'];?>
                
                            <tr>
                             <td><?php echo $rec['order_ref_number'];?></td>
                             <td><?php echo $rec['delivered_qty'];?></td>
                             <td><?php echo $rec['cancelled_qty'];?></td>
                             <td><?php echo "Php ". number_format($rec['total_amt'],2);?></td>
                           </tr>      
              
                           <?php }?>
                            <tr>
                             <td colspan=5 class="bg-light"> <small class="float-end"><?php echo "Php ". number_format($total,2);?></small> </td>
                             </tr>
                          </table>
                               
                           </h1>
                       </div>
                   </div>
               
           </div>
           <div class="col-8 mb-4">
           <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title">Total Sales</h5>
            <small class="small">Per User</small>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                           <?php
                          $sql_get_totalsales = "SELECT ui.fullname, ui.username,
                          SUM(CASE WHEN op.order_phase_desc = 'Delivered' THEN o.item_qty ELSE 0 END) AS delivered_qty,
                          SUM(CASE WHEN op.order_phase_desc = 'Cancelled' THEN o.item_qty ELSE 0 END) AS cancelled_qty,
                          SUM(CASE WHEN op.order_phase_desc = 'Delivered' THEN i.item_price * o.item_qty ELSE 0 END) AS total_amt
                          FROM orders o
                          JOIN items i ON o.item_id = i.items_id
                          JOIN user_info ui ON o.user_id = ui.user_info_id
                          JOIN order_phase op ON o.order_phase = op.order_phase_id
                          GROUP BY ui.fullname, ui.username
                          ORDER BY ui.fullname DESC";
                          $sales_result = mysqli_query($conn, $sql_get_totalsales);?>


                          <table class="table table-striped">
                           <tr>
                             <th>Fullname</th>
                             <th>Username</th>
                             <th>Delivered Item Qty</th>
                             <th>Cancelled Item Qty</th>
                             <th>Total Sales</th>
                           </tr>
                     
                         <?php 
                          $total = 0.00;
                          while($rec = mysqli_fetch_assoc($sales_result)){
                          $total += $rec['total_amt'];?>
                           <tr>
                             <td><?php echo $rec['fullname'];?></td>
                             <td><?php echo $rec['username'];?></td>
                             <td><?php echo $rec['delivered_qty'];?></td>
                             <td><?php echo $rec['cancelled_qty'];?></td>
                             <td><?php echo "Php ". number_format($rec['total_amt'],2);?></td>
                           </tr>      
              
                         <?php }?>
                         <tr>
                            <td colspan=5 class="bg-light"> <small class="float-end"><?php echo "Php ". number_format($total,2);?></small> </td>
                        </tr>
                      </table>
                               
                           </h1>
                       </div>
                   </div>
               
           </div>
       </div>
   </div>
   
    
</body>
<script src="../js/bootstrap.js"></script>
</html>

