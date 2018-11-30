<?php
class Categorias {

    public function getLista() {
        global $pdo;
        $array = array();

        $sql = "SELECT * FROM categorias";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

}