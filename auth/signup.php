<?php
include '../config/db.php';

if (isset($_POST['signup'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    mysqli_query($conn,
        "INSERT INTO users(full_name,email,password,role)
         VALUES('$name','$email','$password','$role')"
    );

    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #43cea2, #185a9d);
            min-height: 100vh;
        }
        .signup-card{
            border-radius: 16px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5">
        <div class="card signup-card shadow-lg p-4">

            <h3 class="text-center mb-4">📝 Create Account</h3>

            <form method="post">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control"
                           placeholder="Enter your full name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="Enter email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Create password" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="librarian">Librarian</option>
                        <option value="student">Student</option>
                        <option value="visitor">Visitor</option>
                    </select>
                </div>

                <button type="submit" name="signup"
                        class="btn btn-success w-100">
                    Signup
                </button>

                <p class="text-center mt-3 mb-0">
                    Already have an account?
                    <a href="../index.php">Login</a>
                </p>

            </form>

        </div>
    </div>
</div>

</body>
</html>
