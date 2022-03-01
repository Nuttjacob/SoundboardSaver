//Jacob Grover, 2/27/22
//I wanted to try a little bit of AJAX
//https://developer.mozilla.org/en-US/docs/Web/API/Document/getElementById
//https://www.w3schools.com/jsref/dom_obj_select.asp
//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest
//https://stackoverflow.com/questions/1033398/how-to-execute-a-function-when-page-has-fully-loaded
//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/load_event

var categoryselect;
var categorynum;
var soundselect;
var soundnum;
var catrequest = new XMLHttpRequest();
window.addEventListener('load', onPageLoad);
catrequest.addEventListener('load', insertSounds);

function onPageLoad() {
	categorynum = document.getElementsByTagName("option").length;
	categoryselect = document.getElementById("categories");
	categoryselect.addEventListener('load', loadSoundCategory);//These event listeners are not working
	categoryselect.addEventListener('change', loadSoundCategory);
	soundselect = document.getElementById("sounds");
}
function loadSoundCategory() {//This will be called on load and on category change
	var currentcategory = categoryselect.value;
	requeststring = "loadcatsounds.php?category=" + currentcategory;
	catrequest.open("GET", requeststring);
	catrequest.send();
}
function insertSounds() {
	soundselect.innerHTML = catrequest.response;
}
