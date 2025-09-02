<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINI CALCULATOR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="calculator">
    <h2>Mini Calculator</h2>
     <!-- input of the first and second number -->
    <form method="post">
      <input type="number" step="any" name="num1" placeholder="Enter first number" required><br>
      <input type="number" step="any" name="num2" placeholder="Enter second number" required><br>

    <!-- The operation buttons -->
      <div class="buttons">
        <button type="submit" name="operation" value="add">Addition</button>
        <button type="submit" name="operation" value="sub">Subtraction</button>
        <button type="submit" name="operation" value="mul">Multiplication</button>
        <button type="submit" name="operation" value="div">Division</button>
      </div>
    </form>

    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $num1 = $_POST["num1"];
          $num2 = $_POST["num2"];
          $operation = $_POST["operation"];
          $result = "";

          switch ($operation) {
              case "add":
                  $result = $num1 + $num2;
                  break;
              case "sub":
                  $result = $num1 - $num2;
                  break;
              case "mul":
                  $result = $num1 * $num2;
                  break;
              case "div":
                  if ($num2 != 0) {
                      $result = $num1 / $num2;
                  } else {
                      $result = "Error: Division by zero!";
                  }
                  break;
          }

          if (is_numeric($result)) {
              $result = round($result, 2);
          }
          // show reult button
          echo "<div class='result'>Result: <strong>$result</strong></div>";
      }
    ?>
  </div>
</body>
</html>