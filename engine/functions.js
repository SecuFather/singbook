var durChordTab = ["C", "Cis", "D", "Dis", "E", "F", "Fis", "G", "Gis", "A", "B", "H"];
var molChordTab = ["c", "cis", "d", "dis", "e", "f", "fis", "g", "gis", "a", "b", "h"];
var previewMode = false;
var text_width = -1;
var font_size = -1;

function setText(id, str){		
	document.getElementById(id).innerHTML = str;
}
function getText(id, formName){
	return document.forms[formName][id].value;
	
}
function insertBr(id, formName){	
	var str = getText(id, formName);	
	str = str.replace(/\n/gi, "<br>");

	return str;	
}

function findChord(chord){
	var i;
	var c;
	var n = molChordTab.length;
	if(chord.length > 0){
		c = chord[0];		
		for(i=0; i<n; ++i){
			if(c === durChordTab[i]){
				if(chord.length > 1 && chord[1] == 'i'){
					return i+1;
				}else{
					return i;
				}
			}
		}				
		for(i=0; i<n; ++i){
			if(c == molChordTab[i]){
				if(chord.length > 1 && chord[1] == 'i'){
					return i+1+n;
				}else{
					return i+n;
				}
			}
		}		
	}	
	return -1;
}

function changeChords(id, change){	
	var chords = "";
	var str = document.getElementById(id).innerHTML;
	var rows = str.split("<br>");
	var cols, ch;
	var i, j, k, n=durChordTab.length;
		
	for(i=0; i<rows.length; ++i){
		if(i>0){
			chords += "<br>";
		}
		cols = rows[i].split(" ");
		for(j=0; j<cols.length; ++j){			
			ch = cols[j];			
			k = findChord(ch);			
			if(k >= 0){
				if(k<n){				
					chords += durChordTab[(k+change+n)%n];				
				}else{
					chords += molChordTab[(k+change+n)%n];
				}
				if(ch.split("is").length > 1){
					chords += ch.substring(3);
				}else{
					chords += ch.substring(1);
				}
				chords += " ";
			}
		}		
	}
	return chords;	
}

function preview(){			
	setText("song_view", "<b>" + getText("artist_edit", "text_and_chords") + "</b> - " +
						 getText("title_edit", "text_and_chords"));	
	setText("text_view", insertBr("text_edit", "text_and_chords"));
	setText("chords_view", insertBr("chords_edit", "text_and_chords"));	
}

function transponse(change){
	setText("chords_view", changeChords("chords_view", change));
} 
function isPreview(){
	if(previewMode){
		previewMode = false;
		return false;		
	}
	return true;
}
function setPreview(){	
	previewMode = true;	
	preview();
}

function resizeTable(change){
	var step = 5;
	if(text_width < 0){
		text_width = parseInt(document.getElementById("text_view").style.width);
		
	}	
	if(text_width + step*change  != 100-2*step && text_width + step*change != step*4){
		text_width += change*step;
	}
	document.getElementById("text_view").style.width = (text_width) + "%";
	document.getElementById("chords_view").style.width = (100-text_width) + "%";
}

function resizeFont(change){
	var step = 2;
	if(font_size < 0){
		font_size = parseInt(document.getElementById("text_view").style.fontSize);
	}		
	if(font_size + change*step > 0){
		font_size += change*step;
	}
	document.getElementById("text_view").style.fontSize = font_size + "px";
	document.getElementById("chords_view").style.fontSize = font_size + "px";
}

function gotoEdit(song_id, artist_id){
	window.location = "index.php?page=db&action=editsong&song_id=" + song_id + "&artist_id=" + artist_id;
}
function gotoDelete(song_id){
	window.location = "index.php?folder=elements&page=deletesong&song_id=" + song_id;
}

