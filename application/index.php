<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>RSS Reader</title>
		<script type="text/javascript">
			const loadPhp = (url) => {
				// Se instancia un objeto del tipo XMLHttpRequest:
				const xmlhttp = new XMLHttpRequest();

				// Parámetros de la petición:
				const method = "POST";
				const async = true;

				// Se inicializa la petición al servidor:
				xmlhttp.open(method, url, async);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				// Se ejecuta cuando la propiedad readyState se modifica:
				xmlhttp.onreadystatechange = () => {
					if (
						xmlhttp.readyState === XMLHttpRequest.DONE &&
						xmlhttp.status === 200
					) {
						// Se valida que se haya obtenido una respuesta y el código HTTP sea 200 'OK':
						document.getElementById("container").innerHTML = xmlhttp.responseText;
					}
				};

				// Se ejecuta cuando se recibe la petición hecha al servidor:
				xmlhttp.onload = () => {
					if (xmlhttp.status >= 400) {
						console.error(
							`Error ${xmlhttp.status}`
						);
						document.getElementById(
							"container"
						).innerHTML = `<h1 align="center">ERROR ${xmlhttp.status}</h1>`;
					}
				};

				// Se envía la petición al servidor:
				xmlhttp.send(`feedurl=${document.getElementById('feedurl').value}`);
			};
	</script>
	</head>
	<body>
		<div class="content" action="">
			<form method="POST">
				<input type="text" id="feedurl" name="feedurl" placeholder="Enter website feed URL">&nbsp;
				<input type="button" value="Submit" name="submitButton" onclick="loadPhp('controllers/rss_storage.php')">
				<input type="button" value="Show" name="show" onclick="loadPhp('controllers/rss_reader.php')">
			</form>
		</div>
		<div id="container" class="container">
		</div>
	</body>
</html>
