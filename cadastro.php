<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Do Usuário - Compromisso</title>
</head>
<body>
    <form action="db/cad_usuario.php" method="post">
        Nome:
        <input type="text" name="nome">
        E-mail:
        <input type="email" name="email">
        Senha:
        <input type="password" name="senha" id="senha">
        Confirme Sua Senha:
        <input type="password" name="senha2" id="senha2" onkeyup="validasenha()"><br>
        <br><button>Cadastrar</button>
    </form>
    <dialog open>
        <p>Ao fazer seu cadastro, lembre-se o email<br> Deve está correto como no exemplo a seguir<br>fulano@hotmail.com</p>
    </dialog>
    <script>
        function validasenha(){
            $senha = document.getElementById("senha").value;
            $senha2 = document.getElementById("senha2").value;
            if ($senha != $senha2){
                document.getElementById("senha2").style.border = "red 1px solid";
            }else{
                document.getElementById("senha2").style.border = "green 1px solid";
            }
        }
    </script>
</body>
</html>