<?php 

$servidor   = "localhost";
$senha      = "Foda8452@Vagalumes";
$usuario    = "root"; 
$banco      = "tarefasdiarias";
$site       = "localhost/projetoPHP/";

$con = mysqli_connect($servidor,$usuario,$senha,$banco);

//Check concetion 

if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
}

mysqli_select_db($con,$banco);

?>