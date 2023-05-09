<?php
session_start();
require('../controller/Conexao.php');
require('../controller/ComentarioDAO.php');

$comentario = new ComentarioDAO($mysql);
$exibe = $comentario->listComentariosByUser($_SESSION["id"]);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../assets/segredo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/comentarios.css">
    <title>Fofocas</title>
</head>

<body>
    <a href="Home.php"><img src="../assets/volte.png"></a>
    <nav>
        <h1>Veja aqui seus comentários!</h1>
        <?php
        if($exibe == null){
            ?>
            <label class="no-coment">Você ainda não fez nenhum comentário!</label>
            <?php
        }
        foreach ($exibe as $aux) : ?>
            <div class="card">
                <div class="row">
                    <label>
                        <b>Título da postagem: </b>
                        <?php echo $aux["titulo"] ?>
                    </label><br><br>
                    <label>
                        <b>Comentário feito: </b>
                        <?php echo $aux["descricao"] ?>
                    </label>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </nav>
</body>

</html>