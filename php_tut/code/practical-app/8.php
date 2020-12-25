<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


		
	<article class="main-content col-xs-8">
	
	
	<?php  
		$var = "solarwinds123!";
		$encrypted_var = crypt($var, "h4x0r");
		echo $var . "<br>";
		echo $encrypted_var;
	?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php" ?>