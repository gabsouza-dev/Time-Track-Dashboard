<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: dashboard.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - TimeTrackDashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="login_process.php" method="POST">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Senha:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="criar_login.php">Criar Conta</a></p>
  </div>
</body>

</html>