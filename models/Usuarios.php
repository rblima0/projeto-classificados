<?php
class Usuarios extends model {

    public function getTotalUsuarios() {
        $sql = "SELECT COUNT(*) as c FROM usuarios";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        $row = $sql->fetch();
        return $row['c'];
    }

    public function cadastrar($nome, $telefone, $email, $senha) {
        $sql = "SELECT id FROM usuarios WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() == 0) {
            $sql = "INSERT INTO usuarios SET nome = :nome, telefone = :telefone, email = :email, senha = :senha";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", password_hash($senha, PASSWORD_BCRYPT));
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function login($email, $senha) {
        $sql = "SELECT id, senha FROM usuarios WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();

            if(password_verify($senha, $dado['senha'])) {
                $_SESSION['cLogin'] = $dado['id'];
            } else {
                return false;
            }

            return true;
        } else {
            return false;
        }
    }

}