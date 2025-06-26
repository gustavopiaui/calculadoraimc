<?php
require_once("../conexao/conexao.php");

// Consulta SQL
$consultaDados = "SELECT codDados, nome FROM dados";

// Executa a consulta
$dados = mysqli_query($conecta, $consultaDados);

// Verifica erro na consulta
if (!$dados) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conecta));
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Des. WEB</title>
    <style>
        header, footer {
            color: blue;
            font-size: 18px;
            text-align: center;
        }
        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
        }
        .voltar {
            text-align: center;
            margin-top: 30px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<header>
    
    <br><br>
</header>

<h1>Relação de Pessoas</h1>

<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
    </tr>
    <?php
    // Exibe os dados com segurança
    while ($registro = mysqli_fetch_assoc($dados)) {
        $cod = htmlspecialchars($registro['codDados']);
        $nome = htmlspecialchars($registro['nome']);

        echo '<tr>';
        echo "<td><a href='detalhe.php?codigo={$cod}'>{$cod}</a></td>";
        echo "<td>{$nome}</td>";
        echo '</tr>';
    }
    ?>
</table>

<div class="voltar">
    <a href="index.php"><button>Voltar para Menu Principal</button></a>
</div>

<footer>
   
</footer>
</body>
</html>
<?php
// Libera resultado e fecha conexão
mysqli_free_result($dados);
mysqli_close($conecta);
?>
