<?php

include_once "./config/dbconnect.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->query("SET NAMES 'utf8'");

$sql = "SELECT * FROM sizes";
$result = $conn->query($sql);


$xml_file_content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml_file_content .= '<sizes>' . "\n";

while ($row = $result->fetch_assoc()) {
    $xml_file_content .= '    <size>' . "\n";
    $xml_file_content .= '        <size_id >' . $row['size_id'] . '</size_id>' . "\n";
    $xml_file_content .= '        <size_name>' . $row['size_name'] . '</size_name>' . "\n";
    $xml_file_content .= '    </size>' . "\n";
}

$xml_file_content .= '</sizes>' . "\n";


$xml_file = './generate_xml/sizes.xml';
file_put_contents($xml_file, $xml_file_content);


$xml_content = file_get_contents($xml_file);


$conn->close();
header("location:{$xml_file}")
?>

