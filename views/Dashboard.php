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
            <a href="./table.php"><i class="fa-solid fa-house"></i>Produtos OnDisc</a>
            <a href="#"><i class="fa-solid fa-house"></i>Fornecedores</a>
            <a href="./upload.php"><i class="fa-solid fa-house"></i>Upload CSV</a>
            <br />
            <div class="separator"></div>
            <h3>Home</h3>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <a href="#"><i class="fa-solid fa-house"></i>Relatorios</a>
            <br />
            <div class="separator"></div>
        </div> <!--sidebar-->
        <div class="content">
            <div class="titulo-secao">
                <h2>Dashboard Stock</h2>
                <br />
                <div class="separator"></div>
                <p><i class="fa-solid fa-house"></i> / Dashboard OnDisc</p>
            </div>

            <div class="box-info">
                <div class="box-info-single_1">
                    <div class="info-text">
                        <h3>Produtos Vendidos</h3>
                        <p>111111111</p>
                    </div>
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
                <div class="box-info-single_2">
                    <div class="info-text">
                        <h3>Produtos em Estoque</h3>
                        <p>111111111</p>
                    </div>
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
                <div class="box-info-single_3">
                    <div class="info-text">
                        <h3>Produtos em Falta</h3>
                        <p>111111111</p>
                    </div>
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
            </div>

            <div class="feed">
                <div class="feed-single">
                    <div class="feed-text">
                        <div class="circle-icon">
                            <i class="fa-solid fa-bell"></i>
                    </div>
                        <span>Tutorial Novo</span>
                    </div>
                    <div class="feed-time">
                        <h3>30 minutos ago</h3>
                    </div>
                </div>
            </div>
        </div><!--content-->
    </section><!--main -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
</body>

</html>