<?php

class ComentarioDAO
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    function inserir($id_usuario, $id_postagem, $descricao)
    {
        $comentario = $this->mysql->prepare("INSERT INTO comentarios (id_usuario, id_postagem, descricao) VALUES ('" . $id_usuario . "', '" . $id_postagem . "','" . $descricao . "')");
        $comentario->execute();
    }

    function listComentarioById($id)
    {
        $sql = "SELECT c.descricao, u.nome as nome
        FROM comentarios c, usuario u
        WHERE c.id_usuario = u.id  AND c.id_postagem ='" . $id . "'";
        $resultado = $this->mysql->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    function listComentariosByUser($id){
        $resultado = $this->mysql->query("SELECT p.titulo as titulo, c.descricao as descricao
        FROM comentarios c, postagem p
        WHERE c.id_postagem = p.id AND c.id_usuario='$id'");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
