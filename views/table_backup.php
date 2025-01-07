<?php
//Tentar usar os dados no chatGPT para criar interação de por exemplo comparação de preços
//Inicia a sessao 
session_start();

//Verificar se o usuario esta autenticado
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

// Carregar a classe de Banco de Dados (Database)
require_once '../includes/database.php';
require_once '../includes/requisicao_api.php';

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
                <h3>ONDISC CATÁLOGO-INTERATIVO</h3>
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
            <a class="sidebar-active" href="./table.php"><i class="fa-solid fa-shop"></i> Produtos OnDisc</a>
            <a href="./suply.php"><i class="fa-solid fa-network-wired"></i> Fornecedores</a>
            <a href="./upload.php"><i class="fa-solid fa-file-invoice"></i> Upload CSV</a>
            <a href="./helpdesk.php"><i class="fa-solid fa-headset"></i>HelpDesk</a>
            <br />
            <!--separador-->
            <div class="separator"></div>
            <!--separador-->
            <div class="separator"></div>
            <a href="#"><i class="fa-solid fa-seedling"></i> Mais opções futuras</a>
            <br />
        </div> <!--sidebar-->
        <div class="content">
            <div class="titulo-secao">
                <h2>Dashboard Produtos</h2>
                <br />
                <div class="separator"></div>
                <!--colocar o bem-vindo com o nome do usuario-->
                <p><i class="fa-solid fa-house"></i> Bem-vindo <i class="fa-regular fa-face-smile"></i></p>
            </div>
            <!--feed section-->
            <div class="feed p-3">
                <div class="feed-single">
                    <div class="feed-text">
                        <div class="circle-icon">
                            <i class="fa-solid fa-bell"></i>
                        </div>
                        <span>
                            Updates
                        </span>
                    </div>
                    <!--Preciso para adicionar um novo registro na tabela de produtos, vai ser preciso que se abra um modal e mostrar as opções que estão na tabela para preencher manualmente-->
                    <div class="d-flex justify-content-center">
                        <button id="new-register" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo Registo de Produto</button>
                    </div>
                    <!--Ao importar o CSV é preciso ter uma dinamica, quais colunas importar (o programa deve perguntar), se for produto e ter coluna nova os campos antigos poderão ou não ter os novos dados?-->
                    <div class="d-flex justify-content-center">
                        <button id="import-dashboard" class="btn btn-primary"><i class="fa-solid fa-file-import"></i> Importar CSV</button>
                    </div>
                    <!-- Integrar com API da openai e gerar relatorio (caso de tempo)-->
                    <div class="feed-time">
                        <button id="generate-report" class="btn btn-secondary"><i class="fa-solid fa-paper-plane"></i> Gerar Relatório PDF</button>
                    </div>
                </div>
            </div>
            <!-- DataTables Painel ONDISC-->
            <?php
            //Consulta os produtos na DB
            // $query = $pdo->query("SELECT * FROM produtos_ondisc");
            // $dados = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <div class="mt-3 mb-5 ms-2 me-2 bg-light rounded shadow p-5">
                        <!-- Tabela Produtos OnDisc -->
                        <table id="table_product" class="table table-hover table-light">
                            <thead>
                                <tr>
                                    <th>EAN</th>
                                    <th>Referência</th>
                                    <th>Descrição</th>
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                    <th>Sub-Categoria</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Array de categorias e subcategorias para simular as opções
                                $categorias = ['Eletrônica', 'Automotivo', 'Roupas'];
                                $subcategorias = ['Som', 'Computadores', 'Telefones'];
                                $marca = ['Xiaomi', 'Apple', 'Huawei'];

                                $dados = [
                                    ['ean' => '123456', 'referencia' => 'A001', 'descricao' => 'Produto 1'],
                                    ['ean' => '654321', 'referencia' => 'B002', 'descricao' => 'Produto 2'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                    ['ean' => '789012', 'referencia' => 'C003', 'descricao' => 'Produto 3'],
                                ];

                                foreach ($dados as $linha): ?>
                                    <tr onclick="openModal('<?= htmlspecialchars($linha['ean']); ?>', '<?= htmlspecialchars($linha['referencia']); ?>', '<?= htmlspecialchars($linha['descricao']); ?>')">
                                        <td><?= htmlspecialchars($linha['ean']); ?></td>
                                        <td><?= htmlspecialchars($linha['referencia']); ?></td>
                                        <td><?= htmlspecialchars($linha['descricao']); ?></td>

                                        <!-- Caso o registo já possua dados nessa coluna então mostrar a informação invés do botão-->
                                        <td><button class="btn btn-secondary btn-sm" id="marcaBtn_<?= $linha['ean']; ?>"
                                                onclick="openMarcaModal('<?= $linha['ean']; ?>', <?= htmlspecialchars(json_encode($marca)); ?>">
                                                Selecionar
                                            </button>
                                        </td>
                                        <td>
                                            <!-- Caso o registo já possua dados nessa coluna então mostrar a informação invés do botão-->
                                            <button class="btn btn-primary btn-sm" id="categoriaBtn_<?= $linha['ean']; ?>"
                                                onclick="openCategoriaModal('<?= $linha['ean']; ?>', <?= htmlspecialchars(json_encode($categorias)); ?>)">
                                                Selecionar
                                            </button>
                                        </td>

                                        <!-- Caso o registo já possua dados nessa coluna então mostrar a informação invés do botão-->
                                        <td>
                                            <button class="btn btn-secondary btn-sm" id="subcategoriaBtn_<?= $linha['ean']; ?>"
                                                onclick="openSubcategoriaModal('<?= $linha['ean']; ?>', <?= htmlspecialchars(json_encode($subcategorias)); ?>)">
                                                Selecionar
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm">Editar</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm">Excluir</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- APENAS ESTÁ A SELECIONAR OS 3 PRIMEIROS-->
            <!-- NAO DAR PARA TROCAR APOS SELECIONADO-->
            <!-- Modal Template-->
            <div id="categoriaModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Categorias Disponíveis</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <select id="categoriaDropdown" class="form-select" aria-label="Selecionar Categoria">
                                <option value="" selected>Selecione uma Categoria</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!--Subcategoria-->
            <div id="subcategoriaModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Subcategorias Disponíveis</h5>
                            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <select id="subcategoriaDropdown" class="form-select" aria-label="Selecionar Subcategoria">
                                <option value="" selected>Selecione uma Subcategoria</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
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
    <!--Relatorio teste-->
    <script src="../assets/javascript/relatorio.js"></script>
</body>
</html>