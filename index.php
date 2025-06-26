<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Menu Principal</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 0;
      padding: 0;
    }

    header, footer {
      color: #0056b3;
      font-size: 18px;
      text-align: center;
      padding: 20px;
      background-color: #fff;
      width: 100%;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    h1, h3 {
      margin: 20px 0 10px 0;
      color: #333;
    }

    .container {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      width: 300px;
      margin-top: 20px;
      text-align: center;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    li {
      margin-bottom: 15px;
    }

    a {
      display: block;
      text-decoration: none;
      padding: 12px;
      border-radius: 8px;
      background-color: #28a745;
      color: white;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    a:hover {
      background-color: #218838;
    }

    footer {
      margin-top: auto;
    }
  </style>
</head>
<body>
  <header>
    UPIS - UNIÃO PIONEIRA DE INTEGRAÇÃO SOCIAL<br>
    Curso: Sistemas de Informação<br>
   
  </header>

  <h1>Menu Principal</h1>
  <div class="container">
    <h3>Menu dos Dados</h3>
    <ul>
      <li><a href="calcular.php">Calcular IMC</a></li>
      <li><a href="login.php">Consultar Dados</a></li>
    </ul>
  </div>

  <footer>
   
  </footer>
</body>
</html>
