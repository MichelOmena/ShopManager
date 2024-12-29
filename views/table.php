<?php
//sessao
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


?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css-->
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <!-- Local Bootstrap -->
    <link rel="stylesheet" href="../assets/styles/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/styles/dataTables.dataTables.min.css">
    <title>DATA</title>
</head>

<body class="painel_ondisc">

    <header>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid" id="nav-container">
                <a class="navbar-brand" href="#">ONDISC
                    <img src="../assets/img/logo.png" style="max-width: 50px;" alt="#">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Produtos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Fornecedores</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" method="POST" action="../controllers/login_handler.php" role="search">
                        <button class="btn btn-outline-danger" type="submit">Sair</button>
                    </form>
                </div>
            </div>
        </nav>

    </header>

    <!-- DataTables Painel ONDISC-->
    <?php
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
                            <th>Categoria</th>
                            <th>Sub-Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Array de categorias e subcategorias para simular as opções
                        $categorias = ['Eletrônica', 'Automotivo', 'Roupas'];
                        $subcategorias = ['Som', 'Computadores', 'Telefones'];

                        foreach ($dados as $linha): ?>
                            <tr onclick="openModal('<?= htmlspecialchars($linha['ean']); ?>', '<?= htmlspecialchars($linha['referencia']); ?>', '<?= htmlspecialchars($linha['descricao']); ?>')">
                                <td><?= htmlspecialchars($linha['ean']); ?></td>
                                <td><?= htmlspecialchars($linha['referencia']); ?></td>
                                <td><?= htmlspecialchars($linha['descricao']); ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" id="categoriaBtn_<?= $linha['ean']; ?>"
                                        onclick="openCategoriaModal('<?= $linha['ean']; ?>', <?= htmlspecialchars(json_encode($categorias)); ?>)">
                                        Selecionar
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-secondary btn-sm" id="subcategoriaBtn_<?= $linha['ean']; ?>"
                                        onclick="openSubcategoriaModal('<?= $linha['ean']; ?>', <?= htmlspecialchars(json_encode($subcategorias)); ?>)">
                                        Selecionar
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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

    <!--Footer-->
    <footer class="bg-light fixed-bottom">
        <p>ONDISC</p>
    </footer>

    <!--Local JS bootstrap-->
    <script src="../assets/javascript/bootstrap.bundle.min.js"></script>
    <!--jQuery-->
    <script src="../assets/javascript/jquery-3.7.1.min.js"></script>
    <!--DataTables-->
    <script src="../assets/javascript/dataTables.min.js"></script>
    <!--Scripts-->
    <script src="../assets/javascript/scripts.js"></script>

</body>

</html>