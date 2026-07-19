<?php 
include 'dbconnect.php';
session_destroy();
header("Location: index.html");
?>