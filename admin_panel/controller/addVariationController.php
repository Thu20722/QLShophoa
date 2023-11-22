<?php
    include_once "../config/dbconnect.php";
    $product = $_POST['record1'];
    $size= $_POST['record2'];
    $qty = $_POST['record3'];
    $insert = mysqli_query($conn,"INSERT INTO product_size_variation
    (product_id,size_id,quantity_in_stock) VALUES ('$product','$size','$qty')");
?>