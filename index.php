<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Management System</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #1d2671, #c33764);
            min-height: 100vh;
            color: white;
        }
        .hero-card{
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(8px);
            border-radius: 20px;
        }
        .btn-custom{
            min-width: 140px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-8 text-center">
        <div class="p-5 hero-card shadow-lg">

            <h1 class="mb-3">📚 Library Management System</h1>

            <p class="lead mb-4">
                A smart system to manage books, users, borrowing,
                returning, and overall library operations efficiently.
            </p>

            <div class="d-flex justify-content-center gap-3">
                <a href="auth/login.php" class="btn btn-primary btn-lg btn-custom">
                    Login
                </a>
                <a href="auth/signup.php" class="btn btn-outline-light btn-lg btn-custom">
                    Signup
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
