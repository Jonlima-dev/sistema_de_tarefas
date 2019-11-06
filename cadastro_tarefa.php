<?php 
    require_once("bloqueio.php");

    $sql = "SELECT * FROM categoria_tarefa";
    $result_cat = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Compromissos-Compromisso</title>
</head>
<body>
    
    <?php require_once("header.php");?>

    <h3>Cadastro De Compromisso </h3>
    <form action="db/cad_tarefa.php" method="post">
        Título:
        <input type="text" name="titulo">
        Data:
        <input type="date" name="data">
        Hora:
        <input type="time" name="hora">
        Categoria:
        <select name="categoria" id=""> 
            <?php 
                foreach($result_cat as $dados){ ?>
            <option value="<?php echo $dados['cod']?>"><?php echo $dados['nome']?></option>
                <?php } ?>
        </select><br>
        Descrição:
        <textarea name="descricao" id="" cols="30" rows="10"></textarea><br>
        <button>Cadastrar</button>
    </form>
</body>
</html>