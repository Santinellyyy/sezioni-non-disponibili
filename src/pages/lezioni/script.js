let tables = document.querySelectorAll("table");
tables[0].style.display = 'block'


function MostraTabella(){
  let selezione_materia = document.querySelector('#selezione-materia')
  let value_selezione_materia = (selezione_materia.options[selezione_materia.selectedIndex].value)
  let tables = document.querySelectorAll("table")

  for(let i = 0; i < tables.length; i++){
    tables[i].style.display = 'none'
  }

  let table_materia = document.querySelector('#' + value_selezione_materia)
  if(table_materia.style.display == 'none') {
    table_materia.style.display = 'block';
  }else{
    table_materia.style.display = 'none';
  }
}
MostraTabella()