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

// read a parameter name 'id'
$_id = $_GET['id'];

// create a connection to the database
$database = new Medoo($database_config);

// find a fruit with the given 'id'
$fruit = $database->select(
    'fruit',
    '*',
    ['id' => $_id]
);

?>
<pre>
<?php
// print the fruit
print_r($fruit);
?>
</pre>