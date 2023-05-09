<?php
session_start();
require('Conexao.php');
require('ComentarioDAO.php');

$comentario = new ComentarioDAO($mysql);
$id_postagem = $_GET["id"];
var_dump($id_postagem);
$descricao = $_POST["descricao"];
if(empty($descricao)){
}else{
    $comentario->inserir($_SESSION["id"],$id_postagem,$descricao);
    echo "<script>alert('Comentario inserido com sucesso!'); location = '../view/Home.php';</script>";
}
?>