<?php
$host = "localhost";                                    // <- O host é host padrão phpMyAdmin "localhost
$db_user = "root";                                      // <- Por padrão no xamp é palavra "root"
$db_pass = "";                                          // <-  pass por padão não tem senha
$db_name = "cadastro_admin";                            // <-  nome do banco de dados que criamos no phpMyAdmin

$connect = mysqli_connect( $host, $db_user, $db_pass, $db_name );     // <- uma função que faz vinculo com bando de dados que criamos no mysqli_connect


// ↓↓↓↓↓↓↓↓↓↓↓↓↓ Função / Login ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function login($connect){
    if(isset($_POST['acessar']) AND !empty($_POST['email']) AND !empty($_POST['senha'])){
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);}
        $senha = sha1($_POST['senha']);
        $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha= '$senha' ";
        $executar = mysqli_query($connect, $query);
        $returna = mysqli_fetch_assoc($executar);
        if(!empty ($returna['email'])){
            // echo "Bem vindo" . $returna ['nome'];
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome'] = $returna['nome'];
            $_SESSION['id'] = $returna['id'];
            $_SESSION['ativa'] = true;
            header("location: login/index.php");
        }else{
            echo "Usuario ou senha não encontrados!";
        }
}



// ↓↓↓↓↓↓↓↓↓↓↓↓↓ Função/Logout ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

function sair (){
    session_start();
    session_unset();
    session_destroy();
    header("location:");
    
}
  

// ↓↓↓↓↓↓↓↓↓↓↓↓↓ Incluir usuario ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function novosusurios($connect){
    if(isset($_POST['enviar']) AND !empty($_POST['email']) AND !empty($_POST['senha'])){
    $erros = array();

    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $nome = mysqli_real_escape_string($connect, $_POST['nome']);
    $senha = sha1($_POST['senha']);
    // $celular = mysqli_real_escape_string($connect, $_POST['celular']);
    // $cpf = mysqli_real_escape_string($connect, $_POST['cpf']);

    $queryemail = "SELECT email FROM usuarios WHERE email = '$email'";
    $buscaremail = mysqli_query($connect, $queryemail);
    $verificar = mysqli_num_rows($buscaremail);
   
    if (!empty($verificaremail)) {
        $erro[] = "E-mail já cadastrado";
    }

    if (empty($erros)) {
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";     // <- Função SQL para o usuario no banco de dados
        $executar = mysqli_query($connect, $query);

        if ($executar) {
            echo "Cadastrado com sucesso!";
        }else{
            echo "Erro ao inserir os dados";
        }

    }else{
        foreach ($erros as $erro) {
            echo "$erros";
        }
    }

}
}


//↓↓↓↓↓↓↓↓  Busca unica/ID ↓↓↓↓↓↓↓↓   ( ⬆ ↓ )
function busca_unica($connect, $tabela,$id){
    $query = "SELECT * FROM $tabela WHERE id =".(int) $id;                   // <- O valor recebido pela variavel $id sera transformada em um inteiro
    $execute = mysqli_query($connect, $query);                               // <- Sera responsavel pela consulta no banco de dados
    $resultado = mysqli_fetch_assoc($execute);                               // <- ira trazer um unico resultado resultado
    return $resultado;
}


//↓↓↓↓↓↓↓↓↓ Função para saber quais são os usuarios cadastrados no sistema ↓↓↓↓↓↓↓↓↓↓
//  Busca realizada com base no where
function buscar ($connect, $tabela, $where = 1, $order = " "){
    if(! empty( $order)){                                                 // <- empty => verifica se a tag não esta vazia
        $order = "ORDER BY $order";
    }
    $query = "SELECT * FROM $tabela WHERE $where $order";
    $execute = mysqli_query($connect, $query);                            // <- ira realizar a consulta no banco de dados
    if (!$execute) {
        die('Erro na consulta: ' . mysqli_error($connect));
    }
    $results = mysqli_fetch_all($execute, MYSQLI_ASSOC);                  // <- ira trazer todos os resultados //
    return $results;
}


//↓↓↓↓↓↓↓↓↓↓ Inserir novos usuarios(area adm) ↓↓↓↓↓↓↓↓↓↓↓
function novos_usuarios ($connect){
    if ((isset($_POST['cadastrar']) AND !empty($_POST['email']) AND !empty($_POST['senha'])) ){
        $erros = array();
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $nome = mysqli_real_escape_string($connect,$_POST['nome']);                 // <- ira remover os caracteres especiaias da string // serve como filter_input
        $imagem = mysqli_real_escape_string($connect, $_FILES['imagem']['name']);

        $senha = sha1($_POST['senha']);

        if ($_POST['senha'] != $_POST['repetir_senha']){
            $erros[ ] = "Senha não coferem";     
        }

        $query_email= "SELECT email FROM usuarios WHERE email ='$email'";
        $busca_email = mysqli_query($connect, $query_email);
        $verifica_email = mysqli_num_rows($busca_email); 
        if (!empty($verifica_email)){                   
            $erros[] = "Email ja cadastrado";
        }

        if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) {                // <- Condição para incluir imagens
            $imagem = "../img_pefil/" . $_FILES["imagem"]["name"];
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
        } else {
            $imagem = "";
        }

        if (empty($erros)){            
            //inserir usuario no bd
            $query = "INSERT INTO usuarios (nome, email, senha, imagem) VALUES ('$nome','$email','$senha','$imagem')";       // <- Parametros 
            $executar = mysqli_query($connect, $query);
            if ($executar){
                echo"Usuario cadastrado dom sucesso!";
            }else{
                echo"erro ao cadastrar usuario";
            }
        }else{
            foreach($erros as $erro){
                echo $erro;
            }
        }
    }
}

//↓↓↓↓↓↓↓↓↓↓↓ - Função/Deletar - ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function deletar ($connect, $tabela, $id){
    if (!empty($id)){
    }
    $query = "DELETE FROM $tabela WHERE id =".(int) $id;                                          //where = quando-onde
    $execute = mysqli_query($connect, $query);
    if ($execute){
        echo "Dado deletado com sucesso";
    }else{
        echo "Falha ao deletar";
    }

}


//sha1 -> função de criptografia
//↓↓↓↓↓↓↓↓↓↓↓↓ - Função/Atualização de Cadastro - ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function atualizar_usuario($connect) {
    if (isset($_POST['atualizar']) && !empty($_POST['email'])) {
        $erros = array();
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $senha = !empty($_POST['senha']) ? sha1($_POST['senha']) : null;
        $repetir_senha = !empty($_POST['repetir_senha']) ? sha1($_POST['repetir_senha']) : null;

        if (strlen($nome) < 4) {
            $erros[] = "Preencha seu nome completo";
        }
        if (empty($email)) {
            $erros[] = "Preencha seu e-mail corretamente";
        }
        if ($senha && $senha !== $repetir_senha) {
            $erros[] = "Senhas não conferem";
        }

        $query_email_atual = "SELECT email FROM usuarios WHERE id = $id";
        $busca_email_atual = mysqli_query($connect, $query_email_atual);
        $retorno_email = mysqli_fetch_assoc($busca_email_atual);
        $query_email = "SELECT email FROM usuarios WHERE email = '$email' AND email <> '" . $retorno_email['email'] . "'";
        $busca_email = mysqli_query($connect, $query_email);
        $verifica = mysqli_num_rows($busca_email);

        if (!empty($verifica)) {
            $erros[] = "E-mail já cadastrado";
        }

        if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) {
            $imagem = "../img_pefil/" . $_FILES["imagem"]["name"];
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
        } else {
            $imagem = "";
        }

        if (empty($erros)) {
            $query = "UPDATE usuarios SET nome = '$nome', email = '$email', imagem = '$imagem'";
            if ($senha) {
                $query .= ", senha = '$senha'";
            }
            $query .= " WHERE id = " . (int)$id;

            $executar = mysqli_query($connect, $query);
            if ($executar) {
                echo "Usuário atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o usuário: " . mysqli_error($connect);
            }
        } else {
            foreach ($erros as $erro) {
                echo "<p>$erro</p>";
            }
        }
    }
}

  