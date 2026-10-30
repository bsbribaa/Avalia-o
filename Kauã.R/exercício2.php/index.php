<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get in Touch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            margin-bottom: 25px;
            color: #111;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #2c2c2c;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #444;
        }
        .confirmation {
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
    <h2>Get in Touch</h2>

    <?php
    // Verifica se o formulário foi enviado via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados usando $_POST e aplica segurança básica
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $message = htmlspecialchars($_POST['message']);

        // Exibe a mensagem de confirmação solicitada no exercício
        echo "<div class='confirmation'>";
        echo "<h3>Mensagem Enviada com Sucesso!</h3>";
        echo "<p><strong>Nome:</strong> $name</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Telefone:</strong> $phone</p>";
        echo "<p><strong>Mensagem:</strong> $message</p>";
        echo "</div>";
    }
    ?>

    <!-- O formulário envia os dados para a mesma página usando POST -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Your Phone</label>
            <input type="text" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>