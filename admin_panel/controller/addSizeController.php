<?php
    include_once "../config/dbconnect.php";
    
    $size = $_POST['record'];
       
    $insert = mysqli_query($conn,"INSERT INTO sizes
    (size_name)   VALUES ('$size')");
      
?>