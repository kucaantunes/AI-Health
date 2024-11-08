<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'vel');

/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id16917668_kucaantunes');
define('DB_PASSWORD', 'Pass: $%^%AHa/#o<K1r}1');
define('DB_NAME', 'id16917668_vell');
 */
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>