var chordTab = ["C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "H"];
var previewMode = false;

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
	if(chord.length > 0){
		c = chord[0];
		if(c >= 'A' && c <= 'H' && c != 'B'){
			for(i=0; i<chordTab.length; ++i){
				if(c == chordTab[i]){
					if(chord.length > 1 && chord[1] == '#'){
						return i+1;
					}else{
						return i;
					}
				}
			}
			return -1;			
		}		
	}	
	return -1;
}

function changeChords(id, change){	
	var chords = "";
	var str = document.getElementById(id).innerHTML;
	var rows = str.split("<br>");
	var cols, ch;
	var i, j, k, n=chordTab.length;
		
	for(i=0; i<rows.length; ++i){
		if(i>0){
			chords += "<br>";
		}
		cols = rows[i].split(" ");
		for(j=0; j<cols.length; ++j){			
			ch = cols[j];			
			k = findChord(ch);			
			if(k >= 0){
				chords += chordTab[(k+change+n)%n];				
				if(ch.split("#").length > 1){
					chords += ch.substring(2);
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
	setText("artist_view", getText("artist_edit", "text_and_chords"));
	setText("title_view", getText("title_edit", "text_and_chords"));	
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