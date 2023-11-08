<!DOCTYPE html>

<html>

<head>
	<title>Guess_1</title>
	<meta charset="utf-8">
</head>

<body>
	<p>Новая лотерея!!! Только счастливый человек получит билет с номером 898989890 !!!</p>

	<?php

		if ( isset($_GET['ticket']) ) {
			echo "Ваш билет - " . $_GET['ticket'];
			if ($_GET['ticket'] == "898989890") { 
				echo "<br>Вы счастливчик!!!! Флаг - YMiG{GET^}";
			}
		}

	?>
</body>

</html>