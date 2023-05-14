const body = document.querySelector('.body');
const timeline = new TimelineMax();

// funzion.DaA(oggetto,secondi, {ProprietàIniziale}, {ProprietàFinale})
timeline.fromTo(body,1.2, {opacity: 0}, {opacity: 1})


function Menu() {
    let Menu = document.getElementById('Menu');
    if (Menu.style.display === 'none') {
        Menu.style.display = 'flex';
    } else {
        Menu.style.display = 'none';
    }
}