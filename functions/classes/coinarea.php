<?php
// Starter Faucet CoinArea class.
// This is a custom built class for use with CoinArea API service.
class coinarea {
	var $key;
	var $coin;
	
	// This allows it to load both the API key and the coin code.
	// This means that we do not have to provide the API key and coin code in every request.
	function __construct() {
		require_once('functions/loader.php');
		$loader = new loader();
		$config = $loader->load('configuration');
		$this->key = $config->api_key();
		$this->coin = $config->coin_code();
	}
	
	// This function is made to allow calling of the API easier.
	// It handles formatting the correct array data with correct key names.
	// It does not include all of the API functions supported by CoinArea, but that does not matter.
	// For one we are only using these two, and second if you wanted to use the others it can!
	// Okay, so it can it also use coin_info (as it requires no args) and also generate_address (but without label support).
	function __call($method, $args) {
		switch($method) {
			case 'get_balance':
				$data = array('address' => $args[0]);
			break;
			
			case 'send_funds':
				$data = array('address' => $args[0], 'amount' => $args[1]);
			break;
		}
		
		return $this->sendRequest($method, $data);
	}
	
	// This sends the request to the CoinArea API, it supports both Curl (preferred) and GET using file_get_contents.
	function sendRequest($method, $data) {
		$url = 'http://www.coinarea.org/api/v1/'.$method;
		// Add the API key and coin code into the request.
		$data = array_merge(array('key' => $this->key, 'coin' => $this->coin), $data);
		// Check to see if Curl is enabled.
		if (function_exists('curl_version')) {
			$json = json_encode($data);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: '.strlen($json)));
			$result = curl_exec($ch);
			return json_decode($result, true);
		// Curl is not enabled, we will just use file_get_contents GET request.
		} else {
		$urlquery = $url.'?'.http_build_query($data);
		$result = file_get_contents($urlquery);
		return json_decode($result, true);
		}
	}
	
}
?>