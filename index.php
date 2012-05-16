<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php 
	require "engine/functions.php";
	insertMeta($_GET['folder'], $_GET['page']);
?>
<title>Artists</title>
<script type="text/javascript" src="engine/functions.js"></script>
<link rel="stylesheet" href="engine/style.css" type="text/css" />
</head>
<body>
<table class="main">
<tr>
	<td>
		<img src="img/logo.jpg" />
	</td>
</tr>
<tr>
	<td valign="top"><?php include 'elements/topmenu.php'; ?></td>
</tr>
<tr>
	<td><?php include getFolder($_GET['folder']).'/'.basename($_GET['page']).'.php'; ?></td>	
</tr>
</table>
</body>
</html>