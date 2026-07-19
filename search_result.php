<?php
include 'dbconnect.php';

$participant =trim( $_POST['participant'] ?? '');
$team =trim( $_POST['team'] ?? '');
?>

<!DOCTYPE html>
<html>
<head>
<title>Search Results</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

<?php
// ---------- PARTICIPANT SEARCH ----------
if(!empty($participant)){
    $sql = "SELECT * FROM participant 
            WHERE email LIKE '%$participant%' 
            OR firstname LIKE '%$participant%' 
            OR surname LIKE '%$participant%'";
    $res = $conn->query($sql);

    echo "<h4>Participant Result</h4><table class='table table-bordered'>
          <tr><th>Name</th><th>Email</th><th>Kills</th><th>Deaths</th></tr>";

    if($res->num_rows > 0){
        while($row=$res->fetch_assoc()){
            echo "<tr>
                  <td>{$row['firstname']} {$row['surname']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['kills']}</td>
                  <td>{$row['deaths']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No participant found</td></tr>";
    }
    echo "</table>";
}

// ---------- TEAM SEARCH ----------
if(!empty($team)){
    $teamSQL = "SELECT * FROM team WHERE name LIKE '%$team%'";
    $teamRes = $conn->query($teamSQL);

    if($teamRes && $teamRes->num_rows > 0){

        $teamRow = $teamRes->fetch_assoc();
        $team_id = $teamRow['id'];

        $players = $conn->query("SELECT * FROM participant WHERE team_id=$team_id");

        echo "<h4>Team: {$teamRow['name']}</h4>";
        echo "<table class='table table-bordered'>
              <tr><th>Name</th><th>Kills</th><th>Deaths</th><th>K/D Ratio</th></tr>";

        $tk=0; $td=0;

        while($p=$players->fetch_assoc()){
            $kd = $p['deaths']==0 ? $p['kills'] : round($p['kills']/$p['deaths'],2);
            $tk += $p['kills'];
            $td += $p['deaths'];

            echo "<tr>
                  <td>{$p['firstname']} {$p['surname']}</td>
                  <td>{$p['kills']}</td>
                  <td>{$p['deaths']}</td>
                  <td>$kd</td>
                  </tr>";
        }

        $teamKD = $td==0 ? $tk : round($tk/$td,2);
        echo "<tr class='table-info'><th colspan='3'>Team K/D Ratio</th><th>$teamKD</th></tr></table>";

    } else {
        echo "<div class='alert alert-danger'>No team found.</div>";
    }
}
?>

<a href="admin_menu.php" class="btn btn-secondary">Back</a>

</div>
</body>
</html>