<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="author" content="Edgar Sabido Cortés, Carlos A. Ruiz Domínguez,
		Alexis Rosaldo Pacheco, José Alberto Polanco Cervera" />
	<meta name="description" content="Lector Web de RSS feeds personalizable.
		Recopila la información de los sitios web en un entorno virtual organizado
		para que puedas seguir las noticias de tu blog o canal de noticias favorito.">
	<title>Lector de noticias RSS - Inicio</title>
	<link rel="canonical" href="http://localhost/Proyecto-OAW-develop/application_v3/original_version/public/index.php" />
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<link rel="apple-touch-icon" href="assets/favicon.ico" />
	<link href="css/styles.css" rel="stylesheet" />
	<link href="css/styles_front.css" rel="stylesheet" />
	<link href="css/pagination.css" rel="stylesheet" />
	<meta name="theme-color" content="#0d6efd" />
</head>

<body onload="getRssList();">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="index.php" onclick="query='';">Lector de noticias RSS</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
					<li class="nav-item"><a class="nav-link" href="views/feed.php">Añadir Feeds</a></li>
					<li class="nav-item"><a class="nav-link" href="views/about.php">Acerca de</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<header class="bg-dark py-5">
		<div class="container px-5">
			<div class="row gx-5 align-items-center justify-content-center">
				<div class="col-lg-8 col-xl-7 col-xxl-6">
					<div class="my-5 text-center text-xl-start">
						<h1 class="display-5 fw-bolder text-white mb-2">
							Lector de Noticias RSS
						</h1>
						<p class="lead fw-normal text-white-50 mb-4">
							Lector Web de RSS feeds personalizable. Recopila la información de los sitios web en un
							entorno virtual organizado para que puedas seguir las noticias de tu blog o canal de
							noticias favorito.
						</p>
						<div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
							<a class="btn btn-primary btn-lg px-4 me-sm-3" aria-label="Mostrar"
								onclick="getRssList();">Mostrar</a>
							<a class="btn btn-outline-light btn-lg px-4" aria-label="Actualizar"
								onclick="updateRssList();">Actualizar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="container my-5">
		<div class="row">
			<div class="col-lg-8">
				<div id="container" class="container row">
					<nav aria-label="Page navigation">
						<div class="data-container"></div>
						<div id="pagination-list" class="d-flex justify-content-center"></div>
					</nav>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card mb-4">
					<div class="card-header">Buscar</div>
					<div class="card-body">
						<div class="input-group">
							<input id="searchBox" class="form-control" type="text" placeholder="Busca noticias y más..." autofocus
								aria-label="Busca noticias y más..." aria-describedby="button-search"
								onKeyUp="if (event.key === 'Enter' && document.getElementById('searchBox').value !== '') { searchQuery(); }" />
							<button class="btn btn-primary" id="button-search" type="button" aria-label="Botón buscar"
								onclick="if (document.getElementById('searchBox').value !== '') {
									searchQuery();
								}">Buscar</button>
						</div>
					</div>
				</div>
				<div class="card mb-4">
					<div class="card-header">Ordenar Por:</div>
					<div class="card-body">
						<select id="sortSelect" class="form-select" onchange="sortBy()"
							aria-label="Selector de tipos de ordenamiento">
							<option value="1">Más reciente</option>
							<option value="2">Título (a-z)</option>
							<option value="3">Título (z-a)</option>
							<option value="4">Descripción (a-z)</option>
							<option value="5">Descripción (z-a)</option>
							<option value="6">Menos reciente</option>
						</select>
						<h6 class="m-3">Categorías:</h6>
						<div class="row" id="link-categories"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Optimización de Aplicaciones Web 2023.</p>
		</div>
	</footer>
	<script src="js/jquery.min.js"></script>
	<script src="js/pagination.min.js"></script>
	<script src="js/pagination.js"></script>
	<script src="js/index.js"></script>
</body>
</html>
