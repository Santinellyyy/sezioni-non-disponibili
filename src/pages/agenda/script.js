/*VARIBLE DECLARATIONS*/
const currentDate = new Date();
const today = currentDate.getDate();
let currentYear = currentDate.getFullYear();
let currentMonth = currentDate.getMonth();
const Month = document.querySelector("#month");
const Year = document.querySelector("#year");
const previousBtn = document.querySelector("#previous-month");
const nextBtn = document.querySelector("#next-month");
const dates = document.querySelectorAll(".NumeroGiorno");
const container = document.querySelectorAll(".date");
const months = [
  "Gennaio",
  "Febbraio",
  "Marzo",
  "Aprile",
  "Maggio",
  "Giugno",
  "Luglio",
  "Agosto",
  "Settembre",
  "Ottobre",
  "Novembre",
  "Dicembre"
];

/*FUNCTION DECLARATIONS*/
const displayMonth = (year, month) => {
  const firstDay = new Date(year, month).getDay() - 1;
  const lastDate = new Date(year, month + 1, 0).getDate();

  Year.textContent = `${year}`;
  Month.textContent = `${months[month]}`;
  
  for (let i = 0; i < dates.length; i++) {
    if (i < firstDay || i >= lastDate + firstDay) {
      dates[i].textContent = "";
    } else {
      dates[i].textContent = i - firstDay + 1;
      //passa di qua 31 volte
      let currentMonthReal = currentDate.getMonth();    
      if(parseInt(dates[i].textContent) === today && month === currentMonthReal) {
          dates[i].classList.remove('notToday');
          dates[i].classList.add('today');
      }else{
          dates[i].classList.remove('Today');
          dates[i].classList.add('notToday');
      }
    }
  }
}

/*DISPLAY CURRENT MONTH*/
displayMonth(currentYear, currentMonth);


function Ritorna(){
  let currentYearVero = currentDate.getFullYear();
  let currentMonthVero = currentDate.getMonth();

  let yearMinus = Number(currentYear) - Number(currentYearVero)
  let monthMinus = Number(currentMonth) - Number(currentMonthVero)

  if(yearMinus > 0 || yearMinus < 0){
    currentYear = currentYearVero
  }

  if(monthMinus > 0 || monthMinus < 0){
    currentMonth = currentMonthVero
  }

  displayMonth(currentYear, currentMonth);
}


/*DISPLAY PREVIOUS MONTH ON BUTTON CLICK*/
previousBtn.addEventListener("click", () => {
  currentMonth--;
  if(currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  }
  displayMonth(currentYear, currentMonth);
});

/*DISPLAY NEXT MONTH ON BUTTON CLICK*/
nextBtn.addEventListener("click", () => {
  currentMonth++;
  if(currentMonth > 11) {
    currentMonth = 0;
    currentYear++;
  }
  displayMonth(currentYear, currentMonth);
});




function MostraEvento(materia){
  if(materia.style.display == 'none') {
    materia.style.display = 'block';
    console.log('apparso')
  }else{
    materia.style.display = 'none';
    console.log('non apparso')
  }
}




