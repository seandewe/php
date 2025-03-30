<!DOCTYPE html>
<html>
<head>
    <title>Collatz Conjecture</title>
</head>
<body>
    <h2>Collatz Conjecture Calculator</h2>
    <form action="collatz.php" method="post">
        <label for="start">Start Number:</label>
        <input type="number" id="start" name="start" required>
        <br><br>
        <label for="finish">End Number:</label>
        <input type="number" id="finish" name="finish" required>
        <br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
