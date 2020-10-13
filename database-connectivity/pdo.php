<?php

$dbhost = 'localhost';
$dbname = 'fruitshop_db';
$dbuser = 'fsuser';
$dbpass = 'fsuser0000';

$_id = '0e21b9e56243d2915bd56d09034cecf5a4e20c86a928cb63623acfb83494217c';

try {
    $connection = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    // when something wrong happens, throw an exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $sql = "SELECT id, name, price FROM fruit WHERE id = :id";

    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $_id);
  
    $stmt->execute();

    // https://www.php.net/manual/en/pdostatement.fetch.php
    // mode: PDO::FETCH_ASSOC, PDO::FETCH_NUM, see docs.
    $fruit = $stmt->fetchAll();

    print_r($fruit);
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  
  $connection = null;
  