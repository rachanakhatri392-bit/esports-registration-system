<?php
include 'dbconnect.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    die("Invalid request.");
}

$stmt = $conn->prepare("DELETE FROM participant WHERE id=?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

header("Location: view_participants_edit_delete.php");
session_start();
?>