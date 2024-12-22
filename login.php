<?php
//Conexao DB
require_once 'config.php';

//Inicia a sessao 
session_start();

//Verificar se o formulario foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    //validacao dos dados
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'O email é obrigatório e deve ser válido, example@hotmail.com';
    }

    if (empty($_POST['password'])) {
        $errors[] = 'Preencher password.';
    }

    if (empty($errors)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Declarar 
        // global $pdo;

        //Preparar a consulta SQL para buscar o usuario
        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
        // $stmt->bindParam(':password', $password);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if ($password === $user['password']) {
                $_SESSION['email'] = $user['email'];

                //Redireciona
                header("Location: table.php");
            }
        }
        // exit;

    } else {
        $errors[] = 'Credenciais inválidas!';
    }

    var_dump($_SESSION);
}


?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="assets/styles/styles.css">
    <!-- Local Bootstrap -->
    <link rel="stylesheet" href="./assets/styles/bootstrap.min.css">
    <title>Login</title>
</head>

<body class="login_body container d-flex justify-content-center align-items-center">
        <div class="background-wrapper col-lg-12">
            <img src="./assets/img/Christmas_Pine.png" alt="plano_de_fundo" class="background_image" width="100%">
        </div>
    <div class="login_box d-fluid justify-content-center align-items-center col-lg-4 p-5 rounded-5 mt-5 mb-3">
        <h1 class="text-center text-white">ONDISC</h1>
        <h2 class="text-center text-white mb-4">LOGIN</h2>
        <form action="login.php" method="POST" class="d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center mb-3">
                <input class="form-control-lg rounded-lg email" type="text" placeholder="E-mail" name="email">
            </div>
            <div class="d-flex justify-content-center mb-3">
                <input class="form-control-lg rounded-lg password" type="password" placeholder="Password" name="password">
            </div>
            <div class="d-flex justify-content-center">
                <input class="inputSubmit btn btn-primary btn-lg" type="submit" name="submit" value="enviar">
            </div>
        </form>
    </div>
</body>

</html>