
<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>

		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	<form action="6.php" method="post">
		<input type="text" name="inp" id="inp">
		<input type="submit" value="sub">
	</form>
	<?php
		if (isset($_POST['inp'])) {
			echo $_POST['inp'];
		}
	?>


</article><!--MAIN CONTENT-->
<?php include "includes/footer.php" ?>