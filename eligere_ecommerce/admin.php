<html>
<?php include_once "database.php"; 
session_start();
$s_user_id = $_SESSION['user_info_id'];
if($_SESSION['user_info_user_type'] != 'A'){
    header("location: shopping.php");
}
if(isset($_GET['logout'])){
    session_destroy();
    header("location: index.php");
    die();
}


    ?>
   <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image" href="./images/icon.jpg">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Eligere</title>
    <style>
        body{
            background:url('./images/bg1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 88%;
        }
    </style>

</head>
<body>
   

   <div class="container">
   <style>
            .btn-link {
              color: black;
              text-decoration: none;
              font-weight: bold;
              font-family: 'Georgia' , serif; 
            }
            .btn-link:hover {
               color: white;
            }
            .header-center {
               text-align: center;
            }
            .display-3 {
                margin-top: 20px;
                font-family: 'Lucida Handwriting', cursive;  
                text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);   
            }
            .display-4 {
                margin-top: 20px;
                font-family: 'Georgia', serif;  
                text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);   
            }
            .sidebar {
                background-color: #f0f0f0;
                opacity: 0.75;
            padding: 20px;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 10;
            width: 220px;
            overflow-y: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .logo {
          margin-bottom: 20px; /* add some space between logo and menu */
        }

        .logo img {
          display: block; /* make the image a block element */
          margin: 15px; /* center the image horizontally */
        }

        .sidebar ul {
          list-style: none;
          padding: 0;
          margin: 0;

       }

        .sidebar li {
          margin-bottom: 10px; /* add some space between menu items */
        }

        .sidebar a {
          text-decoration: none;
          color: #000000; /* change the link color to your liking */
          font-size: 18px;
        }

       .sidebar a:hover {
           color: #23527c; /* change the link hover color to your liking */
        }
        .menu-item {
          font-size: 20px; /* increase font size */
          padding: 10px; /* add some padding to make the menu items more spacious */
           border-bottom: 10px solid #999; /* add a separator line between menu items */
        }

         .menu-item:last-child {
          border-bottom: 2px solid; /* remove the separator line from the last menu item */
        }
        .logout-button {
          /* Make the button full-width */
           width: 100%;
          /* Add some margin top */
           margin-top: 1.5rem;
          /* Make the button look like a primary button */
           background-color: #000000;
           color: #3c7a8c;
            border-color: #2e6da4;
           /* Add some padding to make the button taller */
          padding: 0.5rem 1rem;
          /* Make the button rounded */
          border-radius: 0.25rem;
         /* Add a hover effect */
          transition: background-color 0.2s ease;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
          font-family: 'Georgia' , serif; 
       }

        .logout-button:hover {
         background-color: #000000;
       }

       .logout-button a {
        /* Make the link text white */
         color: #fff;
       /* Remove the underline */
         text-decoration: none;
       }

        .logout-button a:hover {
          /* Change the link text color on hover */
          color: #fff;
        }
    </style>
        <div class="header-center">
                <h5 class="display-3">
                 Welcome <?php echo $_SESSION['username']; ?> 
                </h5>
                </div>
            <aside class="sidebar">
              <div class="logo">
                    <img src="./images/logo.png" width="180px" height="80px" style="margin-left: 0;">
              </div>
                   MENU
       <ul>
        
        <li><a href="?manageitems" class="btn btn-link menu-item">Manage Items</a></li>
        <li><a href="?manageorder" class="btn btn-link menu-item">Manage Orders</a></li>
         <li><a href="?dashboard" class="btn btn-link menu-item">Dashboards</a></li>
    </ul>
   <div class="sidebar-footer position-absolute w-99 bottom-0">
                <p class="logout-button" onclick="return confirm('Are you sure you want to log out?')">
                  <a href="?logout" type="button">Log Out</a>
                </p>
                </div>
                </aside>
  
                <div class="col-15 offset-2 main-content">
   <div class="container">
      <?php if(isset($_GET['manageitems'])) { ?>

       <div class="row">
           <div class="col-4 bg-success text-light">
             <?php
               if(isset($_GET['deactivate_item'])){
                   $item_id = $_GET['deactivate_item'];
                   $sql_deactivate_item = "UPDATE `items`
                                             SET `item_status`='I'
                                           WHERE `items_id`='$item_id'";
                   mysqli_query($conn, $sql_deactivate_item);
               }
               
               
               if(isset($_GET['update_item'])){
                   $item_id = $_GET['update_item'];
                   
                   $sql_get_item_info = "SELECT * FROM `items`
                                          WHERE items_id = '$item_id'";
                   $result = mysqli_query($conn, $sql_get_item_info);
                   $data_row = mysqli_fetch_assoc($result);
                   ?>    
                  <h3 class="display-6">Update Item Info</h3>
                  <form action="process_update_item.php" method="POST">
                    
                       <input hidden value="<?php echo $data_row['items_id'];?>" type="text" name="u_item_id" readonly class="form-control mb-3">
                    <label for="">Item Name</label>
                     <input value="<?php echo $data_row['item_name'];?>" type="text" name="u_item_name" class="form-control mb-3">
                    
                    <label for="">Item Description</label>
                     <input value="<?php echo $data_row['item_desc'];?>" type="text" name="u_item_desc" class="form-control mb-3">
                       
                    <label for="">Item Price</label>
                     <input value="<?php echo $data_row['item_price'];?>" type="text" name="u_item_price" class="form-control mb-3">

                       <input type="submit" class="btn btn-primary">
                   </form>
        
                   
                   <?php
               }
               
               ?>
             
             
             
             <hr>
              <h3 class="display-6">Add New Item</h3>
              
                  <?php 
                      if(isset($_GET['insert_status'])){
                          echo "<div class='alert alert-warning'>";
                              if($_GET['insert_status'] == '1') {
                                  echo "Item Added Successfully.";
                              }
                              else{
                                  echo "There was an error.";
                              }
                          echo "</div>";
                      }
                  ?>
               <form action="process_new_item.php" method="POST" enctype="multipart/form-data">
                  <label for="">Item Name</label>
                   <input type="text" name="f_item_name" class="form-control mb-3">
                  
                  <label for="">Item Description</label>
                   <input type="text" name="f_item_desc" class="form-control mb-3">
                  
                  <label for="">Item Price</label>
                   <input type="text" name="f_item_price" class="form-control mb-3">
                  
                  <label for="">Item Image</label>
                      <input type="file" class="form-control mb-3" name="f_item_img">
                  <input type="submit" class="btn btn-primary">
               </form>
           </div>
           <div class="col-8">
      
               <?php
                                               
               $sql_get_items = "SELECT * FROM `items` WHERE `item_status`='A' order by items_id DESC";
               $get_result = mysqli_query($conn, $sql_get_items); ?>
               <table class="table">
                   <?php
                       while ( $row = mysqli_fetch_assoc($get_result) ){ ?>
                        <tr>
                            <td> <img src="./images/<?php echo $row['item_img'];?>" alt="" class="img-fluid" width="100px"> </td>
                            <td><?php echo $row['item_status'];?></td>
                            <td><?php echo $row['item_name'];?></td>
                            <td><?php echo $row['item_desc'];?></td>
                            <td><?php echo "Php " . number_format($row['item_price'],2);?></td>
                            <td> <a href="admin.php?manageitems&update_item=<?php echo $row['items_id'];?>" class="btn btn-success">Update</a> </td>
                            <td> <a href="admin.php?manageitems&deactivate_item=<?php echo $row['items_id'];?>" class="btn btn-danger">Deactivate</a> </td>
                        </tr>
                       <?php }
                   ?>
               </table>
               
           
               
           </div>
       </div>
       <?php } ?>
      
      <?php if(isset($_GET['manageorder'])) { ?>
      <div class="row">
          <div class="col-12">
              
              <h3 class="display-4">Orders</h3>
              
              <button class="btn btn-secondary"><a href="?manageorder&orderphase=2" class="btn btn-link">New</a></button>
              <button class="btn btn-secondary"><a href="?manageorder&orderphase=3" class="btn btn-link">Pending</a></button>
              <button class="btn btn-secondary"><a href="?manageorder&orderphase=4" class="btn btn-link">To Ship</a></button>
              <button class="btn btn-secondary"><a href="?manageorder&orderphase=5" class="btn btn-link">Delivered</a></button>
              <button class="btn btn-secondary"><a href="?manageorder&orderphase=0" class="btn btn-link">Cancelled</a></button>
          </div>
          <div class="container-fluid">
        
            
           
          <?php
             if (isset($_GET['orderphase']) || isset($_GET['manageorder'])) {
             $orderphase = isset($_GET['orderphase']) ? $_GET['orderphase'] : '';
          ?>
             <div class="row">
              <?php
                 $sql_get_user_order = "SELECT DISTINCT 
                                                  o.order_ref_number
                                                , date(o.date_added) as date_added
                                                , pm.payment_method_desc
                                                , o.payment_method
                                                , op.order_phase_admin
                                                , o.order_phase
                                                , ui.fullname
                                                , ui.user_address
                                                , o.gcash_ref_num
                                                , o.gcash_account_name
                                                , o.gcash_account_number
                                                , o.gcash_amount_sent
                                             FROM `orders` as o
                                             JOIN `payment_method` as pm
                                               ON o.payment_method = pm.payment_method_id
                                             JOIN `order_phase` as op
                                               ON o.order_phase = op.order_phase_id
                                             JOIN `user_info` as ui
                                               ON o.user_id = ui.user_info_id
                                            WHERE ui.user_type = 'C'
                                              AND ui.user_status = 'A'
                                              AND o.order_phase = '$orderphase'
                                            ORDER BY o.date_added ASC"
                                            ;      
                    $result_orders = mysqli_query($conn, $sql_get_user_order);
              
              while($ro = mysqli_fetch_assoc($result_orders)){ //first loop for the order reference number ?> 
                      <div class="col-3">
                          <div class="card p-3">
                                <div class="float-end">
                                                    <span class="badge rounded-pill text-bg-primary"><?php echo $ro['payment_method_desc'];?></span>
                                                    <span class="badge rounded-pill 
                                                        <?php 
                                                                 switch($ro['order_phase']){
                                                                     case 0: echo "text-bg-danger";
                                                                         break;
                                                                     case 2: echo "text-bg-primary";
                                                                         break;
                                                                     case 3: echo "text-bg-info";
                                                                         break;
                                                                     case 4: echo "text-bg-warning";
                                                                         break;
                                                                     case 5: echo "text-bg-success";
                                                                         break;
                                                                     default: echo "text-bg-secondary";
                                                                 }
                                                                 ?> "><?php echo $ro['order_phase_admin'];?></span>
                                                   <?php if($ro['order_phase'] == '2') { ?>
                                                     <a href="process_cancel_order.php?cancel_order=<?php echo $ro['order_ref_number']; ?>" class="btn btn-danger btn-sm me-1"> x </a>
                                                   <?php } ?>
                                                    </div>
                                                    
                              <p class="card-title">
                                  <small><i><?php echo $ro['date_added'];?></i></small> <br>
                                  <b><?php echo $ro['order_ref_number'];?></b> <br>
                                  
                                  
                                  
                                  <small>Recipient: <?php echo strtoupper($ro['fullname']);?></small> <br>
                                  <small>Address: <?php echo strtoupper($ro['user_address']);?></small>
                                  
                                  
                              </p>
                              
                              <?php
                             if($ro['payment_method'] == 1 && $ro['order_phase'] == '2'){  ?>
                                 <div class="card-caption p-2">
                                     <small class="small">Gcash Reference Number: <?php echo $ro['gcash_ref_num'];?></small> <br>
                                     <small class="small">Gcash Account Name: <?php echo $ro['gcash_account_name'];?></small> <br>
                                     <small class="small">Gcash Account Number: <?php echo $ro['gcash_account_number'];?></small> <br>
                                     <small class="small">Gcash Amount Sent: <?php echo $ro['gcash_amount_sent'];?></small>
                                 </div>
                             <?php }
                             ?>
                              
                              <?php  
                              $curr_order_ref_number = "";
                              $curr_order_ref_number = $ro['order_ref_number'];
                            
                                                              
                                                              
                              $sql_get_order_items = "SELECT i.item_name
                                                          , i.item_img
                                                          , i.item_price
                                                          , o.item_qty
                                                       FROM `orders` as o
                                                       JOIN `items` as i
                                                         ON o.item_id = i.items_id
                                                        WHERE o.order_ref_number = '$curr_order_ref_number'";
                              $order_items_result = mysqli_query($conn, $sql_get_order_items);
                                                          
                              ?>
                              <ul class="list-group">
                                  <?php 
                                    $total_amt = 0.00;
                                    while ($itord = mysqli_fetch_assoc($order_items_result)){ 
                                  
                                  //inner 2nd loop to list all the items of the specified order reference number ?>
                                      
                                  <li class="list-group-item"><?php echo $itord['item_name'] . " x " . $itord['item_qty'] . " = <br><small>" . "Php " . number_format($itord['item_qty'] * $itord['item_price'], 2) . "</small>"; ?></li>
                                  
                                <?php
                                    $total_amt += $itord['item_qty'] * $itord['item_price']; 
                                    } ?>
                                
                                
                                  <li class="list-group-item bg-secondary text-light">
                                     <?php echo "Php " . number_format($total_amt, 2);?>
                                      
                                  </li>
                             
                                 <?php if($_GET['orderphase'] == '2') { ?>
                                  <li class="list-group-item">
                                      <a href="process_confirm_order.php?confirm_order=<?php echo $curr_order_ref_number; ?>" class="btn btn-success">Confirm</a>
                                  </li>
                                  <?php } ?>
                                  
                                 <?php if($_GET['orderphase'] == '3') { ?>
                                 <li class="list-group-item">
                                      <a href="process_confirm_order.php?ship_order=<?php echo $curr_order_ref_number; ?>" class="btn btn-primary">Ship</a>
                                  </li>
                                  <?php } ?>
                                 <?php if($_GET['orderphase'] == '4') { ?>
                                 <li class="list-group-item">
                                      <a href="process_confirm_order.php?complete_order=<?php echo $curr_order_ref_number; ?>" class="btn btn-primary">Complete</a>
                                  </li>
                                  <?php } ?>
                              </ul>
                              
                          </div>
                          
                      </div>
              <?php }
              ?>
              </div>
            <?php } ?>
         </div> 
          
      </div>
      <?php } ?>
      <?php if(isset($_GET['dashboard'])){
    
                include_once "dashboard.php";
    
        }?>
   </div>
    </div>
    </div>
</body>
    <script src="../js/bootstrap.js"></script>
</html>