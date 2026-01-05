<?php
session_start();
include '../config/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $result = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email' AND password='$password'"
    );

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') header("Location: ../admin/dashboard.php");
        if ($row['role'] == 'librarian') header("Location: ../librarian/dashboard.php");
        if ($row['role'] == 'student') header("Location: ../student/dashboard.php");
        if ($row['role'] == 'visitor') header("Location: ../visitor/dashboard.php");
        exit;
    } else {
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
        }
        .login-card{
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="card login-card shadow-lg p-4">
            <h3 class="text-center mb-4">📚 Library Login</h3>

            <?php if(isset($error)) { ?>
                <div class="alert alert-danger text-center">
                    <?= $error ?>
                </div>
            <?php } ?>

            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>

                <button type="submit" name="login" class="btn btn-primary w-100">
                    Login
                </button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
