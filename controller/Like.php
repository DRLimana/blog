<?php
session_start();
require('Conexao.php');
require('LikeDAO.php');

$like = new LikeDAO($mysql);
$id_postagem = $_GET["id_postagem"];
$id_usuario = $_GET["id_usuario"];
$id_acao = $_GET["acao"];
var_dump($id_usuario,$id_postagem,$id_acao);
if($id_acao == 1){
    $like->inserirLike($id_usuario,$id_postagem, $id_acao);
    header('Location: ../view/Home.php');
}else if($id_acao == 0){
    $like->alterarLike($id_usuario, $id_postagem, $id_acao);
    header('Location: ../view/Home.php');
}
?>