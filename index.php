<html>
<body>

    <form action="index.php" method="post">
        Enter Number 1: <input type="text" name="num1"><br>
        Enter Number 2: <input type="text" name="num2"><br>
        <select name="operation">
            <option value="">Select</option>
            <option value="add">Add</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
        </select><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>


<?php  
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = "";

        if(is_numeric($num1) && is_numeric($num2)) {
            switch($operation) {
                case "add" :
                    $result = $num1 + $num2;
                    echo "Result: " . $result;
                    break;
                case "subtract" :
                    $result = $num1 - $num2;
                    echo "Result: " . $result;
                    break;
                case "multiply" :
                    $result = $num1 * $num2;
                    echo "Result: " . $result;
                    break;
                case "divide" :
                    if($num2 != 0) {
                        $result = $num1 / $num2;
                        echo "Result: " . $result;
                        break;
                    } else {
                        echo "Error: Division by zero is not allowed.";
                        break;
                    }
                case "" :
                    echo "Error: No operation selected.";
                    break;
            }
        }
    }
?>