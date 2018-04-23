function addEvents() {
  let XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..8]
  let box = document.getElementsByClassName("radio");

  let available = [];
  let add = [];
  for(let i = 0; i < 9; i++) {
    add[i] = 0;
  }

  for(let i = 0; i < 9; i++) {
    if(XO[i].innerHTML == "") //tile not taken
      available.push(i);
    else {
      XO[i].classList.add(XO[i].innerHTML+"Select");
      for(let j = i; j < 9; j++) {
        add[j] += 1;
      }
    }
  }

  let turn = ((available.length%2) == 1) ? "X" : "O";

	for(let i = 0; i < 9; i++) {//9-segment loop - adds click event to each tile
    XO[i].addEventListener("click", function() {
      let taken = true;

      available.forEach(function(j) {
        if(i == j) taken = false;
      });

      if (!taken) {
        available.forEach(function(j) {
          XO[j].classList.remove("XSelect", "OSelect");
          XO[j].innerHTML = "";
          box[j-add[j]].checked = false;
        });
        XO[i].innerHTML = turn;
        XO[i].classList.add(turn+"Select");
        box[i - add[i]].checked = true;
      }
    });
  }
}
