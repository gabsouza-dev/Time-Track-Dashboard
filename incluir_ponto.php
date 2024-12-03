<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $check_in = $_POST['check_in'];
  $check_out = $_POST['check_out'];
  $description = $_POST['description'];

  $stmt = $pdo->prepare("INSERT INTO time_entries (user_id, check_in, check_out, activity_description) 
                           VALUES (:user_id, :check_in, :check_out, :description)");
  $stmt->execute([
    'user_id' => $_SESSION['user_id'],
    'check_in' => $check_in,
    'check_out' => $check_out,
    'description' => $description
  ]);

  $success = "Ponto incluído com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Incluir Ponto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h2>Incluir Ponto</h2>
    <?php if (!empty($success)): ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label for="check_in" class="form-label">Check-in</label>
        <input type="datetime-local" id="check_in" name="check_in" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="check_out" class="form-label">Check-out</label>
        <input type="datetime-local" id="check_out" name="check_out" class="form-control">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea id="description" name="description" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>