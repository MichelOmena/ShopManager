<?php
use Dotenv\Dotenv;

require_once '../Config/credentials_api.php'; //Include openai safe credentials
require_once '../includes/config_cURL.php'; //Config cURL
require_once '../Models/database.php'; // Carregar a classe de Banco de Dados (Database)

// Call function for API credentials
$apiKey = GetApiKey();

// Criar a instância da classe Database
$database = new Database();
$db = $database->connect();

//@extends Header
require_once '../layout/header.php';
?>
<!--Section-->
    <section class="main">
        <div class="sidebar">
            <h3>Navegação</h3>
            <a class="sidebar-active" href="./app_dashboard.php"><i class="fa-solid fa-chart-simple"></i> AI Dashboard</a>
            <a href="./app_table.php"><i class="fa-solid fa-shop"></i> Produtos OnDisc</a>
            <a href="./app_suply.php"><i class="fa-solid fa-network-wired"></i> Fornecedores</a>
            <a href="./app_upload.php"><i class="fa-solid fa-file-invoice"></i> Upload CSV</a>
            <a href="./app_helpdesk.php"><i class="fa-solid fa-headset"></i> HelpDesk</a>
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