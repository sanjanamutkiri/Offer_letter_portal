<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Offer Letter</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="view-container">
        <h2>Offer Letter Details</h2>
        <?php
        include('includes/db_connect.php');
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM offer_letters WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        ?>
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Position:</strong> <?php echo $row['position']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        <p><strong>Content:</strong><br><?php echo nl2br($row['content']); ?></p>
    </div>
</body>
</html>
