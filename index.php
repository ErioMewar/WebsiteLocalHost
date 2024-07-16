<?php
session_start();
require_once 'csrf.php';

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    header('Location: kaloinituhbuatbagiandashboardnyayahadikadiksayang.php');
    exit;
}

// Ambil CSRF token
$csrf_token = generate_csrf_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Login</title>
    <link rel="shortcut icon" href="images/favicon/icon.png" type="image/x-icon">
</head>
<body>
    <div class="l-form" id="card">
        <form action="authenticate.php" method="POST" class="form">
        <div id="clock"></div>
            <h1 class="form__title">Login</h1>
            <div class="form__div">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <label for="username" class="form__label"></label>
            <input type="text" id="username" name="username" class="form__input" placeholder="Username"  style="color: #FFFFFF;" required>
            </div>
            <div class="form__div">
            <label for="password" class="form__label"></label>
            <input type="password" id="password" name="password" class="form__input" placeholder="Password"  style="color: #FFFFFF;" required>
            </div>
            <label for="remember_me" style="color: #FFFFFF;">
                <input type="checkbox" id="remember_me" name="remember_me"> Remember Me
            </label>
            <button type="submit" class="form__button">Login</button>
        </form>
    </div>
    <button class="fullscreen-button" onclick="toggleFullscreen()">Full screen</button>
  <button class="toggle-button" onclick="toggleCard()">Hide</button>
  <script src="js/dashboard.js"></script>
</body>
</html>
