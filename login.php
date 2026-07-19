<?php
session_start();
include 'dbconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {

    $row = $result->fetch_assoc();

    // Check password (plain or hashed)
    if ($password == $row['password'] || password_verify($password, $row['password'])) {

        $_SESSION['admin'] = $username;
        header("Location: admin_menu.php");
        exit();

    } else {
        echo "<script>alert('Wrong Password');window.location='admin_login.html';</script>";
    }

} else {
    echo "<script>alert('Username not found');window.location='admin_login.html';</script>";
}
?>