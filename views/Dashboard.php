<?php
//Inicia a sessao 
session_start();

//Verificar se o usuario esta autenticado
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

// Carregar a classe de Banco de Dados (Database)
require_once '../includes/Database.php';

// Criar a instância da classe Database
$database = new Database();
$db = $database->connect();

// Testar a conexão com o banco
// if ($db) {
//     echo 'Conectado ao banco de dados com sucesso!';
// } else {
//     echo 'Erro na conexão com o banco!';
// }

// echo 'TESTE POWER BI';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Grafico PowerBI</title>
</head>

<body class="dashboard">
    <header class="header_dashboard">
        <div class="info-header">
            <div class="logo">
                <h3>Dashboard</h3>
            </div>
            <div class="icons-header">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <div style="align-items: center;" class="info-header">
            <i class="fa-solid fa-envelope"></i>
            <i class="fa-solid fa-bell"></i>
            <img src="../assets/img/logo.png" alt="sample">
        </div>
    </header>
    <!-- fim header -->

    <section class="main">
        <div class="sidebar">
            <h3>Home</h3>
            <a class="sidebar-active" href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <br/>
            <hr>
            <h3>Home</h3>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <br/>
            <hr>
        </div> <!--sidebar-->
        <div class="content">
            <div class="titulo-secao">
                <h2>Dashboard Stock</h2>
                <br/>
                <hr>
                <p><i class="fa-solid fa-house"></i>/ Dashboard OnDisc</p>
            </div>
        </div><!--content-->
    </section><!--main -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
</body>

</html>