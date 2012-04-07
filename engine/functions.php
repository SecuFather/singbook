<?php

function connectToDatabase($server, $user, $password, $db){
	$c = @mysql_connect($server, $user, $password)
	or die("Could not connect to MYSQL server<br/>Error: ".mysql_error());
	@mysql_select_db($db, $c)
	or die("No such database");
}

connectToDatabase("localhost", "root", "", "ziomq1991");

function removeBr($src){
	$result = str_replace("<br>", "\n", $src);
	return $result;
}
function insertBr($src){
	$result = str_replace("\n", "<br>", $src);
	return $result;
}

function addArtist($name){
	mysql_query("INSERT INTO artists(name)
	             VALUES('$name');");
	
	$result = mysql_query("SELECT artist_id FROM artists WHERE name = '$name';");
	$r = mysql_fetch_assoc($result);
	return $r['artist_id'];
	
}

function getElement($select, $table, $id, $key, $br) {
	if(!$key){
		return "";
	}
	$result = mysql_query("SELECT $select FROM $table WHERE $id = $key;");
	if($r = mysql_fetch_assoc($result)){
		if(!$br){
			return $r[$select];
		}
		return removeBr($r[$select]);
	}
	return "";
}

function getArtistOptions($artist_id){
	$result = mysql_query("SELECT * FROM artists ORDER BY name");	
	$ss = '<option value="-1">New artist</option>\n';		
	$selected = "";
	
	while($r = mysql_fetch_assoc($result)){
		if($artist_id == $r['artist_id']){
			$selected = "selected";			
		}else{			
			$selected = ""; 
		}
		$ss = $ss.'<option value="'.$r['artist_id'].'"'.$selected.'>'.$r['name'].'</option>\n';
	}
	return $ss;
}

function addSong($artist_id, $artist_name, $title, $lyrics, $chords, $user_id){
	$lyrics = insertBr($lyrics);
	$chords = insertBr($chords);
	
	if($artist_id < 0){
		$artist_id = addArtist($artist_name);			
	}	
	
	$result = mysql_query("INSERT INTO songs(artist_id, title, lyrics, chords, user_id, insert_date)
						   VALUES($artist_id, '$title','$lyrics', '$chords', $user_id, NOW());");

	return $result;	
}

function editSong($song_id, $title, $lyrics, $chords, $user_id){
	$lyrics = insertBr($lyrics);
	$chords = insertBr($chords);
	
	$result = mysql_query("UPDATE songs
						   SET title = '$title', lyrics = '$lyrics', chords = '$chords', user_id = $user_id, insert_date = NOW()
						   WHERE song_id = $song_id;");	
	
	return $result;
}

function getSongList() {
	$result = mysql_query("SELECT s.title AS title, a.name AS artist, s.song_id AS song_id, s.artist_id AS artist_id
						   FROM songs s
						   INNER JOIN artists a ON a.artist_id = s.artist_id
						   ORDER BY title;");
	
	$bufor = '<table border="1">';
	while($r = mysql_fetch_assoc($result)){
		$bufor = $bufor
		.'<tr>'
		.'<td>'
			.'<a href="index.php?page=songview&song_id='.$r['song_id'].'&artist_id='.$r['artist_id'].'">'
				.$r['title']
			.'</a>'
		.'</td>'
		.'<td>'
			.$r['artist']
		.'</td>'
		.'<td>'
			.'<a href="index.php?page=db&action=editsong&song_id='.$r['song_id'].'&artist_id='.$r['artist_id'].'">'
				.'edytuj'
			.'</a>'
		.'</td>'
		.'</tr>';	
	}
	$bufor = $bufor.'</table>';
	return $bufor;
}

?>