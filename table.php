<?php
//Conexao
include_once 'config.php';

//sessao
session_start();

//Verificar se o usuario esta autenticado
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css-->
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <!-- Local Bootstrap -->
    <link rel="stylesheet" href="./assets/styles/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="./assets/styles/dataTables.dataTables.min.css">
    <title>DATA</title>
</head>

<body class="painel_ondisc">

    <header>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid" id="nav-container">
                <a class="navbar-brand" href="#">ONDISC
                    <img src="#" alt="#">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">***</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fornecedores</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Produtos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="POST" action="logout.php" role="search">
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
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="mt-3 mb-5 me-2 ms-2 d-flex justify-content-between align-items-center bg-light rounded shadow p-5">
                <!-- Tabela Produtos OnDisc -->
                <table id="example" class="table table-hover table-light">
                    <thead>
                        <tr>
                            <th>EAN</th>
                            <th>Referência</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados as $linha): ?>
                            <tr onclick="openModal('<?= htmlspecialchars($linha['ean']); ?>', '<?= htmlspecialchars($linha['referencia']); ?>', '<?= htmlspecialchars($linha['descricao']); ?>')">
                                <td><?= htmlspecialchars($linha['ean']); ?></td>
                                <td><?= htmlspecialchars($linha['referencia']); ?></td>
                                <td><?= htmlspecialchars($linha['descricao']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="mt-3 mb-5 me-2 ms-2 d-flex justify-content-between align-items-center bg-light rounded shadow p-5">
                <!-- Tabela Fornecedor -->
                <table id="example2" class="table table-hover table-info">
                    <thead>
                        <tr>
                            <th>EAN</th>
                            <th>Referência</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados as $linha): ?>
                            <tr onclick="openModal('<?= htmlspecialchars($linha['ean']); ?>', '<?= htmlspecialchars($linha['referencia']); ?>', '<?= htmlspecialchars($linha['descricao']); ?>')">
                                <td><?= htmlspecialchars($linha['ean']); ?></td>
                                <td><?= htmlspecialchars($linha['referencia']); ?></td>
                                <td><?= htmlspecialchars($linha['descricao']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer class="bg-light fixed-bottom">
        <p>ONDISC</p>
    </footer>

    <!--Local JS bootstrap-->
    <script src="./assets/javascript/bootstrap.bundle.min.js"></script>
    <!--jQuery-->
    <script src="./assets/javascript/jquery-3.7.1.min.js"></script>
    <!--DataTables-->
    <script src="./assets/javascript/dataTables.min.js"></script>
    <!--Scripts-->
    <script src="./assets/javascript/scripts.js"></script>

</body>

</html>