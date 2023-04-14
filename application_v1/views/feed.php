<!DOCTYPE html>
<html lang="es-MX">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Lector de noticias RSS - Feeds</title>
		<!-- Favicon-->
		<link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
		<!-- Core theme CSS (includes Bootstrap)-->
		<link href="../css/styles.css" rel="stylesheet" />
		<link href="../css/styles_front.css" rel="stylesheet" />
		<script type="text/javascript">
			function show(id) {
				document.getElementById(id).style.display = 'block';
			}
			function hide(id) {
				document.getElementById(id).style.display = 'none';
			}
			function successload(id) {
				setTimeout(function() { hide(id); }, 5000);
				setTimeout(function() { show('success'); }, 5000);
				setTimeout(function() { hide('success'); }, 7000);
			}
			function failload(id) {
				setTimeout(function() { hide(id); }, 5000);
				setTimeout(function() { show('danger'); }, 5000);
				setTimeout(function() { hide('danger'); }, 7000);

			}
			function loadFile (url) {
				// Se instancia un objeto del tipo XMLHttpRequest:
				const xmlhttp = new XMLHttpRequest();

				// Parámetros de la petición:
				const method = "POST";
				const async = true;

				// Se inicializa la petición al servidor:
				xmlhttp.open(method, url, async);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				// Se ejecuta cuando la propiedad readyState se modifica:
				xmlhttp.onreadystatechange = function () {
					if (
						xmlhttp.readyState === XMLHttpRequest.DONE &&
						xmlhttp.status === 200
					) {
						// Se valida que se haya obtenido una respuesta y el código HTTP sea 200 'OK':
						successload("loading");
					}
				};

				// Se ejecuta cuando se recibe la petición hecha al servidor:
				xmlhttp.onload = function () {
					if (xmlhttp.status >= 400) {
						console.error(
							`Error ${xmlhttp.status}`
						);
						document.getElementById(
							"container"
						).innerHTML = `<h1 align="center">ERROR ${xmlhttp.status}</h1>`;
						failload("loading");
					}
				};

				// Se envía la petición al servidor:
				xmlhttp.send(`feedurl=${document.getElementById('textArea').value}`);
			};
		</script>
	</head>
	<body>
		<!-- Responsive navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
						<a class="navbar-brand" href="../index.php">Lector de noticias RSS</a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
						data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
										<li class="nav-item"><a class="nav-link" href="../index.php">Inicio</a></li>
										<li class="nav-item"><a class="nav-link active" aria-current="page" href="feed.php">Añadir Feeds</a></li>
				<li class="nav-item"><a class="nav-link" href="about.php">Acerca de</a></li>
								</ul>
						</div>
				</div>
		</nav>
		<!-- Header-->
		<header class="py-5">
			<div class="container px-5">
				<div class="row justify-content-center">
					<div class="col-lg-8 col-xxl-6">
						<div class="my-5 text-white">
							<h1 class="fw-bolder text-center mb-3">Lector de Noticias RSS</h1>
							<p class="lead text-center fw-normal mb-4">
								Añade tus portales favoritos de información para estar siempre informado en esta sección
							</p>
							<ol class="lead fw-normal mb-4">
								<li>Ingresa la URL del Feed que deseas añadir a la base de datos en la caja de texto.</li>
								<li>Guarda los Feeds que hayas ingresado con el botón de guardado y disfruta de estar informado.</li>
								<li>Si ya no te interesan más tus Feeds pueden ser eliminados con el botón de "Borrar".</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</header>
		<section class="py-5 bg-light">
			<div class="container px-5 my-5">
				<div class="text-center">
					<h2 class="fw-bolder">Añadir Feeds</h2>
				</div>
				<!-- Side widget-->
				<div class="card mb-4">
					<div class="card-body">Ingresa la URL del Feed que deseas añadir.
						<div class="input-group align-items-center justify-content-center">
							<form class="col-12" method='POST'>
								<!-- Blog entries -->
								<div class="d-flex justify-content-center">
									<div id="loading" class="spinner-border" role="status">
										<span class="sr-only"></span>
									</div>
									<div id="success" class="spinner-grow text-success" role="status">
										<span class="sr-only"></span>
									</div>
									<div id="danger" class="spinner-grow text-danger" role="status">
										<span class="sr-only"></span>
									</div>
								</div>
								<!-- Message input-->
								<div class="form-floating m-3">
									<textarea id="textArea" name="textArea" class="form-control form-control-height"
									type="text" placeholder="Ingresar Sitio..."></textarea>
									<label for="Ingresar Sitio">Ingresar Sitios</label>
								</div>
								<!-- Submit Button-->
								<div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
									<button class="btn btn-primary" id="button-delete" type="button"
									onclick="loadFile('../controllers/rss_delete.php');
									show('loading');">Borrar</button>
									<button class="btn btn-primary" id="button-upload" type="button"
									onclick="loadFile('../controllers/rss_upload.php');
									show('loading');">Guardar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Footer-->
		<footer class="py-5 bg-dark">
				<div class="container"><p class="m-0 text-center text-white">Optimización de Aplicaciones Web 2023.</p></div>
		</footer>
	</body>
</html>
