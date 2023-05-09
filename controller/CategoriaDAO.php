<?php
class CategoriaDAO{
    private $mysql;

    public function __construct(mysqli $mysql){
        $this->mysql = $mysql;
    }

    // FUNÇÃO INSERIR UMA NOVA CATEGORIA NA BASE DE DADOS
    function inserir($nome)
    {
        $categoria = $this->mysql->prepare("INSERT INTO categoria (nome) VALUES('". $nome ."')");
        $categoria->execute();
    }

    function listAll(){
        $list_categoria = $this->mysql->query("SELECT * FROM categoria");
        return $list_categoria->fetch_all(MYSQLI_ASSOC);
    }

    function listCategoriaId($id){
        $list_categoria = $this->mysql->query("SELECT * FROM categoria WHERE id='".$id."'");
        return $list_categoria->fetch_all(MYSQLI_ASSOC);
    }

    function editCategoria($id, $nome){
        $edit_categoria = $this->mysql->prepare("UPDATE categoria SET nome='".$nome."' WHERE id='".$id."'");
        $edit_categoria->execute();
    }

    function deleteCategoria($id){
        $delete_categoria = $this->mysql->prepare("DELETE FROM categoria WHERE id='".$id."'");
        $delete_categoria->execute();
    }
}