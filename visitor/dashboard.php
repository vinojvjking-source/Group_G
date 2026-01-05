<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'visitor') {
    header("Location: ../auth/login.php");
    exit();
}

/* CREATE */
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $msg  = $_POST['message'];

    mysqli_query($conn,
        "INSERT INTO visitor_requests(visitor_name,message)
         VALUES('$name','$msg')"
    );
}

/* DELETE */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM visitor_requests WHERE id=$id");
}

/* UPDATE */
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $msg = $_POST['message'];

    mysqli_query($conn,
        "UPDATE visitor_requests SET message='$msg' WHERE id=$id"
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visitor Dashboard</title>

   
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


<nav class="navbar navbar-dark bg-success px-4">
    <span class="navbar-brand">👀 Visitor Dashboard</span>
    <a href="../auth/logout.php" class="btn btn-outline-light btn-sm">Logout</a>
</nav>

<div class="container mt-4">

    
    <div class="card card-radius shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3">✍ Submit Library Request</h5>

            <form method="post">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="name" class="form-control"
                               placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6">
                        <textarea name="message" class="form-control"
                                  placeholder="Your request or suggestion"
                                  rows="1" required></textarea>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button name="add" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    
    <div class="card card-radius shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">📋 Your Requests</h5>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="60">ID</th>
                            <th width="150">Name</th>
                            <th>Message</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $result = mysqli_query($conn,"SELECT * FROM visitor_requests");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['visitor_name'] ?></td>

                            <td>
                                <form method="post" class="d-flex gap-2">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="text" name="message"
                                           value="<?= $row['message'] ?>"
                                           class="form-control form-control-sm">
                                    <button name="update"
                                            class="btn btn-primary btn-sm">
                                        Update
                                    </button>
                                </form>
                            </td>

                            <td>
                                <a href="?delete=<?= $row['id'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Delete this request?')">
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

</div>

</body>
</html>
