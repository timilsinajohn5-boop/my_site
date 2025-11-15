<?php
session_start();
include('db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Updates | My School</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar">
    <div class="nav-container">
      <h1 class="logo">My School</h1>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="updates.php" class="active">New Updates</a></li>
        <?php if (isset($_SESSION['username'])): ?>
          <li><a href="students.php">Students</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <section class="updates-section">
    <h2>Latest School Updates</h2>

    <?php
    include('db_connect.php');
    $sql = "SELECT * FROM updates ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='update-card'>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
            echo "<small>Posted on: " . $row['created_at'] . "</small>";
            echo "</div>";
        }
    } else {
        echo "<p>No updates available at the moment.</p>";
    }

    $conn->close();
    ?>
  </section>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> My School. All rights reserved.</p>
  </footer>

</body>
</html>
