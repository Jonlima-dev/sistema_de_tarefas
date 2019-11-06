<?php 
    require_once("bloqueio.php");
    $cod = $_SESSION['cod'];
    if(isset($_GET['busca'])){
       $busca = $_GET['busca'];
    }else{
        $busca = '';
    }
    if($_SESSION['perfil']!=1){
        $sql = "SELECT *, t.cod as codt FROM tarefas t where usuario_cod = $cod AND (titulo like '%$busca%' OR descricao like '%$busca%') order by data, hora asc";
    }else {
        $sql = "SELECT *, u.cod as codu, t.cod as codt FROM tarefas t, usuario u where t.usuario_cod = u.cod AND(titulo like '%$busca%' OR descricao like '%$busca%') order by data, hora asc";
    }
    $result_tarefas = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda De Compromissos</title>
</head>
<body>
    <?php require_once("header.php");?>
    <form action="" class="">
            <div class="">
                <label for="busca">Digite Para Buscar</label>
                <input type="text" name="busca" id="busca">
            </div>
      <div class="">
         <button class="">Pesquisar</button>
      </div>
    </form>

<!-- uma coluna com o titulo da tarefa, segunda a data, terceira a hora e 4arta as opções-->
    <table class="striped responsive-table">
    <thead>
        <tr>
        <?php
            if($_SESSION['perfil']==1){
        ?>
            <th>Usuario</th>
        <?php } ?>
            <th>Titulo</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Categoria</th>
            <th>Opções</th>
        </tr>
    </thead>
        <?php
            foreach($result_tarefas as $tarefa){ ?>
        <tr>
    
        <?php
            if($_SESSION['perfil']==1){
        ?>
            <td><?= $tarefa['nome']?></td>
        <?php } ?>
            <td><a href="visualizar_tarefa.php?cod=<?= $tarefa['codt']?>"><?= $tarefa['titulo']?></a></td>
            <td><?= date("d/m/Y",strtotime($tarefa['data']))?></td>
            <td><?= $tarefa['hora']?></td>
            <?php
                $cod_tarefa = $tarefa['categoria_cod'];
                $sql = "SELECT * FROM categoria_tarefa WHERE cod = $cod_tarefa ";
                $result_cat = mysqli_query($con,$sql);
                $cat_tarefa = mysqli_fetch_array($result_cat);
            ?>
            <td><?=$cat_tarefa['nome']?></td>
            <td>
                <a href="editar_tarefa.php?cod=<?= $tarefa['codt']?>"><i class="">Editar</i></a>
                
                <?php
                    if($_SESSION['perfil']==1){
                 ?>

                <a href="db/excluir_tarefa.php?cod=<?= $tarefa['codt']?>"><i class="">Excluir</i></a>
                
                <?php }?>
            </td>
        </tr>
            <?php }?>
    </table>

</body>
</html>