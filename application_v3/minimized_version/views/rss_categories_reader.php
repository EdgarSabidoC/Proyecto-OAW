<?php goto TSw0b; iVZ51: $i = 0; goto zEZdN; U2Fz8: $mid = intval(ceil($lastCategory / 2)); goto pE6QU; TSw0b: if (!$arrayCategories) { echo "\74\150\x36\x3e\x53\151\x6e\x20\x63\x61\x74\145\x67\157\162\xc3\xad\x61\163\56\x2e\56\74\57\x68\66\76"; die; } goto iVZ51; zEZdN: $lastCategory = sizeof($arrayCategories); goto U2Fz8; pE6QU: foreach ($arrayCategories as $category) { if ($i === 0) { echo "\74\144\x69\166\x20\143\154\x61\x73\x73\75\47\143\x6f\x6c\x2d\x73\155\x2d\66\x27\76"; echo "\x3c\x75\x6c\40\x63\154\x61\x73\163\x3d\47\154\151\163\x74\55\165\156\x73\164\x79\154\145\x64\40\x6d\142\55\x30\x27\x3e"; } if ($i === $mid) { echo "\74\57\x75\x6c\76"; echo "\x3c\x2f\144\151\166\x3e"; echo "\74\x64\x69\x76\40\143\154\141\x73\x73\x3d\x27\143\157\154\55\x73\155\x2d\x36\47\76"; echo "\x3c\x75\154\40\x63\154\x61\x73\163\x3d\x27\x6c\x69\163\x74\x2d\165\156\x73\164\171\154\145\x64\x20\155\x62\x2d\60\47\76"; } if ($category !== '') { echo "\x3c\154\151\x20\x69\x64\75\47{$category}\x27\40\x6f\x6e\x63\x6c\151\143\x6b\x3d\47\163\x65\x61\x72\x63\150\x43\x61\x74\145\147\157\x72\x79\x28\42{$category}\42\x29\x3b\47\76\74\x61\x20\x68\162\x65\146\x3d\x27\x23\41\x27\x3e{$category}\x3c\57\141\x3e\x3c\x2f\154\151\x3e"; } if ($i === $lastCategory - 1) { echo "\x3c\x2f\165\154\76"; echo "\x3c\57\144\x69\x76\76"; } $i++; if ($i === $lastCategory) { break; } }