<!DOCTYPE html>

<html>

<head>
	<title>Logic_4</title>
	<meta charset="utf-8">
</head>

<body>

	<?php 
		session_start(); 

		if (isset($_SESSION['p_count']) or isset($_SESSION['s_count'])) {
			echo "";
		} else {
			$_SESSION['p_count'] = 0;
			$_SESSION['s_count'] = 0;			
		}

	?>

	<form action = '' method="POST">
		Заказать пиццу за 500 рублей? 
		<button name="pizza_count" value='1'>Да!</button>
		<br>
		Заказать шаурму за 100 рублей?
		<button name="shaurma_count" value='1'>Да!</button>
	</form>

	Сможете купить пиццу, не имея денег?

	<?php 

		if (isset($_POST['pizza_count'])) {
			$_SESSION['p_count'] = $_SESSION['p_count'] + $_POST['pizza_count'];
		}

		if (isset($_POST['shaurma_count'])) {
			$_SESSION['s_count'] = $_SESSION['s_count'] + $_POST['shaurma_count'];
		}

		echo "<br><br>Ваш заказ: " . $_SESSION['p_count'] . ' пицц и ' . $_SESSION['s_count'] . ' шаверм<br>';

		$price = $_SESSION['p_count'] * 500 + $_SESSION['s_count'] * 100;

		if ($price < 0) { 
			echo "Жулик, не ломай!<br>";
			$_SESSION['p_count'] = 0;
			$_SESSION['s_count'] = 0;
			$price = 0;
			sleep(5);
		}

		echo "<br><br>Ваш заказ: " . $_SESSION['p_count'] . ' пицц и ' . $_SESSION['s_count'] . ' шаверм<br>';
		echo "<br>";
		echo "Итого: " . strval($price);

		if ($price == 0 and ($_SESSION['p_count'] != 0 and $_SESSION['s_count'] != 0)) {
			echo "YMiG{Obmani_menya_esli_ne_mosheh}";
		}
	?>

</body>

</html>