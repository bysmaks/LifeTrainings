
<!DOCTYPE html>

<html>

<head>

	<title></title>

</head>

<body>

	<?php

		if (isset($_POST['login']) and isset($_POST['button'])) {
			if ($_POST['button'] == "Вход") { echo "Flag - YMiG{HTML_DISABLED?}"; }
		}

	?>

</body>

</html>