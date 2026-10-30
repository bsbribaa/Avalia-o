<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f4f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 450px;
        }
        h2 {
            color: #3b2a4a;
            text-align: center;
            margin-bottom: 30px;
            font-size: 26px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s;
            background-color: #fff;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #5c3d75;
        }
        .gender-group {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-top: 5px;
        }
        .gender-option {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: normal;
            cursor: pointer;
        }
        .terms-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }
        .terms-group label {
            margin-bottom: 0;
            font-weight: normal;
            cursor: pointer;
        }
        button {
            width: 100%;
            padding: 14px;
            background-color: #4a335d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #3b2a4a;
        }
        .resultado {
            text-align: left;
        }
        .resultado h2 {
            text-align: center;
        }
        .resultado p {
            font-size: 15px;
            color: #444;
            margin: 10px 0;
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }
        .btn-voltar {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #4a335d;
            font-weight: 600;
            text-align: center;
            width: 100%;
        }
        .btn-voltar:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
        // Verifica se os dados foram enviados via POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $gender = $_POST['gender'] ?? 'Não especificado';
            $course = $_POST['course'] ?? '';
            $terms = isset($_POST['terms']) ? 'Sim' : 'Não';
            ?>
            <div class="resultado">
                <h2>Registration Details</h2>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Password:</strong> ******** (oculta por segurança)</p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
                <p><strong>Course:</strong> <?php echo htmlspecialchars($course); ?></p>
                <p><strong>Agreed to terms:</strong> <?php echo $terms; ?></p>
                
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn-voltar">← Register another student</a>
            </div>
            <?php
        } else {
            // Exibe o formulário original
            ?>
            <h2>Student Registration Form</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="gender-group">
                        <label class="gender-option">
                            <input type="radio" name="gender" value="Male" required> Male
                        </label>
                        <label class="gender-option">
                            <input type="radio" name="gender" value="Female" required> Female
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="course">Course</label>
                    <select id="course" name="course" required>
                        <option value="" disabled selected>Select your course</option>
                        <option value="Informática">Informática</option>
                        <option value="Engenharia">Engenharia</option>
                        <option value="Design">Design</option>
                        <option value="Administração">Administração</option>
                    </select>
                </div>

                <div class="terms-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to the terms and conditions</label>
                </div>

                <button type="submit">Register</button>
            </form>
            <?php
        }
        ?>
    </div>

</body>
</html>