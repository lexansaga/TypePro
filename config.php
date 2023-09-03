<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

// error_reporting(0);
// ini_set('display_errors', 0);


define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'db_typepro');

session_start();

try {
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
    // echo ("Database Connected Successfully");
} catch (PDOException $ex) {
    exit("Error : " . $ex->getMessage());
    echo ('' . $ex->getMessage()());
}


// function HASH_PASSWORD($password)
// {
//     return password_hash($password, PASSWORD_ARGON2I);
// }
// function PRINT_STRING($value)
// {
//     return "<p class=\"for-debug\">$value</p>";
// }
