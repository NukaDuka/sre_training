<?php include "functions.php" ?>
<?php include "includes/header.php" ?>



	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


			<article class="main-content col-xs-8">
			
		
	<a href="?clicked=1">Click Here!</a>
	<?php 
	print_r($_SESSION);
	if (isset($_GET['clicked'])) echo 'Bonk!';
	setcookie('cookie', 'this lasts a week', 604800);
	session_start();
	$_SESSION['ping'] = 'pong';
	
	?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php" ?>