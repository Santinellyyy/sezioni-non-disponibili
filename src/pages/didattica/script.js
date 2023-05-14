let ImgArrow = document.getElementById('img-arrow')

function Folder(cartelle){
  const timeline = new TimelineMax();
  // funzion.DaA(oggetto,secondi, {ProprietàIniziale}, {ProprietàFinale})

  if (cartelle.style.display === 'none') {
    cartelle.style.display = 'block'
    ImgArrow.classList.remove('normale')
    ImgArrow.classList.add('ruotato')
    timeline.fromTo(cartelle,0.5, {opacity: 0}, {opacity: 1})
  } else {
    cartelle.style.display = 'none'
    ImgArrow.classList.add('normale')
    ImgArrow.classList.remove('ruotato')
  }
}


const downloadLinks = document. querySelectorAll(" [data-download]")

downloadLinks.forEach (button => {
  const id = button. dataset. download
  const image = document .getElementById(id)
  const a = document. createElement ("a")

  a.href = image.src
  a.download = ""
  a.style.display = "none"

  button.addEventListener("click", () => {
    document .body .appendChild (a)
    a.click()
    document. body. removeChild (a)
  })
})



function download(f, t) {
  var e = document.createElement('a');
  e.setAttribute('href','data:text/plain;charset=utf-8, '
  + encodeURIComponent(t));
  e.setAttribute('download', f);
  document.body.appendChild(e);
  e.click();
  document.body.removeChild(e);}
  document.getElementById("specialBtn")
  .addEventListener("click", function() {
  var t = document.getElementById("text").value;
  var f = "JavaScript.txt";
  download(f, t);
  }, 
false);