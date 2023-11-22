<?php

include_once "./config/dbconnect.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->query("SET NAMES 'utf8'");

$sql = "SELECT * FROM category";
$result = $conn->query($sql);


$xml_file_content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml_file_content .= '<categories>' . "\n";

while ($row = $result->fetch_assoc()) {
    $xml_file_content .= '    <category>' . "\n";
    $xml_file_content .= '        <category_id>' . $row['category_id'] . '</category_id>' . "\n";
    $xml_file_content .= '        <category_name>' . $row['category_name'] . '</category_name>' . "\n";
    $xml_file_content .= '    </category>' . "\n";
}

$xml_file_content .= '</categories>' . "\n";


$xml_file = './generate_xml/categories.xml';
file_put_contents($xml_file, $xml_file_content);


$xml_content = file_get_contents($xml_file);


$conn->close();
header("location:{$xml_file}")
?>

