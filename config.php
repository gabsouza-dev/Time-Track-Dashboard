<?php
// Configurações do banco de dados
$host = "localhost"; // Endereço do servidor MySQL
$db_name = "TimeTrackDashboard"; // Nome do banco de dados
$username = "root"; // Usuário do MySQL
$password = ""; // Senha do MySQL

try {
  // Criação da conexão usando PDO
  $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
  // Configurar o PDO para lançar exceções em caso de erro
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexão com o banco de dados estabelecida com sucesso!";
} catch (PDOException $e) {
  // Caso ocorra um erro, exibe uma mensagem amigável
  die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
