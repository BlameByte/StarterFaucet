<?php
// Starter Faucet footer page.
// This page is part of the template for the footer source code. Feel free to modify it to match your site.
// One thing I do ask is that you leave the footer in tact, you may change it to match your site but please leave the text and links there.
// Even if you modify and fork Starter Faucet (which you are allowed) please at least leave some credit, such as putting "Powered by Forked Faucet which is based on Starter Faucet"... with the below links. :)
require_once('functions/loader.php');
$loader = new loader();
$config = $loader->load('configuration');
?>
</div>
<div style="text-align:center;border: 1px dotted black">Powered by <a href="https://github.com/BlameByte/StarterFaucet" target="_blank">Starter Faucet</a> by <a href="http://www.blamebyte.com/?utm_campaign=Starter-Faucet&utm_medium=link&utm_source=Open-Source&utm_term=Powered-By&utm_content=footer" target="_blank">BlameByte</a>.<br/>
Donate to the faucet: <?php echo $config->donate_address(); ?></div>
</body>
</html>