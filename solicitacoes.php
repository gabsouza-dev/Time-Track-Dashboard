<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

// Buscar solicitações do usuário logado
$stmt = $pdo->prepare("SELECT * FROM requests WHERE user_id = :user_id ORDER BY created_at DESC");
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minhas Solicitações</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h2>Minhas Solicitações</h2>
    <?php if (empty($requests)): ?>
      <div class="alert alert-info">Nenhuma solicitação encontrada.</div>
    <?php else: ?>
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Criado em</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($requests as $request): ?>
            <tr>
              <td><?= $request['id'] ?></td>
              <td><?= ucfirst($request['type']) ?></td>
              <td><?= htmlspecialchars($request['description']) ?></td>
              <td>
                <span class="badge 
                                <?= $request['status'] === 'pending' ? 'bg-warning' : ($request['status'] === 'approved' ? 'bg-success' : 'bg-danger') ?>">
                  <?= ucfirst($request['status']) ?>
                </span>
              </td>
              <td><?= $request['created_at'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>