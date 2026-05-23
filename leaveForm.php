<?php
session_start();
include('includes/connection.php');

if(isset($_POST['submit_leave'])){
    $uid = $_SESSION['uid'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $status = "Pending";

    $query = "INSERT INTO leaves (uid, subject, message, status) 
                VALUES ('$uid', '$subject', '$message', '$status')";

    if(mysqli_query($connection, $query)){
        echo "<script>alert('Leave Applied Successfully');</script>";
    } else {
        echo "<script>alert('Error!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply Leave</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #74ebd5, #9face6);
            font-family: 'Segoe UI', sans-serif;
        }

        .card-box {
            width: 420px;
            padding: 35px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        .card-box h2 {
            margin-bottom: 25px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
        }

        textarea {
            resize: none;
        }

        .btn-custom {
            width: 100%;
            border-radius: 25px;
            padding: 10px;
            font-weight: bold;
            background: #4e73df;
            border: none;
        }

        .btn-custom:hover {
            background: #2e59d9;
        }
    </style>
</head>

<body>

<div class="card-box">
    <h2>Apply Leave</h2>

    <form method="POST">

        <div style="display:flex; align-items:center; gap:15px; margin-bottom:15px;">
    <label style="width:80px;">Subject</label>
    <input type="text" name="subject" class="form-control" 
            placeholder="Enter subject" required 
            style="flex:1;">
</div>

<div style="display:flex; align-items:flex-start; gap:15px; margin-bottom:15px;">
    <label style="width:80px;">Message</label>
    <textarea name="message" class="form-control" rows="4" 
                placeholder="Write your leave reason..." required 
                style="flex:1;"></textarea>
</div>

        <button type="submit" name="submit_leave" class="btn btn-custom">
            Submit Leave
        </button>

    </form>
</div>

</body>
</html>