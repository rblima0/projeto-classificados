<div class="container">
    <h2>Anúncios Cadastrados</h2>

    <a href="<?php echo BASE_URL; ?>anuncios/adicionar" class="btn btn-default">Adicionar Anúncio</a>

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
                foreach ($anuncios as $anuncio) : ?>
                    <tr>
                        <td>
                            <?php if(!empty($anuncio['url'])): ?>
                                <img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['url']?>" height="50" alt="<?php echo $anuncio['titulo'] ?>">
                            <?php else: ?>
                                <img src="<?php echo BASE_URL; ?>assets/images/anuncios/default.jpg" height="50" alt="Imagem padrão." />
                            <?php endif; ?>
                        </td>
                        <td><a href="<?php echo BASE_URL; ?>produto/abrir/<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a></td>
                        <td><?php echo number_format($anuncio['valor'], 2, ',', '.'); ?></td>
                        <td>
                            <a class="btn btn-default" href="<?php echo BASE_URL; ?>anuncios/editar/<?php echo $anuncio['id']; ?>">Editar</a>
                            <a class="btn btn-danger" href="<?php echo BASE_URL; ?>anuncios/excluir/<?php echo $anuncio['id']; ?>">Excluir</a>
                        </td>
                    </tr>    
                <?php endforeach; ?>
        </tbody>
    </table>

</div>