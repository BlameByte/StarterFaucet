<?php
// Starter Faucet terms page.
// This page is the terms of service, it contains default information which can be changed.
// If you wish to create a fork of Starter Faucet (which you are permitted to) the code must remain open and you can replace the link here. (but leave the footer in tact please).
require_once('functions/loader.php');
$loader = new loader();
$template = $loader->load('template');
$config = $loader->load('configuration');
$template->header();
?>
<h2>Using Our Service</h2>
<p>You agree that using our service is free of charge, and it costs nothing. <?php $config->faucet_name(); ?> is supported revenue such as donations or advertisements.
We will never require you to pay to receive funds in your wallet, and nobody will ever ask you to part with any money.
Due to the nature of this service and it being free we cannot guarentee uptime or be outage free.</p>
<h2>Providing Donations</h2>
<p>When you provide a donation you are gifting money to the service, these funds go into the faucets pool which allows other members to receive free coins.
All donations are non-reversable and are a one time payment, however donations may be returned in certain circumstances by the sole decision of <b><?php echo $config->faucet_name(); ?></b>.</p>
<h2>Our service is to improve <?php echo $config->coin_name(); ?></h2>
<p>Our goal is to provide the <?php echo $config->coin_name(); ?> community with free coins to allow newbies to get started. 
While we do not discourage anyone using our service we have a wait period after receiving funds, this is prevent users from withdrawing all of their funds to their account.</p>
<h2>Open Source</h2>
<p>The code used by <?php echo $config->faucet_name(); ?> is open source, this means that nothing is hidden and anybody can review the code.
The code was created by <a href="http://www.blamebyte.com/?utm_campaign=Starter-Faucet&utm_medium=link&utm_source=Open-Source&utm_term=Powered-By&utm_content=terms" target="_blank">BlameByte</a>, and the
source code is called <a href="https://github.com/BlameByte/StarterFaucet" target="_blank">Starter Faucet</a>. Feel free to modify it as you please</p>
<h2>Stored information</h2>
<p>We store minimal information about you, the only information we store is your IP address. We store this purely to prevent multiple transactions and other abuses of our services.</p>
<h2>Proxies, VPNs, or other IP changing actions</h2>
<p>Please do not use any service or website as an attempt to abuse <?php $config->faucet_name(); ?>, not only are you hurting us you are also hurting <?php echo $config->coin_name(); ?>.
The reason how is that we provide a service to allow people to receive <?php echo $config->coin_name(); ?> which enables newbies to get started.</p>
<?php
$template->footer();
?>