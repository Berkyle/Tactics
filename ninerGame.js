//Board indices are 0-8...
//TODO
//-> Change shading for inside won board.
//-> make Border styling less bad pls
"use strict";
var tables = document.getElementsByClassName("subtable");
var XO = document.getElementsByTagName("td");
var txt = [];
var isX = true;
var selClass = "";
var gameTxt = [];
var XTxt = [];
var OTxt = [];
var winArray = [];
var possibleWins = [[0,1,2], [3,4,5], [6,7,8], [0,3,6], [1,4,7], [2,5,8], [0,4,8], [2,4,6]];

function init() {
	populateHTML();
	addEvents();
}

function populateHTML() {
	let add = "<tr><td class=\"board\"></td><td class=\"board\"></td><td class=\"board\"></td></tr>";
	for(let i = 0; i < 9; i++) {
		for(let j = 0; j < 3; j++) document.getElementsByClassName("subtable "+ i)[0].innerHTML += add;
	}
}

function addEvents() {
	for(let i = 0; i < 81; i++) {
		XO[i].addEventListener("click", function() {
			selClass = isX ? "XSelect" : "OSelect";
			if(!this.classList.contains("selected") && !this.classList.contains("grayed")) {
				this.classList.add(selClass, "selected");
				this.innerText = selClass.charAt(0);//add 'X' or 'O' to HTML page
				isX = !isX; //Boolean determines turn; (isX === true) => X's turn
				txt[i] = XO[i].innerText;
				checkBoardStatus(i);
				checkGameWin();
      }
		});
	}
}

function checkBoardStatus(tile) {	//tile is the tile that the last choice was selected in
	var toSelect = Math.floor(tile/9); //toSelect is the board that the last choice was selected in
	if(gameTxt[toSelect] == undefined) { //make sure board hasn't already been won
		possibleWins.forEach(function(poss) {
			if(checkTriple(poss[0]+9*toSelect, poss[1]+9*toSelect, poss[2]+9*toSelect, txt)){
				gameTxt[toSelect] = txt[poss[0]+9*toSelect];
			}
		});
	}
	if(checkBoardFull(toSelect)) {
		if(gameTxt[toSelect] != 'O' && gameTxt[toSelect] != 'X') {
			gameTxt[toSelect] = 'A';
			tables[toSelect].classList.add("Awinner");
		}
	}
	updateBoard(false);
	grayOthers(tile);
	if(checkBoardFull(tile%9)) removeGrayedAll();
}

function checkGameWin() {
	updateSubArrays(); //XTxt and OTxt are updated

	var OWin, XWin = false;
	possibleWins.forEach(function(poss) {
		if(checkTriple(poss[0], poss[1], poss[2], OTxt)){
			if(gameTxt[poss[0]] != 'A' || gameTxt[poss[1]] != 'A' || gameTxt[poss[2]] != 'A') {
				OWin = true;
				winArray.push(['O', poss[0], poss[1], poss[2]]);
			}
		}
		if(checkTriple(poss[0], poss[1], poss[2], XTxt)) {
			if(gameTxt[poss[0]] != 'A' || gameTxt[poss[1]] != 'A' || gameTxt[poss[2]] != 'A') {
				XWin = true;
				winArray.push(['X', poss[0], poss[1], poss[2]]);
			}
		}
	});
	if(OWin && XWin) finishGame('A');
	else if(specialCases()) finishGame('A');
	else if(!OWin && !XWin) return false;
	else finishGame(winArray[0][0]);
}

function updateSubArrays() {
	gameTxt.forEach(function(boardVal, index, array) {
		if(boardVal == 'A') {
			OTxt[index] = 'O';
			XTxt[index] = 'X';
		}
		else if(boardVal == 'O') OTxt[index] = 'O';
		else if(boardVal == 'X') XTxt[index] = 'X';
	});
}

function specialCases() {
	for(let i = 0; i < 9; i++) {
		if(gameTxt[i] != 'A') break;
		if (i == 8) return true;
	}
	for(let i = 0; i < 9; i++){
		if(gameTxt[i] == undefined) break;
		if(i == 8) return true;
	}
	return false;
}

function checkBoardFull(board) {
	for(var i = 0; i < 9; i++) {
		if (txt[i+9*board] == undefined) return false;
		else if(i == 8) return true;
	}
}

function checkTriple(x1, x2, x3, arr) {
	if((arr[x1] === arr[x2] && arr[x2] === arr[x3]) && arr[x1] !== undefined && arr[x1] !== 'A') {
		return true;
	}
	return false;
}

function updateBoard(gameFinished) {
	for(let i = 0; i < 81; i++) {
		XO[i].classList.remove("grayed","OSelect","XSelect", "ASelect");
		if(i<9) tables[i].classList.remove("Owinner", "Xwinner", "Awinner");
	}
	if(gameFinished) removeGrayedAll();
	else{
		for(let i = 0; i < 81; i++) {
			if(i<9) tables[i].classList.add(gameTxt[i]+"winner");
			if(gameTxt[Math.floor(i/9)] != undefined && txt[i] != undefined){
				XO[i].classList.add(gameTxt[Math.floor(i/9)]+"Select", "selected");
			}
			else if(txt[i] != undefined) XO[i].classList.add(txt[i]+"Select", "selected");
		}
	}
}

function grayOthers(dontGray) {//grays all tiles except in 'dontGray' board
	var toSelect = dontGray%9;
	removeGrayedAll();
	for(var i = 0; i < 81; i++) {
		if(!XO[i].classList.contains("selected") && Math.floor(i/9) !== toSelect) {
			XO[i].classList.add("grayed");
		}
	}
}

function removeGrayedAll() { //Removes "gray" class from all tiles
	for(var i = 0; i < 81; i++) XO[i].classList.remove("grayed");
}

function finishGame(winner) {
	updateBoard(true);
	for(let i = 0; i < 81; i++) XO[i].classList.add("selected", winner+"Select");
	for(let i = 0; i < 9; i++) tables[i].classList.add(winner+"winner")
	document.getElementById("outter").classList.add(winner+"winner");
}
