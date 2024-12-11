<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
if (isset($_POST['submit'])) {
    include('includes/db_connect.php');
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    
    $query = "UPDATE offer_letters SET name='$name', position='$position', email='$email', content='$content' WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: dashboard.php");
}

$id = $_GET['id'];
include('includes/db_connect.php');
$result = mysqli_query($conn, "SELECT * FROM offer_letters WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Offer Letter</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="edit-container">
        <h2>Edit Offer Letter</h2>
        <form action="edit_offer.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
            <input type="text" name="position" value="<?php echo $row['position']; ?>" required><br>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
            <textarea name="content" required><?php echo $row['content']; ?></textarea><br>
            <button type="submit" name="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
