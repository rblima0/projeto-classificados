<?php require 'pages/header.php' ?>

<?php 
    require 'classes/anuncios.class.php';
    require 'classes/usuarios.class.php';
    require 'classes/categorias.class.php';

    $a = new Anuncios();
    $u = new Usuarios();
    $c = new Categorias();

    $filtros = array(
        'categoria' => '',
        'preco' => '',
        'estado' => ''
    );

    if(isset($_GET['filtros'])) {
        $filtros = $_GET['filtros'];
    }

    $total_anuncios = $a->getTotalAnuncios($filtros);
    $total_usuarios = $u->getTotalUsuarios();

    $p = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])) {
        $p = addslashes($_GET['p']);
    }
    $por_pagina = 4;
    $total_paginas = ceil($total_anuncios / $por_pagina);

    $anuncios = $a->getUltimosAnuncios($p, $por_pagina, $filtros);

    // FILTROS
    $categorias = $c->getLista();

?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <h1>Nós temos hoje <?php echo $total_anuncios; ?> anúncios.</h1>
            <p class="lead">Temos <?php echo $total_usuarios; ?> usúarios cadastrados.</p>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h4>Pesquisa Avançada</h4>

                <form method="GET">

                    <div class="form-group">
                        <label for="categoria">Filtre por categoria:</label>
                        <select class="form-control" name="filtros[categoria]" id="categoria">
                            <option></option>   
                            <?php foreach ($categorias as $cat) : ?>
                                <option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id'] == $filtros['categoria']) ? 'selected="selected"' : ''; ?>><?php echo utf8_encode($cat['nome']); ?></option>    
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="preco">Filtre por preço:</label>
                        <select class="form-control" name="filtros[preco]" id="preco">
                            <option></option>   
                            <option value="0-500" <?php echo ($filtros['preco']=='0-500') ? 'selected="selected"':'';?>>R$ 0 - 500</option>
                            <option value="501-1000" <?php echo ($filtros['preco']=='501-1000') ? 'selected="selected"':'';?>>R$ 501 - 1000</option>
                            <option value="1001-2000" <?php echo ($filtros['preco']=='1001-2000') ? 'selected="selected"':'';?>>R$ 1001 - 2000</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="estado">Filtre por estado:</label>
                        <select class="form-control" name="filtros[estado]" id="estado">
                            <option></option>    
                            <option value="0" <?php echo ($filtros['estado'] == '0') ? 'selected="selected"' : ''; ?>>Novo</option>
                            <option value="1" <?php echo ($filtros['estado'] == '1') ? 'selected="selected"' : ''; ?>>Pouco Usado</option>
                            <option value="2" <?php echo ($filtros['estado'] == '2') ? 'selected="selected"' : ''; ?>>Usado</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Filtrar">
                    </div>

                </form>

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
                                    <?php echo number_format($anuncio['valor'], 2, ',', '.'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <ul class="pagination">
                    <?php for ($i=1; $i <= $total_paginas; $i++): ?>
                            <li class="<?php echo ($p == $i) ? 'active': ''; ?>"><a href="index.php?<?php 
                            $w = $_GET; 
                            $w['p'] = $i;
                            echo http_build_query($w); ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>

<?php require 'pages/footer.php' ?>