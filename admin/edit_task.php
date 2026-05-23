<?php
include('../includes/connection.php');

// Check tid from URL
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $tid = (int) $_GET['id'];
} else {
    echo "Invalid Task ID";
    exit;
}

// Fetch task
$query = "SELECT * FROM tasks WHERE tid = $tid LIMIT 1";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

if(!$row){
    echo "Task not found";
    exit;
}

// Store values
$uid    = $row['uid'];
$desc   = $row['description'];
$start  = $row['start_date'];
$end    = $row['end_date'];
$status = $row['status'];


// UPDATE TASK
if(isset($_POST['update_task'])){

    $tid    = (int) $_POST['tid'];
    $desc   = $_POST['description'];
    $start  = $_POST['start_date'];
    $end    = $_POST['end_date'];
    $status = $_POST['status'];

    $update = "UPDATE tasks 
                SET description='$desc',
                start_date='$start',
                end_date='$end',
                status='$status'
                WHERE tid = $tid
                LIMIT 1";

    if(mysqli_query($connection, $update)){
        echo "<script>
                alert('Task updated successfully');
                window.location.href='manage_task.php';
            </script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #74ebd5, #ACB6E5);">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-5">

<h3 class="text-center text-white mb-4">Edit Task</h3>

<form method="POST">

<!-- Hidden tid -->
<input type="hidden" name="tid" value="<?php echo $tid; ?>">

<div class="mb-3">
<label class="text-white">Description</label>
<textarea name="description" class="form-control" required><?php echo $desc; ?></textarea>
</div>

<div class="mb-3">
<label class="text-white">Start Date</label>
<input type="date" name="start_date" class="form-control" value="<?php echo $start; ?>" required>
</div>

<div class="mb-3">
<label class="text-white">End Date</label>
<input type="date" name="end_date" class="form-control" value="<?php echo $end; ?>" required>
</div>

<div class="mb-3">
<label class="text-white">Status</label>
<select name="status" class="form-control">
    <option value="Pending" <?php if($status=="Pending") echo "selected"; ?>>Pending</option>
    <option value="In Progress" <?php if($status=="In Progress") echo "selected"; ?>>In Progress</option>
    <option value="Completed" <?php if($status=="Completed") echo "selected"; ?>>Completed</option>
</select>
</div>

<div class="text-center">
<button type="submit" name="update_task" class="btn btn-warning">
    Update
</button>
</div>

</form>

</div>
</div>
</div>

</body>
</html>