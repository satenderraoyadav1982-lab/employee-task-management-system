<?php
session_start();
include('./includes/connection.php');

// ✅ Get task id from URL
if(isset($_GET['id'])){
    $tid = $_GET['id'];

    // ✅ Fetch task data
    $query = "SELECT * FROM tasks WHERE tid = $tid";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        $task = mysqli_fetch_assoc($result);  // ✅ NOW $task is defined
    } else {
        echo "Task not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}

// ✅ Update status
if(isset($_POST['update_status'])){
    $status = $_POST['status'];

    $update_query = "UPDATE tasks SET status='$status' WHERE tid=$tid";
    $update_run = mysqli_query($connection, $update_query);

    if($update_run){
        echo "<script>
            alert('Status updated successfully');
            window.location.href='user_dashboard.php';
        </script>";
    } else {
        echo "<script>alert('Error updating status');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Task Status</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap/css/bootstrap.min.css">
</head>

<body style="background: linear-gradient(to right, #74ebd5, #ACB6E5);">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-5">

<div class="card">
<div class="card-body">

<h4 class="text-center mb-4">Update Task Status</h4>

<form method="POST">

<div class="mb-3">
<label><b>Task Description</b></label>
<textarea class="form-control" readonly>
<?php echo $task['description']; ?>
</textarea>
</div>

<div class="mb-3">
<label><b>Status</b></label>
<select name="status" class="form-control" required>

<option value="">Select Status</option>

<option value="Pending" <?php if($task['status']=="Pending") echo "selected"; ?>>
    Pending
</option>

<option value="In Progress" <?php if($task['status']=="In Progress") echo "selected"; ?>>
    In Progress
</option>

<option value="Completed" <?php if($task['status']=="Completed") echo "selected"; ?>>
    Completed
</option>

</select>
</div>

<div class="text-center">
<button type="submit" name="update_status" class="btn btn-success">
Update Status
</button>
</div>

</form>

</div>
</div>

</div>
</div>
</div>

</body>
</html>