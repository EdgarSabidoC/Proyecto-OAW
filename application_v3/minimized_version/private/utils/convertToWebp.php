<?php
	// Convierte una imagen a formato webp, retorna la ruta donde se encuentra la imagen:
	function convertToWebp($source, $name, $quality, $width, $height) {
		$destination = "../../public/cache/feedsImages/{$name}.webp";
		$filePath = "../public/cache/feedsImages/{$name}.webp";

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

		// Si el alto es más grande que el ancho en la imagen original, se invierten:
		if ($originalWidth < $originalHeight) {
			$tmp = $originalWidth;
			$originalWidth = $originalHeight;
			$originalHeight = $tmp;
		}

		// Se verifica si las dimensiones originales son más pequeñas:
		if ($width > $originalWidth) {
			$width = $originalWidth;
		}

		if ($height > $originalHeight) {
			$height = $originalHeight;
		}

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