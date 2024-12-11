<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Offer Letter Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="admin-container">
        <h2>Admin Panel</h2>
        <h3>Manage Offer Letters</h3>
        <a href="create_offer.php">Create New Offer Letter</a><br><br>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('includes/db_connect.php');
                $result = mysqli_query($conn, "SELECT * FROM offer_letters");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['position']}</td>
                            <td>{$row['email']}</td>
                            <td><a href='view_offer.php?id={$row['id']}'>View</a> | 
                                <a href='edit_offer.php?id={$row['id']}'>Edit</a> | 
                                <a href='delete_offer.php?id={$row['id']}'>Delete</a></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
