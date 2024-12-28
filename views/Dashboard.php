<?php
//Inicia a sessao 
session_start();

//Verificar se o usuario esta autenticado
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Carregar a classe de Banco de Dados (Database)
require_once '../includes/Database.php';

// Criar a instância da classe Database
$database = new Database();
$db = $database->connect();

// Testar a conexão com o banco
if ($db) {
    echo 'Conectado ao banco de dados com sucesso!';
} else {
    echo 'Erro na conexão com o banco!';
}

echo 'TESTE POWER BI';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafico PowerBI</title>
</head>
<body>
    
</body>
</html>