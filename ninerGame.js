//Board indices are 0-8...

//TODO
//add case for sent to a board that is already full
//Add handling in checkTriple() for neutral Board

var tables = document.getElementsByClassName("subtable");
var XO = document.getElementsByClassName("board");
var txt = [];
var isX = true;
var selClass = "";
var gameTxt = [];
var possibleWins = [[0,1,2], [3,4,5], [6,7,8], [0,3,6], [1,4,7], [2,5,8], [0,4,8], [2,4,6]];

function addEvents() {
	for(let i = 0; i < 81; i++) {
		XO[i].addEventListener("click", function() {
			selClass = isX ? "XSelect" : "OSelect";
			if(!this.classList.contains("selected") && !this.classList.contains("grayed")) {
				if(!this.classList.contains("XSelect") && !this.classList.contains("OSelect")) {
					this.classList.add(selClass);
				}
				this.classList.add("selected");
				this.innerText = selClass.charAt(0);
				isX = !isX; //Boolean determines turn; (isX === true) => X's turn
				txt[i] = XO[i].innerText;
				grayOthers(i);
				checkBoardWin(i);
				checkGameWin();
      }
		});
	}
}

function checkBoardWin(i) {
	var toSelect = Math.floor(i/9);
	var check;
	if(gameTxt[toSelect] == undefined) { //make sure board hasn't already been won
		possibleWins.forEach(function(poss) {
			if(checkTriple(poss[0]+9*toSelect, poss[1]+9*toSelect, poss[2]+9*toSelect, txt)){
				gameTxt[toSelect] = txt[poss[0]+9*toSelect];
				for(let i = 9*toSelect; i < 9*toSelect+9; i++) {
					XO[i].classList.remove("OSelect","XSelect");
					XO[i].classList.add(gameTxt[toSelect]+"Select");
				}
				tables[toSelect].classList.add(gameTxt[toSelect]+"winner");
			}
		});
	}
}

function checkGameWin() {
	possibleWins.forEach(function(poss) {
		if(checkTriple(poss[0], poss[1], poss[2], gameTxt)) {
			for(let i = 0; i < 81; i++) {
				XO[i].classList.remove("grayed");
				XO[i].classList.remove("OSelect","XSelect");
				XO[i].classList.add(gameTxt[poss[0]]+"Select","selected");
			}
			var otherGuy = (gameTxt[poss[0]] == 'X') ? 'O' : 'X';
			for(let i = 0; i < 9; i++) {
				tables[i].classList.remove(otherGuy+"winner");
				tables[i].classList.add(gameTxt[poss[0]]+"winner");
			}
			document.getElementById("outter").classList.add(gameTxt[poss[0]]+"winner");
		}
	});
}

function checkTriple(x1, x2, x3, array) {
	if((array[x1] == array[x2] && array[x2] == array[x3]) && array[x1] != undefined) {
		return true;
	}
}

function grayOthers(dontGray) {
	var toSelect = dontGray%9;
	removeGrayedAll();
	for(var i = 0; i < 81; i++) {
		if(!XO[i].classList.contains("selected") && Math.floor(i/9) != toSelect) {
			XO[i].classList.add("grayed");
		}
	}
}

function removeGrayedAll() {
	for(var i = 0; i < 81; i++) {
		XO[i].classList.remove("grayed");
	}
}
