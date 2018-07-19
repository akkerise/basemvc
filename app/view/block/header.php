<!doctype html>
<html>
<head>
	<title>Base MVC</title>
	<link rel="stylesheet" href="<?= URL; ?>app/public/css/default.css" />
	<script type="text/javascript" src="<?= URL; ?>app/public/js/jquery.js"></script>
	<script type="text/javascript" src="<?= URL; ?>app/public/js/custom.js"></script>
</head>
<body>

<div id="header">
	<h4>#HEADER</h4>
	<br />
	<a href="<?= URL; ?>index">Home</a>
	<a href="<?= URL; ?>help">Help</a>
	<?php if(Session::get('loggedIn')): ?>
	<a href="<?= URL; ?>dashboard">Dashboard</a>
	<a href="<?= URL; ?>logout">Logout</a>
	<?php else: ?>
	<a href="<?= URL; ?>login">Login</a>
	<?php endif ?>
</div>
	
<div id="content">
	
	