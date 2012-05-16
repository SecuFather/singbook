<?php 
	$artist_id = $_POST['artist_edit'];
	$song_id = $_GET['song_id'];
	$result = editSong($_POST['artist_select'], $artist_id, $song_id,
					   $_POST['title_edit'], $_POST['text_edit'], $_POST['chords_edit'], 0);
	if($result){
		echo 'Piosenka została zedtywoana!';
	}
?>
