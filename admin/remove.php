<?php
session_start();
include_once('../functions/functions.php');
$dbconnect = dblink();

$id = $_GET['id'];

deleteItem($dbconnect,$id);
      
?>