<?php
//Inicia a sessao 
session_start();

//Verificar se o usuario esta autenticado
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

// Carregar a classe de Banco de Dados (Database)
require_once '../includes/database.php';

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
            <div class="logo d-flex align-items-center">
            <h3>ONDISC Lda - Catálogo Inteligente</h3> <i class="fa-solid fa-layer-group"></i>
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
            <a href="./dashboard.php"><i class="fa-solid fa-chart-simple"></i> AI Dashboard</a>
            <a href="./table.php"><i class="fa-solid fa-shop"></i> Produtos OnDisc</a>
            <a href="./suply.php"><i class="fa-solid fa-network-wired"></i> Fornecedores</a>
            <a class="sidebar-active" href="./upload.php"><i class="fa-solid fa-file-invoice"></i> Upload CSV</a>
            <a href="./helpdesk.php"><i class="fa-solid fa-headset"></i> HelpDesk</a>
            <br />
            <!--separador-->
            <div class="separator"></div>
            <a href="#"><i class="fa-solid fa-seedling"></i> Mais opções futuras</a>
            <br />
        </div> <!--sidebar-->
        <div class="content">
            <div class="titulo-secao">
                <h2>Dashboard Stock</h2>
                <br />
                <div class="separator"></div>
                <p><i class="fa-solid fa-house"></i> / Dashboard OnDisc</p>
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

            <!-- datatables-->
            <div class="container d-flex justify-content-center align-items-center">
            <div class="upload_box bg-light p-4 rounded shadow-lg col-lg-6">
                <div class="mt-5 mb-5">
                    <h1 class="text-black text-center">Upload CSV</h1>
                </div>
                <form action="upload_csv.php" id="uploadForm" method="POST" enctype="multipart/form-data">
                    <label for="csv_file">Selecione o arquivo CSV</label>
                    <input type="file" name="csv_file" id="csv_file" accept=".csv" required>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" id="uploadBtn">Importar</button>
                    </div>
                </form>
            </div><!-- datatables-->
            </div><!-- datatables-->
        </div><!--content-->
    </section><!--main -->

    <?php
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
        $arquivoCSV = $_FILES['csv_file']['tmp_name'];

        //Abre o arquivo CSV
        if (($handle = fopen($arquivoCSV, 'r')) !== false) {
            //Ignora a primeira linha (cabecalho)
            fgetcsv($handle);

            //Prepara o SQL para inserção/atualização 
            $sql = "INSERT INTO produtos (Referencia, EAN, Descricao, Categoria) VALUES (:referencia, :ean, :descricao, :categoria)ON DUPLICATE KEY UPDATE
            EAN = :ean, Descricao = : descricao, Categoria = :categoria";

            $stmt = $pdo->prepare($sql);

            //Le cada linha CSV mudar a linha....
            while (($linha = fgetcsv($handle, 1000, ',')) !== false) {
                $referencia = $linha[0]; //ID do produto
                $ean = $linha[1]; //EAN13
                $descricao = $linha[2]; //Descricao
                $categoria = $linha[3]; //Categoria

                //Executa a inserção/atualizacao
                $stmt->execute([
                    ':referencia' => $referencia,
                    ':ean' => $ean,
                    ':descricao' => $descricao,
                    ':categoria' => $categoria,
                ]);
            }

            fclose($handle);
            echo "Importação concluída com sucesso!";
        } else {
            echo "Erro ao abrir o arquivo CSV.";
        }
    } else {
        echo "Nenhum arquivo enviado.";
    }
    
    ?>

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
</body>

</html>