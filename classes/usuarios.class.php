<?php
class Usuarios {

    public function getTotalUsuarios() {
        global $pdo;
        $sql = "SELECT COUNT(*) as c FROM usuarios";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $row = $sql->fetch();
        return $row['c'];
    }

    public function cadastrar($nome, $telefone, $email, $senha) {
        global $pdo;
        $sql = "SELECT id FROM usuarios WHERE email = :email";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() == 0) {
            $sql = "INSERT INTO usuarios SET nome = :nome, telefone = :telefone, email = :email, senha = :senha";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function login($email, $senha) {
        global $pdo;
        $sql = "SELECT id FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];

            return true;
        } else {
            return false;
        }
    }

}
?>