<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Register</title>
    <link rel="shortcut icon" href="images/favicon/icon.png" type="image/x-icon">
</head>
<body>
    <div class="l-form" id="card">
        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="addUser.php" method="POST" class="form">
        <div id="clock"></div>
        <h2 class="form__title">Register</h2>
            <div class="form__div">
            <label for="username" class="form__label"></label>
            <input type="text" id="username" name="username" class="form__input" placeholder="Username"  style="color: #FFFFFF;" required>
            </div>
            <div class="form__div">
            <label for="password"></label>
            <input type="password" id="password" name="password" class="form__input" placeholder="Password"  style="color: #FFFFFF;" required>
            </div>
            <div class="form__div">    
            <label for="confirm_password" class="form__label"></label>
            <input type="password" id="confirm_password" name="confirm_password" class="form__input" placeholder="Confirm Password"  style="color: #FFFFFF;" required>
            </div>
            <button type="submit" class="form__button">Register</button>
            <p style="color: #FFFFFF;">Already have an account? <a href="index.php" style="color: #0044ff;">Login here</a></p>
            <p style="color: #FFFFFF;">Don't have an account? <a href="intinnyainituhbuatdaftaratauregisteryaa.php" style="color: #0044ff;">Register here</a></p>
        </form>
    </div>
    <button class="fullscreen-button" onclick="toggleFullscreen()">Full screen</button>
    <button class="toggle-button" onclick="toggleCard()">Hide</button>
    <script src="js/dashboard.js"></script>
</body>
</html>
