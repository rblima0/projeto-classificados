<?php
class Anuncios {

    public function getAnuncios() {
        global $pdo;
        $array = array();

        $sql = "SELECT *, (select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio = anuncios.id limit 1) as url FROM anuncios WHERE id_usuario = :id_usuario";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAnuncio($id) {
        global $pdo;
        $array = array();

        $sql = "SELECT * FROM anuncios WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        /* REFATORAR */
        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function adicionarAnuncio($titulo, $categoria, $valor, $descricao, $estado) {
        global $pdo;
        $sql = "INSERT INTO anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":estado", $estado);
        $sql->execute();
    }

    public function editarAnuncio($titulo, $categoria, $valor, $descricao, $estado, $id) {
        global $pdo;
        $sql = "UPDATE anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":estado", $estado);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function excluirAnuncio($id) {
        global $pdo;
        $sql = "DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_anuncio", $id);
        $sql->execute();

        $sql = "DELETE FROM anuncios WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}