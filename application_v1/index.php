<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lector de noticias RSS - Inicio</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/styles_front.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Lector de noticias RSS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="views/feed.php">Añadir Feeds</a></li>
                        <li class="nav-item"><a class="nav-link" href="views/about.php">Acerca de</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">
                                Lector de Noticias RSS
                            </h1>
                            <p class="lead fw-normal text-white-50 mb-4">
                                Lector Web de RSS feeds personalizable. Recopila la información de los sitios web en un entorno virtual organizado para que puedas seguir las noticias de tu blog o canal de noticias favorito.
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" onclick="loadPhp('controllers/rss_reader.php')">Mostrar</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="">Actualizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container my-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Nested row for non-featured blog posts-->
                    <div id="container" class="container row"></div>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Buscar</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input id="searchBox" class="form-control" type="text" placeholder="Busca noticias y más..." aria-label="Busca noticias y más..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button" onclick="loadPhp('controllers/rss_search.php')">¡Listo!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Ordenar Por:</div>
                        <div class="card-body">
                            <select class="form-select" aria-label="Default select">
                                <option value="1">Fecha</option>
                                <option value="2">Título</option>
                                <option value="3">Descripción</option>
                            </select>
                            <h6 class="m-3">Categorias:</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Optimización de Aplicaciones Web 2023.</p></div>
        </footer>
    </body>
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
            xmlhttp.send(`searchtext=${document.getElementById('searchBox').value}`);
		};
	</script>
</html>
