<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5 - Aprovado ou Reprovado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #111;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
            font-size: 14px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #2c2c2c;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #444;
        }
        .result-approved {
            background-color: #e2f0d9;
            border: 1px solid #c8e6c9;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #385723;
        }
        .result-reproved {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Avaliação do Aluno</h2>

    <?php
    // Verifica se o formulário foi enviado via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados digitados
        $nome = htmlspecialchars($_POST['nome'] ?? '');
        $media = floatval($_POST['media'] ?? 0);

        // Toma a decisão com base na média (maior ou igual a 6)
        if ($media >= 6.0) {
            echo "<div class='result-approved'>";
            echo "<h3>Resultado</h3>";
            echo "<p><strong>Aluno(a):</strong> $nome</p>";
            echo "<p><strong>Média Final:</strong> $media</p>";
            echo "<p><strong>Situação:</strong> APROVADO</p>";
            echo "</div>";
        } else {
            echo "<div class='result-approved' style='background-color: #f8d7da; border-color: #f5c6cb; color: #721c24;'>";
            echo "<h3>Resultado</h3>";
            echo "<p><strong>Aluno(a):</strong> $nome</p>";
            echo "<p><strong>Média Final:</strong> $media</p>";
            echo "<p><strong>Situação:</strong> REPROVADO</p>";
            echo "</div>";
        }
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="nome">Nome do Aluno:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome" required>
        </div>

        <div class="form-group">
            <label for="media">Média Final:</label>
            <input type="number" step="0.1" min="0" max="10" id="media" name="media" placeholder="Ex: 6.5" required>
        </div>

        <button type="submit">Verificar Situação</button>
    </form>
</div>

</body>
</html>