<?php require_once "functions.php";?>

<section class="main-login">
<form action="" method="post">
           
           <label for="login">Login:</label>
           <input type="email" name="email" placeholder="Login" required>
           <label for="senha">Senha:</label>
           <input type="password" name="senha" placeholder="Insira sua senha" required>
           <input type="submit" class="btn-acessar" name="acessar" value="acessar">
   
   </form>
</section>

<?php 
if (isset($_POST['acessar'])) {
        login($connect);
}
?>