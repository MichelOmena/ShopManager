<?php
// Responsible for my credentials for openAI API

use Dotenv\Dotenv;

function GetApiKey()
{
    // Inclua o autoload do Composer
require_once __DIR__ . '/../vendor/autoload.php';
// Carregar as variáveis de ambiente do arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
// Carrega as variáveis do arquivo .env
$dotenv->load();

//Acessar a chave da API de forma segura
return $_ENV['OPENAI_API_KEY'] ?? null;

}


