<!DOCTYPE html>

<html>

<head>
	<title>Logic_3</title>
</head>

<body>

	<form action = '' method="POST">
		Заказать пиццу за 500 рублей? 
		<button name="cost" value='500'>Да!</button>
	</form>

	Сможете купить пиццу, не имея денег?

	<?php 

		if (isset($_POST['cost'])) {
			if ($_POST['cost'] <= 0) {
				echo "YMiG{Nice_trying}";
			}
		}
	?>

</body>

</html>