<?php
	$i = 0;
	$lastElement = end($items);
	// Aquí se accesa a los items de la base de datos para imprimirlos en pantalla.
	foreach ($items as $item) {
		$title = $item['title'];
		$description = $item['description'];
		$date = $item['date'];
		$link = $item['permalink'];
		$image = $item['image'];
		$categories = $item['categories'];

		if ($i == 0) {
			if ($item == $lastElement) {
				echo "<div class='col-lg-6'>";
			} else {
				echo "<div class='card-group'>";
			}
		}

		echo
		"<div class='card mb-4'>
			<a href='{$link}'><img class='card-img-top' src={$image} alt='Image New' /></a>
			<div class='card-body'>
				<div class='small text-muted'>{$date}</div>
				<a href='{$link}'><h2 class='card-title cut-title h4'>{$title}</h2></a>
				<p class='card-text cut-text'>{$description}</p>";
				if ($categories) {
					echo "<a onclick='searchCategory(\"{$categories}\");'><div class='btn badge bg-primary bg-gradient mb-2'>{$categories}</div></a>";
				}
		echo
			"</div>
			<div class='card-footer bg-transparent border-top-0'>
				<a class='btn btn-primary' href='{$link}'>Read more</a>
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
