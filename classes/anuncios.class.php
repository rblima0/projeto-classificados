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

            $sql = "SELECT id, url FROM anuncios_imagens WHERE id_anuncio = :id_anuncio";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id_anuncio", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array['fotos'] = $sql->fetchAll();
            }
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

    public function editarAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id) {
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

        /* FAZENDO UPLOAD DE FOTOS */
        if(count($fotos) > 0) {
            for ($i=0; $i < count($fotos['tmp_name']); $i++) { 
                $tipo = $fotos['type'][$i];
                if(in_array($tipo, array('image/jpeg', 'image/png'))){
                    $tmpname = md5(time().rand(0,9999)).'jpg';
                    move_uploaded_file($fotos['tmp_name'][$i], "assets/images/anuncios/".$tmpname);

                    list($width_orig, $height_orig) = getimagesize("assets/images/anuncios/".$tmpname);
                    $ratio = $width_orig/$height_orig;
                    $width = 500;
                    $height = 500;

                    if($width/$height > $ratio) {
                        $width = $height*$ratio;
                    } else {
                        $height = $width/$ratio;
                    }

                    $img = imagecreatetruecolor($width, $height);

                    if($tipo == 'image/jpeg') {
                        $orig = imagecreatefromjpeg("assets/images/anuncios/".$tmpname);
                    } else if($tipo == 'image/png') {
                        $orig = imagecreatefrompng("assets/images/anuncios/".$tmpname);
                    }

                    imagecopyresampled($img, $orig, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagejpeg($img, "assets/images/anuncios/".$tmpname, 80);

                    $sql = "INSERT INTO anuncios_imagens SET id_anuncio = :id_anuncio, url = :url";
                    $sql = $pdo->prepare($sql);
                    $sql->bindValue(":id_anuncio", $id);
                    $sql->bindValue(":url", $tmpname);
                    $sql->execute();
                }
            }
        }
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

    public function excluirFoto($id) {
        global $pdo;
        $id_anuncio = 0;

        $sql = "SELECT id_anuncio FROM anuncios_imagens WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $row = $sql->fetch();
            $id_anuncio = $row['id_anuncio'];
        }

        $sql = "DELETE FROM anuncios_imagens WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return $id_anuncio;
    }

}