<?php
session_start();
include('includes/connection.php'); // adjust if your path differs

if(!isset($_SESSION['uid'])){
    header("Location: user_login.php");
    exit();
}

$uid = (int) $_SESSION['uid'];

$query = "SELECT * FROM leaves WHERE uid = $uid ORDER BY lid DESC";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Leave Status</title>

<!-- ✅ Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(to right, #74ebd5, #ACB6E5);
}

/* Container Card */
.card-box{
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
}

/* Table styling */
.table th{
    background-color: #343a40;
    color: white;
    text-align: center;
}

.table td{
    vertical-align: middle;
    text-align: center;
}

/* Status badges */
.badge{
    font-size: 14px;
    padding: 6px 12px;
}
</style>

</head>

<body>

<div class="container mt-5">

<div class="card-box">

<h3 class="text-center mb-4">My Leave Status</h3>

<table class="table table-bordered table-hover">

<thead>
<tr>
    <th>ID</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Status</th>
</tr>
</thead>

<tbody>

<?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['lid']; ?></td>
<td><?php echo $row['subject']; ?></td>
<td style="text-align:left;"><?php echo $row['message']; ?></td>

<td>
<?php
if($row['status'] == "Pending"){
    echo "<span class='badge bg-warning text-dark'>Pending</span>";
}
elseif($row['status'] == "Approved"){
    echo "<span class='badge bg-success'>Approved</span>";
}
else{
    echo "<span class='badge bg-danger'>Rejected</span>";
}
?>
</td>

</tr>

<?php
    }
} else {
    echo "<tr><td colspan='4'>No leave records found</td></tr>";
}
?>

</tbody>

</table>

</div>

</div>

</body>
</html>