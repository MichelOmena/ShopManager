<?php
// header.php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <link rel="stylesheet" href="../assets/styles/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/styles/dataTables.dataTables.min.css">
    <title><?php echo $pageTitle ?? 'OnDisc'; ?></title>
</head>
<body class="dashboard">
<header class="header_dashboard">
    <div class="info-header">
        <div class="logo">
            <h6>ONDISC CATÁLOGO-INTERATIVO</h6>
        </div>
    </div>
    <div class="info-header" style="align-items: center;">
        <form class="d-flex" method="POST" action="../controllers/login_handler.php">
            <button class="btn btn-outline-danger" type="submit">Sair</button>
        </form>
    </div>
</header>