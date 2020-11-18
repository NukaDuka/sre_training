<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

	<aside class="col-xs-4">

		<?php Navigation();?>


	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">


	<?php


	function add($num1, $num2) {
		return $num1 + $num2;
	}

	function slow_multiply($num1, $num2) {
		if ($num2 == 0) return 0;
		if ($num2 == 1) return $num1;
		$sum_ = 0;
		$num = 0;
		for ($num; $num < $num2; $num++) {
			$sum = add($sum, $num1);
		}
		return $sum;
	}

	echo slow_multiply(1, 0);
	echo slow_multiply(10, 1);
	echo slow_multiply(45, 2);
	echo slow_multiply(34, 34);

?>





</article><!--MAIN CONTENT-->


<?php include "includes/footer.php" ?>