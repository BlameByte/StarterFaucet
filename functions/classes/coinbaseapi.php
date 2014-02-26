<?php
class coinbaseapi {
	var $provider;

	function __construct() {
		require_once('functions/loader.php');
		$loader = new loader();
		$config = $loader->load('configuration');
		require_once('functions/classes/coinbase/Coinbase.php');
		$this->provider = Coinbase::withApiKey($config->api_key(), $config->api_secret());
	}
	
	function __call($method, $args) {
		// Temp fix for an issue, for some reason this gets nested in an array.
		$args = $args[0];
		return $this->provider->$method($args[0], $args[1]);
	}

}
?>