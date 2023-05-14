<!doctypehtml><html lang="es-MX"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1,shrink-to-fit=no"name="viewport"><meta content="Edgar Sabido Cortés, Carlos A. Ruiz Domínguez,
		Alexis Rosaldo Pacheco, José Alberto Polanco Cervera"name="author"><meta content="Lector Web de RSS feeds personalizable.
		Recopila la información de los sitios web en un entorno virtual organizado
		para que puedas seguir las noticias de tu blog o canal de noticias favorito."name="description"><title>Lector de noticias RSS - Inicio</title><link href="http://localhost/Proyecto-OAW-develop/application_v3/original_version/public/index.php"rel="canonical"><link href="assets/favicon.ico"rel="icon"type="image/x-icon"><link href="assets/favicon.ico"rel="apple-touch-icon"><link href="css/styles.css"rel="stylesheet"><link href="css/styles_front.css"rel="stylesheet"><link href="css/pagination.css"rel="stylesheet"><meta content="#0d6efd"name="theme-color"></head><body onload="getRssList()"><nav class="bg-dark navbar navbar-dark navbar-expand-lg"><div class="container"><a class="navbar-brand"href="index.php"onclick='query=""'>Lector de noticias RSS</a> <button aria-label="Toggle navigation"class="navbar-toggler"type="button"aria-controls="navbarSupportedContent"aria-expanded="false"data-bs-target="#navbarSupportedContent"data-bs-toggle="collapse"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse"id="navbarSupportedContent"><ul class="mb-2 mb-lg-0 ms-auto navbar-nav"><li class="nav-item"><a class="nav-link active"href="index.php"aria-current="page">Inicio</a></li><li class="nav-item"><a class="nav-link"href="views/feed.php">Añadir Feeds</a></li><li class="nav-item"><a class="nav-link"href="views/about.php">Acerca de</a></li></ul></div></div></nav><header class="bg-dark py-5"><div class="container px-5"><div class="row align-items-center gx-5 justify-content-center"><div class="col-lg-8 col-xl-7 col-xxl-6"><div class="my-5 text-center text-xl-start"><h1 class="mb-2 display-5 fw-bolder text-white">Lector de Noticias RSS</h1><p class="mb-4 fw-normal lead text-white-50">Lector Web de RSS feeds personalizable. Recopila la información de los sitios web en un entorno virtual organizado para que puedas seguir las noticias de tu blog o canal de noticias favorito.</p><div class="d-grid d-sm-flex gap-3 justify-content-sm-center justify-content-xl-start"><a class="btn btn-lg px-4 btn-primary me-sm-3"onclick="getRssList()"aria-label="Mostrar">Mostrar</a> <a class="btn btn-lg px-4 btn-outline-light"onclick="updateRssList()"aria-label="Actualizar">Actualizar</a></div></div></div></div></div></header><div class="container my-5"><div class="row"><div class="col-lg-8"><div class="container row"id="container"><nav aria-label="Page navigation"><div class="data-container"></div><div class="justify-content-center d-flex"id="pagination-list"></div></nav></div></div><div class="col-lg-4"><div class="mb-4 card"><div class="card-header">Buscar</div><div class="card-body"><div class="input-group"><input aria-describedby="button-search"aria-label="Busca noticias y más..."autofocus class="form-control"id="searchBox"onkeyup='"Enter"===event.key&&""!==document.getElementById("searchBox").value&&searchQuery()'placeholder="Busca noticias y más..."> <button aria-label="Botón buscar"class="btn btn-primary"type="button"id="button-search"onclick='""!==document.getElementById("searchBox").value&&searchQuery()'>Buscar</button></div></div></div><div class="mb-4 card"><div class="card-header">Ordenar Por:</div><div class="card-body"><select aria-label="Selector de tipos de ordenamiento"class="form-select"id="sortSelect"onchange="sortBy()"><option value="1">Más reciente</option><option value="2">Título (a-z)</option><option value="3">Título (z-a)</option><option value="4">Descripción (a-z)</option><option value="5">Descripción (z-a)</option><option value="6">Menos reciente</option></select><h6 class="m-3">Categorías:</h6><div class="row"id="link-categories"></div></div></div></div></div></div><footer class="bg-dark py-5"><div class="container"><p class="text-center m-0 text-white">Optimización de Aplicaciones Web 2023.</p></div></footer><script src="js/jquery.min.js"></script><script src="js/pagination.min.js"></script><script src="js/pagination.js"></script><script src="js/index.js"></script></body></html>