<?php
include_once 'config.php';

//Verificar se o formulario foi submetido
if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    //obter dados
    $email = $_POST['Email'] ?? '';
    $password = $_POST['password'] ?? '';

    //Valida se os campos foram preenchidos
    if (empty($email) || empty($password)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }
    //Declarar 
    global $pdo;

    //Preparar a consulta SQL para buscar o usuario
    $sql = "SELECT * FROM usuarios WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($user)) {
        //Inicia a sessao 
        session_start();
        $_SESSION['user'] = $user['email'];
        //Redireciona
        header("Location: table.php");
        exit;

    } else {
        echo "<script>alert('E-mail ou senha incorreta!'); window.location.href='login.php';</script>";
    }
}

?>