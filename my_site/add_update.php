<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];

  $sql = "INSERT INTO updates (title, content) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $title, $content);

  if ($stmt->execute()) {
    echo "<script>alert('Update added successfully!'); window.location='updates.php';</script>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New Update</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h2>Add New Update</h2>
    <form method="POST">
      <label>Title:</label><br>
      <input type="text" name="title" required><br><br>
      <label>Message:</label><br>
      <textarea name="content" rows="5" cols="50" required></textarea><br><br>
      <input type="submit" value="Post Update">
    </form>
  </div>
</body>
</html>
