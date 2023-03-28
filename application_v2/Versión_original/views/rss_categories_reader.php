<?php
	//imprimmos 6 diferentes categorias tomando solo la primera categoria de cada item sin repetir
	if (!$arrayCategories) {
		echo "<h6>Sin categorías...</h6>";
		die;
	}
	$i = 0;

	foreach ($arrayCategories as $category) {
		if ($i === 0) {
			echo "<div class='col-sm-6'>";
			echo "<ul class='list-unstyled mb-0'>";
		}

		if ($i === 3) {
			echo "</ul>";
			echo "</div>";
			echo "<div class='col-sm-6'>";
			echo "<ul class='list-unstyled mb-0'>";
		}

		if ($category !== '') {
			echo "<li onclick='searchCategory(\"{$category}\");'><a href='#!'>{$category}</a></li>";
		}

		if ($i === 5) {
			echo "</ul>";
			echo "</div>";
		}

		$i++;
		if ($i === 6) {
			break;
		}
	}
