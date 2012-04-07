<table style="width: 100%" border="1">
<tr>
	<th style="width: 20%">Artist:</th>
	<td id="artist_view" colspan="2">
		<?php echo getElement('name', 'artists', 'artist_id', $_GET['artist_id'], false); ?>
	</td>	
</tr>
<tr>
	<th>Title:</th>
	<td id="title_view" colspan="2">
		<?php echo getElement('title', 'songs', 'song_id', $_GET['song_id'], false); ?>
	</td>
</tr>
<tr>
	<td colspan="3" style="text-align: right">
		<input type="submit" onclick="transponse(1);" value="Tonacja w góre" />
	</td>
</tr>
<tr>
	<td style="width: 75%; text-align: left; vertical-align: top" id="text_view" colspan="2"
	><?php echo getElement('lyrics', 'songs', 'song_id', $_GET['song_id'], false); ?></td>
	
	<td style="width: 25%; text-align: left; vertical-align: top; font-weight: bold" id="chords_view"
	><?php echo getElement('chords', 'songs', 'song_id', $_GET['song_id'], false); ?></td>
</tr>
</table>
