var XO = document.getElementsByClassName("board");
var txt = [];
var isX = true;
var selClass = "";
var possibleWins = [[0,1,2], [3,4,5], [6,7,8], [0,3,6], [1,4,7], [2,5,8], [0,4,8], [2,4,6]];

function addEvents() {
	for(let i = 0; i < 9; i++) {
		XO[i].addEventListener("click", function() {
			selClass = isX ? "XSelect" : "OSelect";
			if(!this.classList.contains("selected")) {
				this.classList.add("selected", selClass);
				this.innerText = selClass.charAt(0);
				isX = !isX;
				txt[i] = XO[i].innerText;
				possibleWins.forEach(function(poss) {checkTriple(poss[0], poss[1], poss[2]);});}});}}

function checkTriple(x1, x2, x3) {
	if((txt[x1] == txt[x2] && txt[x2] == txt[x3]) && txt[x1] != undefined) {
		[x1,x2,x3].forEach(function(w) {XO[w].classList.add("winner");});
		for(let i = 0; i < 9; i++) {
			XO[i].classList.remove("OSelect","XSelect");
			XO[i].classList.add(txt[x1]+"Select","selected");}}}

