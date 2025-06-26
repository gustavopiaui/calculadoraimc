<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculadora de IMC</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      width: 320px;
      text-align: center;
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: bold;
      text-align: left;
    }

    input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    button {
      padding: 10px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
      width: 100%;
    }

    button:hover {
      background-color: #218838;
    }

    #resultado {
      margin-top: 20px;
      font-size: 1.1em;
      color: #333;
    }

    .link-botao {
      margin-top: 20px;
      display: block;
      text-decoration: none;
    }

    .link-botao button {
      background-color: #3498db;
    }

    .link-botao button:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Calculadora de IMC</h1>
    <form id="imcForm">
      <label for="peso">Peso (kg):</label>
      <input type="number" id="peso" required />

      <label for="altura">Altura (m):</label>
      <input type="number" id="altura" step="0.01" required />

      <button type="submit">Calcular</button>
    </form>

    <div id="resultado"></div>

    <a class="link-botao" href="inserir.php"><button type="button">Inserir Dados</button></a>
  </div>

  <script>
    document.getElementById('imcForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const peso = parseFloat(document.getElementById('peso').value);
      const altura = parseFloat(document.getElementById('altura').value);

      if (peso > 0 && altura > 0) {
        const imc = peso / (altura * altura);
        let classificacao = '';

        if (imc < 18.5) {
          classificacao = 'Abaixo do peso';
        } else if (imc < 25) {
          classificacao = 'Peso normal';
        } else if (imc < 30) {
          classificacao = 'Sobrepeso';
        } else {
          classificacao = 'Obesidade';
        }

        document.getElementById('resultado').innerText =
          `Seu IMC é ${imc.toFixed(2)} - ${classificacao}`;
      } else {
        document.getElementById('resultado').innerText = 'Por favor, preencha os campos corretamente.';
      }
    });
  </script>
</body>
</html>
