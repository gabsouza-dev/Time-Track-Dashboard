<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $entry_id = $_POST['entry_id'];
  $check_in = $_POST['check_in'];
  $check_out = $_POST['check_out'];
  $description = $_POST['description'];

  $stmt = $pdo->prepare("INSERT INTO requests (user_id, type, description, status) 
                           VALUES (:user_id, 'adjustment', :description, 'pending')");
  $stmt->execute([
    'user_id' => $_SESSION['user_id'],
    'description' => "Ajuste solicitado para o registro #$entry_id: Check-in: $check_in, Check-out: $check_out. Descrição: $description"
  ]);

  $success = "Solicitação de ajuste enviada com sucesso!";
}

// Buscar entradas de ponto existentes
$stmt = $pdo->prepare("SELECT * FROM time_entries WHERE user_id = :user_id ORDER BY check_in DESC");
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajustar Ponto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h2>Ajustar Ponto</h2>
    <?php if (!empty($success)): ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label for="entry_id" class="form-label">Selecione o registro</label>
        <select id="entry_id" name="entry_id" class="form-control" required>
          <?php foreach ($entries as $entry): ?>
            <option value="<?= $entry['id'] ?>">
              Check-in: <?= $entry['check_in'] ?> | Check-out: <?= $entry['check_out'] ?? 'Não registrado' ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="check_in" class="form-label">Novo Check-in</label>
        <input type="datetime-local" id="check_in" name="check_in" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="check_out" class="form-label">Novo Check-out</label>
        <input type="datetime-local" id="check_out" name="check_out" class="form-control">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Solicitar Ajuste</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>