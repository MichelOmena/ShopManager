<!-- Conexao com DB por PDO -->
 
<?php

//Dados
$usuario = 'root';
$password = '';
$host = 'localhost';
$dbname = 'ondisc';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";


try {
    //Criar a conexao PDO
    $pdo = new PDO($dsn, $usuario, $password);
    //Configurar o PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "erro na conexao";
    exit;
}
?>
