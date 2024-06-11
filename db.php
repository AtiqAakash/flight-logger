<?php
// Check if the constants are not defined before defining them
if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASS')) define('DB_PASS', '');
if (!defined('DB_NAME')) define('DB_NAME', 'flight_logs');

// Establish the database connection
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
