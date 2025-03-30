<?php
// collatz.php

function collatzSequence($n) {
    $sequence = [$n];
    $maxValue = $n;
    $count = 0;
    while ($n != 1) {
        if ($n % 2 == 0) {
            $n /= 2;
        } else {
            $n = 3 * $n + 1;
        }
        $sequence[] = $n;
        $maxValue = max($maxValue, $n);
        $count++;
    }
    return [$sequence, $maxValue, $count];
}

function collatzRange($start, $finish) {
    $results = [];
    for ($num = $start; $num <= $finish; $num++) {
        list($_, $maxValue, $count) = collatzSequence($num);
        $results[] = [$num, $maxValue, $count];
    }
    
    usort($results, function($a, $b) { return $b[2] - $a[2]; });
    $maxIterations = $results[0];
    $minIterations = end($results);
    
    usort($results, function($a, $b) { return $b[1] - $a[1]; });
    $highestValue = $results[0];
    
    return [$results, $maxIterations, $minIterations, $highestValue];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Collatz Conjecture</title>
</head>
<body>
    <h2>Collatz Conjecture Calculator</h2>
    <form action="" method="post">
        <label for="start">Start Number:</label>
        <input type="number" id="start" name="start" required>
        <br><br>
        <label for="finish">End Number:</label>
        <input type="number" id="finish" name="finish" required>
        <br><br>
        <input type="submit" value="Calculate">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = intval($_POST['start']);
    $finish = intval($_POST['finish']);
    
    if ($start > 0 && $finish >= $start) {
        list($results, $maxIterations, $minIterations, $highestValue) = collatzRange($start, $finish);
        
        echo "<h2>Collatz Conjecture Results ($start to $finish)</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Number</th><th>Max Value</th><th>Iterations</th></tr>";
        foreach ($results as $result) {
            echo "<tr><td>{$result[0]}</td><td>{$result[1]}</td><td>{$result[2]}</td></tr>";
        }
        echo "</table>";
        
        echo "<h3>Special Numbers:</h3>";
        echo "<p><strong>Max Iterations:</strong> Number {$maxIterations[0]} with {$maxIterations[2]} iterations.</p>";
        echo "<p><strong>Min Iterations:</strong> Number {$minIterations[0]} with {$minIterations[2]} iterations.</p>";
        echo "<p><strong>Highest Value:</strong> Number {$highestValue[0]} reached {$highestValue[1]}.</p>";
    } else {
        echo "<p>Please enter a valid range (positive numbers, start <= finish).</p>";
    }
}
?>
</body>
</html>