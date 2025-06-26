<?php
require_once("../conexao/conexao.php");

// Verifica se o código foi passado pela URL
if (isset($_GET["codigo"])) {
    $codigo = $_GET["codigo"];

    // Consulta SQL para buscar os dados
    $consulta = "SELECT * FROM dados WHERE codDados = ?";
    $stmt = mysqli_prepare($conecta, $consulta);
    mysqli_stmt_bind_param($stmt, "s", $codigo);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $dados = mysqli_fetch_assoc($resultado);
    } else {
        die("Registro não encontrado.");
    }

    mysqli_stmt_close($stmt);
} else {
    // Se não houver código, redireciona ou mostra erro
    die("Código não informado.");
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Pessoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 30px;
        }
        header, footer {
            text-align: center;
            font-size: 18px;
            color: #2c3e50;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .detalhes {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .detalhes p {
            margin: 12px 0;
            font-size: 16px;
        }
        .botao {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<header>
    <strong>Detalhes da Pessoa</strong><br><br>
</header>

<h1>Informações</h1>

<div class="detalhes">
    <p><strong>Código:</strong> <?= htmlspecialchars($dados["codDados"]) ?></p>
    <p><strong>Nome:</strong> <?= htmlspecialchars($dados["nome"]) ?></p>
    <p><strong>Altura:</strong> <?= htmlspecialchars($dados["altura"]) ?> m</p>
    <p><strong>Cintura:</strong> <?= htmlspecialchars($dados["cintura"]) ?> cm</p>
    <p><strong>IMC:</strong> <?= is_null($dados["imc"]) ? "Não calculado" : htmlspecialchars($dados["imc"]) ?></p>

    <div class="botao">
        <a href="consulta.php"><button>Voltar para Lista</button></a>
    </div>
</div>

<footer>
   
</footer>
</body>
</html>
<?php
mysqli_close($conecta);
?>
