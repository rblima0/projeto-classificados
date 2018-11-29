<?php require 'pages/header.php'; ?>
<?php
    if(empty($_SESSION['cLogin'])) {
        ?>
        <script type="text/javascript">window.location.href="login.php";</script>
        <?php
        exit;
    }
?>
<div class="container">
    <h2>Anúncios Cadastrados</h2>

    <a href="adicionar-anuncio.php" class="btn btn-default">Adicionar Anúncio</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Titulo</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require 'classes/anuncios.class.php';
                $a = new Anuncios();
                $anuncios = $a->getAnuncios();

                foreach ($anuncios as $anuncio) : ?>
                    <tr>
                        <td><img src="assets/images/anuncios/<?php echo $anuncio['url']?>" alt="<?php echo $anuncio['titulo'] ?>"></td>
                        <td><?php echo $anuncio['titulo']; ?></td>
                        <td><?php echo number_format($anuncio['valor'], 2); ?></td>
                        <td></td>
                    </tr>    
                <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php require 'pages/footer.php'; ?>