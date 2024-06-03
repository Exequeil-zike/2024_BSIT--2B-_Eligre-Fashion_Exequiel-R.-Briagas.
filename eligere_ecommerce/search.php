<?php
require_once 'shopping.php';

if (isset($_GET['query'])) {
  $search_query = $_GET['query'];
  $sql_get_items = "SELECT * FROM items
                    WHERE item_status = 'A' AND (item_name LIKE '%$search_query%' OR item_desc LIKE '%$search_query%')";
  $get_result = mysqli_query($conn, $sql_get_items);

  // Get ordered items related to the searched item
  $sql_get_ordered_items = "SELECT oi.orders_id, oi.item_id, oi.item_qty, oi.date_added, oi.order_ref_number, oi.gcash_ref_num, i.item_name, i.item_img, i.item_price
  FROM `orders` oi
  JOIN `items` i ON oi.item_id = i.items_id
  JOIN `user_info` u ON oi.user_id = u.user_info_id
  WHERE u.user_info_id = '".$_SESSION['user_info_id']."' AND (i.item_name LIKE '%$search_query%' OR i.item_desc LIKE '%$search_query%')";
  $get_ordered_result = mysqli_query($conn, $sql_get_ordered_items);
?>

<h2 class="text-center">Search Results for "<?php echo $search_query;?>"</h2>
<div class="container">
  <div class="row justify-content-center">
    <?php while ($row = mysqli_fetch_assoc($get_result)) {?>
      <!-- display each item -->
      <div class="col-md-3 mb-3">
      <style>
          .card-img {
           transition: transform 0.9s, box-shadow 0.5s;
          }
          .card-img:hover {
          transform: scale(1.1);
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
          cursor: pointer;
          }
        </style>
        <!-- item details -->
        <div class="card text-center">
          <img src="./images/<?php echo $row['item_img'];?>" width="100px" class="card-img">
          <div class="card-body">
            <h3 class="card-title">
              <?php echo $row['item_name'];?>
            </h3>
            <p class="card-text"><?php echo $row['item_desc'];?></p>
            <blockquote class="blockquote mb-0">
              <p><?php echo "Php ". number_format($row['item_price'],2);?></p>
            </blockquote>
          </div>
        </div>
        <!-- add to cart form -->
        <form action="process_add_to_cart.php" method="get" style="margin: 1rem;">
          <div class="input-group">
            <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['items_id'];?>">
            <input type="number" min="1" value="1" class="form-control" placeholder=1 name="cart_qty">
            <input type="submit" value="Add to Cart" class="btn btn-primary">
            <style>
                .btn-primary {
                background-color: #a37251;
                border: none;
                }             
            </style>
          </div>
        </form>
      </div>
    <?php }?>

    <!-- Display ordered items related to the searched item -->
    <h3 class="text-center">Ordered Items</h3>
    <?php 
    $ordered_items = array();
    while ($ordered_row = mysqli_fetch_assoc($get_ordered_result)) {
      $ordered_items[$ordered_row['item_id']][] = $ordered_row;
    }
    foreach ($ordered_items as $item_id => $item_orders) {?>
      <div class="col-md-3 mb-3">
        <!-- ordered item details -->
        <div class="card text-center">
          <img src="./images/<?php echo $item_orders[0]['item_img'];?>" width="100px" class="card-img">
          <div class="card-body">
            <h3 class="card-title">
              <?php echo $item_orders[0]['item_name'];?>
            </h3>
            <p class="card-text">Ordered Quantity: <?php echo array_sum(array_column($item_orders, 'item_qty'));?></p>
            <p class="card-text">Ordered Date: <?php echo $item_orders[0]['date_added'];?></p>
            <p class="card-text">Reference Number: <?php echo $item_orders[0]['order_ref_number'];?></p>
            <blockquote class="blockquote mb-0">
              <p><?php echo "Php ". number_format($item_orders[0]['item_price'],2);?></p>
            </blockquote>
          </div>
        </div>
      </div>
    <?php }?>
  </div>
</div>

<?php }?>