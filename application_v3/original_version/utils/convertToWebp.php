<?php
	// Convierte una imagen a formato webp, retorna la ruta donde se encuentra la imagen:
	function convertToWebp($source, $name, $quality, $width, $height) {
		$destination = "../assets/cacheImages/feedsImages/{$name}.webp";
		$filePath = "./assets/cacheImages/feedsImages/{$name}.webp";

		// Se verifica si ya existe la imagen:
		if (file_exists($destination)) {
			return $filePath;
		}

		// Descarga la imagen
		$data = file_get_contents($source);

		// Carga la imagen en memoria y la convierte a webp
		$image = imagecreatefromstring($data);

		// Obtiene el ancho y alto original de la imagen:
		list($originalWidth, $originalHeight) = getimagesizefromstring($data);

		// Crea una nueva imagen con las dimensiones especificadas:
		$newImage = imagecreatetruecolor($width, $height);

		// Redimensiona la imagen original a la nueva imagen:
		imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

		// Guarda la imagen redimensionada en la carpeta:
		imagewebp($newImage, $destination, $quality);

		// Establece la fecha de creación del archivo:
		touch($destination, time());

		// Libera la memoria usada por las imágenes:
		imagedestroy($image);
		imagedestroy($newImage);

		return $filePath;
	}