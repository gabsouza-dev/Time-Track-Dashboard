<?php
require_once 'config.php';
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

// Obtém informações do usuário
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - TimeTrack</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TimeTrack Dashboard</a>
      <div class="d-flex">
        <span class="navbar-text text-white me-3">Bem-vindo, <?= htmlspecialchars($user['full_name']) ?>!</span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Sair</a>
      </div>
    </div>
  </nav>
  <div class="container mt-4">
    <h2>Dashboard</h2>
    <div class="row mb-4">
      <div class="col-md-4">
        <div class="card text-center shadow">
          <div class="card-body">
            <h5 class="card-title">Saldo do Banco de Horas</h5>
            <p class="card-text">20 horas</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center shadow">
          <div class="card-body">
            <h5 class="card-title">Horas Extras</h5>
            <p class="card-text">8 horas</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center shadow">
          <div class="card-body">
            <h5 class="card-title">Horas Faltantes</h5>
            <p class="card-text">3 horas</p>
          </div>
        </div>
      </div>
    </div>
    <h3>Gerenciamento de Ponto</h3>
    <div class="d-flex gap-3">
      <a href="incluir_ponto.php" class="btn btn-success">Incluir Ponto</a>
      <a href="ajustar_ponto.php" class="btn btn-warning">Ajustar Ponto</a>
      <a href="justificar_ausencia.php" class="btn btn-danger">Justificar Ausência</a>
      <a href="solicitacoes.php" class="btn btn-info">Minhas Solicitações</a>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>