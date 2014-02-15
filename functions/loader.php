<?php
// Starter Faucet loader class.
// This loader is very useful, it allows you to use require_once on the loader, then you can use that to load everything else!
// The loader is used on every page which uses a class (which is almost every), and is a very useful class.
// It might look short, and you would be correct, but this loader is a very useful class.
class loader {
	function load($class) {
		static $loaded = array();
		if(!isset($loaded[$class])) {
			require_once('classes/'.$class.'.php');
			$loaded[$class] = new $class();
		}
		return $loaded[$class];
	}
}
?>