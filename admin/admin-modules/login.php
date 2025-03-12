<?php
include '../../db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Unesite sve podatke';
        header("Location: ../login-strana.php");
        exit();
    }

    $stmt = $pdo->prepare("
        SELECT * FROM admin_korisnici
        WHERE username = :username
    ");
    $stmt->execute(['username' => $username]);

    $korisnik = $stmt->fetch();

    if ($korisnik['password'] == $password) {
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error'] = 'Invalid username or password';
        header("Location: ../login-strana.php");
        exit();
    }
}
?>