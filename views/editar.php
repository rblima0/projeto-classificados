<div class="container">
    <h2>Anúncios - Editar Anúncio</h2>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" name="categoria" id="categoria">
                <?php
                    foreach ($cats as $cat):?>
                        <option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria']==$cat['id'])?'selected="selected"':''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo'];?>" />
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"><?php echo $info['descricao'];?></textarea>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor" class="form-control" value="<?php echo $info['valor'];?>"/>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado" id="estado">
                <option value="0" <?php echo ($info['estado'] == '0')?'selected="selected"':''; ?>>Novo</option>
                <option value="1" <?php echo ($info['estado'] == '1')?'selected="selected"':''; ?>>Pouco Usado</option>
                <option value="2" <?php echo ($info['estado'] == '2')?'selected="selected"':''; ?>>Usado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Imagens do anúncio:</label>
            <input type="file" name="fotos[]" multiple /><br/>

            <div class="panel panel-default">
                <div class="panel-heading">Imagens já adicionadas</div>
                <div class="panel-body">
                <?php if(!empty($info['fotos'])): ?>
                    <?php foreach($info['fotos'] as $foto): ?>
                        <div class="foto-item">
                            <img class="img-thumbnail" src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $foto['url']; ?>" alt=""><br/>
                            <a class="btn btn-default" href="<?php echo BASE_URL; ?>anuncios/excluirFoto/<?php echo $foto['id']; ?>">Excluir Imagem</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
        <input type="submit" value="Salvar" class="btn btn-default">
    </form>

</div>