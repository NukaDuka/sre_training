<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>

	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php

	if (1 > 2) {
		echo "1 GREATER THAN 2? HOW???";
	}
	elseif (3 >= 4) {
		echo "3 GREATER THAN/EQUAL TO 4???? IMPOSSIBLE!";
	}
	else {
		echo "<h1>I love PHP</h1>";
		echo "<h6>kapp</h6>";
	}

	for ($i = 1; $i < 10; $i++) {
		echo $i . "<br>";
	}

	$number = 10;
	switch ($number) {
		case 0:
			echo "The number is 0";
			break;
		case 10:
			echo "The number is 10";
		default:
			echo "Bottom text";
			break;
	}

?>






</article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>