<!--

/*
fechahora.js
Fecha en formato dia y hora
*/

var tags_before_clock = "<font face='arial' size='2' color='#1C3494'>"
var tags_after_clock  = "</font>"

if(navigator.appName == "Netscape") {
document.write('<layer id="clock"></layer><br>');
}

if (navigator.appVersion.indexOf("MSIE") != -1){
document.write('<span id="clock"></span>');
}

DaysofWeek = new Array()
  DaysofWeek[0]="Domingo"
  DaysofWeek[1]="Lunes"
  DaysofWeek[2]="Martes"
  DaysofWeek[3]="Miércoles"
  DaysofWeek[4]="Jueves"
  DaysofWeek[5]="Viernes"
  DaysofWeek[6]="Sábado"

Months = new Array()
  Months[0]="Enero"
  Months[1]="Febrero"
  Months[2]="Marzo"
  Months[3]="ABril"
  Months[4]="Mayo"
  Months[5]="Junio"
  Months[6]="Julio"
  Months[7]="Agosto"
  Months[8]="Septiembre"
  Months[9]="Octubre"
  Months[10]="Noviembre"
  Months[11]="Diciembre"

function upclock(){
var dte = new Date();
var hrs = dte.getHours();
var min = dte.getMinutes();
var sec = dte.getSeconds();
var day = DaysofWeek[dte.getDay()]
var date = dte.getDate()
var month = Months[dte.getMonth()]
var year = dte.getFullYear()

var col = ":";
var spc = " ";
var com = ",";
var apm;
var de  = "de";
var del = "del";

if (12 < hrs) {
apm="pm";
hrs-=12;
}

else {
apm="am";
}

if (hrs == 0) hrs=12;
if (hrs<=9) hrs="0"+hrs;
if (min<=9) min="0"+min;
if (sec<=9) sec="0"+sec;

if(navigator.appName == "Netscape") {
document.clock.document.write(day+spc+date+spc+de+spc+month+spc+del+spc+year+spc+hrs+col+min+col+sec+spc+apm);
document.clock.document.close();
}

if (navigator.appVersion.indexOf("MSIE") != -1){
clock.innerHTML = tags_before_clock+day+spc+date+spc+de+spc+month+spc+del+spc+year+spc+hrs+col+min+col+sec+spc+apm+tags_after_clock;
}
}

setInterval("upclock()",1000);

//-->