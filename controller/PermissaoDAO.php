<?php
class PermissaoDAO{
    private $mysql;

    public function __construct(mysqli $mysql){
        $this->mysql = $mysql;
    }

    function listAll(){
        $permissoes = $this->mysql->query("SELECT * FROM permissao");
        return $permissoes->fetch_all(MYSQLI_ASSOC);
    }
}
