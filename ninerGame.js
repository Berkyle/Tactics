//Board indices are 0-8...

//TODO
//-X  add case for nobody won the board
//-X  add case for sent to a board that is already full
//->  Add handling in checkTriple() for neutral Board

var tables = document.getElementsByClassName("subtable");
var XO = document.getElementsByClassName("board");
var txt = [];
var nextPick = 9;
var isX = true;
var selClass = "";
var gameTxt = []; //undefined, 'X', 'O', or 'A'
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
				checkBoardStatus(i);
				checkGameWin();
      }
		});
	}
}

function checkBoardStatus(tile) {	//i is the tile that the last choice was selected in
	var toSelect = Math.floor(tile/9); //toSelect is the board that the last choice was selected in
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
	if(checkBoardFull(toSelect)) {
		gameTxt[toSelect] = 'A';
		tables[toSelect].classList.add("Awinner");
	}
	if(checkBoardFull(tile%9)) removeGrayedAll();
}

function checkGameWin() {
	possibleWins.forEach(function(poss) {
		if(checkTriple(poss[0], poss[1], poss[2], gameTxt)) {
			for(let i = 0; i < 81; i++) {
				XO[i].classList.remove("grayed","OSelect","XSelect");
				XO[i].classList.add(gameTxt[poss[0]]+"Select","selected");
			}
			var otherGuy = (gameTxt[poss[0]] === 'X') ? 'O' : 'X';
			for(let i = 0; i < 9; i++) {
				tables[i].classList.remove(otherGuy+"winner");
				tables[i].classList.add(gameTxt[poss[0]]+"winner");
			}
			document.getElementById("outter").classList.add(gameTxt[poss[0]]+"winner");
		}
	});
}

function checkBoardFull(board) {
	var numSelected = 0;
	for(var i = 0; i < 9; i++) {
		if (txt[i+9*board] != undefined) numSelected++;
	}
	if (numSelected === 9) return true;
	return false;
}

function checkTriple(x1, x2, x3, arr) {
	if((arr[x1] === arr[x2] && arr[x2] === arr[x3]) && arr[x1] !== undefined && arr[x1] !== 'A') {
		return true;
	}
}

function grayOthers(dontGray) {
	var toSelect = dontGray%9;
	removeGrayedAll();
	for(var i = 0; i < 81; i++) {
		if(!XO[i].classList.contains("selected") && Math.floor(i/9) !== toSelect) {
			XO[i].classList.add("grayed");
		}
	}
}

function removeGrayedAll() {
	for(var i = 0; i < 81; i++) {
		XO[i].classList.remove("grayed");
	}
}
