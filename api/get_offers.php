<?php
include('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM offer_letters");
    $offers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $offers[] = $row;
    }
    echo json_encode($offers);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
