<div class="container">
    <h2>Anúncios - Adicionar Novo</h2>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" name="categoria" id="categoria">
                <?php 
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