<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
include 'includes/db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Welcome, <?= $_SESSION['user'] ?></h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM offer_letters ORDER BY id DESC LIMIT 10");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['position']}</td>
                <td>
                    <a href='view_offer.php?id={$row['id']}'>View</a> |
                    <a href='edit_offer.php?id={$row['id']}'>Edit</a> |
                    <a href='delete_offer.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>
</body>
</html>