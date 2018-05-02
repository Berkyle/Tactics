class easyBot {
  constructor(XO, board, page){
    this.XO = XO;
    this.board = board;
    this.winner = "";
    this.page = page;
  }
  runBot(){
    let botMove = this.randomMove();
    if(this.board.tiles[botMove] == undefined){
      this.board.tiles[botMove] = this.board.XTurn? "X":"O";
      this.board.checkWin(this.board.tiles, this.board.possibleWins);
    }
  }
  randomMove(){
    let validMoves = [];
    for(let i = 0; i < 9; i++){
      if(this.board.tiles[i] == undefined){
        validMoves.push(i);
      }
    }
    let random = Math.floor((Math.random() * validMoves.length));
    return validMoves[random];
  }
  checkWinBot(tiles, winComb){
    let winner = "";
    winComb.forEach(function(x){
      if((tiles[x[0]] == tiles[x[1]] && tiles[x[0]] == tiles[x[2]]) && tiles[x[0]] != undefined) {
        winner = tiles[x[0]];;
      }
    });
    this.winner = winner;
  }
}
