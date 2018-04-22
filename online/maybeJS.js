function addEvents() {
  let XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..8]
  let box = document.getElementsByClassName("radio");

	for(let i = 0; i < 9; i++) {//9-segment loop - adds click event to each tile
    XO[i].addEventListener("click", function() {
      for(let j = 0; j < 9; j++) {
        XO[j].classList.remove("XSelect");
        XO[j].innerHTML = "";
        box[j].checked = false;
      }
      XO[i].innerHTML = "X";
      box[i].checked = true;
      XO[i].classList.add("XSelect");
    });
  }
}
