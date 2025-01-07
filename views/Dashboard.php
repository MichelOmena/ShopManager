<?php
//dashboard.php: Esta página é responsável por renderizar a página principal do dashboard, mas também pode incluir o arquivo requisicao_api.php quando necessário, para realizar a requisição à API do OpenAI.


//Inicia a sessao 
session_start();

//Verificar se o usuario esta autenticado
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

// Carregar a classe de Banco de Dados (Database)
require_once '../includes/database.php';
require_once '../includes/requisicao_api.php'; //Função de interação com OpenAI



// Criar a instância da classe Database
$database = new Database();
$db = $database->connect();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FontAwsome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!--css-->
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <!-- Local Bootstrap -->
    <link rel="stylesheet" href="../assets/styles/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/styles/dataTables.dataTables.min.css">
    <title>Grafico</title>
</head>

<body class="dashboard">
    <header class="header_dashboard">
        <div class="info-header">
            <div class="logo">
                <h6>ONDISC CATÁLOGO-INTERATIVO</h6>
            </div>
        </div>
        <div style="align-items: center;" class="info-header">
            <form class="d-flex" method="POST" action="../controllers/login_handler.php" role="search">
                <button class="btn btn-outline-danger" type="submit">Sair</button>
            </form>
        </div>
    </header>
    <!-- fim header -->
    <section class="main">
        <div class="sidebar">
            <h3>Navegação</h3>
            <a class="sidebar-active" href="./dashboard.php"><i class="fa-solid fa-chart-simple"></i> AI Dashboard</a>
            <a href="./table.php"><i class="fa-solid fa-shop"></i> Produtos OnDisc</a>
            <a href="./suply.php"><i class="fa-solid fa-network-wired"></i> Fornecedores</a>
            <a href="./upload.php"><i class="fa-solid fa-file-invoice"></i> Upload CSV</a>
            <a href="./helpdesk.php"><i class="fa-solid fa-headset"></i> HelpDesk</a>
            <br />
            <!--separador-->
            <div class="separator"></div>
           <!--separador-->
           <div class="separator"></div>
            <a href="#"><i class="fa-solid fa-seedling"></i> Mais opções futuras</a>
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
                        <!--Tentar conectar-se com uma API interna entre sistemas-->
                        <h3>Produtos Vendidos</h3>
                        <p>111111111</p>
                    </div>
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
                <div class="box-info-single_2">
                    <div class="info-text">
                        <!--Tentar conectar-se com uma API interna entre sistemas-->
                        <h3>Produtos em Estoque</h3>
                        <p>111111111</p>
                    </div>
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
                <div class="box-info-single_3">
                    <div class="info-text">
                        <!--Tentar conectar-se com uma API interna entre sistemas-->
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

            <?php
            // echo "A chave da API é: " . $apiKey;
            ?>
        </div><!--content-->
    </section><!--main -->

    <!-- CDN fontawsome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
    <!--JS bootstrap-->
    <script src="../assets/javascript/bootstrap.bundle.min.js"></script>
    <!--jQuery-->
    <script src="../assets/javascript/jquery-3.7.1.min.js"></script>
    <!--DataTables-->
    <script src="../assets/javascript/dataTables.min.js"></script>
    <!--Scripts-->
    <script src="../assets/javascript/scripts.js"></script>
    <!--Script relatorio-->
    <script src="../assets/javascript/relatorio.js"></script>
</body>

</html>