<?php
include_once "../config/dbconnect.php";

$catname = $_POST['record'];

$insert = mysqli_query($conn, "INSERT INTO category
         (category_name) 
         VALUES ('$catname')");


?>