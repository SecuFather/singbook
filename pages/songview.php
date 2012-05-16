<table style="width: 100%" border="1">
<tr>	
	<td id="song_view" colspan="3" style="font-size: 24px;">
		<b><?php echo getElement('name', 'artists', 'artist_id', $_GET['artist_id'], false); ?></b> -
		<?php echo getElement('title', 'songs', 'song_id', $_GET['song_id'], false); ?>
	</td>	
</tr>
<tr>
	<td colspan="3" style="text-align: right; font-weight: bold;">
		<?php userPanel($_GET['song_id'], $_GET['artist_id']); ?>
		Tonacja: <input type="submit" onclick="transponse(-1);" value="&dArr;" />
				 <input type="submit" onclick="transponse(1);" value="&uArr;" /> | 
		Chwyty:  <input type="submit" onclick="resizeTable(-1);" value="&lArr;" />
				 <input type="submit" onclick="resizeTable(1);" value="&rArr;" /> | 
		Czcionka:<input type="submit" onclick="resizeFont(-1);" value="&dArr;" />
				 <input type="submit" onclick="resizeFont(1);" value="&uArr;" />
	</td>
</tr>
<tr>
	<td class="text_view" id="text_view" colspan="2" style="width: 70%; font-size: 18px;"
	><?php echo getElement('lyrics', 'songs', 'song_id', $_GET['song_id'], false); ?></td>
	
	<td class="chords_view" id="chords_view" style="width: 30%; font-size: 18px;"
	><?php echo getElement('chords', 'songs', 'song_id', $_GET['song_id'], false); ?></td>
</tr>
</table>
