<?php
    if(isset($_GET['erro'])){
        if($_GET['erro'] == 1){
            $erro = "Acesso Negado!";
        }else if($_GET['erro'] == 2){
            $erro = "E-mail ou senha inválidos!";
        }else if($_GET['erro'] == 3){
            $erro = "Logout realizado com sucesso!";
        }
    }else{
        $erro = "";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema De Compromissos</title>
</head>
<body>
    <div class="">  
    <form action="db\verifica_login.php" method="post" class="row">
        <div class="">
            <h3 class="">Login</h3>
        </div>

        <div class="">
            <label for="login">E-mail:</label>
            <input type="text" name="login" id="login">
        </div>
        <div class=""><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha"> <br>
        </div>
        <div class="">
            <span><?php echo $erro ?></span> <br>
            <button class="">Entrar</button><br>
        <div class=""></div>
            <a href="cadastro.php">Cadastre-se</a>
        </div>
    </form>
    </div>
</body>
</html>