function addEvents() {
  let XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..8]
  let box = document.getElementsByClassName("radio");
  // let board = new simpleBoard();
  // let page = new pageState(XO);

	for(let i = 0; i < 9; i++) {//9-segment loop - adds click event to each tile
    XO[i].addEventListener("click", function() {
      for(let j = 0; j < 9; j++) {
        XO[j].innerHTML = "";
        box[j].checked = false;
      }
      XO[i].innerHTML = "X";
      box[i].checked = true;
      // for(let k = 0; k < 9; k++) {
      //   console.log(box[k]);
      // }
      // board.move(i);
      // page.updatePage(board);
    });
  }
}
