<?php session_start(); ?>
<?php require_once "functions.php"; ?>


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
   <h1>Painel Administrador</h1>
   <h3>Seja bem vindo! <?php echo $_SESSION['nome'] ?></h3>
   <!-- <a class="bt sair" href="sair.php"> Sair </a> -->
   <nav>
         <div>
            <a href="index.php">Painel / </a>
            <a href="usuarios.php">gerenciar usuarios / </a>
            <a class="bt sair" href="../home.php"> Sair </a>
        </div>

    </nav>


    

</body>

</html>