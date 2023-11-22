<?php

include_once "./config/dbconnect.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->query("SET NAMES 'utf8'");

$sql = "SELECT * FROM product";
$result = $conn->query($sql);


$xml_file_content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml_file_content .= '<products>' . "\n";

while ($row = $result->fetch_assoc()) {
    $xml_file_content .= '    <product>' . "\n";
    $xml_file_content .= '        <product_id>' . $row['product_id'] . '</product_id>' . "\n";
    $xml_file_content .= '        <product_name>' . $row['product_name'] . '</product_name>' . "\n";
    $xml_file_content .= '        <product_desc>' . $row['product_desc'] . '</product_desc>' . "\n";
    $xml_file_content .= '        <product_image>' . $row['product_image'] . '</product_image>' . "\n";
    $xml_file_content .= '        <price>' . $row['price'] . '</price>' . "\n";
    $xml_file_content .= '        <category_id>' . $row['category_id'] . '</category_id>' . "\n";
    $xml_file_content .= '        <uploaded_date>' . $row['uploaded_date'] . '</uploaded_date>' . "\n";
    $xml_file_content .= '    </product>' . "\n";
}

$xml_file_content .= '</products>' . "\n";


$xml_file = './generate_xml/products.xml';
file_put_contents($xml_file, $xml_file_content);


$xml_content = file_get_contents($xml_file);


$conn->close();
header("location:{$xml_file}")
?>

