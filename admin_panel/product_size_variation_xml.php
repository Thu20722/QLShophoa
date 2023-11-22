<?php

include_once "./config/dbconnect.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->query("SET NAMES 'utf8'");

$sql = "SELECT * FROM product_size_variation";
$result = $conn->query($sql);


$xml_file_content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml_file_content .= '<variations>' . "\n";

while ($row = $result->fetch_assoc()) {
    $xml_file_content .= '    <variation>' . "\n";
    $xml_file_content .= '        <variation_id >' . $row['variation_id'] . '</variation_id>' . "\n";
    $xml_file_content .= '        <product_id>' . $row['product_id'] . '</product_id>' . "\n";
    $xml_file_content .= '        <size_id >' . $row['size_id'] . '</size_id>' . "\n";
    $xml_file_content .= '        <quantity_in_stock>' . $row['quantity_in_stock'] . '</quantity_in_stock>' . "\n";
    $xml_file_content .= '    </variation>' . "\n";
}

$xml_file_content .= '</variations>' . "\n";


$xml_file = './generate_xml/variations.xml';
file_put_contents($xml_file, $xml_file_content);


$xml_content = file_get_contents($xml_file);


$conn->close();
header("location:{$xml_file}")
?>

