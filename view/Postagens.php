<?php
session_start();
require('../controller/Conexao.php');
require('../controller/PostagensDAO.php');
require('../controller/CategoriaDAO.php');

$postagem = new PostagensDAO($mysql);
$categoria = new CategoriaDAO($mysql);
$exibe = $categoria->listAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $data = $_POST["data"];
    $data_formatada = date('Y-m-d', strtotime($data));
    $id_categoria = $_POST["id_categoria"];
    $postagem->inserirPost($titulo, $descricao, $data_formatada, $_SESSION["id"], $id_categoria);
    echo "<script>alert('Postagem inserida com sucesso!'); location = 'Home.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../assets/segredo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/cad_postagens.css">
    <title>Fofocas</title>
</head>

<body>
    <a href="Home.php"><img src="../assets/volte.png"></a>
    <div class="row">
        <div class="card">
            <h1>Cadastro de Postagens</h1>
            <form class="formulario" action="Postagens.php" method="post">
                <label>
                    Titulo:
                    <input type="text" name="titulo" maxlength="255" required><br>
                </label>
                <label>
                    Descrição:
                    <input type="text" name="descricao" maxlength="255" required><br>
                </label>
                <label>
                    Data:
                    <input type="date" name="data" placeholder="YYYY-MM-DD" required><br>
                </label>
                <label>
                    Selecione a categoria:
                    <select name="id_categoria" required>
                        <option value="" disabled selected>Categorias</option>
                        <?php
                        foreach ($exibe as $categorias) :
                        ?>
                            <option value="<?php echo $categorias["id"]; ?>"><?php echo $categorias["nome"]; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </label>    
                <input class="btn-cadastrar" type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
</body>

</html>