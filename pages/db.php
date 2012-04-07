<form  <?php echo 'action="elements/'.$_GET['action'].'.php?song_id='.$_GET['song_id'].'" '; ?> 
	method="post" name="text_and_chords" onsubmit="return isPreview();" >
<table width="100%" border="1">
<tr>
	<th>Artist: </th>
	<td>
		<input type="text" maxlength="50" size="50" name="artist_edit" id="artist_edit"
		<?php echo 'value="'.getElement('name', 'artists', 'artist_id', $_GET['artist_id'], true).'"'; ?>/>
	</td>
	<td >
		<select name="artist_select">
			<?php echo getArtistOptions($_GET['artist_id']); ?>
		</select>
	</td>	
</tr>
<tr>
	<th>Title:</th>
	<td colspan="2">
		<input type="text" maxlength="60" size="50" name="title_edit" id="title_edit"
		<?php echo 'value="'.getElement('title', 'songs', 'song_id', $_GET['song_id'], true).'"'; ?>/>
	</td>
</tr>
<tr>
	<th colspan="2">Lyrics:</th>
	<th>Chords:</th>
</tr>
<tr>
	<td colspan="2">
		<textarea rows="20" cols="65" id="text_edit" name="text_edit"
		><?php echo getElement('lyrics', 'songs', 'song_id', $_GET['song_id'], true); ?></textarea>
	</td>
	<td >
		<textarea rows="20" cols="30" id="chords_edit" name="chords_edit"
			><?php echo getElement('chords', 'songs', 'song_id', $_GET['song_id'], true); ?></textarea>
	</td>
</tr>
<tr>
	<td align="right" colspan="3">
		<input type="submit" name="confirm" value="confirm"/>
		<input type="submit" value="preview" onclick="setPreview();"/>
	</td>
</tr>
</table>
</form>
<?php include('pages/songview.php') ?>