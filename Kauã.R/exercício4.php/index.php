<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee Details</title>
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
            width: 450px;
        }
        h2 {
            text-align: left;
            margin-bottom: 20px;
            color: #111;
            font-size: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        label {
            width: 130px;
            font-weight: bold;
            color: #333;
            font-size: 14px;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            color: #555;
        }
        input::placeholder {
            color: #aaa;
        }
        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            padding-left: 130px;
        }
        button, input[type="reset"] {
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            color: white;
        }
        button[type="submit"] {
            background-color: #337ab7;
        }
        button[type="submit"]:hover {
            background-color: #286090;
        }
        input[type="reset"] {
            background-color: #d9534f;
        }
        input[type="reset"]:hover {
            background-color: #c9302c;
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
    <h2>Add Employee Details</h2>

    <?php
    // Verifica se o formulário foi submetido via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados com segurança básica
        $empNo = htmlspecialchars($_POST['empno'] ?? '');
        $empName = htmlspecialchars($_POST['empname'] ?? '');
        $department = htmlspecialchars($_POST['department'] ?? '');
        $designation = htmlspecialchars($_POST['designation'] ?? '');
        $hiredDate = htmlspecialchars($_POST['hireddate'] ?? '');
        
        // Converte e formata o salário com duas casas decimais usando number_format()
        $rawSalary = floatval($_POST['salary'] ?? 0);
        $salary = number_format($rawSalary, 2, ',', '.');

        // Exibe os dados do funcionário formatados
        echo "<div class='summary'>";
        echo "<h3>Funcionário Cadastrado com Sucesso!</h3>";
        echo "<p><strong>Employee No:</strong> $empNo</p>";
        echo "<p><strong>Employee Name:</strong> $empName</p>";
        echo "<p><strong>Department:</strong> $department</p>";
        echo "<p><strong>Designation:</strong> $designation</p>";
        echo "<p><strong>Hired Date:</strong> $hiredDate</p>";
        echo "<p><strong>Salary:</strong> R$ $salary</p>";
        echo "</div>";
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="empno">Employee No</label>
            <input type="text" id="empno" name="empno" placeholder="employeeno" required>
        </div>

        <div class="form-group">
            <label for="empname">Employee Name</label>
            <input type="text" id="empname" name="empname" placeholder="employeename" required>
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <select id="department" name="department" required>
                <option value="">-SELECT-</option>
                <option value="IT">IT</option>
                <option value="HR">HR</option>
                <option value="Finance">Finance</option>
                <option value="Marketing">Marketing</option>
            </select>
        </div>

        <div class="form-group">
            <label for="designation">Designation</label>
            <select id="designation" name="designation" required>
                <option value="">-SELECT-</option>
                <option value="Manager">Manager</option>
                <option value="Developer">Developer</option>
                <option value="Analyst">Analyst</option>
                <option value="Assistant">Assistant</option>
            </select>
        </div>

        <div class="form-group">
            <label for="hireddate">Hired Date</label>
            <input type="date" id="hireddate" name="hireddate" required>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" step="0.01" id="salary" name="salary" placeholder="salary" required>
        </div>

        <div class="buttons">
            <button type="submit">Insert</button>
            <input type="reset" value="Cancel">
        </div>
    </form>
</div>

</body>
</html>