<?php
include '../config/db.php';
session_start();
if ($_SESSION['role'] != 'librarian') exit();

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM books WHERE id=$id");

header("Location: books.php");
?>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
</html>
