<?php
session_start();
require_once 'db.php';
require_once 'csrf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $remember_me = filter_input(INPUT_POST, 'remember_me', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!verify_csrf_token($csrf_token)) {
        die('CSRF token invalid');
    }

    $query = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $query->execute(['username' => $username]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        if ($remember_me) {
            setcookie('username', $username, time() + (86400 * 30), "/");
        }
        header('Location: kaloinituhbuatbagiandashboardnyayahadikadiksayang.php');
        exit;
    } else {
        echo 'Invalid username or password';
    }
} else {
    header('Location: index.php');
    exit;
}
?>
