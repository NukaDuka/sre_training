<?php include "functions.php" ?>
<?php include "includes/header.php" ?>
	<section class="content">

		<aside class="col-xs-4">
		<?php Navigation();?>


		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">


	<?php
		echo rand(1, 10);
		echo strtoupper("i am very calm right now and i'm not screaming");
		echo in_array(1, [2, 3, 4]);
?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php" ?>