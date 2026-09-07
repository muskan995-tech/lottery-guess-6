<!DOCTYPE html>
<html>
<head>
    <title>Lottery Result</title>
</head>
<body>

<h2>Lottery Number Checker</h2>

<form method="post">

    Enter Six Numbers:<br><br>

    <input type="number" name="num[]" required>
    <input type="number" name="num[]" required>
    <input type="number" name="num[]" required>
    <input type="number" name="num[]" required>
    <input type="number" name="num[]" required>
    <input type="number" name="num[]" required>

    <br><br>

    <input type="submit" name="submit" value="Check Lottery">

</form>

<?php

if (isset($_POST['submit'])) {

    // User entered numbers
    $userNumbers = $_POST['num'];

    // Generate six unique lottery numbers
    $lotteryNumbers = [];

    while (count($lotteryNumbers) < 6) {

        $number = rand(1, 49);

        if (!in_array($number, $lotteryNumbers)) {
            $lotteryNumbers[] = $number;
        }
    }

    // Compare the numbers
    $matchedNumbers = array_intersect(
        $userNumbers,
        $lotteryNumbers
    );

    echo "<h2>Lottery Result</h2>";

    echo "<b>Generated Numbers:</b><br>";
    echo implode(", ", $lotteryNumbers);

    echo "<br><br>";

    echo "<b>User Numbers:</b><br>";
    echo implode(", ", $userNumbers);

    echo "<br><br>";

    echo "<b>Matched Numbers:</b><br>";

    if (count($matchedNumbers) > 0) {
        echo implode(", ", $matchedNumbers);
    } else {
        echo "No match";
    }

    echo "<br><br>";

    echo "<b>Total Matches:</b> ";
    echo count($matchedNumbers);
}

?>

</body>
</html>