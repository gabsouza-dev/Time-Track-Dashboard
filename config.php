<?php
// Configurações do banco de dados
$host = "sql308.infinityfree.com";
$db_name = "if0_37666554_timetrackdashboard";
$username = "if0_37666554";
$password = "h9e8s3w2";
$charset = 'utf8mb4';

try {
  $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Erro de conexão: ' . $e->getMessage();
  exit();
}
