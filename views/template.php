<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classificados</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a href="<?php echo BASE_URL; ?>" class="navbar-brand">Classificados</a>
            </div>
            <div class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                <li><a href="<?php echo BASE_URL; ?>anuncios">Meus Anúncios</a></li>
                <li><a href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
            <?php else: ?>
                <li><a href="<?php echo BASE_URL; ?>cadastro">Cadastrar</a></li>
                <li><a href="<?php echo BASE_URL; ?>login">Login</a></li>
            <?php endif; ?>
            </div>
        </div>
    </nav>

    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    
</body>
<script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</html>