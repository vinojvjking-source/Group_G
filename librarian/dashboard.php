<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] != 'librarian') exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Librarian Dashboard</title>

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f4f6f9;
        }
        .dashboard-card{
            border-radius: 18px;
            transition: 0.3s;
        }
        .dashboard-card:hover{
            transform: translateY(-5px);
        }
    </style>
</head>
<body>


<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">📚 Librarian Dashboard</span>
    <a href="../auth/logout.php" class="btn btn-outline-light btn-sm">Logout</a>
</nav>

<div class="container mt-5">

    <h4 class="mb-4">Welcome, Librarian 👋</h4>

    <div class="row">


        <div class="col-md-4">
            <a href="books.php" class="text-decoration-none">
                <div class="card dashboard-card shadow-sm p-4 text-center">
                    <h5>📖 Manage Books</h5>
                    <p class="text-muted mb-0">Add, update & delete books</p>
                </div>
            </a>
        </div>

    </div>

</div>

</body>
</html>
