function addEvents() {
  let XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..80]
  let tables = document.getElementsByClassName("subtable");
  let box = document.getElementsByClassName("radio");

  let board = new ninerBoard();
  let page = new ninePageState(XO, tables, board);
  //console.log(document.getElementById("ignoreMe").value);

  let daMoves = JSON.parse(document.getElementById("ignoreMe").value);

  daMoves.forEach(function(i) {
    if(!page.XO[i].classList.contains("selected") && !page.XO[i].classList.contains("grayed")){
      board.move(i);
      page.updateBoard(false, i, board.selClass);
      page.grayOthers(i);
      if(board.checkBoardFull(i%9)){
        page.removeGrayedAll();
      }
      if(board.checkGameWin()){
        page.updateBoard(true, i, board.selClass);
        page.finishGame(board.winner);
      }
    }
  });

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

  available.forEach(function(tile) {
    document.getElementsByTagName("body")[0].innerHTML += "<input type=\"radio\" name=\"move9\" value=\""+tile+"\" class=\"radio online\" required>";
  });


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

  document.getElementById("submit").addEventListener("click", function() {
    let myInputs = document.getElementsByClassName("online");
    let someChecked = false;

    for (let i = 0; i < available.length; i++) {
      if(inputs[i].checked == true) {
        someChecked = true;
        break;
      }
    }

    if(someChecked) {
      let DBGS = "";
      for(let i = 0; i < 9; i++)
      {
        if(page.tables[i].classList.contains("Awinner")) {
          DBGS = DBGS + 'A';
        }
        else if (page.tables[i].classList.contains("Owinner")) {
          DBGS = DBGS + 'O';
        }
        else if (page.tables[i].classList.contains("Xwinner")) {
          DBGS = DBGS + 'X';
        }
        else { //board not yet won
          DBGS = DBGS + 'N';
        }
      }

      document.getElementById("ignoreMe").value = DBGS; //send state all sneaky-like >:)
      document.getElementById("submit").value = board.winner;
    }
  });
}





function checkState() {
  let tables = document.getElementsByClassName("subtable");
  let XO = document.getElementsByTagName("td");
  let radios = document.getElementsByClassName("radio");

  let moveVal = "";
  for(let i = 0; i < 81; i++) {
    if(radios[i].checked) {
      moveVal = radios[i].value;
      break;
    }
  }


  let board = new ninerBoard();
  let page = new ninePageState(XO, tables, board);

  board.move(moveVal);
  page.updateBoard(false, moveVal, board.selClass);

  console.log(board.subBoards);

  if(board.checkGameWin()){
		page.updateBoard(true, moveVal, board.selClass);
		page.finishGame(board.winner);
  }
  console.log(board.subBoards);

  let DBGS = "";
  for(let i = 0; i < 9; i++)
  {
    if(page.tables[i].classList.contains("Awinner")) {
      DBGS = DBGS + 'A';
    }
    else if (page.tables[i].classList.contains("Owinner")) {
      DBGS = DBGS + 'O';
    }
    else if (page.tables[i].classList.contains("Xwinner")) {
      DBGS = DBGS + 'X';
    }
    else { //board not yet won
      DBGS = DBGS + 'N';
    }
  }
  console.log(DBGS);
  console.log(board.subBoards);

  document.getElementById("ignoreMe").value = DBGS; //send state all sneaky-like >:)
  document.getElementById("submit").value = board.winner;

  console.log(DBGS);

  return false;
}
