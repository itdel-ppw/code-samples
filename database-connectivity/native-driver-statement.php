<?php

$dbhost = 'localhost';
$dbname = 'fruitshop_db';
$dbuser = 'fsuser';
$dbpass = 'fsuser0000';

$_id = '0e21b9e56243d2915bd56d09034cecf5a4e20c86a928cb63623acfb83494217c';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($connection->connect_errno) {
    echo "Errno: " . $connection->errno . "" . ":" . $connection->error . "\n";
    exit;
}

$sql = "SELECT id, name, price FROM fruit WHERE id = ?";

if (!$stmt = $connection->prepare($sql)) {
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $connection->errno . "" . ":" . $connection->error . "\n";
    exit;
}

// https://www.php.net/manual/en/mysqli-stmt.bind-param.php
if (!$stmt->bind_param('s', $_id)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}

if (!$result = $stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}

if (!$result = $stmt->get_result()) {
    echo "Errno: " . $connection->errno . "" . ":" . $connection->error . "\n";
    exit;
}

if ($result->num_rows === 0) {
    echo "We could not find a match for ID $_id, sorry about that. Please try again.";
    exit;
}

$fruit = $result->fetch_assoc();

$result->free();
$connection->close();

print_r($fruit);
