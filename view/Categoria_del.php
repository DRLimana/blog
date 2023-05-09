<?php

require('../controller/Conexao.php');
require('../controller/CategoriaDAO.php');


//CONFLITO!! 
$categoria = new CategoriaDAO($mysql);
/*if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $id_categoria = $_POST["id_categoria"];
    $categoria->deleteCategoria($id_categoria);
    echo "<script>alert('Excluído com sucesso!'); location = 'Categoria_del.php';</script>";
} else {
}*/
$exibe = $categoria->listAll();
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
    <a href="Categoria.php"><img src="../assets/volte.png"></a>
    <h1>Categorias cadastradas no Sistema!</h1>
    <h2>Caso queira deletar algum registro é so clicar em algum!</h2>
    <?php
    foreach ($exibe as $resultado) : ?>
        <div class="row">
            <div class="card">
                <a name="id" href="../view/Categoria_del.php?id=<?php echo $resultado["id"]; ?>"><?php echo $resultado["nome"]; ?></a>
            </div>
        </div>
    <?php
    endforeach;
    ?>

</body>

</html>