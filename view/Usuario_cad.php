<?php
session_start();
require('../controller/Conexao.php');
require('../controller/UsuarioDAO.php');


// INSERÇÃO DA FUNCAO INSERIR UM NOVO USUARIO NO BASE DE DADOS \/ \/ \/
$usuario = new UsuarioDAO($mysql);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $usuario->inserir($nome,$email,$senha);
    echo "<script>alert('Inserido com sucesso!'); location = 'Home.php';</script>";
}

// ATÉ AQUI /\ /\ /\
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../assets/segredo.png">
    <title>Fofocas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/cad_usuario.css">
</head>

<body>
    <div class="row">
        <div class="card">
            <h1>Cadastre-se aqui</h1>
            <form class="formulario" method="post" action="Usuario_cad.php">
                <label>Nome:
                <input type="text" name="nome" required></label>
                <label>Email:
                <input type="email" name="email" required></label>
                <label>Senha:
                <input type="password" name="senha" required></label>
                <button class="btn-cadastrar" type="submit" title="Cadastrar"><span><span>Cadastrar</span></span></button>
                <a class="btn-voltar" href="Login.php">Voltar</a>
            </form>
        </div>
    </div>
</body>

</html>