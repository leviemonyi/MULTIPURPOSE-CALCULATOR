<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST['num1']) ? floatval($_POST['num1']) : 0;
    $num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
    $operation = $_POST['operation'];
    $result = "";
    
    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            $result = ($num2 != 0) ? $num1 / $num2 : "Error: Division by zero";
            break;
        case "exponentiation":
            $result = pow($num1, $num2);
            break;
        case "percentage":
            $result = ($num1 / 100) * $num2;
            break;
        case "sqrt":
            $result = ($num1 >= 0) ? sqrt($num1) : "Error: Negative number";
            break;
        case "log":
            $result = ($num1 > 0) ? log($num1) : "Error: Logarithm of non-positive number";
            break;
        default:
            $result = "Invalid operation";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
</head>
<body>
    <h2>Multipurpose Calculator</h2>
    <form method="post" action="">
        <input type="number" step="any" name="num1" placeholder="Enter first number" required>
        <input type="number" step="any" name="num2" placeholder="Enter second number (if applicable)">
        <select name="operation" required>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
            <option value="exponentiation">Exponentiation</option>
            <option value="percentage">Percentage</option>
            <option value="sqrt">Square Root (Only first number)</option>
            <option value="log">Logarithm (Only first number)</option>
        </select>
        <button type="submit">Calculate</button>
    </form>
    
    <?php if (isset($result)) { ?>
        <h3>Result: <?php echo htmlspecialchars($result); ?></h3>
    <?php } ?>
</body>
</html>
