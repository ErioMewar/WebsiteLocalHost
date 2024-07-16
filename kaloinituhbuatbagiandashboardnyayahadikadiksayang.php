<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Language" content="id">
  <link rel="stylesheet" href="css/dashboard.css">
  <title>Home</title>
  <link rel="shortcut icon" href="images/favicon/icon.png" type="image/x-icon">
</head>
<body>

  <div class="card">
    <header>
    <div id="clock"></div>
      <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
      <h1>Choose your Project or Databases</h1>
    </header>
    <div class="main-buttton">
      <a href="tempatinituhfolderbuatnyimpanprojekprojekyangsudahpernahdibuat/"><button>Project</button></a>
      <a href="phpmyadmin/"><button>Databases</button></a>
    </div>
  </div>
  <button class="fullscreen-button" onclick="toggleFullscreen()">Full screen</button>
  <button class="toggle-button" onclick="toggleCard()">Hide</button>
  <button class="logout-button" onclick="window.location.href='logout.php'">Logout</button>
  <script src="js/dashboard.js"></script>
</body>
</html>
