<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #ff9966, #ff5e62);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
        }
        .dashboard-card{
            border-radius: 20px;
            background: rgba(255,255,255,0.15);
            padding: 40px 20px;
            transition: 0.3s;
            text-align: center;
            cursor: pointer;
        }
        .dashboard-card:hover{
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            background: rgba(255,255,255,0.25);
        }
        .dashboard-card h3{
            font-size: 1.5rem;
        }
        .dashboard-card p{
            font-size: 0.9rem;
            color: #f0f0f0;
        }
        .icon{
            font-size: 2.5rem;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand fs-5">👑 Admin Dashboard</span>
    <a href="../auth/logout.php" class="btn btn-outline-light btn-sm">Logout</a>
</nav>

<div class="container mt-5">

    <h2 class="mb-4 text-center">Welcome, Admin 👋</h2>
    <p class="text-center mb-5">Manage users, books, and overall system efficiently</p>

    <div class="row g-4 justify-content-center">

    
        <div class="col-md-4 col-sm-6">
            <a href="users.php" class="text-decoration-none">
                <div class="dashboard-card shadow-lg">
                    <div class="icon">👥</div>
                    <h3>Manage Users</h3>
                    <p>Add, update & delete users</p>
                </div>
            </a>
        </div>

  
        <div class="col-md-4 col-sm-6">
            <a href="books.php" class="text-decoration-none">
                <div class="dashboard-card shadow-lg">
                    <div class="icon">📚</div>
                    <h3>Manage Books</h3>
                    <p>Add, update & delete books</p>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="dashboard-card shadow-lg">
                <div class="icon">📊</div>
                <h3>Reports</h3>
                <p>View statistics & library usage reports</p>
            </div>
        </div>

    </div>
</div>

</body>
</html>
