function MostraVoti(materia){
    if (materia.style.display === 'none') {
        materia.style.display = 'block';
    } else {
        materia.style.display = 'none';
    }
}

let ButtonPrimoPeriodo = document.getElementById('PrimoPeriodo')
let ButtonSecondoPeriodo = document.getElementById('SecondoPeriodo')

function OnPrimo() {
    //mette primo bottone selezionato
    document.getElementById('PrimoPeriodo').classList.remove('NoSelected')
    document.getElementById('PrimoPeriodo').classList.add('Selected')

    //mette secondo bottone non selezionato
    document.getElementById('SecondoPeriodo').classList.add('NoSelected')
    document.getElementById('SecondoPeriodo').classList.remove('Selected')

    //mette terzo bottone non selezionato
    document.getElementById('TuttiPeriodi').classList.add('NoSelected')
    document.getElementById('TuttiPeriodi').classList.remove('Selected')

    document.getElementById("nuovo_periodo").value = 1;
    document.getElementById("form").submit();
}


function OnSecondo() {
    //mette secondo bottone selezionato
    document.getElementById('SecondoPeriodo').classList.remove('NoSelected')
    document.getElementById('SecondoPeriodo').classList.add('Selected')

    //mette primo bottone non selezionato
    document.getElementById('PrimoPeriodo').classList.add('NoSelected')
    document.getElementById('PrimoPeriodo').classList.remove('Selected')

    //mette terzo bottone non selezionato
    document.getElementById('TuttiPeriodi').classList.add('NoSelected')
    document.getElementById('TuttiPeriodi').classList.remove('Selected')

    document.getElementById("nuovo_periodo").value = 3;
    document.getElementById("form").submit();
}

function OnTerzo() {
    //mette terzo bottone selezionato
    document.getElementById('TuttiPeriodi').classList.remove('NoSelected')
    document.getElementById('TuttiPeriodi').classList.add('Selected')

    //mette primo bottone non selezionato
    document.getElementById('PrimoPeriodo').classList.add('NoSelected')
    document.getElementById('PrimoPeriodo').classList.remove('Selected')

    //mette secondo bottone non selezionato
    document.getElementById('SecondoPeriodo').classList.add('NoSelected')
    document.getElementById('SecondoPeriodo').classList.remove('Selected')

    document.getElementById("nuovo_periodo").value = 5;
    document.getElementById("form").submit();
}