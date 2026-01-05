<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] != 'student') exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f4f6f9;
        }
        .dashboard-card{
            border-radius: 16px;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-dark bg-primary px-4">
    <span class="navbar-brand">🎓 Student Dashboard</span>
    <a href="../auth/logout.php" class="btn btn-outline-light btn-sm">Logout</a>
</nav>

<div class="container mt-4">

    <div class="card dashboard-card shadow-sm">
        <div class="card-body">

            <h4 class="mb-3">📚 Available Books</h4>

            <?php
            if (isset($_POST['borrow'])) {
                echo "<div class='alert alert-success'>Borrow request sent!</div>";
            }
            ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $result = mysqli_query($conn,"SELECT * FROM books");
                    while($b = mysqli_fetch_assoc($result)){
                        echo "
                        <tr>
                            <td>{$b['title']}</td>
                            <td>{$b['author']}</td>
                            <td>
                                <form method='post' class='m-0'>
                                    <input type='hidden' name='book_id' value='{$b['id']}'>
                                    <button name='borrow' class='btn btn-success btn-sm'>
                                        Borrow
                                    </button>
                                </form>
                            </td>
                        </tr>";
                    }
                    ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
