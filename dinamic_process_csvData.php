<?php
require_once 'config.php';

if ($_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
    $fileTmp = $_FILES['csvFile']['tmp_name'];
    $handle = fopen($fileTmp, 'r');

    if ($handle !== false) {
        $csvColumns = fgetcsv($handle, 1000, ',');
        fclose($handle);

        // Definir colunas fixas da tabela
        $dbColumns = ['ID produto', 'EAN', 'Descrição']; // atualizar mais tarde com as colunas reais 

        echo json_encode([
            'success' => true,
            'csvColumns' => $csvColumns,
            'dbColumns' => $dbColumns
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit;
}

echo json_encode(['success' => false]);
?>