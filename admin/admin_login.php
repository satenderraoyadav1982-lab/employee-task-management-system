<?php
session_start();
include('../includes/connection.php');
if(isset($_POST['adminLogin'])){
$query = "select * FROM admin WHERE email = '$_POST[email]' AND password = '$_POST[Password]'";
$query_run = mysqli_query($connection,$query);
if(mysqli_num_rows($query_run) > 0){
    while($row = mysqli_fetch_assoc($query_run)){
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
    }
        echo"<script type='text/javascript'>
        window.location.href = 'admin_dashboard.php';
        </script>";
    }
    else{
        echo"<script type='text/javascript'>
        alert('Please enter correct details.');
        window.location.href = 'admin_login.php';
        </script>";
    }   
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ETMS | Admin Login</title>
    <script src="../includes/jquery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh;">
        <div class="col-md-4 " id="login_home_page">
            <h3  class="text-center mb-3" style="padding: 5px;">Admin Login</h3>
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Your email"required >
                <div class="form-group">
                    <input type="Password" name="Password" class="form-control mb-3" placeholder="Your Password"required >
                <div class="form-group">
                    <input type="Submit" name="adminLogin" value="Login" class="btn btn-warning" >
            </form>
            </div>
            <div class="col-md-12 text-center mt-3">
            <a href="../indexx.php"  class="homebtn">Go to Home</a>
            </div>
    </div>
    </div>
</body>
</html>