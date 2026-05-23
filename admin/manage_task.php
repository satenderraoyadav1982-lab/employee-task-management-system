<?php
include('../includes/connection.php');
?>
<html>
    <body>
        <h3 style="text-align:center; color:white;">All assigned tasks</h3>

<div style="display:flex; justify-content:center; margin-top:20px;">
    <table border="1" cellpadding="10" cellspacing="0"
        style="background:white; width:80%; text-align:center; border-collapse:collapse;">
        
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
        $query = "select * from tasks";
        $query_run = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($query_run)){
        ?>
        <tr>
            <td><?php echo $sno++; ?></td>
            <td><?php echo $row['tid']; ?></td>
            <td style="text-align:left;"><?php echo $row['description']; ?></td>
            <td><?php echo $row['start_date']; ?></td>
            <td><?php echo $row['end_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
            <a href="edit_task.php?id=<?php echo $row['tid']; ?>" class="btn btn-warning btn-sm">
    Edit
</a>
    <a href="delete_task.php?id=<?php echo $row['tid']; ?>" 
    onclick="return confirm('Are you sure you want to delete this task?')" 
    class="btn btn-danger btn-sm">
        Delete
    </a>
            </td>
        </tr>
        <?php } ?>
        
    </table>
</div>
</body>
</html>


