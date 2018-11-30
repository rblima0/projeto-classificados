<?php
class anunciosController extends controller {
    
    /* PAGINA PRINCIPAL DOS ANUNCIOS */
    public function index() {
        $dados = array();
        
        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL);
            exit;
        }

        $a = new Anuncios();
        $anuncios = $a->getAnuncios();
        $dados['anuncios'] = $anuncios;

        $this->loadTemplate('anuncios', $dados);
    }

    /* CODIGO DE ADICAO DE ANUNCIO */
    public function adicionar() {
        $dados = array();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $a = new Anuncios();
        $c = new Categorias(); 
        $cats = $c->getLista();

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

        $dados['cats'] = $cats;

        $this->loadTemplate('adicionar', $dados);
    }

    /* CODIGO DE EDICAO DO ANUNCIO */
    public function editar($id) {
        $dados = array();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $a = new Anuncios();

        if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
            $titulo = addslashes($_POST['titulo']);
            $categoria = addslashes($_POST['categoria']);
            $valor = addslashes($_POST['valor']);
            $descricao = addslashes($_POST['descricao']);
            $estado = addslashes($_POST['estado']);

            if(isset($_FILES['fotos'])) {
                $fotos = $_FILES['fotos'];
            } else {
                $fotos = array();
            }

            $a->editarAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id);
            ?>
                <div class="alert alert-success">
                    Produto editado com sucesso !
                </div>
            <?php
        }

        $c = new Categorias(); 
        $cats = $c->getLista();

        if(isset($id) && !empty($id)) {
            $info = $a->getAnuncio($id);
            $dados['info'] = $info;
        } else {
            header("Location: ".BASE_URL."anuncios");
        }

        $dados['cats'] = $cats;

        $this->loadTemplate('editar', $dados);
    }

    /* CODIGO DE EXCLUSÃO DO ANUNCIO */
    public function excluir($id) {

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }
        
        $a = new Anuncios();
        
        if(isset($id) && !empty($id)) {
            $a->excluirAnuncio($id);
        }
        
        header("Location: ".BASE_URL."anuncios");
    }

    // CODIGO EXCLUSÃO DA FOTO DO ANUNCIO
    public function excluirFoto($id) {

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $a = new Anuncios();
        
        if(isset($id) && !empty($id)) {
            $id_anuncio = $a->excluirFoto($id);
        }
        
        if(isset($id_anuncio)) {
            header("Location: ".BASE_URL."anuncios/editar/".$id_anuncio);
        } else {
            header("Location: ".BASE_URL."anuncios");
        }
    }
    
}