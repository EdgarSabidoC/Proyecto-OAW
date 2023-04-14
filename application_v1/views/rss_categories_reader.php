<?php
	//Se imprimen las diferentes categorias tomando solo la primera categoria de cada item sin repetir:
	if (!$arrayCategories) {
		echo "<h6>Sin categorías...</h6>";
		die;
	}
	$i = 0;
	$lastCategory = sizeof($arrayCategories);
	$mid = intval(ceil(($lastCategory)/2));
	foreach ($arrayCategories as $category) {
		if ($i === 0) {
			echo "<div class='col-sm-6'>";
			echo "<ul class='list-unstyled mb-0'>";
		}

		if ($i === $mid) {
			echo "</ul>";
			echo "</div>";
			echo "<div class='col-sm-6'>";
			echo "<ul class='list-unstyled mb-0'>";
		}

		if ($category !== '') {
			echo "<li id='{$category}' onclick='searchCategory(\"{$category}\");'><a href='#!'>{$category}</a></li>";
		}

		if ($i === $lastCategory-1) {
			echo "</ul>";
			echo "</div>";
		}

		$i++;
		if ($i === $lastCategory) {
			break;
		}
	}
