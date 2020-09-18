<?php
// access the 3rd party library
include_once('vendor/autoload.php');

// use an external class via its namespace
use Medoo\Medoo;

// create an array to configure database access
$database_config = [
  'database_type' => 'mysql',
  'server' => 'localhost',
  'database_name' => 'fruitshop_db',
  'username' => 'fsuser',
  'password' => 'fsuser0000'
];

// create a connection to the database
$database = new Medoo($database_config);

$fruits = $database->select(
    'fruit',
    ['id', 'name', 'price']
);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <title>Fruits</title>
</head>

<body>
  <h3>Fruits</h3>
  Here is the list of our available fruits.
  <ul>
    <?php foreach ($fruits as $fruit) { ?>
    <li><a
        href="fruit.php?id=<?=$fruit['id']?>"><?=$fruit['name']?></a> $<?=$fruit['price']?>
    </li>
    <?php } ?>
  </ul>
</body>

</html>