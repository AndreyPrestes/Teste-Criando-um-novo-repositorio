<?php session_start();
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- link das fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Krona+One&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- width=device-width: Define a largura da viewport como igual à largura do dispositivo.
        initial-scale=1.0: Define o nível de escala inicial da viewport como 1.0. Isso significa que a página será exibida sem nenhum zoom inicial. 
      Ajuda a garantir que o layout da sua página seja responsivo em dispositivos móveis. 
    -->
    <!-- links para as paginas CSS  -->
    <link rel="stylesheet" href="css/aboutus.css" type="text/css">
    <link rel="stylesheet" href="css/body_header_footer.css" type="text/css">

    <title></title>
</head>



<body>
    <h1>Painel - Alteração</h1>
    <h2> Bem vindo, <?php echo $_SESSION['nome']; ?></h2>

    <!-- <a class="bt sair" href="sair.php"> Sair </a> -->
    <nav>
        <div>
            <a href="index.php">Painel / </a>
            <a href="usuarios.php">gerenciar usuarios / </a>
            <a class="bt sair" href="logout.php"> Sair </a>
        </div>
    </nav>

    <?php
    $tabela = "usuarios";
    $order = 'id';
   // $usuarios = buscar($connect, $tabela, $where = 1, $order);
    ?>

    <br>
    
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $usuario=busca_unica($connect, $tabela, $id);
        atualizar_usuario($connect);
    ?>
        <h2>Editando usuario <?php echo $_GET['nome']; ?> </h2>

    <?php } ?>

    <!-- Formulario / Atualização de cadastro -->
    <form action="" method="post" enctype="multipart/form-data" >
        <fieldset>
            <legend> Editar Usuario</legend>
            <input value="<?php echo $usuario['id']; ?>" type="hidden" name="id" required>
            <img src="<?php echo $usuario["imagem"];?>" width="75" height="75"></td>
            <input value="<?php echo $usuario['nome']; ?>" type="text" name="nome" required>
            <input value="<?php echo $usuario['email']; ?>" type="email" name="email" required>
            <input type="password" name="senha" placeholder="senha">
            <input type="password" name="repete_senha" placeholder="Confirmar senha">
            <input value="<?php echo $usuario['imagem'];?>" type="file" name="imagem" accept="image/*">
            <input type="submit" name="atualizar" value="Atualizar">
        </fieldset>
    </form>


    <br>