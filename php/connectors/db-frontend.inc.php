<?php
$host = 'db';
$username = 'sharebucket_admin';
$password = 'sharebucket_password';
$database = 'sharebucket_db';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
 die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
?>