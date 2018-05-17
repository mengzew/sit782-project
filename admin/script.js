
//calender
function calendar() {
  var day=['Sunday','Monday','Tuesday','Wedensday','Thursday','Friday','Saturday'];
  var month=['January','February','March','April','May','June','July','August','September','October','November','December'];
  var d=new Date();
  setText('calendar-day', day[d.getDay()]);
  setText('calendar-date', d.getDate());
  setText('calendar-month-year', month[d.getMonth()] + ' ' + (1900 + d.getYear()));

  setText('calendar-day2', day[d.getDay() + 1]);
  setText('calendar-date2', d.getDate() + 1);
  setText('calendar-month-year2', month[d.getMonth()] + ' ' + (1900 + d.getYear()));

  setText('calendar-day3', day[d.getDay() + 2]);
  setText('calendar-date3', d.getDate() - 28);
  setText('calendar-month-year3', month[d.getMonth()+1] + ' ' + (1900 + d.getYear()));
}


//set text value
function setText(id, val) {
  if(val < 10){
    val = '0' + val;
  }
  document.getElementById(id).innerHTML = val;
}



//call calendar()
window.onload = calendar;