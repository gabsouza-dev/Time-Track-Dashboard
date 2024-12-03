<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
  // Se não estiver logado, redireciona para o login
  header("Location: login.php");
  exit();
}

require_once 'config.php';

// Buscar dados do usuário logado
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ponto - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h2>Bem-vindo, <?= htmlspecialchars($user['username']) ?>!</h2>

    <div class="d-flex gap-3">
      <a href="incluir_ponto.php" class="btn btn-success">Incluir Ponto</a>
      <a href="ajustar_ponto.php" class="btn btn-warning">Ajustar Ponto</a>
      <a href="justificar_ausencia.php" class="btn btn-danger">Justificar Ausência</a>
      <a href="solicitacoes.php" class="btn btn-info">Minhas Solicitações</a>
    </div>

    <hr>

    <div class="mt-4">
      <h3>Indicadores</h3>
      <p><strong>Saldo de Banco de Horas:</strong> 10h 45m</p>
      <p><strong>Horas Extras:</strong> 5h 30m</p>
      <p><strong>Horas Faltantes:</strong> 2h 15m</p>
    </div>

    <hr>

    <div class="mt-4">
      <a href="logout.php" class="btn btn-danger">Sair</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
