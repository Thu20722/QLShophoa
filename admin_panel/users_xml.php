<?php

include_once "./config/dbconnect.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("SET NAMES 'utf8'");

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$xml_file_content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml_file_content .= '<users>' . "\n";

while ($row = $result->fetch_assoc()) {
    $xml_file_content .= '    <user>' . "\n";
    $xml_file_content .= '        <user_id  >' . $row['user_id'] . '</user_id>' . "\n";
    $xml_file_content .= '        <first_name>' . $row['first_name'] . '</first_name>' . "\n";
    $xml_file_content .= '        <last_name>' . $row['last_name'] . '</last_name>' . "\n";
    $xml_file_content .= '        <email>' . $row['email'] . '</email>' . "\n";
    $xml_file_content .= '        <password >' . $row['password'] . '</password>' . "\n";
    $xml_file_content .= '        <contact_no>' . $row['contact_no'] . '</contact_no>' . "\n";
    $xml_file_content .= '        <registered_at  >' . $row['registered_at'] . '</registered_at>' . "\n";
    $xml_file_content .= '        <isAdmin>' . $row['isAdmin'] . '</isAdmin>' . "\n";
    $xml_file_content .= '        <user_address>' . $row['user_address'] . '</user_address>' . "\n";
    $xml_file_content .= '    </user>' . "\n";
}

$xml_file_content .= '</users>' . "\n";

$xml_file = './generate_xml/users.xml';
file_put_contents($xml_file, $xml_file_content);

$xml_content = file_get_contents($xml_file);

$conn->close();
header("location:{$xml_file}")
?>

