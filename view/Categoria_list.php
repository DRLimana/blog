<?php

require('../controller/Conexao.php');
require('../controller/CategoriaDAO.php');

$categoria = new CategoriaDAO($mysql);
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
    <h1>Caso queira fazer a alteração dos mesmos clique em algum!</h1>
    <?php
    foreach ($exibe as $resultado) : ?>
        <div class="row">
            <div class="card">
                <a href="../view/Categoria_edit.php?id=<?php echo $resultado["id"]; ?>"><?php echo $resultado["nome"]; ?></a>
            </div>
        </div>
    <?php
    endforeach;
    ?>

</body>

</html>