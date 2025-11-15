<?php
session_start();
include('db_connect.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check admin table first
    $sql_admin = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result_admin = $conn->query($sql_admin);

    if ($result_admin->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header("Location: admin/manage_students.php"); // redirect admin
        exit();
    }

    // Check student table
    $sql_student = "SELECT * FROM students WHERE username='$username' AND password='$password'";
    $result_student = $conn->query($sql_student);

    if ($result_student->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'student';
        header("Location: students.php"); // redirect student
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
