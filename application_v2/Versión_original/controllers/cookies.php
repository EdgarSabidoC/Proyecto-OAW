<?php
	$value = implode('|', $urls);
	$expire = strtotime('+30 days'); // La cookie dura 1 mes.
	setcookie('urls', $value, [
    'expires' => $expire,
		'samesite' => 'None',
		'secure' => false,
		'httponly' => false]);