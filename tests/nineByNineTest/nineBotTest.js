function populateHTML() {
	let add = "<tr><td class=\"board\"></td><td class=\"board\"></td><td class=\"board\"></td></tr>";
	for(let i = 0; i < 9; i++) {
		for(let j = 0; j < 3; j++) document.getElementsByClassName("subtable "+ i)[0].innerHTML += add
	}
	addEvents();
}
function addEvents() {
  let tables = document.getElementsByClassName("subtable");
  let XO = document.getElementsByTagName("td");
  let board = new ninerBoard();
	let move;
	let counrter = 0;
	let XorO;
  let page = new ninePageState(XO, tables, board);
	let bot = new hardBot(XO, board, page);
  for(let i = 0; i < 81; i++){
    XO[i].addEventListener("click", function(){
      if(!this.classList.contains("selected") && !this.classList.contains("grayed")){
				XorO = board.XTurn ? "X" : "O";
				move = bot.runBot();
				counrter++;
				let testString = "<td class=\"testBox\">    ";
				testString += ""+counrter+": "+move+"("+XorO+")    </td>";
				document.getElementsByClassName("moveContainer")[0].innerHTML += testString;
				while(!board.checkGameWin()){
						XorO = board.XTurn ? "X" : "O";
						move =bot.runBot();
						counrter++;
						testString = "<td class=\"testBox\">    "+counrter+": "+move+"("+XorO+")    ";
						testString += " </td>";
						document.getElementsByClassName("moveContainer")[0].innerHTML += testString;
				}

      }
    });
  }
}
