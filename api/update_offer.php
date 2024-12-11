<?php
include('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    $query = "UPDATE offer_letters SET name='$name', position='$position', email='$email', content='$content' WHERE id=$id";
    mysqli_query($conn, $query);
    echo json_encode(['status' => 'success', 'message' => 'Offer updated successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
