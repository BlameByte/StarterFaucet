<?php
// Starter Faucet log class.
// This class is sort of like a database, in of that it stores and reads data from fields.
// This is currently used for disallowing an IP address from requesting multiple times, and following the wait period.
// It is basically an alternative of using an SQL database (such as MySQL), but less pratical, but should be fine using minimal data.
class log {
	var $logpath;

	// This loads the log_path variable from the configuration.
	function __construct() {
		require_once('functions/loader.php');
		$loader = new loader();
		$config = $loader->load('configuration');
		$this->logpath = $config->log_path();
	}

	function saveLog($name, $value) {
		file_put_contents($this->logpath.$name, $value);
	}

	function getLog($name) {
		// This prevents some trickery, such as trying to put "../" or similar.
		// Although it should be impossible to send this a value (as it gets the IP).
		if (substr($value, 0, 1) != '.') {
			if (file_exists($this->logpath.$name)) {
			return file_get_contents($this->logpath.$name);
			}
		}
	return false;
	}
	
	// This function is like two in one, it basically checks the IP and then logs that they requested.
	// Since of this the balance of the wallet should be checked BEFORE running this function, as otherwise they will get nothing and have to wait.
	function checkWrite() {
		$time = time();
		require_once('functions/loader.php');
		$loader = new loader();
		$config = $loader->load('configuration');
		$ip = $_SERVER[$config->ip_forward()];
		$log = $this->getLog($ip);
		// This checks to see if the log with the wait_period is within time.
		// Or if the log does not exist (meaning the IP address has never recieved funds from us.
		if (empty($log) || $log + $config->wait_period() < $time) {
			$this->saveLog($ip, $time);
			return true;
		}
		return false;
	}
}
?>