<?php
include 'dbconnect.php';

if(!is_numeric($_POST['kills']) || !is_numeric($_POST['deaths'])){
    die("Invalid values.");
}

$stmt = $conn->prepare("UPDATE participant SET kills=?, deaths=? WHERE id=?");
$stmt->bind_param("iii", $_POST['kills'], $_POST['deaths'], $_POST['id']);
$stmt->execute();

header("Location: view_participants_edit_delete.php");
session_start();
?>