<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$param1 = rand(3, 6);
$param2 = rand(2, 5);
$param3 = rand(1, 20);
echo "Equation: " . $param1 . "x<sup>2</sup> + " . $param2 . "x + " . $param3 . "<br><hr><br>";
function nextp($old_x, $param1, $param2, $param3) {
    return ($param1 * pow($old_x, 2)) + ($param2 * $old_x) + $param3;
}
$i = -20;
for ($i; $i <= 20; $i++) {
    $y = (int) ceil(nextp($i, $param1, $param2, $param3) / 10);
    $j = 1;
    for ($j; $j <= $y; $j++) echo "█";
    echo "<br>";
}

?>
</body>
</html>
