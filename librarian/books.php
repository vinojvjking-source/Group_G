<?php
include '../config/db.php';
session_start();

if ($_SESSION['role'] != 'librarian') exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Librarian | Manage Books</title>

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f4f6f9;
        }
        .card-radius{
            border-radius: 16px;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">📚 Librarian Panel</span>
    <a href="dashboard.php" class="btn btn-outline-light btn-sm">⬅ Back</a>
</nav>

<div class="container mt-4">


    <div class="card card-radius shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3">➕ Add New Book</h5>

            <form method="post">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="title" class="form-control"
                               placeholder="Book Title" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="author" class="form-control"
                               placeholder="Author" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="qty" class="form-control"
                               placeholder="Quantity" required>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button name="add" class="btn btn-success">
                            Add Book
                        </button>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['add'])) {
                mysqli_query($conn,
                    "INSERT INTO books(title,author,quantity)
                     VALUES('$_POST[title]','$_POST[author]','$_POST[qty]')"
                );
                echo "<div class='alert alert-success mt-3'>Book added successfully!</div>";
            }
            ?>

        </div>
    </div>

    
    <div class="card card-radius shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">📖 Book List</h5>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="60">ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th width="80">Qty</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $result = mysqli_query($conn,"SELECT * FROM books");
                    while($b = mysqli_fetch_assoc($result)){
                        echo "
                        <tr>
                            <td>{$b['id']}</td>
                            <td>{$b['title']}</td>
                            <td>{$b['author']}</td>
                            <td>{$b['quantity']}</td>
                            <td>
                                <a href='delete.php?id={$b['id']}'
                                   class='btn btn-danger btn-sm'
                                   onclick='return confirm(\"Delete this book?\")'>
                                   Delete
                                </a>
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
