<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

#y = 4x^2-2x+35
function nextp($old_x) {
    return (4 * pow($old_x, 2)) + (-2 * $old_x) + 35;
}
$i = -25;
for ($i; $i <= 25; $i++) {
    $y = (int) ceil(nextp($i) / 10);
    $j = 1;
    for ($j; $j <= $y; $j++) echo "+";
    echo "<br>";
}

?>
</body>
</html>
