<?php 
require_once "functions.php";
novosusurios($connect);
?>

<section class="main-cadastro">
<form action="" method="post">
            <legend>| Cadastro |</legend>
            <!-- NOME E SOBRENOME -->
            <label for="id-nome">Seu nome completo: </label>
            <input type="text" name="nome" id="id-nome"  placeholder="Nome Completo" required>
            <br><br>

            <!-- EMAIL -->
            <label for="id-email">Seu email: </label>
            <input type="text" name="email" id="id-email" placeholder="Ex: nome@email.com" require>
            <br><br>

            <!-- SENHA -->
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" require>
            <br><br>


            <input type="submit" name="enviar" value="ENVIAR.">
</form>
</fieldset>
</section>

