<?php
session_start();
require("../controller/Conexao.php");
require("../controller/UsuarioDAO.php");
require("../controller/PermissaoDAO.php");

$usuario = new UsuarioDAO($mysql);
$permissao = new PermissaoDAO($mysql);
$id = $_SESSION["id"];
$exibe = $usuario->listById($id);
// USO DO OPERADOR <> NA BUSCA DE TODOS OS USUARIOS MENOS O QUE ESTÁ LOGADO
$exibe_adm = $usuario->listAll($id);
$exibe_permission = $permissao->listAll();
$id_permissao = $_SESSION["permissao"];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($id_permissao == 1) {
        $id_user = $_POST["id_user"];
        $id_permissao_select = $_POST["id_permissao"];
        $usuario->alterarUserAdm($id_user,$id_permissao_select);
        echo "<script>alert('Admin: Usuário alterado com sucesso!'); location = 'Home.php';</script>";
    } else {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $id = $_SESSION["id"];
        $usuario->alterarUser($id, $nome, $email, $senha);
        echo "<script>alert('Usuário alterado com sucesso!'); location = 'Home.php';</script>";
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
    <link rel="stylesheet" href="../view/css/edit_usuario.css">
</head>

<body>
    <a href="Home.php"><img src="../assets/volte.png"></a>
    <?php
    if ($id_permissao == 1) {
    ?>
        <h1>Usuários cadastrados no sistema</h1>
        <?php
        foreach ($exibe_adm as $result_adm) : ?>
            <div class="row-user">
                <div class="card-user">
                    <form method="post" action="Usuarios.php">
                        <label>
                            Nome: <?php echo $result_adm["nome"] ?>
                        </label>
                        <label>
                            Email: <?php echo $result_adm["email"] ?>
                        </label>
                        <label>
                            Permissão:
                            <select name="id_permissao" required>
                                <option value="" disabled selected><?php echo $result_adm["nome_permissao"] ?></option>
                                <?php
                                foreach ($exibe_permission as $permissoes) :
                                ?>
                                    <option value="<?php echo $permissoes["id"]; ?>"><?php echo $permissoes["nome"]; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </label>
                        <input type="hidden" name="id_user" value="<?php echo $result_adm["id"] ?>">
                        <input class="btn-cadastrar" type="submit" value="Alterar">
                    </form>
                </div>
            </div>
        <?php
        endforeach;
    } else {
        foreach ($exibe as $result) : ?>
            <div class="row">
                <div class="card">
                    <h1 class="comum">Edite aqui seus dados cadastrais!</h1>
                    <form method="post" action="Usuarios.php">
                        <label>
                            Nome:
                            <input type="text" name="nome" value="<?php echo $result["nome"] ?>" required>
                        </label>
                        <label>
                            Email:
                            <input type="email" name="email" value="<?php echo $result["email"] ?>" required>
                        </label>
                        <label>
                            Senha:
                            <input type="text" name="senha" minlength="6" value="<?php echo $result["senha"] ?>" required>
                        </label>
                        <input class="btn-cadastrar" type="submit" value="Alterar">
                    </form>
                </div>
            </div>
    <?php
        endforeach;
    }

    ?>
</body>

</html>