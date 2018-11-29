<?php require 'pages/header.php'; ?>
<div class="container">
    <?php
        if(empty($_SESSION['cLogin'])) {
            ?>
            <script type="text/javascript">window.location.href="login.php";</script>
            <?php
            exit;
        }

        require 'classes/anuncios.class.php';
        $a = new Anuncios();
        if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
            $titulo = addslashes($_POST['titulo']);
            $categoria = addslashes($_POST['categoria']);
            $valor = addslashes($_POST['valor']);
            $descricao = addslashes($_POST['descricao']);
            $estado = addslashes($_POST['estado']);

            $a->adicionarAnuncio($titulo, $categoria, $valor, $descricao, $estado);
            ?>
            <div class="alert alert-success">
                Produto adicionado com sucesso !
            </div>
            <?php
        }
    ?>
    <h2>Anúncios - Adicionar Novo</h2>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" name="categoria" id="categoria">
                <?php 
                    require 'classes/categorias.class.php';
                    $c = new Categorias(); 
                    $cats = $c->getLista();
                    foreach ($cats as $cat):?>
                        <option value="<?php echo $cat['id']; ?>"><?php echo utf8_encode($cat['nome']); ?></option>
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" class="form-control" />
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor" class="form-control" />
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado" id="estado">
                <option value="0">Novo</option>
                <option value="1">Pouco Usado</option>
                <option value="2">Usado</option>
            </select>
        </div>
        <input type="submit" value="Adicionar" class="btn btn-default">
    </form>

</div>

<?php require 'pages/footer.php'; ?>