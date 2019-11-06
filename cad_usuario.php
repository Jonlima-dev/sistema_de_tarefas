<?php 

    require_once ("conexao.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $perfil = 2;

    $sql =  "INSERT INTO 
            usuario (nome, email, senha, perfil_usuario_cod)
            VALUES
            ('$nome', '$email', '$senha', $perfil)   
            ";

$resultado=mysqli_query($con, $sql);

if($resultado == true){
    header("Location:../index.php");
}

function validaEmailRegex($email){
    $conta = "/[a-zA-Z0-9\._-]+@";
    $domino = "[a-zA-Z0-9\._-]+.";
    $extensao = "([a-zA-Z]{2,4})$/";
    $pattern = $conta.$domino.$extensao;

    if (preg_match($pattern, $email))
        return true;
    else
        return false;
}

$valor = $_POST['email'];

if(validaEmailRegex($valor)):
    echo 'E-mail válido.';
else:
    echo 'E-mail inválido.';
endif;