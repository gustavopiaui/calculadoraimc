<?php
require_once("conexao.php"); // sua conexão personalizada aqui

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_pessoa = $_POST["nome_pessoa"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    // Protegendo a senha com hash
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Comando SQL de inserção
    $inserir = "INSERT INTO usuario (nome_pessoa, login, senha) VALUES (?, ?, ?)";

    // Preparar e executar
    $stmt = mysqli_prepare($conecta, $inserir);
    mysqli_stmt_bind_param($stmt, "sss", $nome_pessoa, $login, $senhaHash);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color: green;'>Usuário inserido com sucesso!</p>";
    } else {
        echo "<p style='color: red;'>Erro ao inserir: " . mysqli_error($conecta) . "</p>";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
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
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"], button {
            background-color: #3498db;
            color: white;
            padding: 12px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #2980b9;
        }

        a button {
            width: auto;
            padding: 10px 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="" method="post">
        <label>Nome Pessoa:</label><br>
        <input type="text" name="nome_pessoa" required><br><br>

        <label>Login:</label><br>
        <input type="text" name="login" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <a href="index.php"><button>Voltar para Menu Principal</button></a> <br>      
</body>
</html>
