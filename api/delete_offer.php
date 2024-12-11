<?php
include('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $query = "DELETE FROM offer_letters WHERE id = $id";
    mysqli_query($conn, $query);
    echo json_encode(['status' => 'success', 'message' => 'Offer deleted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
