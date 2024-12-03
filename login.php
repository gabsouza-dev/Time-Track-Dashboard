<?php
// Inicie a sessão se necessário
session_start();

// Verifique se já está logado, se necessário, redirecione para o dashboard
if (isset($_SESSION['user_id'])) {
  header('Location: dashboard.php');  // Redireciona para o dashboard
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - TimeTrackDashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center">Login</h2>
    <form method="POST" action="criar_login_process.php">
      <label for="nome">Nome Completo:</label>
      <input type="text" id="nome" name="nome" required> <!-- Certifique-se que o 'name' seja 'nome' -->
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Senha:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit">Criar Conta</button>
    </form>

    <p class="mt-3">Ainda não tem uma conta? <a href="criar_login.php">Crie seu login</a></p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>