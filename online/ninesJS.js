function addEvents() {
  let XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..80]
  let tables = document.getElementsByClassName("subtable");

  let board = new ninerBoard();
  let page = new ninePageState(XO, tables, board);

  try { //Try block will only work if in continue game mode
    let daMoves = JSON.parse(document.getElementById("ignoreMe").value);
    //Catch Game and Page objects up with current game
    daMoves.forEach(function(i) {
        board.move(i);
        page.updateBoard(false, i, board.selClass);
        page.grayOthers(i);
        if(board.checkBoardFull(i%9)){
          page.removeGrayedAll();
        }
        if(board.checkGameWin()) {
          page.updateBoard(true, i, board.selClass);
          page.finishGame(board.winner);
        }
    });
    //objects 'board' and 'page' are now up to date

    var nextMove = ((daMoves.length)%2 == 0) ? "X" : "O";
  }
  catch(error) { //Catch block runs if game is being created
    var nextMove = "X";
  }

  let available = [];

  let add = []; //preallocate 'add[]' to be 81 indicies long
  for(let i = 0; i < 81; i++) {
    add[i] = 0;
  }

  //Update 'add[]' and 'available[]'
  //'add' assists JS with finding the correct radio button to check
  //'available' is a list of available tile positions
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
    document.getElementById("gameForm").innerHTML += "<input type=\"radio\" name=\"move9\" value=\""+tile+"\" class=\"radio online\" required>";
  });

  let box = document.getElementsByClassName("radio");

  //Add events for selecting a game move
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

  let myForm = document.getElementById("gameForm");
  if(myForm.addEventListener) {
    myForm.addEventListener("submit", checkState, false);  //Modern browsers
  }
  else if(myForm.attachEvent) {
    myForm.attachEvent('onsubmit', checkState);            //Old IE
  }
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

  if(moveVal == "") return false;

  let board = new ninerBoard();
  let page = new ninePageState(XO, tables, board);

  try { //Try block will only work if in continue game mode
    let daMoves = JSON.parse(document.getElementById("ignoreMe").value);
    daMoves.push(moveVal);
    daMoves.forEach(function(i) { //Catch Game and Page objects up with current game

        board.move(i);
        page.updateBoard(false, i, board.selClass);
        page.grayOthers(i);
        if(board.checkBoardFull(i%9)){
          page.removeGrayedAll();
        }
        if(board.checkGameWin()) {
          page.updateBoard(true, i, board.selClass);
          page.finishGame(board.winner);
        }
    });
    //objects 'board' and 'page' are now up to date

    // var nextMove = ((document.getElementById("ignoreMe").value)%2 == 0) ? "X" : "O";
    // board.move(moveVal);
    // page.updateBoard(false, moveVal, board.selClass);
    // if(board.checkBoardFull(moveVal%9)){
    //   page.removeGrayedAll();
    // }
    // if(board.checkGameWin()) {
    //   page.updateBoard(true, moveVal, board.selClass);
    //   page.finishGame(board.winner);
    // }
  }
  catch(error) { //Catch block runs if game is being created
    var nextMove = "X";
  }

  let available = [];
  for(let i = 0; i < 81; i++) {
    if(!XO[i].classList.contains("grayed") && !XO[i].classList.contains("selected")) //tile not taken
      available.push(i);
  }

  document.getElementById("submit").value = available.length; //Number of values at HTML construction

  let DBGS = "";
  for(let i = 0; i < 9; i++)
  {
    if(page.tables[i].classList.contains("Awinner"))
      DBGS = DBGS + 'A';
    else if (page.tables[i].classList.contains("Owinner"))
      DBGS = DBGS + 'O';
    else if (page.tables[i].classList.contains("Xwinner"))
      DBGS = DBGS + 'X';
    else  //board not yet won
      DBGS = DBGS + 'N';
  }

  document.getElementById("ignoreMe").value = DBGS; //send state all sneaky-like >:)
  if(board.winner != "") {
    document.getElementById("submit").value = board.winner;
  }

  return true;
}
