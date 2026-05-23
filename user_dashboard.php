<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User dashboard</title>
<script src="includes/jugery_latest.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<script type="text/javascript">
    $(document).ready(function(){
        $("#update_task").click(function(){
            $("#right_sidebar").load("task.php");
        });
    });
    $(document).ready(function(){
        $("#view_leave").click(function(){
            $("#right_sidebar").load("leave_status.php");
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
            <b>Email:</b> <?php echo $_SESSION['email']; ?>
            <span style="margin-left: 20px;"><b>Name:</b><?php echo $_SESSION['name']; ?> </span>
        </div>
    </div>
    <div class="row">
    <div class="col-md-2" id="left_sidebar">
        <div class="menu" >
        <a href="user_dashboard.php" type="button" id="logout_link">Dashboard</a>
        <a href="task.php" type="button" class="link"  id="update_task" >Update Task</a>
        <a href="leaveForm.php" type="button" class="link" >Apply Leave</a>
        <a href="leave_status.php" type="button" class="link" id="view_leave">Leave status</a>
        <a href="logout.php" type="button" id="logout_link">Logout</a>
        </div>
    </div>
    <div class="col-md-10" id="right_sidebar">
        <h4>Instructions for Employees</h4>
        <ul>
            <li>1. All the Employees should mark their attendance daily </li>
            <li>2. Everyone must complete the task assigned to them.</li>
            <li>3. kindly maintain decorum of the office.</li>
            <li>4. Keep office and your area neat and clean </li>
        </ul>
    </div>
    </div>
</div>
</body>
</html>