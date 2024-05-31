<?php 
include_once "database.php";
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
   
   <div class="container">
       <div class="row">
           <div class="col-6 mb-4">
                   <div class="card ps-1">
                       <h3 class="card-title">Total Sales</h3>
                       <small class="small">Per Item</small>
                       <div class="card-body">
                           <h1 class="display-1">
                               <?php $sql_get_totalsales = "SELECT * FROM `total_per_item`";
                               
                                     $sales_result = mysqli_query($conn, $sql_get_totalsales); ?>
                               
                               
                                <table class="table table-striped">
                                    <tr>
                                        <th>Date</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                       $total = 0.00;
                                       while($rec = mysqli_fetch_assoc($sales_result)){
                                        $total += $rec['total_amt'];
                                        ?>
                                    <tr>
                                        <td><?php echo $rec['item_name'];?></td>
                                        <td><?php echo $rec['total_item_qty'];?></td>
                                        <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                                    </tr>      
                                             
                                         
                                     <?php } ?>
                                    <tr>
                                        <td colspan=3 class="bg-light"> <small class="float-end"><?php echo "Php " . number_format($total,2);?></small> </td>
                                    </tr>
                                </table>
                               
                           </h1>
                       </div>
                   </div>
               
           </div>
           <div class="col-6">
                   <div class="card ps-1">
                       <h3 class="card-title">Total Sales</h3>
                       <small class="small">Per Day</small>
                       <div class="card-body">
                           <h1 class="display-1">
                               <?php $sql_get_totalsales = "SELECT * FROM `total_per_date`";
                               
                                     $sales_result = mysqli_query($conn, $sql_get_totalsales); ?>
                               
                               
                                <table class="table table-striped">
                                    <tr>
                                        <th>Date</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                    $total = 0.00;
                                    while($rec = mysqli_fetch_assoc($sales_result)){
                                    $total += $rec['total_amt'];?>
                                    <tr>
                                        <td><?php echo $rec['transaction_date'];?></td>
                                        <td><?php echo $rec['total_item_qty'];?></td>
                                        <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                                    </tr>      
                                             
                                         
                                     <?php } ?>
                               
                                    <tr>
                                        <td colspan=3 class="bg-light"> <small class="float-end"><?php echo "Php " . number_format($total,2);?></small> </td>
                                    </tr>
                                </table>
                               
                           </h1>
                       </div>
                   </div>
               
           </div>
           <div class="col-6">
                   <div class="card ps-1">
                       <h3 class="card-title">Total Sales</h3>
                       <small class="small">Per Order</small>
                       <div class="card-body">
                           <h1 class="display-1">
                               <?php $sql_get_totalsales = "SELECT * FROM `total_per_order`";
                               
                                     $sales_result = mysqli_query($conn, $sql_get_totalsales); ?>
                               
                               
                                <table class="table table-striped">
                                    <tr>
                                        <th>Order Reference Number</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                     $total = 0.00;
                                    while($rec = mysqli_fetch_assoc($sales_result)){
                                     $total += $rec['total_amt'];
                                    ?>
                                    <tr>
                                        <td><?php echo $rec['order_ref_number'];?></td>
                                        <td><?php echo $rec['total_item_qty'];?></td>
                                        <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                                    </tr>      
                                             
                                         
                                     <?php } ?>
                                       <tr>
                                        <td colspan=3 class="bg-light"> <small class="float-end"><?php echo "Php " . number_format($total,2);?></small> </td>
                                    </tr>
                                </table>
                               
                           </h1>
                       </div>
                   </div>
               
           </div>
           <div class="col-6">
                   <div class="card ps-1">
                       <h3 class="card-title">Total Sales</h3>
                       <small class="small">Per User</small>
                       <div class="card-body">
                           <h1 class="display-1">
                               <?php $sql_get_totalsales = "SELECT * FROM `total_per_user`";
                               
                                     $sales_result = mysqli_query($conn, $sql_get_totalsales); ?>
                               
                               
                                <table class="table table-striped">
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                    $total=0.00;
                                    while($rec = mysqli_fetch_assoc($sales_result)){
                                     $total += $rec['total_amt'];
                                    ?>
                                    <tr>
                                        <td><?php echo $rec['fullname'];?></td>
                                        <td><?php echo $rec['username'];?></td>
                                        <td><?php echo $rec['total_item_qty'];?></td>
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
       </div>
   </div>
   
    
</body>
<script src="../js/bootstrap.js"></script>
</html>


