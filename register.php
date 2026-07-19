<?php
include 'dbconnect.php';

if(empty($_POST['firstname']) || empty($_POST['surname']) || empty($_POST['email'])){
    die("All fields are required.");
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    die("Invalid email format.");
}

$stmt = $conn->prepare("INSERT INTO merchandise (firstname,surname,email) VALUES (?,?,?)");
$stmt->bind_param("sss", $_POST['firstname'], $_POST['surname'], $_POST['email']);
$stmt->execute();

echo "<script>alert('Registration Successful'); window.location='index.html';</script>";
?>