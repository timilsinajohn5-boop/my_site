<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Website | Home</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar">
    <div class="nav-container">
      <h1 class="logo">My School</h1>
      <ul class="nav-links">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="updates.php">New Updates</a></li>
        <?php if (isset($_SESSION['username'])): ?>
          <li><a href="students.php">Students</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <!-- Main Content -->
  <section class="hero">
    <div class="hero-content">
      <h2>Welcome to My School</h2>
      <p>Empowering students with knowledge, discipline, and innovation.</p>
      <a href="about.php" class="btn">Learn More</a>
    </div>
  </section>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> My School. All rights reserved.</p>
  </footer>

</body>
</html>
