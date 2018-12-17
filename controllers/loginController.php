<?php
class loginController extends controller {

    public function index() {

        $dados = array();
        $u = new Usuarios();

        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $senha = $_POST['senha'];

            if(isset($_SESSION['login_tentativas']) && $_SESSION['login_tentativas'] >= 3) { ?>
                <div class="alert alert-danger">
                    <strong>Seu acesso foi bloqueado !</strong><br/>
                    <p>Excedeu número de tentativas</p>
                </div>
            <?php
            } else {
                if($u->login($email, $senha)) {
                    header("Location: ".BASE_URL);
                } else {
                    if(!isset($_SESSION['login_tentativas'])) {
                        $_SESSION['login_tentativas'] = 0;
                    }
                    $_SESSION['login_tentativas']++;
                    ?>
                    <div class="alert alert-danger">
                        <strong>Usuário e/ou Senha errados !</strong><br/>
                        <p>Tentativa: <?=$_SESSION['login_tentativas']?></p>
                    </div>
                    <?php
                }
            }

        }

        $this->loadTemplate('login', $dados);
    }

    public function sair() {
        session_start();
        unset($_SESSION['cLogin']);
        header("Location: ".BASE_URL);
    }

}