<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | My School</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar">
    <div class="nav-container">
      <h1 class="logo">My School</h1>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php" class="active">About Us</a></li>
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

  <!-- About Section -->
  <section class="about-section">
    <h2>About Our School</h2>
    <p>
      Our school has been nurturing young minds for over 20 years. 
      We believe in holistic education that promotes academic excellence, 
      creativity, and character development.
    </p>
    <p>
      With a team of dedicated teachers and a supportive environment, 
      we aim to prepare students for a successful future. 
      Our facilities include modern classrooms, a library, computer labs, and sports areas.
    </p>
  </section>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> My School. All rights reserved.</p>
  </footer>

</body>
</html>
