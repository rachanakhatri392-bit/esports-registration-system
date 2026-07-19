<!DOCTYPE html>
<html>
<head>
<title>Search Participants & Teams</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4 col-md-6 bg-white p-4 rounded shadow">
<h3 class="text-center">Search</h3>

<form method="POST" action="search_result.php">
<label>Search Participant (by Email or Gamertag)</label>
<input class="form-control mb-3" name="participant" placeholder="Enter Email or Gamertag">

<label>Search Team (by Team Name)</label>
<input class="form-control mb-3" name="team" placeholder="Enter Team Name">

<button class="btn btn-primary w-100">Search</button>
</form>
</div>

</body>
</html>