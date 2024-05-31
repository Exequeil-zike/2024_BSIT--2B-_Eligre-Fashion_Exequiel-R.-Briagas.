<?php
if(isset($_POST['f_item_name'])){ //trap
    include_once "database.php";
    
    $uploadOk = 1;
    $target_dir = "../img/";
    
    $target_file = $target_dir . basename($_FILES["f_item_img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $check_img = getimagesize($_FILES["f_item_img"]["tmp_name"]);
    
    if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
  } else {
            echo "File is not an image.";
            $uploadOk = 0;
  }
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
    }
    
    
    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 // echo "Sorry, your file was not uploaded.";
  header("location: index.php?insert_status=99");
// if everything is ok, try to upload file
} 
else {
  if (move_uploaded_file($_FILES["f_item_img"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["f_item_img"]["name"])). " has been uploaded.";
  } 
  else {
    //echo "Sorry, there was an error uploading your file.";
    header("location: shopping.php?insert_status=99");
  }
}
    
    $db_filename = basename($_FILES["f_item_img"]["name"]);
    $item_name = $_POST['f_item_name'];
    $item_desc = $_POST['f_item_desc'];
    $item_price = $_POST['f_item_price'];
    
    $sql_insert_item = "INSERT INTO `items`
                    (`item_name`, `item_desc`, `item_price`,`item_img`)
                      VALUES
                    ('$item_name','$item_desc','$item_price','$db_filename');";

    $execute_query=mysqli_query($conn, $sql_insert_item);
    
    if($execute_query){
        //echo "Data inserted.";   
        header("location: shopping.php?insert_status=1");
    }
    
}
else{
    header("location: shopping.php?you_cant_be_here");
}