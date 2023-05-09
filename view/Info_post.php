<?php
session_start();
require('../controller/PostagensDAO.php');
require('../controller/Conexao.php');
require('../controller/ComentarioDAO.php');
require('../controller/LikeDAO.php');

$postagens = new PostagensDAO($mysql);
$comentarios = new ComentarioDAO($mysql);
$likes = new LikeDAO($mysql);
$id_postagem = $_POST["id"];
$id_usuario = $_SESSION["id"];
$exibe = $postagens->listById($id_postagem);
$exibe_curtida = $likes->validaLike($_SESSION["id"], $id_postagem);
/* CRIEI UMA AUXILIAR PARA BUSCAR A INFORMAÇÃO VINDA DO BANCO DE DADOS
E POSTERIORMENTE VERIFICAR SE A MESMA É MAIOR OU MENOR QUE ZERO PARA ASSIM DIZER SE PRECISO OU NÃO FAZER O CADASTRO. 
O IF VERIFICA SE EXISTE UM LIKE, SE EXISTE ELE BUSCA A INFORMAÇÃO NO FOREACH */
$total_curtidas = $likes->numLike($id_postagem);
$aux_likes = "";
if ($total_curtidas == null) {
} else {
    foreach ($total_curtidas as $likes) :

        $aux_likes = $likes["curtidas"];

    endforeach;
}

$aux = "";
if ($exibe_curtida == null) {
} else {
    foreach ($exibe_curtida as $curtidas) :
        $aux = $curtidas["curtiu"];

    endforeach;
}
$exibe_comentario = $comentarios->listComentarioById($id_postagem);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Fofocas</title>
    <link rel="icon" type="image/x-icon" href="../assets/segredo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/info_posts.css">
</head>

<body>
    <a href="Home.php"><img src="../assets/volte.png"></a>
    <!--<div>
        Ícones feitos por
        <a href="https://www.flaticon.com/br/autores/handicon" title="Handicon"> Handicon </a>
        from
        <a href="https://www.flaticon.com/br/" title="Flaticon">www.flaticon.com'</a>
    </div>-->
    <?php
    foreach ($exibe as $resultado) : ?>
        <div class="row_posts">
            <div class="card_posts">
                <form action="../controller/Comentar.php?id=<?php echo $resultado["id"]; ?>" method="post">
                    <h2 id="h_posts_titulo"><?php echo $resultado["titulo"]; ?></h2>
                    <h3 id="h_posts"><?php echo $resultado["descricao"]; ?></h3>
                    <h4 id="h_posts"><?php echo $resultado["autor"]; ?></h4>
                    <h5 id="h_posts"><?php echo $resultado["categoria"]; ?></h5>
                    <label>Comente aqui:
                        <input class="input-desc" type="text" name="descricao" required>
                        <button class="btn-enviar" type="submit">Comentar</button>
                    </label>
                </form>
                <?php
                if ($aux < 0) {
                ?>
                    <form class="likes" action="../controller/Like.php">
                        <input type="hidden" name="acao" value="1">
                        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id"]; ?>">
                        <input type="hidden" name="id_postagem" value="<?php echo $id_postagem; ?>">
                        <input class="btn-like" type="submit" value="Curtir">
                    </form>
                    <span class="n-curtidas">Nº curtidas <?php echo $aux_likes; ?></span>
                <?php
                } else {
                ?>
                    <?php
                    if ($aux == 1) {
                    ?>
                        <form class="likes" action="../controller/Like.php">
                            <input type="hidden" name="acao" value="0">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id"]; ?>">
                            <input type="hidden" name="id_postagem" value="<?php echo $id_postagem; ?>">
                            <input class="btn-like" type="submit" value="Descurtir">
                        </form>
                    <?php
                    } else {
                    ?>
                        <form class="likes" action="../controller/Like.php">
                            <input type="hidden" name="acao" value="1">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id"]; ?>">
                            <input type="hidden" name="id_postagem" value="<?php echo $id_postagem; ?>">
                            <input class="btn-like" type="submit" value="Curtir">
                        </form>
                    <?php
                    }
                    ?>
                    <span class="n-curtidas">Nº curtidas <?php echo $aux_likes; ?></span>
                <?php
                }

                ?>
            </div>
        </div>
    <?php
    endforeach;
    foreach ($exibe_comentario as $resultados) : ?>
        <div class="row">
            <div class="card">
                <h4 id="hs">Autor: <?php echo $resultados["nome"]; ?></h4>
                <h5 id="hs"><?php echo $resultados["descricao"]; ?></h5>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</body>

</html>