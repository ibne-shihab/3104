<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
    <style>
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 align="Center">Electricity Bill Calculator</h1>
    <form class="center" method="post" action="">
        Enter the number of units: <input type="text" name="units" id="units" required><br>
        <br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $units = $_POST['units'];
        $totalAmount = 0;
        if ($units <= 50) {
            $totalAmount = $units * 3.50;
        } elseif ($units <= 100) {
            $totalAmount = 50 * 3.50 + ($units - 50) * 4.00;
        } elseif ($units <= 200) {
            $totalAmount = 50 * 3.50 + 50 * 4.00 + ($units - 100) * 5.20;
        } else {
            $totalAmount = 50 * 3.50 + 50 * 4.00 + 100 * 5.20 + ($units - 200) * 6.50;
        }

        echo "<br><br><div class='center'>Total Amount: " . $totalAmount ." Taka.  </div>";
    }
    ?>
</body>
</html>
