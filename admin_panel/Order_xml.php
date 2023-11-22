<?php
// Include your database connection file
include_once "./config/dbconnect.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders";
$conn->query("set names 'utf8'");
$result = $conn->query($sql);


$xml_file_content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml_file_content .= '<Orders>' . "\n";

while ($row = $result->fetch_assoc()) {
    $xml_file_content .= '    <orders>' . "\n";
    $xml_file_content .= '        <order_id >' . $row['order_id'] . '</order_id >' . "\n";
    $xml_file_content .= '        <user_id >' . $row['user_id'] . '</user_id>' . "\n";
    $xml_file_content .= '        <delivered_to>' . $row['delivered_to'] . '</delivered_to>' . "\n";
    $xml_file_content .= '        <phone_no>' . $row['phone_no'] . '</phone_no>' . "\n";
    $xml_file_content .= '        <deliver_address>' . $row['deliver_address'] . '</deliver_address>' . "\n";
    $xml_file_content .= '        <pay_method>' . $row['pay_method'] . '</pay_method>' . "\n";
    $xml_file_content .= '        <order_status>' . $row['order_status'] . '</order_status>' . "\n";
    $xml_file_content .= '    </orders>' . "\n";
}

$xml_file_content .= '</Orders>' . "\n";


$xml_file = './generate_xml/Orders.xml';
file_put_contents($xml_file, $xml_file_content);


$xml_content = file_get_contents($xml_file);


$conn->close();
header("location:{$xml_file}")
?>


