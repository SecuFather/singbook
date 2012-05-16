<?php 	
	$result = addSong($_POST['artist_select'], $_POST['artist_edit'], $_POST['title_edit'], 
				   	  $_POST['text_edit'], $_POST['chords_edit'], 0);
	if($result){
		echo 'Piosenka została dodana!';
	}
?>
