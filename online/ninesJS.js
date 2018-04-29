function addEvents() {
  let XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..80]
  let box = document.getElementsByClassName("radio");

  try {
    var nextMove = ((document.getElementById("ignoreMe").value)%2 == 0) ? "X" : "O";
  }
  catch(error) {
    var nextMove = "X";
  }

  let available = [];
  let add = [];
  for(let i = 0; i < 81; i++) {
    add[i] = 0;
  }

  for(let i = 0; i < 81; i++) {
    if(!XO[i].classList.contains("grayed") && !XO[i].classList.contains("selected")) //tile not taken
      available.push(i);
    else {
      for(let j = i; j < 81; j++) {
        add[j] += 1;
      }
    }
  }

  for(let i = 0; i < 81; i++) {//81-segment loop - adds click event to each tile
    if(!XO[i].classList.contains("grayed") && !XO[i].classList.contains("selected")) {
      XO[i].addEventListener("click", function() {

        //remove current changes
        available.forEach(function(j) {
          if(XO[j].innerHTML != "") {
            XO[j].classList.remove("XSelect", "OSelect");
            XO[j].innerHTML = "";
            box[j-add[j]].checked = false;
          }
        });

        //add new potential changes
        XO[i].innerText = nextMove;
        XO[i].classList.add(nextMove+"Select");
        box[i - add[i]].checked = true;
      });
    }
  }
}





function checkState() {
  let tables = document.getElementsByClassName("subtable");
  let XO = document.getElementsByTagName("td");
  let moveVal = document.querySelector('input[name"move9"]:checked').value;

  let board = new ninerBoard();
  let page = new ninePageState(XO, tables, board);

  board.move(moveVal);
  page.updateBoard(false, moveVal, board.selClass);

  if(board.checkGameWin()){
		page.updateBoard(true, moveVal, board.selClass);
		page.finishGame(board.winner);
  }

  let DBGS = 0;
  for(let i = 0; i < 9; i++) {
    let exponent = 10 ** (8-i);

    if(tables[i].classList.contains("Awinner")) {
      DBGS += exponent*3;
    }
    else if (tables[i].classList.contains("Owinner")) {
      DBGS += exponent*2;
    }
    else if (tables[i].classList.contains("Xwinner")) {
      DBGS += exponent*1;
    }
    else { //board not yet won
      DBGS += 0; //no change
    }
  }

  document.getElementById("ignoreMe").value = DBGS; //send state sneaky-like >:)
  document.getElementById("submit").value = board.winner;

  //
  //
  // let possibleWins = [[0,1,2], [3,4,5], [6,7,8], [0,3,6], [1,4,7], [2,5,8], [0,4,8], [2,4,6]];
  //
  // let board = [];
  // for(let i = 0; i<9; i++) {
  //   board.push(XO[i].innerText);
  // }
  //
  // let wins = "";
  // possibleWins.forEach(function(poss) { //check if someone has won the game.
	// 	if(checkTriple(poss[0], poss[1], poss[2], board)) {
  //     wins = XO[poss[0]].innerText;
  //   }
  // });
  //
  // if(wins != "") {
  //   document.getElementById("ignoreMe").value = wins;
  //   return true;
  // }
  //
  // let isFull = checkFull(XO);
  // if(isFull) {
  //   document.getElementById("ignoreMe").value = "A";
  //   return true;
  // }
}

// function checkTriple(x1, x2, x3, txt) {
// 	if((txt[x1] == txt[x2] && txt[x2] == txt[x3]) && txt[x1] != undefined && txt[x1] != "") {
//     return true;
// 	}
// }
//
// function checkFull(XO) {
//   var full = 0;
//   for(let i = 0; i < 9; i++) {
//     if(XO[i].innerText != "") full++
//   }
//
//   if(full == 9) return true;
//   return false;
// }
