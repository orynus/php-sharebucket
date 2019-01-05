<?php
$db_host = 'db';
$db_username = 'sharebucket_admin';
$db_password = 'sharebucket_password';
$db_database = 'sharebucket_db';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_database);

if ($mysqli->connect_error) {
 die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
?>