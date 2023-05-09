<?php
session_start();
require('../controller/Conexao.php');
require('../controller/UsuarioDAO.php');

$usuario = new UsuarioDAO($mysql);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    // ta vindo os dois!
    //var_dump($email, $senha);
    if (empty($email) || empty($senha)) {
        echo "<script>alert('Campos não preenchidos corretamente!'); location = '../view/Login.php';</script>";
    } else if ($usuario->login($email, $senha)) {
        $result = $usuario->login($email, $senha);
        $nome = $result["nome"];
        $_SESSION['id'] = $result['id'];
        $_SESSION['nome'] = $result['nome'];
        $_SESSION['email'] = $result["email"];
        $_SESSION['senha'] = $result["senha"];
        $_SESSION['permissao'] = $result["id_permissao"];
        echo "<script>alert('Bem vindo $nome!'); location = '../view/Home.php';</script>";
    } else {
        echo "<script>alert('Usuário ou senha incorreto! Tente novamente.'); location = '../view/Login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Fofocas</title>
    <link rel="icon" type="image/x-icon" href="../assets/segredo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/logar.css">
</head>

<body>
    <div class="row">
        <div class="card">
            <h1>Bem vindo ao Fofocas.com</h1>
            <form class="formulario" method="post" action="Login.php">
                <label>Email: <input type="email" name="email" required> &nbsp; <br></label>
                <label>Senha: <input type="password" name="senha" required></label>
                <input class="btn-enviar" type="submit" name="botao" value="Logar">
                <a class="btn-link" href="Usuario_cad.php">Cadastrar-se</a>
            </form>
        </div>
    </div>

</body>

</html>