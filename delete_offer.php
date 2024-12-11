<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

if (isset($_GET['id'])) {
    include('includes/db_connect.php');
    $id = $_GET['id'];
    $query = "DELETE FROM offer_letters WHERE id = $id";
    mysqli_query($conn, $query);
    header("Location: dashboard.php");
}
?>
