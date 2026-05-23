<?php
session_start();
include('../includes/connection.php');

if(isset($_POST['create_task'])){
    $query = "insert into tasks values(
        null,
        $_POST[id],
        '$_POST[description]',
        '$_POST[start_date]',
        '$_POST[end_date]',
        'Not Started'
    )";

    $query_run = mysqli_query($connection, $query);

    if($query_run){
        echo "<script type='text/javascript'>
            alert('Task created successfully...');
            window.location.href = 'admin_dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Error, plz try again.');
            window.location.href = 'admin_dashboard.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin dashboard</title>
<script src="../includes/jquery_latest.js"></script>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css">
<script type="text/javascript">
    $(document).ready(function(){
        $("#create_task").click(function(){
            $("#right_sidebar").load("create_task.php");
        });
    });
    $(document).ready(function(){
        $("#manage_task").click(function(){
            $("#right_sidebar").load("manage_task.php");
        });
    });
    $(document).ready(function(){
        $("#view_leave").click(function(){
            $("#right_sidebar").load("view_leave.php");
        });
    });
</script>
</head>
<body>


<div class="container-fluid">

    <!-- Header -->
    <div class="row" id="header">
        <div class="col-md-6">
            <h2>Task Management System</h2>
        </div>

        <div class="col-md-6 text-right" style="padding-top:20px;">
            <b>Email:</b>  <?php echo $_SESSION['email']; ?>
            <span style="margin-left: 20px;"><b>Name:</b> <?php echo $_SESSION['name']; ?> </span>
        </div>
    </div>
    <div class="row">
    <div class="col-md-2" id="left_sidebar">
        <div class="menu" >
        <a href="admin_dashboard.php" type="button">Dashboard</a>
        <a type="button" id="create_task">Create Task</a>
        <a type="button" id="manage_task">Manage Task</a>
        <a type="button" id="view_leave">Leave applications</a>
        <a href="../logout.php" type="button">Logout</a>
        </div>
    </div>
    <div class="col-md-10" id="right_sidebar">
        <h4>Instructions for Admin</h4>
        <ul>
            <li>1. Maintain discipline and office rules. </li>
            <li>2. Monitor attendance and approve leaves.</li>
            <li>3. Assign and track tasks.</li>
            <li>4. Ensure clear communication. </li>
        </ul>
    </div>
    </div>
</div>
</body>
</html>