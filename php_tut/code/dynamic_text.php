<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIN $1000000 HERE!</title>
    <?php
        function sample_text(int $number) {
            echo $number . " Sample text <br>";
        }
    ?>
</head>
<body>
    <?php
        # xD so funni epic rickroll!!!!1!!1
        // -_-
        $title = "<a href=\"https://www.youtube.com/watch?v=dQw4w9WgXcQ\">Hello, world!</a>";
        $bottom = "Bottom";
        $text = "Text";
        $top = ['top' => 'Top', 'text' => 'Text'];
        $i = 1;
        for ($i = 1; $i < 11; $i++) {
            sample_text($i);
        }
    ?>
    <h3><?php echo $top['top'] . " " . $top['text']?></h3>
    <h1><?php echo $title; ?></h1>
    <hr>
    <h3><?php echo $bottom . " " . $text; ?></h3>
</body>
</html>
