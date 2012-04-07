<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="refresh" content="2; url=../index.php?page=home">
<title>Sukces</title>
<?php 
	require '../engine/functions.php';	
	addSong($_POST['artist_select'], $_POST['artist_edit'], $_POST['title_edit'], $_POST['text_edit'], $_POST['chords_edit'], 0); 
?>
</head>
<body>
</body>
</html>