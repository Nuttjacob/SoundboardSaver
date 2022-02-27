//Jacob Grover, 2/27/22
//I wanted to try a little bit of AJAX
//https://developer.mozilla.org/en-US/docs/Web/API/Document/getElementById
//https://www.w3schools.com/jsref/dom_obj_select.asp
//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest

var categoryselect;
var categorynum;
var soundselect;
var soundnum;
var catrequest = new XMLHttpRequest();
catrequest.addEventListener('load', loadSoundCategory);//These event listeners are not working
catrequest.addEventListener('change', loadSoundCategory);
function loadSoundCategory() {//This will be called on load
	
	categoryselect = document.getElementById("categories");
	var currentcategory = categoryselect.value;
	categorynum = document.getElementsByTagName("option").length;
	
	requeststring = "loadcatsounds.php?category=" + currentcategory;
	
	catrequest.open("GET", requeststring);
	catrequest.send();
	console.log(catrequest);
	//**Insert the request contents into the inner html
}