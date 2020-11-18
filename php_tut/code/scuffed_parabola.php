<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

function nextp($old_x) {
    return (rand(-1, 10) * pow($old_x, 2)) + (rand(-1, 10) * $old_x) + rand(1, 20);
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
