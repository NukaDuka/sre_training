<?php include "functions.php" ?>
<?php include "includes/header.php" ?>
	<section class="content">

		<aside class="col-xs-4">
		<?php Navigation();?>


		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">


	<?php
		echo rand(1, 10) . "<br>";
		echo strtoupper("i am very calm right now and i'm not screaming") . "<br>";
		if (in_array(1, [2, 3, 4])) {
			echo "in array<br>";
		}
		else {
			echo "not in array<br>";
		}
?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php" ?>