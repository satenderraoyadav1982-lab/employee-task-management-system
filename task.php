<?php
    session_start();
include('./includes/connection.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="includes/jugery_latest.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h2 style="color:white; position:absolute ; top:0;">Your tasks</h2>
<!-- <div style="display:flex; justify-content:center; margin-top:20px;"> -->
    <table border="1" cellpadding="10" cellspacing="0"
        style="background:white; width:80%; text-align:center; border-collapse:collapse; position:absolute ; top:70px;">
        
        <tr style="background:#333; color:white;">
            <th>S.No</th>
            <th>Task ID</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $sno = 1;
        $query = "select * from tasks where uid = $_SESSION[uid]";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
                <td><?php echo $sno++; ?></td>
                <td><?php echo $row['tid']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a href="update_status.php?id=<?php echo $row['tid'];?>">Update</a>
                </td>
            </tr>
        <?php
        }
        ?>
</table>
</body>
</html>