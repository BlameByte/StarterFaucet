<?php
// Starter faucet selectapi, here is where the script selects which API to use based on the configuration.

// The fakeapi class is basically an emulator to provide safe values.
class fakeapi {
	function __call($method, $args) {
		switch($method) {
			case 'getBalance':
				return 0;
			break;
			
			default:
				return 'API not avaliable.';
			break;
		}
	}
}

// This class allows for multiple APIs to be added with ease, and will select the one chosen in the config.
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
			echo '<div class="errormsg">The API provided is not valid, please set up a valid API provider in the configuration.</div>';
			$this->provider = new fakeapi();
		break;
		
		}
	}
	
	// This calls the provider set in __construct and lets the actual API class handle it.
	function __call($method, $args) {
		return $this->provider->$method($args);
	}

}
?>