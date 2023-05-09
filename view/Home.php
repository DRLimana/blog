<?php
session_start();
//ta vindo todos graças a deus
//var_dump($_SESSION);
require('../controller/PostagensDAO.php');
require('../controller/Conexao.php');

if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    echo "<script>alert('Você não está logado!'); location = 'Login.php';</script>";
}
$postagens = new PostagensDAO($mysql);
$total_linhas = $postagens->listNumAll();

//PAGINAÇÃO
$registro_por_pagina = 2;
$total_paginas = ceil($total_linhas / $registro_por_pagina);
$pagina_atual = isset($_GET['pagina']) ? $_GET["pagina"] : 1;
$registro_inicial = ($pagina_atual - 1) * $registro_por_pagina;
$registro_final = $registro_inicial + $registro_por_pagina - 1;
$exibe_limitado = $postagens->limitResult($registro_inicial, $registro_por_pagina);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Fofocas</title>
    <link rel="icon" type="image/x-icon" href="../assets/segredo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/home.css">
</head>

<body>
    <nav class="inicio">
        <div class="home-page">

            <a href="Postagens.php">Postagens</a>
            <?php
            if (!isset($_SESSION['id']) || !isset($_SESSION['email'])) {
            ?>
                <a href="Login.php">Logar</a>
                <?php
            } else {
                if ($_SESSION["permissao"] == 1) { ?>
                    <!--AQUI PERMISSOES DE ADMINISTRADOR DISPONIVEIS-->
                    <a href="Categoria.php">Categorias</a>
                    <a href="Usuarios.php">Permissões</a>
                <?php
                } else {
                ?>
                    <a href="Comentarios.php">Comentarios</a>
                    <a href="Usuarios.php">Alterar Cadastro</a>
                <?php
                }
                ?>
                <a href="../controller/Saida.php">Sair</a>

            <?php
            }
            ?>
        </div>
    </nav>
    <?php
    foreach ($exibe_limitado as $resultado) : ?>
        <div class="row">
            <div class="card">
                <form method="post" action="../view/Info_post.php">
                    <h1 class="hs"><?php echo $resultado["titulo"]; ?></h1>
                    <h3 class="hs"><?php
                                    $data_formatada = date('d-m-Y', strtotime($resultado["data"]));
                                    echo $data_formatada;
                                    ?></h3>
                    <input class="btn-ver" type="submit" value="Veja Mais"><br>
                    <input type="hidden" name="id" value="<?php echo $resultado["id"] ?>">
                </form>
            </div>
        </div>
    <?php
    endforeach; ?>
    <div class="paginacao">
    <?php
    for ($pagina = 1; $pagina <= $total_paginas; $pagina++) {
    ?>
        <a class="links-paginacao" href="?pagina=<?php echo $pagina; ?>"><?php echo $pagina; ?></a>
    <?php
    }?>
    </div>
</body>

</html>