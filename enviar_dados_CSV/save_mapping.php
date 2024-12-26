<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mapping = $_POST['mapping'];
    $fileTmp = $_FILES['csvFile']['tmp_name'];
    $handle = fopen($fileTmp, 'r');
    $columns = fgetcsv($handle, 1000, ',');

    while (($data = fgetcsv($handle, 1000, ',')) !== false){
        $insertData = [];
        foreach ($mapping as $dbColumn => $csvColumn) {
            $index = array_search($csvColumn, $columns);
            $insertData[$dbColumn] = $index !== false ? $data[$index] : null;
        }
        $placeholders = implode(', ', array_fill(0, count($insertData), '?'));
        $sql = "INSERT INTO nome_tabela (" . implode(', ', array_keys($insertData)) . ") VALUES ($placeholders)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array_values($insertData));

    }
    fclose($handle);

    echo "Dados importados com sucesso!";
}
?>