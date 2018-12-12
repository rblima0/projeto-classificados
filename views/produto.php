<div class="container">
    <div class="row">
        <div class="col-sm-5">
            
        <div class="carousel slide" data-ride="carousel" id="imagensCarousel">
            <div class="carousel-inner" role="listbox">
            <?php if(!empty($info['fotos'])): ?>
                <?php foreach ($info['fotos'] as $chave => $foto): ?>
                <div class="item <?php echo ($chave == '0') ? 'active':''; ?>">
                    <img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $foto['url']; ?>" alt="Imagem <?php echo $foto['id']; ?>" />
                </div>
                <?php endforeach; ?>
                <?php else : ?>
                <div class="item active">
                    <img src="<?php echo BASE_URL; ?>assets/images/anuncios/default-page.png" alt="Sem imagem" />
                </div>
                <?php endif; ?>
            </div>
            <a class="left carousel-control" href="#imagensCarousel" role="button" data-slide="prev">
                <span><</span>
            </a>
            <a class="right carousel-control" href="#imagensCarousel" role="button" data-slide="next">
                <span>></span>
            </a>
        </div>

        </div>
        <div class="col-sm-7">
            <h1><?php echo $info['titulo']; ?></h1>
            <h4><?php echo $info['categoria']; ?></h4>
            <p><?php echo $info['descricao']; ?></p>
            <h3>R$ <?php echo number_format($info['valor'], 2, ',', '.'); ?></h3>
            <div class="vendedor">
                <p>Contato do Vendedor: <a href="callto:<?php echo $info['telefone'] ?>"><?php echo $info['telefone'] ?></a></p>
            </div>
        </div>
    </div>
</div>