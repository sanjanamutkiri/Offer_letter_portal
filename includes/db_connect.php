<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "offer_letter_portal";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
