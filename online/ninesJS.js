function addEvents() {
  let XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..80]
  let box = document.getElementsByClassName("radio");

  try {
    let nextMove = ((document.getElementById("ignoreMe").value)%2 == 0) ? "X" : "O";
  }
  catch(error) {
    let nextMove = "X";
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
      for(let j = i; j < size; j++) {
        add[j] += 1;
      }
    }
  }

  for(let i = 0; i < 81; i++) {//81-segment loop - adds click event to each tile
    if(!XO[i].classList.contains("grayed") && !XO[i].classList.contains("selected")) {
      XO[i].addEventListener("click", function() {
        // let taken = true;

        // available.forEach(function(j) {
        //   if(i == j) taken = false;
        // });

        //remove select class and checked from others

        available.forEach(function(j) {
          if(XO[j].innerHTML != "") {
            XO[j].classList.remove("XSelect", "OSelect");
            XO[j].innerHTML = "";
            box[j-add[j]].checked = false;
          }
        });

        XO[i].innerText = nextMove;
        XO[i].classList.add(turn+"Select");
        box[i - add[i]].checked = true;
      });
    }
  }
}

  // let turn = ((available.length%2) == 1) ? "X" : "O";

	// for(let i = 0; i < 81; i++) {//81-segment loop - adds click event to each tile
  //   XO[i].addEventListener("click", function() {
  //     let taken = true;
  //
  //     available.forEach(function(j) {
  //       if(i == j) taken = false;
  //     });
  //
  //     if(!taken && !XO[i].classList.contains("grayed")) {
  //       available.forEach(function(j) {
  //         if(XO[j].innerHTML != "") {
  //           XO[j].classList.remove("XSelect", "OSelect");
  //           XO[j].innerHTML = "";
  //           box[j-add[j]].checked = false;
  //         }
  //       });
  //
  //       XO[i].innerText = turn;
  //       XO[i].classList.add(turn+"Select");
  //       box[i - add[i]].checked = true;
  //     }
  //   });
  // }
// }

// function updateBorders(XO) {
//   let possibleWins = [[0,1,2], [3,4,5], [6,7,8], [0,3,6], [1,4,7], [2,5,8], [0,4,8], [2,4,6]];
//
//   let board = [];
//   for(let i = 0; i<81; i++) {
//     board.push(XO[i].innerText);
//   }
//
//   for(let i = 0; i<9; i++) {
//     let boardWin = "";
//     possibleWins.forEach(function(poss) { //check if someone has won the game.
//   		if(checkTriple(poss[0]+i*9, poss[1]+i*9, poss[2]+i*9, board)) {
//         //update border
//       }
//     });
//   }
//
//
// }





function checkState() {
  let XO = document.getElementsByClassName("board");
  let possibleWins = [[0,1,2], [3,4,5], [6,7,8], [0,3,6], [1,4,7], [2,5,8], [0,4,8], [2,4,6]];

  let board = [];
  for(let i = 0; i<9; i++) {
    board.push(XO[i].innerText);
  }

  let wins = "";
  possibleWins.forEach(function(poss) { //check if someone has won the game.
		if(checkTriple(poss[0], poss[1], poss[2], board)) {
      wins = XO[poss[0]].innerText;
    }
  });

  if(wins != "") {
    document.getElementById("ignoreMe").value = wins;
    return true;
  }

  let isFull = checkFull(XO);
  if(isFull) {
    document.getElementById("ignoreMe").value = "A";
    return true;
  }
}

function checkTriple(x1, x2, x3, txt) {
	if((txt[x1] == txt[x2] && txt[x2] == txt[x3]) && txt[x1] != undefined && txt[x1] != "") {
    return true;
	}
}

function checkFull(XO) {
  var full = 0;
  for(let i = 0; i < 9; i++) {
    if(XO[i].innerText != "") full++
  }

  if(full == 9) return true;
  return false;
}


// function populateHTML() {
// 	for(let i = 0; i < 9; i++) {
//     //<table> elements already created in php ; populate them with rows and inputs
//     document.getElementsByClassName("subtable "+ i)[0].innerHTML += buildTable(i);
// 	}
// }
//
// function buildTable(tableNum) { //tableNum = <0..8>
//   let add = "";
//
//   for(let i = 0; i < 3; i++) {
//     add += "<tr>";
//     for(let j = 0; j < 3; j++) {
//       let radValue = tableNum*9+i*3+j;
//       add += "<input type=\"radio\" name=\"move9\" value=\""+radValue+"\" class=\"radio online\" required>";
//       add += "<td class=\"board\"></td>";
//     }
//     add += "</tr>";
//   }
//
//   return add;
// }
