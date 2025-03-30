<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Page</title>
</head>
<body>
<?php
class Collatz {
    protected const MULTIPLIER = 3;
    protected const INCREMENT = 1;

    protected function sequence($num) {
        if ($num <= 0) {
            echo "Please enter a positive integer";
            return;
        }
        
        $iterations = 0;
        while ($num != 1) {
            $iterations++;
            if ($num % 2 == 0) {
                $num = $num / 2;
            } else {
                $num = $num * self::MULTIPLIER + self::INCREMENT;
            }
        }
        return $iterations;
    }
}

class CollatzAnalyzer extends Collatz {
    private array $histogram = [];

    public function generateHistogram(int $start, int $end): void {
        if ($start <= 0 || $end <= 0 || $start > $end) {
            echo "Invalid range. Please enter positive integers with start <= end.";
            return;
        }
        
        echo "<br>Collatz Iteration Histogram for interval [$start, $end]:<br>";
        echo "<br>Nb: Number in brackets represents the number of iterations.<br>";
        
        for ($i = $start; $i <= $end; $i++) {
            $iterations = $this->sequence($i);
            $this->histogram[$i] = $iterations;
        }
        $this->displayHistogram();
    }

    private function displayHistogram(): void {
        foreach ($this->histogram as $num => $iterations) {
            echo "$num: " . str_repeat("-", $iterations) . " ($iterations)<br>";
        }
    }
}

$analyzer = new CollatzAnalyzer();
$analyzer->generateHistogram(3, 18);
?>


</body>
</html>