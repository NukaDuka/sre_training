<?php include "functions.php" ?>
<?php include "includes/header.php" ?>
<section class="content">

	<aside class="col-xs-4">

		<?php Navigation();?>
			
			
	</aside><!--SIDEBAR-->

<article class="main-content col-xs-8">

	
	<?php  
	
	interface Animal 
	{
		public function ShowAll();
	}

	class Dog implements Animal
	{
		private $name;
		private $eye_color;
		private $type;
		private $fur_color;

		function __construct($name, $eye_color, $type, $fur_color) 
		{
			$this->name = $name;
			$this->eye_color = $eye_color;
			$this->type = $type;
			$this->fur_color = $fur_color;
		}

		function __destruct()
		{
			echo "<hr><div style=\"color:red\"><b><i>apology for poor english<br>where were you when " . $this->name . " the " . $this->type . " dies?<br>i was at home eating Maggi 2-Minute Noodles Masala, 70g (Pack of 12) when pjotr ring<br>'" . $this->name . " is kill'<br>'no'</b></i></div>";
		}

		public function ShowAll()
		{
			echo "Dog details:<br>Dog name: " . $this->name . "<br>Dog eye color: " . $this->eye_color . "<br>Dog type: " . $this->type . "<br>Dog fur color: " . $this->fur_color . "<br>";
		}
	}
	
	$pitbull = new Dog("Buster", "Brown", "Pitbull", "Light Gray");
	$pitbull->ShowAll();
	unset($pitbull);
	
	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>