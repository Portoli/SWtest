<?php

function autoloader($className)
{
	//localhost
	$path = __DIR__ . '/../' .  str_replace('/', '\\', $className) . '.php';
	//000webhost
	//$path = __DIR__ . '/../' .  str_replace('\\', '/', $className) . '.php';

	if (!file_exists($path)) {
		return false;
	}

	require_once $path;
}

spl_autoload_register('autoloader');
