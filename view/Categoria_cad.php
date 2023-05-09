<?php
session_start();
require('../controller/Conexao.php');
require('../controller/CategoriaDAO.php');


// INSERÇÃO DA FUNCAO INSERIR UMA NOVA CATEGORIA NO BASE DE DADOS \/ \/ \/
$categoria = new CategoriaDAO($mysql);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome"];
    $categoria->inserir($nome);
    echo "<script>alert('Inserido com sucesso!'); location = 'Categoria.php';</script>";
}

// ATÉ AQUI /\ /\ /\
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../assets/segredo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <title>Fofocas</title>
    <link rel="stylesheet" href="../view/css/cad_categoria.css">
</head>

<body>
    <a href="Categoria.php"><img src="../assets/volte.png"></a>
    <div class="row">
        <div class="card">
            <h1>Cadastre aqui!</h1>
            <form class="formulario" method="post" action="Categoria_cad.php">
                <label>Nome:
                    <input type="text" name="nome" required></label>
                <button class="btn-cadastrar" type="submit" title="Cadastrar"><span><span>Cadastrar</span></span></button>
            </form>
        </div>
    </div>
</body>

</html>