<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validasi input (contoh sederhana, bisa disesuaikan dengan kebutuhan)
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error_message = 'Username dan password harus diisi';
    } elseif ($password !== $confirm_password) {
        $error_message = 'Password dan konfirmasi password harus sama';
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $query = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $query->execute(['username' => $username, 'password' => $hashed_password]);

        // Redirect ke halaman login setelah pendaftaran sukses
        header('Location: index.php');
        exit;
    }
}
?>