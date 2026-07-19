<?php 
include 'dbconnect.php'; 
session_start();
if(!isset($_SESSION['admin'])) header("Location: admin_login.html"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
<h2>Admin Dashboard</h2>
<a href="view_participants_edit_delete.php" class="btn btn-warning">Edit / Delete Participants</a>
<a href="search_form.php" class="btn btn-info">Search Participants / Teams</a>
<a href="logout.php" class="btn btn-danger">Logout</a>
</div>

</body>
</html>