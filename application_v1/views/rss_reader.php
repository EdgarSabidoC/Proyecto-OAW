<?php
	$i = 0;
	// Aquí se accesa a los items de la base de datos para imprimirlos en pantalla.
	foreach ($items as $item) {
		if ($i == 0) {
			echo "<div class='col-lg-6'>";
		}
		echo
		"<div class='card mb-4'>
			<a href='#!'><img class='card-img-top' src='https://dummyimage.com/700x350/dee2e6/6c757d.jpg' alt='...' /></a>
			<div class='card-body'>
				<div class='small text-muted'>{$item['date']}</div>
				<h2 class='card-title h4'>{$item['title']}</h2>";
				if ($item['categories']) {
					$arr_ctgs = explode('|', $item['categories']);
					$j = 0;
					foreach ($arr_ctgs as $categories) {
						echo "<div class='badge bg-primary bg-gradient rounded-pill mb-2'>{$categories}</div>";
						if ($j < 2) {
							$j++;
						} else {
							break;
						}
					}
				}
				echo
				"
				<p class='card-text'>{$item['description']}</p>
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
