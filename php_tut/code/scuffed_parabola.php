<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$param1 = rand(-1, 10);
$param2 = rand(-1, 10);
$param3 = rand(1, 20);
function nextp($old_x) {
    return ($param1 * pow($old_x, 2)) + ($param2 * $old_x) + $param3;
}
$i = -20;
for ($i; $i <= 20; $i++) {
    $y = (int) ceil(nextp($i) / 10);
    $j = 1;
    for ($j; $j <= $y; $j++) echo "+";
    echo "<br>";
}

?>
</body>
</html>
