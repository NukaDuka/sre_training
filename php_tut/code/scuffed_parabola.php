<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

#y = 3x^2+2x+1
function nextp($old_x) {
    return (3 * pow($old_x, 2)) + (2 * $old_x) + 1;
}
$i = -10;
for ($i; $i <= 10; $i++) {
    echo "x: " . $i . ", y: " . nextp($i) / 10 . "<br>";
}

?>
</body>
</html>
