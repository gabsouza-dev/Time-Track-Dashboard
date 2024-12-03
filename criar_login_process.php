<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $full_name = $_POST['full_name'];

  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
  $stmt->execute(['email' => $email, 'username' => $username]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    echo "Este e-mail ou nome de usuário já está registrado.";
  } else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, full_name) VALUES (:username, :email, :password, :full_name)");
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashed_password, 'full_name' => $full_name]);

    echo "Conta criada com sucesso! Agora você pode <a href='index.php'>fazer login</a>.";
  }
}
