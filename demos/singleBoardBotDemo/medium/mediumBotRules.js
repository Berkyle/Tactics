function addEvents() {
  let XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..8]
  let board = new simpleBoard();
  let page = new pageState(XO);
  let bot = new mediumBot(XO, board, page);
	for(let i = 0; i < 9; i++) {//9-segment loop - adds click event to each tile
    XO[i].addEventListener("click", function() {
      board.move(i);
      bot.runBot();
      board.XTurn = !board.XTurn;
      page.updatePage(board);
    });
  }
}
