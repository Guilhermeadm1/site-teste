<?php
$host = "localhost";
$database = "golpe";
$usuario = "root";
$senha = "";

$sql = new mysqli($host, $usuario, $senha, $database);
if ($sql->connect_errno) {
    echo "falha ao conectar";
}else{
    echo"conexao foi um sucesso";
}
?>
