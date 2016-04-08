<?php

define('SALT', "JOZJReoia1");

$hostname = 'dt5.ehb.be';
$username = 'kevin.felix';
$password = 'CbHbd';
$database = 'kevin.felix';

$db = new mysqli($hostname, $username, $password, $database);
$db->connect($hostname, $username, $password);
$db->select_db($database);

session_start();

?>