<?php
// Starter faucet selectapi, here is where the script selects which API to use based on the configuration.
class selectapi {
	var $provider;

	// This looks through the supported API types to match the correct API.
	// Then it assigns the $provider variable to the class, and uses it for future requests.
	function __construct() {
		require_once('functions/loader.php');
		$loader = new loader();
		$config = $loader->load('configuration');
		switch($config->api_provider()) {
		
		case 'coinbase':
			$this->provider = $loader->load('coinbaseapi');
		break;
		
		default:
			echo 'Invalid API provider selected, please review config.';
		break;
		
		}
	}
	
	// This calls the provider set in __construct and lets the actual API class handle it.
	function __call($method, $args) {
		return $this->provider->$method($args);
	}

}
?>