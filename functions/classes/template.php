<?php
// Starter Faucet template class.
// The template class allows for the header and footer to be created.
// It serves of little purpose but allows for $template->header() to easily display the header.
// Other than that it allows for the page title to function, which is useful too.
class template {

	function __construct() {
		require_once('functions/loader.php');
		$loader = new loader();
		$config = $loader->load('configuration');
		if ($config->debug_mode()) {
			// Show warnings and errors.
			error_reporting(E_ERROR | E_WARNING);
		} else {
			// Hide all errors, warnings, notices, etc from view of public.
			error_reporting(0);
		}
	}

	function header() {
		require_once('functions/header.php');
	}

	function footer() {
		require_once('functions/footer.php');
	}

	function getTitle($string) {
		$titles = array('index.php' => 'Home',
				'terms.php' => 'Terms of Service');
		$raw = explode('/', $_SERVER['PHP_SELF']);
		$script = $raw[count($raw)-1];
		if ($string) {
			return $titles[$script];
		} else {
			return $titles;
		}
	}

}
?>
