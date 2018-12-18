<div class="container">
    <h2>Formulário de Login</h2>

    <form method="POST">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" required />
        </div>
        <div class="form-group">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
        </div>
        <input type="submit" value="Logar" class="btn btn-default">
    </form>
</div>