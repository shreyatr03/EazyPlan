<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'username');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'eazy_plan');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
    }
?>