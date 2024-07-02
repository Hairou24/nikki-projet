<?php
session_start();

// Utilisateur et mot de passe définis (à remplacer par une base de données pour plus de sécurité)
$admin_username = "admin";
$admin_password = "password";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['loggedin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
