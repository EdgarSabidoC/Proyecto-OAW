<?php
	// Se eliminan todos los archivos con la extensión que se le pase dentro de una carpeta:
	function deleteImages($folderPath, $extension) {
		$filePattern = $folderPath . "/*.{$extension}"; // Patrón para seleccionar solo los archivos webp

		// Se obtiene un array con los nombres de los archivos que cumplen con el patrón:
		$fileList = glob($filePattern);

		// Se recorre el array y borrar cada archivo:
		foreach ($fileList as $file_path) {
				unlink($file_path);
		}
	}