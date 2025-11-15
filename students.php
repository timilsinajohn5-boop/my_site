<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard | My School</title>
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
        <li><a href="students.php" class="active">Students</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <section class="student-section">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>This is your student dashboard.</p>
    <p>Here you can find your class updates, schedules, and messages from the school.</p>
  </section>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> My School. All rights reserved.</p>
  </footer>

</body>
</html>
