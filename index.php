<?php require 'pages/header.php' ?>

<?php 
    require 'classes/anuncios.class.php';
    require 'classes/usuarios.class.php';

    $a = new Anuncios();
    $u = new Usuarios();

    $total_anuncios = $a->getTotalAnuncios();
    $total_usuarios = $u->getTotalUsuarios();

    $p = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])) {
        $p = addslashes($_GET['p']);
    }
    $por_pagina = 2;
    $total_paginas = ceil($total_anuncios / $por_pagina);

    $anuncios = $a->getUltimosAnuncios($p, $por_pagina);
?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Nós temos hoje <?php echo $total_anuncios; ?> anúncios.</h1>
            <p class="lead">Temos <?php echo $total_usuarios; ?> usúarios cadastrados.</p>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h4>Pesquisa Avançada</h4>
            </div>
            <div class="col-sm-9">
                <h4>Últimos Anúncios</h4>

                <!-- TABELA COMPLETA -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Produto</th>
                            <th>Valor</th>
                            <!-- <th>Ações</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($anuncios as $anuncio): ?>
                            <tr>
                                <td>
                                    <?php if(!empty($anuncio['url'])): ?>
                                        <img src="assets/images/anuncios/<?php echo $anuncio['url']?>" height="50" alt="<?php echo $anuncio['titulo'] ?>">
                                    <?php else: ?>
                                        <img src="assets/images/anuncios/default.jpg" height="50" alt="Imagem padrão." />
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a><br/>
                                    <?php echo $anuncio['categoria']; ?>
                                </td>

                                <td>
                                    <?php echo number_format($anuncio['valor'], 2); ?>
                                </td>
                                <!-- <td>
                                    <a class="btn btn-default" href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>">Editar</a>
                                    <a class="btn btn-danger" href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>">Excluir</a>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <ul class="pagination">
                    <?php for ($i=1; $i <= $total_paginas; $i++): ?>
                        <li class="<?php echo ($p == $i) ? 'active': ''; ?>"><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>

<?php require 'pages/footer.php' ?>