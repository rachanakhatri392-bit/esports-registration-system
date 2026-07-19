<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}
include 'dbconnect.php';

$result = $conn->query("SELECT * FROM participant");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Participants</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <h2 class="text-center text-warning mb-4">Manage Participants</h2>

    <div class="card shadow-lg">
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Kills</th>
                        <th>Deaths</th>
                        <th>Team ID</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['firstname']) ?></td>
                        <td><?= htmlspecialchars($row['surname']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= $row['kills'] ?></td>
                        <td><?= $row['deaths'] ?></td>
                        <td><?= $row['team_id'] ?></td>
                        <td>
                            <a href="edit_participant_form.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" 
                               onclick="return confirm('Are you sure you want to delete this participant?')" 
                               class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="admin_menu.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</div>

</body>
</html>