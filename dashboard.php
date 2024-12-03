<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
}

require_once 'config.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - TimeTrackDashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="dashboard-container">
    <h2>Bem-vindo, <?php echo $user['full_name']; ?>!</h2>
    <div class="indicators">
      <p><strong>Saldo de Banco de Horas:</strong> 20h</p>
      <p><strong>Horas Extras:</strong> 5h</p>
      <p><strong>Horas Faltantes:</strong> 2h</p>
    </div>
    <div class="actions">
      <a href="ajustar_ponto.php">Ajustar Ponto</a>
      <a href="solicitacoes.php">Solicitações</a>
    </div>
    <a href="logout.php">Sair</a>
  </div>
</body>

</html>