<?php
	$i = 0;

	// Imagen de la noticia:
	if ($item['image']) {
	$image = $item['image'];
	} else {
		$image = 'https://dummyimage.com/700x350/dee2e6/6c757d.jpg';
	}

	// Aquí se accesa a los items de la base de datos para imprimirlos en pantalla.
	foreach ($items as $item) {
		if (strlen($item['title'])>50) {
			$title = substr($item['title'], 0, 50)."...";
		} else {
			$title = $item['title'];
		}
		if (strlen($item['description'])>70) {
			$description = substr($item['description'], 0, 70)."...";
		} else {
			$description = $item['description'];
		}
		if ($i == 0) {
			echo "<div class='col-lg-6'>";
		}
		echo
		"<div class='card mb-4'>
			<a href='{$item['permalink']}'><img class='card-img-top' src={$image} alt='...' /></a>
			<div class='card-body'>
				<div class='small text-muted'>{$item['date']}</div>
				<h2 class='card-title h4'>{$title}</h2>";
				if ($item['categories']) {
					$arr_ctgs = explode('|', $item['categories']);
					$j = 0;
					foreach ($arr_ctgs as $categories) {
						echo "<div class='badge bg-primary bg-gradient rounded-pill mb-2'>{$categories}</div>";
						if ($j < 1) {
							$j++;
						} else {
							break;
						}
					}
				} else {
					echo "<div class='badge bg-primary bg-gradient rounded-pill mb-2'>None</div>";
				}
				echo
				"
				<p class='card-text'>{$description}</p>
				<a class='btn btn-primary' href='{$item['permalink']}'>Read more</a>
			</div>
		</div>";
		if ($i == 1) {
			echo '</div>';
			$i = 0;
		} else {
			$i++;
		}
	}
	unset($arr_ctgs);
