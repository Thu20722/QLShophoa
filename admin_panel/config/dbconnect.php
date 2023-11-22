
<?php

$server = "localhost:3307";
$user = "root";
$password = "Thu1234@";
$db = "swiss_collection";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}

?>