<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classificados</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a href="./" class="navbar-brand">Classificados</a>
            </div>
            <div class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                <li><a href="anuncios.php">Meus Anúncios</a></li>
                <li><a href="sair.php">Sair</a></li>
            <?php else: ?>
                <li><a href="cadastro.php">Cadastrar</a></li>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
            </div>
        </div>
    </nav>