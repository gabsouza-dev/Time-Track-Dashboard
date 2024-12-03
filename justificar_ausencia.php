<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $description = $_POST['description'];

  $stmt = $pdo->prepare("INSERT INTO requests (user_id, type, description) 
                           VALUES (:user_id, 'absence_justification', :description)");
  $stmt->execute([
    'user_id' => $_SESSION['user_id'],
    'description' => $description
  ]);

  $success = "Justificativa enviada com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Justificar Ausência</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h2>Justificar Ausência</h2>
    <?php if (!empty($success)): ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>