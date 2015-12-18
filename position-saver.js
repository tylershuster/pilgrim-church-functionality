function lsTest(){
    var test = 'test';
    try {
        localStorage.setItem(test, test);
        localStorage.removeItem(test);
        return true;
    } catch(e) {
        return false;
    }
}


jQuery(document).ready(function($) {

	var recording = $('audio.recording')[0];

	if(lsTest() === true && recording){

		if( localStorage[recording.id + "_currentTime"] ) {
			console.log('currentTime is' + localStorage[recording.id + "_currentTime"] );
			recording.currentTime = localStorage[recording.id + "_currentTime"]
		}

    recording.onended = function() {
    	localStorage[recording.id + "_currentTime"] = 0;
    	recording.currentTime = localStorage[recording.id + "_currentTime"]
    }

    window.onunload = function() {
    	localStorage[recording.id + "_currentTime"] = recording.currentTime;
    }
	}
});