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

  let DBGS = "";
  for(let i = 0; i < 9; i++)
  {
    if(tables[i].classList.contains("Awinner")) {
      DBGS = DBGS + 'A';
    }
    else if (tables[i].classList.contains("Owinner")) {
      DBGS = DBGS + 'O';
    }
    else if (tables[i].classList.contains("Xwinner")) {
      DBGS = DBGS + 'X';
    }
    else { //board not yet won
      DBGS = DBGS + 'N';
    }
  }

  document.getElementById("ignoreMe").value = DBGS; //send state all sneaky-like >:)
  document.getElementById("submit").value = board.winner;

  alert(DBGS);

  return false;
}
