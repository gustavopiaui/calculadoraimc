<?php
require_once("conexao.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    // Buscar usuário pelo login
    $query = "SELECT nome_pessoa, login, senha FROM usuario WHERE login = ?";
    $stmt = mysqli_prepare($conecta, $query);
    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado && mysqli_num_rows($resultado) === 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        if (password_verify($senha, $usuario["senha"])) {
            // Sessão iniciada com sucesso
            $_SESSION["usuario_login"] = $usuario["login"];
            $_SESSION["usuario_nome"] = $usuario["nome_pessoa"];

            // Redireciona para a página de consulta
            header("Location: consulta.php");
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"], button {
            background-color: #3498db;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #2980b9;
        }

        .erro {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        .voltar {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Login de Usuário</h2>

        <?php if (!empty($erro)) : ?>
            <p class="erro"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <input type="submit" value="Entrar">

        <div class="voltar">
            <a href="index.php"><button type="button">Voltar para Menu Principal</button></a>
        </div>
    </form>
</body>
</html>
