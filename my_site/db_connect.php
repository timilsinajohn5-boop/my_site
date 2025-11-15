<?php
$servername = "localhost";
$username = "root"; // Default in XAMPP
$password = ""; // Leave empty
$dbname = "school_db"; // Must match your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
