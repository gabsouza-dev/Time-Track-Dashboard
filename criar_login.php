<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Conta - TimeTrackDashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="register-container">
    <h2>Criar Conta</h2>
    <form action="criar_login_process.php" method="POST">
      <label for="username">Nome de Usuário:</label>
      <input type="text" id="username" name="username" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Senha:</label>
      <input type="password" id="password" name="password" required>

      <label for="full_name">Nome Completo:</label>
      <input type="text" id="full_name" name="full_name" required>

      <button type="submit">Criar Conta</button>
    </form>
    <p>Já tem uma conta? <a href="index.php">Entrar</a></p>
  </div>
</body>

</html>