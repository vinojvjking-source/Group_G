<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Manage Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .card-radius{
            border-radius: 16px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">👥 Admin – Manage Users</span>
    <a href="dashboard.php" class="btn btn-outline-light btn-sm">⬅ Back</a>
</nav>

<div class="container mt-4">

    <div class="card card-radius shadow-sm p-4">
        <h5 class="mb-3">🧑‍💻 User List</h5>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="60">ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th width="120">Role</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $result = mysqli_query($conn, "SELECT * FROM users");
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['full_name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= ucfirst($row['role']) ?></td>
                        <td>
                            <a href="delete_user.php?id=<?= $row['id'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this user?')">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
