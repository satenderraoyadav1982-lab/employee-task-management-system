<?php
include('includes/connection.php');
if(isset($_POST['userRegisteration'])){
    $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo"<script type='text/javascript'>
        alert('user registerd successfully...');
        window.location.href = 'indexx.php';
        </script>";
        
    }
    else{
        echo"<script type='text/javascript'>
        alert('Error...Please try again');
        window.location.href = 'register.php';
        </script>";

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TMS | Register Page</title>
    <script src="includes/jquery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4 " id="register_home_page">
            <h3  class="text-center mb-3" style=" padding: 10px; color: blue;">User Registeration</h3>
            <form action="" method="post"> 
                <div class="form-group mb-3">
                    <input type="text" name="name" class="form-control mb-3" placeholder="Enter Name"required >
                <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Your email"required >
                <div class="form-group mb-3">
                    <input type="Password" name="password" class="form-control mb-3" placeholder="Your Password"required >
                <div class="form-group mb-3">
                    <input type="text" name="mobile" class="form-control mb-3" placeholder="Enter Mobile No."required >
                </div> 
                <div class="form-group mb-3">
                    <input type="Submit" name="userRegisteration" value="Register" class="btn btn-warning" >
            </form>
            </div>
            <div class="col-md-12 text-center mt-3">
            <a href="indexx.php"  class="homebtn">Go to Home</a>
            </div>
    </div>
    </div>
</body>
</html>