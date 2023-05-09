<?php

class PostagensDAO
{

  private $mysql;

  public function __construct(mysqli $mysql)
  {
    $this->mysql = $mysql;
  }

  function inserirPost($titulo, $descricao, $data, $id_usuario, $id_categoria)
  {
    $post = $this->mysql->prepare("INSERT INTO postagem (titulo, descricao, data, id_usuario, id_categoria) 
    VALUES ('$titulo', '$descricao', '$data', '$id_usuario', '$id_categoria')");
    $post->execute();
  }

  function listAll()
  {
    $sql = "SELECT p.id, titulo, descricao, data, u.nome as autor, c.nome as categoria  
      FROM postagem p, usuario u, categoria c
      WHERE p.id_usuario = u.id and p.id_categoria = c.id";
    $resultado = $this->mysql->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
  }

  function listById($id)
  {
    $sql = "SELECT p.id, titulo, descricao, data, u.nome as autor, c.nome as categoria  
    FROM postagem p, usuario u, categoria c
    WHERE p.id_usuario = u.id AND p.id_categoria = c.id AND p.id='" . $id . "'";
    $resultado = $this->mysql->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
  }

  function listNumAll()
  {
    $sql = "SELECT p.id, titulo, descricao, data, u.nome as autor, c.nome as categoria  
      FROM postagem p, usuario u, categoria c
      WHERE p.id_usuario = u.id and p.id_categoria = c.id";
    $result = $this->mysql->query($sql);
    $total_linhas = mysqli_num_rows($result);
    return $total_linhas;
  }

  function limitResult($registro_inicial, $registro_por_pagina)
  {
    $sql = "SELECT p.id, titulo, descricao, data, u.nome as autor, c.nome as categoria  
      FROM postagem p, usuario u, categoria c
      WHERE p.id_usuario = u.id and p.id_categoria = c.id
      ORDER BY p.data DESC
      LIMIT $registro_inicial, $registro_por_pagina";
    $result = $this->mysql->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}
