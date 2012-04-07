<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Artists</title>
<script type="text/javascript" src="engine/functions.js"></script>
<?php require "engine/functions.php"; ?>
</head>
<body>
<table border="1" align="center" width="800">
<tr>
	<td style="font-size: 100px; text-align: center" colspan="2">Logo yea!</td>
</tr>
<tr>
	<td><?php include 'pages/'.basename($_GET['page']).'.php'; ?></td>
	<td valign="top"><?php include 'elements/rightmenu.php'; ?></td>
</tr>
</table>
</body>
</html>