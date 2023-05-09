<?php

class UsuarioDAO{

    private $mysql;

    function __construct($mysql){
        $this->mysql = $mysql;
    }

    function inserir($nome, $email, $senha){
        $usuario = $this->mysql->prepare("INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')");
        $usuario->execute();

    }
    function listAll($id){
        $usuario = $this->mysql->query("SELECT u.id as id, u.nome as nome, u.email as email, p.nome as nome_permissao
        FROM usuario u, permissao p
        WHERE p.id = u.id_permissao AND u.id <> $id");
        return $usuario->fetch_all(MYSQLI_ASSOC);
    }
    function listById($id){
        $usuario = $this->mysql->query("SELECT * FROM usuario WHERE id='$id'");
        return $usuario->fetch_all(MYSQLI_ASSOC);
    }
    function alterarUserAdm($id_usuario,$id_permissao){
        $usuario = $this->mysql->prepare("UPDATE usuario
        SET id_permissao='".$id_permissao."'
        WHERE id='".$id_usuario."'");
        $usuario->execute();

    }
    function alterarUser($id_usuario, $nome, $email, $senha){
        $usuario = $this->mysql->prepare("UPDATE usuario
        SET nome='".$nome."', email='".$email."', senha='".$senha."'
        WHERE id='".$id_usuario."'");
        $usuario->execute();

    }

    function login($email, $senha){
        $usuario = $this->mysql->query("SELECT * FROM usuario WHERE email= '$email' AND senha= '$senha'");
        $result= mysqli_num_rows($usuario);
        if($result){
            $dados = mysqli_fetch_array($usuario);
            return $dados;
        }
    }
}
?>