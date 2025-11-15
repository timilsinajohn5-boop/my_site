<?php
session_start();
include('db_connect.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: students.php");
        exit();
    } else {
        $message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Login | My School</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar">
    <div class="nav-container">
      <h1 class="logo">My School</h1>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="updates.php">New Updates</a></li>
        <li><a href="login.php" class="active">Login</a></li>
      </ul>
    </div>
  </nav>

  <section class="login-section">
    <h2></h2>
    <form method="POST" class="login-form">
      <input type="text" name="username" placeholder="Enter Username" required>
      <input type="password" name="password" placeholder="Enter Password" required>
      <button type="submit">Login</button>
    </form>
    <p class="error"><?php echo $message; ?></p>
  </section>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> My School. All rights reserved.</p>
  </footer>
</body>
</html>
