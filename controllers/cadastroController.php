<?php
class cadastroController extends controller {
    
    public function index() {
        $dados = array();
        $u = new Usuarios();

        if(isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $senha = $_POST['senha'];

            if(!empty($nome) && !empty($email) && !empty($senha)) {
                if($u->cadastrar($nome, $telefone, $email, $senha)) {
                    ?>
                    <div class="alert alert-warning">
                        <strong>Cadastro realizado com sucesso ! </strong>
                        <a class="alert-link" href="<?php echo BASE_URL; ?>login">Faça login agora</a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-warning">
                        <strong>Este usuário já existe. </strong>
                        <a class="alert-link" href="<?php echo BASE_URL; ?>login">Faça login aqui</a>
                    </div>
                    <?php
                }
            } else { 
            ?>
                <div class="alert alert-warning">
                    Preencha todos os campos.
                </div>
            <?php 
            }
        }

        $this->loadTemplate('cadastro', $dados);
    }
    
}