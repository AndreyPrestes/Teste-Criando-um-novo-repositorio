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

   <style>
      
     
   </style>

   <title></title>
</head>

<body>
    <h1>Painel Admin - Usuarios</h1>
    <h2> Bem vindo, <?php echo $_SESSION['nome']; ?></h2>

    <!-- <a class="bt sair" href="sair.php"> Sair </a> -->
    <nav>
        <div>
            <a href="index.php">Painel / </a>
            
            <a class="bt sair" href="logout.php"> Sair </a>
        </div>
    </nav>

    <?php
    $tabela = "usuarios";
    $order = 'id';
    $usuarios = buscar($connect, $tabela, $where = 1, $order);
    ?>
<br>
   <!-- ↓↓↓ Chamada da funções ↓↓↓ -->                                                      <!-- (⬆ ↓ ) -->
   <?php novos_usuarios($connect);  ?>
   
   <?php
      if(isset($_POST['deletar'])){     
         deletar($connect, $tabela, $_POST['id']);
        //header("usuarios.php");
      }

   ?>


   <!-- ↓↓↓ Inicio/Formulario de inclusão  ↓↓↓ -->
   <form action="" method="post" enctype="multipart/form-data" >
      <fieldset>
         <legend>Inserir Usuarios</legend>
         <input type="text" name="nome" placeholder="nome">
         <input type="email" name="email" placeholder="E-MAIL">
         <input type="password" name="senha" placeholder="senha">
         <input type="password" name="repetir_senha" placeholder="Confirmar senha">
         <input type="file" name="imagem" accept="image/*">
         <input type="submit" name="cadastrar" value="cadastrar">

      </fieldset>
   </form>  

   <br>  
    <table border="1px" >
    <thead>
         <tr>
            <th>ID</th>
            <th>PERFIL</th> 
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>CELULAR</th>
            <th>CPF</th>
            <th>AÇÕES</th>
            <th>Alterar</th>
         </tr>
      <tbody>
         <?php foreach ($usuarios as $usuario) { ?>
            <tr>
               <td><?php echo $usuario['id']; ?></td>
               <td><img src="<?php echo $usuario["imagem"];?>" width="75" height="75"></td>
               <td><?php echo $usuario['nome']; ?></td>
               <td><?php echo $usuario['email']; ?></td>
               <td><?php echo $usuario['celular']; ?></td>
               <td><?php echo $usuario['cpf']; ?></td>
               <td>
                  <a href="usuarios.php?id=<?php echo $usuario['id']; ?>">Excluir</a>  
               </td>
               <td>
               <a href="update.php?id=<?php echo ($usuario['id']); ?>&nome=<?php echo ($usuario['nome']); ?>">Editar</a>  
               </td>
            </tr>
         <?php
         }
         ?>
      </tbody>
    </table>


 <!-- ↓↓↓↓↓ Verifica o valor enviado pelo botao excluir ↓↓↓ -->
   <?php if (isset($_GET['id'])){ ?>
             <h2> Tem certeza que deseja deletar o usuario <?php echo $_GET['id']; ?> </h2>
             <form action="" method="post">
               <input type="hidden" name="id" value="<?php echo $_GET['id']?>"> <!--tapy = hidden deixaria invisivel o campo(input) com nome e id -->
               <input type="submit" name="deletar" value="Excluir">

            </form> 
   <?php } ?>

</body>

</html>