<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ETMS</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body{
            background:linear-gradient(to right, #74ebd5,#ACB6E5);
            }
        .card:hover{
                transform:scale(1.03);
                transition: 0.3s;
                    }
    </style>

</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class=" card shadow-lg p-4 text-center" style="width: 400px; border-radius: 15px;">
            <h3 class="mb-3 text-primary">
                <i class="fa fa-tasks me-3"></i>Task Management System</h3>
                <p class="text-dark text-uppercase fs-5">choose your role</p>
            <a href="user_login.php" class="btn btn-success w-100 mb-2 py-2">
                <i class="fa fa-user me-2"></i>User Login
            </a>
            <a href="register.php" class="btn btn-warning w-100 mb-2 py-2">
                <i class="fa fa-user-plus me-2"></i>User Registration
            </a>
            <a href="admin/admin_login.php" class="btn btn-info w-100 py-2">
                <i class="fa fa-user-shield me-2"></i>Admin Login
            </a>
        </div>
    </div>
</body>
</html>