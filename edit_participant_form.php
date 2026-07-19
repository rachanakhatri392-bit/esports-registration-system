<?php include 'dbconnect.php';
$id=$_GET['id'];
$res=$conn->query("SELECT * FROM participant WHERE id=$id");
$row=$res->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 col-md-4">
<h3>Edit Kills / Deaths</h3>
<form method="POST" action="edit_participant.php">
<input type="hidden" name="id" value="<?=$id?>">
<input class="form-control mb-3" name="kills" value="<?=$row['kills']?>" required>
<input class="form-control mb-3" name="deaths" value="<?=$row['deaths']?>" required>
<button class="btn btn-success">Update</button>
</form>
</div>
</body>
</html>