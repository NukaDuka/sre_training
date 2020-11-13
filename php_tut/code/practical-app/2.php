<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

		<aside class="col-xs-4">

	<?php Navigation();?>


		</aside><!--SIDEBAR-->


		<article class="main-content col-xs-8">



		<?php

			$number1 = 10;
			$number2 = 20;
			echo $number1 + $number2;
			echo "<br>";
			$name1 = ['yeetus', 'deletus'];
			$name2 = ['first_name' => 'yeetus', 'last_name' => 'deletus'];
			print_r($name1);
			echo "<br>";
			print_r($name2);
			echo "<br>";

			define('LANGUAGE', 'PHP');
			echo LANGUAGE;
		?>



		</article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>
