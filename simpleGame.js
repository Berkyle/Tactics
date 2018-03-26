var XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..8]
var txt = []; //local string array to simplify string comparison
var isX = true; //Global boolean - switches value with each turn - currently starts with X
var selClass = ""; // "OSelect" or "XSelect", used to add the CSS class to style tiles

var possibleWins = [[0,1,2], [3,4,5], [6,7,8], [0,3,6], [1,4,7], [2,5,8], [0,4,8], [2,4,6]];
		//^^^ The array of possible wins. CheckTriple() uses this list to find three-in-a-rows

//Adds JavaScript click events to each board tile.
function addEvents() {
	for(let i = 0; i < 9; i++) {//9-segment loop - adds click event to each tile
		XO[i].addEventListener("click", function() {
			selClass = isX ? "XSelect" : "OSelect";
			if(!this.classList.contains("selected")) { //You can't change a file that has been selected already
				this.classList.add("selected", selClass);
				this.innerText = selClass.charAt(0); //adds 'X' or 'O'
				isX = !isX;
				txt[i] = XO[i].innerText; //Adds 'X' or 'O' to the respective index in txt
				possibleWins.forEach(function(poss) { //check if someone has won the game.
					checkTriple(poss[0], poss[1], poss[2]);
				});
			}
		});
	}
}

function checkTriple(x1, x2, x3) {
	if((txt[x1] == txt[x2] && txt[x2] == txt[x3]) && txt[x1] != undefined) {
		[x1,x2,x3].forEach(function(index) {
			XO[index].classList.add("winner");
		});
		for(let i = 0; i < 9; i++) {
			XO[i].classList.remove("OSelect","XSelect");	//remove styling classes
			XO[i].classList.add(txt[x1]+"Select","selected"); //add correct styling class
		}
	}
}

/*------------------------------------------------------------------------------
--------------------------   Style Class Description   -------------------------
--------------------------------------------------------------------------------

> board
	The board class is what styles the tile document objects. Read more in the
	simpleStyle.css file.

> OSelect, XSelect
	A tile document object with one of these classes will be colored orange if
	the tile is an 'O', or blue if the tile is an 'X'. When the game is won,
	every tile is given the OSelect/XSelect associated with the winning side.

> selected
	The selected class is added to a tile document object if that tile has a value
	in its innerHTML attribute (those values being X or O). If a tile has the
	selected class, it can not have its value changed via the click event.

> winner
	Adds a green border to the three tiles that illustrate the game-winning move.

------------------------------------------------------------------------------*/
