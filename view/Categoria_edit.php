<?php

require('../controller/Conexao.php');
require('../controller/CategoriaDAO.php');

$categoria = new CategoriaDAO($mysql);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria->editCategoria($_POST["id"], $_POST["nome"]);
    echo "<script>alert('Alterado com sucesso!'); location = 'Categoria_list.php';</script>";
    //header('location: Categoria_list.php');
} else {
    $id_categoria = $_GET["id"];

    $exibe = $categoria->listCategoriaId($id_categoria);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../assets/segredo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/list_categoria.css">
    <title>Fofocas</title>
</head>

<body>
    <a href="Categoria_list.php"><img src="../assets/volte.png"></a>
    <h1>Edite aqui sua Categoria!</h1>

    <?php
    foreach ($exibe as $resultado) : ?>
        <div class="row">
            <div class="card">
                <form method="post" action="Categoria_edit.php">
                    <input type="hidden" name="id" value="<?php echo $resultado["id"] ?>">
                    <input type="text" name="nome" value="<?php echo $resultado["nome"] ?>"><br><br>
                    <input class="btn-alterar" type="submit" value="Alterar">
                </form>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</body>

</html>