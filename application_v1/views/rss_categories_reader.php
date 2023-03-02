<?php

//creamos un array de las categorias con el primera categoria de cada item
$arrayCategories = array();
foreach ($items as $item) {
    if ($item["categories"] !== '') {
        $newArray = explode("|", $item["categories"]);
        if (array_key_exists(0, $newArray)) {
            if ($newArray[0] !== '') {
                $string = $newArray[0];
                array_push($arrayCategories, $string);
            }
        }
    }
}

//eliminamos categorias repetidos
$arrayCategories = array_unique($arrayCategories);

//imprimmos 6 diferentes categorias tomando solo la primera categoria de cada item sin repetir
$i=0;
foreach($arrayCategories as $category){
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

    if ($category!=='') {
        echo "<li><a href='#!'>" . $category. "</a></li>";
    }

    if ($i === 5) {
        echo "</ul>";
        echo "</div>";
    }

    $i++;
    if($i===6){
        break;
    }
}

