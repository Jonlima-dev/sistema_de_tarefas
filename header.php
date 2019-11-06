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
    <nav>
    <div class="">
      <h3 style="position: center">EQUIPE C, INTEGRANTES Jonas, Ricellyo, Rafael<br></h3>
    <a href="home.php" class="" style="text-decoration: none">SISTEMA DE COMPROMISSO: </a>
      <ul id="" class="">
        <li ><a>Olá, <?= $_SESSION['nome']?> que deseja fazer?</a></li>
        <li><a href="cadastro_tarefa.php" style="text-decoration: none">Casdastrar Compromisso</a></li>
        <li><a href="home.php" style="text-decoration: none">Listar Compromissos</a></li>
        <li><a href="db/sair.php" style="text-decoration: none">Sair</a></li>
      </ul>
    </div>
  </nav>
  
</body>
</html>