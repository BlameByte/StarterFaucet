<?php
// Starter Faucet header page.
// This page is part of the template, modify as you please, you may also want to modify footer.php.
$loader = new loader();
$template = $loader->load('template');
$config = $loader->load('configuration');
?>
<html>
<head>
<style>
body {
	width: 800px;
	margin: auto;
}

h1 {
	margin-top: 0px;
	margin-left: 5px;
}

h1 a {
	color: black;
	text-decoration: none;
}

#content {
	margin: 5px;
	border: 1px solid black;
}
</style>
<title><?php
$curtitle = $template->getTitle(true);
echo $config->faucet_name().' - '.$curtitle; 
?></title>
</head>
<body>
<div id="content">
<h1><a href="index.php"><?php echo $config->faucet_name(); ?></a></h1>
