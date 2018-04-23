function addEvents() {
  populateHTML();

  let XO = document.getElementsByClassName("board"); // array of DOM tiles with indicies [0..80]
  let box = document.getElementsByClassName("radio");

	for(let i = 0; i < 81; i++) {//81-segment loop - adds click event to each tile
    XO[i].addEventListener("click", function() {
      for(let j = 0; j < 81; j++) {
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

function populateHTML() {
	for(let i = 0; i < 9; i++) {
    //<table> elements already created in php ; populate them with rows and inputs
    document.getElementsByClassName("subtable "+ i)[0].innerHTML += buildTable(i);
	}
}

function buildTable(tableNum) { //tableNum = <0..8>
  let add = "";

  for(let i = 0; i < 3; i++) {
    add += "<tr>";
    for(let j = 0; j < 3; j++) {
      let radValue = tableNum*9+i*3+j;
      add += "<input type=\"radio\" name=\"move9\" value=\""+radValue+"\" class=\"radio online\" required>";
      add += "<td class=\"board\"></td>";
    }
    add += "</tr>";
  }

  return add;
}
