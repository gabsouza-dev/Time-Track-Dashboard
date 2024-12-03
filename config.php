<?php
// Configurações do banco de dados
$host = "localhost";
$db_name = "TimeTrackDashboard";
$username = "root";
$password = "";
$charset = 'utf8mb4';

try {
  $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Erro de conexão: ' . $e->getMessage();
  exit();
}
