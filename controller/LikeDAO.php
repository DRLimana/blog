<?php

class LikeDAO
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    function numLike($id_postagem){
        $sql= "SELECT COUNT(*) as curtidas FROM likes WHERE id_postagem='$id_postagem' and curtiu=true";
        $resultado = $this->mysql->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    /* faz uma consulta no banco e retorna um valor, se aux maior que zero ele pega e altera a curtida pra true ou false
    caso contrario ele insere*/
    function inserirLike($id_usuario, $id_postagem, $acao)
    {
        $sql = $this->mysql->query("SELECT * FROM likes WHERE id_usuario = '$id_usuario' AND id_postagem = '$id_postagem'");
        $aux = mysqli_num_rows($sql);
        if ($aux > 0) {
            $this->alterarLike($id_usuario,$id_postagem, $acao);
        } else {
            $result = $this->mysql->prepare("INSERT INTO likes (id_usuario, id_postagem, curtiu) 
            VALUES ('" . $id_usuario . "', '" . $id_postagem . "', '" . $acao . "')");
            $result->execute();
        }
    }
    function validaLike($id_usuario, $id_postagem)
    {
        $sql = $this->mysql->query("SELECT * FROM likes WHERE id_usuario = '$id_usuario' AND id_postagem = '$id_postagem'");
        $aux = mysqli_num_rows($sql);
        if ($aux > 0) {
            $result = $this->mysql->query("SELECT curtiu FROM likes WHERE id_usuario = '$id_usuario' AND id_postagem = '$id_postagem'");
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }


    function alterarLike($id_usuario, $id_postagem, $id_acao)
    {
        $result = $this->mysql->prepare("UPDATE likes SET curtiu='" . $id_acao . "' 
        WHERE id_usuario='" . $id_usuario . "' AND id_postagem='" . $id_postagem . "'");
        $result->execute();
    }
}
