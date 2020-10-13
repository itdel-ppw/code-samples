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

$sql = "SELECT id, name, price FROM fruit WHERE id = '{$_id}'";

if (!$result = $connection->query($sql)) {
    echo "Query: " . $sql . "\n";
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
