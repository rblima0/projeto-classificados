<?php require 'pages/header.php' ?>

<div class="container">
    <h2>Formulário de Cadastro</h2>
    <?php
        require 'classes/usuarios.class.php';
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
                        <strong>Cadastro realizado com sucesso ! </strong><a class="alert-link" href="login.php">Faça login agora</a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-warning">
                        <strong>Este usuário já existe. </strong><a class="alert-link" href="login.php">Faça login aqui</a>
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
    ?>

    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="form-control" />
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" required />
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-default">
    </form>
</div>

<?php require 'pages/footer.php' ?>