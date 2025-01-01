<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Concexao ? penso ser escusado
    // $pdo = new PDO('mysql:host=localhost;dbname=ondisc', 'root', '');

    //Dados enviados por Ajax
    $ean = $_POST['ean'];
    $type = $_POST['type']; //Categoria e Subcategoria
    $value = $_POST['value'];

    //Atualizar ou inserir no banco
    $query = $pdo->prepare("UPDATE produtos SET $type = :value WHERE ean = :ean");
    $query->execute([
        ':value' => $value,
        ':ean' => $ean
    ]);

    echo json_encode(['success' => true]);
    exit;
}
