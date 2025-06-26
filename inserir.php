<?php
require_once("../conexao/conexao.php");

if (isset($_POST["codDados"])) {
    // CAPTURAR DADOS ENVIADOS PELO FORMULÁRIO
    $codDtor = $_POST["codDados"];
    $nome = $_POST["nome"];
    $altura = $_POST["altura"];
    $cintura = $_POST["cintura"];
    $imc = $_POST["imc"] === 'null' ? null : (float)$_POST["imc"];

    // MONTAR SQL PARA INSERÇÃO
    $inserir = "INSERT INTO dados (codDados, nome, altura, cintura, imc) VALUES (";
    $inserir .= "'$codDtor', '$nome', '$altura', '$cintura', ";
    $inserir .= ($imc === null ? "NULL" : "'$imc'") . ")";

    // EXECUTAR QUERY
    $operacaoInsercao = mysqli_query($conecta, $inserir);
    if (!$operacaoInsercao) {
        die("Falha na inserção! Erro: " . mysqli_error($conecta));
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>DesWeb</title>
<style>
header, footer {
    color: #1e3a8a; /* Azul mais elegante */
    font-size: 18px;
    text-align: center;
    font-weight: 600;
    padding: 10px 0;
    background: #e0e7ff;
    border-radius: 6px;
    margin-bottom: 15px;
}

h1 {
    text-align: center;
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 30px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

main div#formulario {
    width: 320px;
    margin: 50px auto 40px;
    background: #fff;
    padding: 30px 25px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

main div#formulario form input[type="text"] {
    width: 100%;
    padding: 12px 15px;
    border: 1.8px solid #c2b68f;
    border-radius: 8px;
    outline: none;
    margin-bottom: 20px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    box-sizing: border-box;
}

main div#formulario form input[type="text"]:focus {
    border-color: #6a82fb;
    box-shadow: 0 0 8px rgba(106,130,251,0.5);
}

main div#formulario form input[type="submit"] {
    display: block;
    padding: 12px 0;
    margin-top: 10px;
    color: #fff;
    background-color: #6a82fb;
    border: none;
    border-radius: 8px;
    outline: none;
    cursor: pointer;
    font-size: 17px;
    font-weight: 600;
    width: 100%;
    box-shadow: 0 6px 15px rgba(106,130,251,0.5);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

main div#formulario form input[type="submit"]:hover {
    background-color: #fc5c7d;
    box-shadow: 0 8px 20px rgba(252,92,125,0.6);
}

a button {
    background-color: #6a82fb;
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    margin: 10px 10px 20px 10px;
    transition: background-color 0.3s ease;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

a button:hover {
    background-color: #fc5c7d;
}

</style>
<link href="_css/estilo.css" rel="stylesheet">
</head>
<body>
<header>
   
   <br><br>
</header>
<h1> Inserção de Atores </h1>
<main>
<div id="formulario">
    <form action="inserir.php" method="post">
        <input type="text" name="codDados" placeholder="Código da Pessoa" required>
        <input type="text" name="nome" placeholder="Nome da Pessoa" required>
        <input type="text" name="altura" placeholder="Altura (em metros)" required>
        <input type="text" name="cintura" placeholder="Cintura (em cm)" required>
        <input type="text" name="imc" placeholder="IMC (ou null se não tiver calculado)">
        <input type="submit" value="Inserir">
    </form>
</div>
</main>
<a href="inserir2.php"><button>Continuar</button></a> <br>
<a href="index.php"><button>Voltar para Menu Principal</button></a> <br>
<footer>
   
</footer>
</body>
</html>
<?php
// Fechar conexao
mysqli_close($conecta);
?>
