<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Pizza!</title>
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
            width: 420px;
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
        }
        input[type="text"], select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
            height: 80px;
        }
        .radio-group, .checkbox-group {
            margin-bottom: 15px;
        }
        .radio-group label, .checkbox-group label {
            font-weight: normal;
            display: inline;
            margin-left: 5px;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        button, input[type="reset"] {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        button[type="submit"] {
            background-color: #2c2c2c;
            color: white;
        }
        button[type="submit"]:hover {
            background-color: #444;
        }
        input[type="reset"] {
            background-color: #ddd;
            color: #333;
        }
        input[type="reset"]:hover {
            background-color: #ccc;
        }
        .summary {
            background-color: #e2f0d9;
            border: 1px solid #c8e6c9;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #385723;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Order pizza!</h2>

    <?php
    // Verifica se o formulário foi enviado via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados com segurança básica
        $size = htmlspecialchars($_POST['size'] ?? 'Não especificado');
        $crust = htmlspecialchars($_POST['crust'] ?? 'Não especificado');
        $fillers = isset($_POST['fillers']) ? implode(", ", $_POST['fillers']) : 'Nenhum';
        $name = htmlspecialchars($_POST['name'] ?? '');
        $phone = htmlspecialchars($_POST['phone'] ?? '');
        $message = htmlspecialchars($_POST['message'] ?? '');

        // Exibe o resumo do pedido
        echo "<div class='summary'>";
        echo "<h3>Resumo do Pedido</h3>";
        echo "<p><strong>Nome:</strong> $name</p>";
        echo "<p><strong>Telefone:</strong> $phone</p>";
        echo "<p><strong>Tamanho:</strong> $size</p>";
        echo "<p><strong>Tipo de Massa (Crust):</strong> $crust</p>";
        echo "<p><strong>Ingredientes (Fillers):</strong> $fillers</p>";
        echo "<p><strong>Mensagem:</strong> $message</p>";
        echo "</div>";
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>Select the pizza size:</label>
            <div class="radio-group">
                <input type="radio" id="big" name="size" value="Big" required>
                <label for="big">Big</label><br>
                <input type="radio" id="medium" name="size" value="Medium">
                <label for="medium">Medium</label><br>
                <input type="radio" id="small" name="size" value="Small">
                <label for="small">Small</label>
            </div>
        </div>

        <div class="form-group">
            <label for="crust">Select the crust type:</label>
            <select id="crust" name="crust">
                <option value="Deep Dish">Deep Dish</option>
                <option value="Thin Crust">Thin Crust</option>
                <option value="Stuffed Crust">Stuffed Crust</option>
            </select>
        </div>

        <div class="form-group">
            <label>Select the filler:</label>
            <div class="checkbox-group">
                <input type="checkbox" id="sausages" name="fillers[]" value="Sausages">
                <label for="sausages">Sausages</label><br>
                <input type="checkbox" id="pepper" name="fillers[]" value="Pepper">
                <label for="pepper">Pepper</label><br>
                <input type="checkbox" id="mushrooms" name="fillers[]" value="Mushrooms">
                <label for="mushrooms">Mushrooms</label>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea>
        </div>

        <div class="buttons">
            <button type="submit">Send</button>
            <input type="reset" value="Reset">
        </div>
    </form>
</div>

</body>
</html>