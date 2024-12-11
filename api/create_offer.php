<?php
include('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    $query = "INSERT INTO offer_letters (name, position, email, content) VALUES ('$name', '$position', '$email', '$content')";
    mysqli_query($conn, $query);
    echo json_encode(['status' => 'success', 'message' => 'Offer added successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
