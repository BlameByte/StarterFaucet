<?php
// Starter faucet configration, For now here is where you set all of the options.
// An example of what is set in here is, your CoinArea API key, the coin name and coin prefix.
class configuration {
	// All this currently does is runs getConfig, this is pretty nice if you like to use $config->api_key() for example.
	// It is possible to use getConfig and achieve the same, but using the call function makes it feel more like variables.
	// Using call:      $config->coin_code();
	// Using getConfig: $config->getConfig('coin_code');
	function __call($method, $args) {
		return $this->getConfig($method);
	}

	function getConfig($name) {
		$configs = array(
		// Here is where your CoinArea API key goes, this allow the faucet to send funds and get the balance of the funds in your account.
		// To obtain an API key please visit here - http://coinarea.org/apikeys.php
		'api_key' => 'API_KEY_HERE',
		
		// This is where the name of the coin goes, this value is only displayed to the user and does have to be the exact name.
		// For example, we could put "bitcoin", "Bit coin", "bitcoins", or even "mBit".
		'coin_name' => 'Bitcoin',
		
		// This is the currency code of the coin, this has to be correctly formed for the CoinArea API to work.
		// Currently the only two coin_code's supported on CoinArea right now is BTC and DOGE, but any coin added to CoinArea should without the need to update the code.
		'coin_code' => 'BTC',
		
		// This is an optional field, it limits the faucet to use only that address for getting the balance and sending payments.
		// It will only send funds which is in that address, this option is recommended and the donation address should be the same.
		// It is optional so if you do not want to use it just leave blank, so it looks like: 'faucet_address' => '',
		'faucet_address' => 'FAUCET_ADDRESS',
		
		// This is the address where you will accept donations into, it does not have to be a CoinArea address.
		// It is recommended to use the same address as the address above to avoid the faucet running out of funds.
		// You may however choose to receive the funds in another wallet / address, and then transfer the funds to the faucet.
		'donate_address' => 'DONATION_ADDRESS',
		
		// Here is where you name your faucet, do not try to make it too long as it sets the title and may cause some text to take multiple lines.
		// Also the title in the browser will be for example "Starter Faucet - Home" so the "Home" part is added and you do not have to include it.
		'faucet_name' => 'Starter Faucet',
		
		// This is the amount the faucet will pay the user in the coin provided above, you will probably want to change this especially if you change the coin.
		// Remember that you may have to pay a fee to the coin network on funds sent, so take that into consideration when setting the amount below.
		'faucet_amount' => 0.0001,
		
		// This is the time in seconds which you have to wait until you can enter the same address again to get paid.
		// It is required to put a wait time to prevent the same user from attempting to take the entire faucet's pool.
		// The default value is 24 hours, which is expressed as 24 (hours) * 60 (minutes) * 60 (seconds).
		// To change this value for example to 6 hours, all you would have to do is change 24 to 6 making it 6 * 60 * 60
		// If you do not want users to be able to request funds again, then just set it to 0: 'wait_period' => 0,
		'wait_period' => 24 * 60 * 60,
		
		// If this is enabled the it shows the users the balance left in the faucet, it can be used for both good and bad.
		// It can be useful in situations where people see the funds running out and donating to keep the faucet going.
		// But at the same time it could be used by someone to see if it is worth trying to exploit the faucet.
		// It should be fine to leave enabled, more of preference as it does not pose a security risk by itself.
		'show_balance' => true,
		
		// This allows you to choose if you want a captcha image to display before they can claim their free coins.
		// A captcha is basically an image which is something easy for humans but difficult for robots / automatic bots.
		// This is usually a good idea to prevent bots from automatically taking funds from a faucet.
		// To use this the recaptcha private and public keys must be correct (otherwise it may be impossible to use the faucet).
		'enable_captcha' => true,
		
		// This is not required unless you have the captcha enabled you can change the settings above.
		// To get a recaptcha private key go here - https://www.google.com/recaptcha/admin/create
		// Make sure that you put the public key here and NOT the private key.
		'recaptcha_public_key' => 'RECAPTCHA_PUBLIC_KEY_HERE',
		
		// This is not required unless you have the captcha enabled you can change the settings above.
		// To get a recaptcha private key go here - https://www.google.com/recaptcha/admin/create
		// Make sure that you put the private key here and NOT the public key.
		'recaptcha_private_key' => 'RECAPTCHA_PRIVATE_KEY_HERE',
		
		// This should only be turned on if it is not open to the public or as the name suggests if you are troubleshooting an issue.
		// If you are making the site live for others to use this should be disabled, this displays data potentially useful to an attacker.
		// It is useful to turn this on in case you are having issues with the script, but not if others are going to be able to view the site.
		// It simply displays error imformation and other debugging
		'debug_mode' => true,
		
		// This is an advanced field, and REMOTE_ADDR should work for most people unless you have a proxy or similar in front.
		// This allows you to get the real IP of the visitor, failure to get the real IP means that you will capture the proxy IP.
		// That causes problems as it allows people to get multiple rewards without the wait period and others to get nothing.
		// If you use CloudFlare then use "HTTP_CF_CONNECTING_IP", if you use CloudFlare this is not an optional step, it is required.
		// If you use a load balancer or similar such as nginx proxy, then try using "HTTP_X_FORWARDED_FOR".
		// Do not change this value to if you are not using a proxy in front otherwise it will allow users to spoof their IP.
		'ip_forward' => 'REMOTE_ADDR',
		
		// This is where the logs are stored such as to log the IP address of the user to prevent them from claiming over and over again.
		// This should be set to 664 (chmod or uncheck read-only if windows) so it can write, delete, modify.
		// The default path should be fine under most certainstances, it is recommended that you use .htaccess to disallow access.
		// You can also choose an absolute path or move it out of the public files, but it should be fine here.
		'log_path' => 'functions/logs/'
		);
		return $configs[$name];
	}
}
?>