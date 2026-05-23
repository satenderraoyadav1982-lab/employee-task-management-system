<?php
include('../includes/connection.php');

// Check if tid is received
if(isset($_GET['id']) && is_numeric($_GET['id'])){

    $tid = (int) $_GET['id']; // safe integer

    // Delete only ONE row
    $delete_query = "DELETE FROM tasks WHERE tid = $tid LIMIT 1";

    if(mysqli_query($connection, $delete_query)){
        echo "<script>
                alert('Task deleted successfully');
                window.location.href='manage_task.php';
                </script>";
    } else {
        echo "Error deleting task: " . mysqli_error($connection);
    }

} else {
    echo "<script>
            alert('Invalid Task ID');
            window.location.href='manage_task.php';
            </script>";
}
?>