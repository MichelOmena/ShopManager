<?php
require_once 'config.php';


//Caminho CSV
$arquivoCSV = "data/catalogoondisc.csv/";

//Verificar se o arquivo existe
if (!file_exists($arquivoCSV) || !is_readable($arquivoCSV)) {
    echo "Erro: não foi possivel acessar o arquivo CSV.";
    exit;
}

//Abrir o arquivo para leitura
if (($handle = fopen($arquivoCSV, "r")) !== false) {
    //Ler a primeira Linha (cabeçalho)
    $cabecalho = fgetcsv($handle, 1000, ",");

    //Verifica se há dados no cabeçalho
    if ($cabecalho === false) {
        echo "Erro: Cabecalho nao encontrado ou arquivo vazio.";
        fclose($handle);
        exit;
    }
    //Mapeamento das colunas
    $mapeamentoColunas = [
        'id_produto' => 'id_produto',
        'a_venda' => 'a_venda',
        'quantidade_minima' => 'quantidade_minima',
        'EAN13' => 'EAN13'
    ];
    // Filtrar apenas as colunas relevantes do CSV
    $colunasBanco = array_keys($mapeamentoColunas);
    $indicesCSV = array_intersect_key(array_flip($cabecalho), $mapeamentoColunas);

    //==========================================================================//
    // Preparar a consulta de insercao 
    $colunas = implode(",", $colunasBanco);
    $placeholders = implode(",", array_fill(0, count($colunasBanco), "?"));
    $sql = "INSERT INTO produto_ondisc ($colunasInsert) VALUES ($placeholders)";
    //Preparar para declarar PDO
    $stmt = $pdo->prepare($sql);
    //=========================================================================//


    //========================================================================//
    //Loop pelas linhas do arquivo
    while (($dados = fgetcsv($handle, 1000, ",")) !== false) {
        //Extrair os dados relevantes com base no mapeamento
        $dadoFiltrados = array_map(function ($coluna) use ($dados, $indicesCSV) {
            return $dados[$indicesCSV[$coluna]] ?? null;
        }, $colunasBanco);

        // executar o consulta
        $stmt->execute($dadosFiltrados);
    }

    fclose($handle);
    echo "Importacao concluida.";
} else {
    echo "erro, nao foi possivel.";
}
    //=====================================================================//
