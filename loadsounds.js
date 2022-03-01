//Jacob Grover, 2/27/22
//I wanted to try a little bit of AJAX
//https://developer.mozilla.org/en-US/docs/Web/API/Document/getElementById
//https://www.w3schools.com/jsref/dom_obj_select.asp
//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest
//https://stackoverflow.com/questions/1033398/how-to-execute-a-function-when-page-has-fully-loaded
//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/load_event
//https://attacomsian.com/blog/javascript-insert-element-before
//https://stackoverflow.com/questions/14834520/html5-audio-stop-function

var categoryselect;
var categorynum;
var soundselect;
var soundnum;
var catrequest;
var soundrequest;
var soundaudio;
var playbutton;
var stopbutton;
var soundid;
window.addEventListener('load', onPageLoad);


function onPageLoad() {
	catrequest = new XMLHttpRequest();
	catrequest.addEventListener('load', insertSounds);
	soundrequest = new XMLHttpRequest();
	soundrequest.addEventListener('load', insertSound);
	categorynum = document.getElementsByTagName("option").length;
	categoryselect = document.getElementById("categories");
	categoryselect.addEventListener('load', loadSoundCategory);//These event listeners are not working
	categoryselect.addEventListener('change', loadSoundCategory);
	soundselect = document.getElementById("sounds");
	soundselect.addEventListener('load', loadSound);
	soundselect.addEventListener('change', loadSound);
	playbutton = document.getElementById("playsoundsel");
	playbutton.addEventListener('click', playSound);
	stopbutton = document.getElementById("stopsoundsel");
	stopbutton.addEventListener('click', stopSound);
	loadSoundCategory();
}
function loadSoundCategory() {//This will be called on load and on category change
	var currentcategory = categoryselect.value;
	var requeststring = "loadcatsounds.php?category=" + currentcategory;
	catrequest.open("GET", requeststring);
	catrequest.send();
}
function insertSounds() {
	soundselect.innerHTML = catrequest.response;
	loadSound();
}
function loadSound() {
	var currentsound = soundselect.value;
	var requeststring = "loadsound.php?soundid=" + currentsound;
	soundrequest.open("GET", requeststring);
	soundrequest.send();
}
function insertSound() {
	if(document.getElementById("selsoundaudio") == undefined) {//Don't put multiple audio tags for the button when you change it
		playbutton.insertAdjacentHTML("beforebegin", soundrequest.response);
	}
	else {
		soundaudio = document.getElementById("selsoundaudio");
		soundaudio.remove();
		playbutton.insertAdjacentHTML("beforebegin", soundrequest.response);	
	}
}
function playSound() {
	soundaudio = document.getElementById("selsoundaudio");
	soundaudio.play();
}
function stopSound() {
	soundaudio.pause();
	soundaudio.currentTime = 0;
}