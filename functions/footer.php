<?php
// Starter Faucet footer page.
// This page is part of the template for the footer source code. Feel free to modify it to match your site.
require_once('functions/loader.php');
$loader = new loader();
$config = $loader->load('configuration');
?>
</div>
<div id="footer">Powered by <a href="https://github.com/BlameByte/StarterFaucet" target="_blank">Starter Faucet</a> created by <a href="https://github.com/BlameByte" target="_blank">BlameByte</a>.<br/>
Donate to the faucet: <?php echo $config->donate_address(); ?></div>
</body>
</html>