// JavaScript Document


var pong;
function makeArray(n){
  this.length = n;
  for (i=1;i<=n;i++){
    this[i]=0;
  }
  return this;
}

// standard date display function with y2k compatibility
function displayDate() {
  var this_month = new makeArray(12);
  this_month[0]  = "Enero";
  this_month[1]  = "Febrero";
  this_month[2]  = "Marzo";
  this_month[3]  = "Abril";
  this_month[4]  = "Mayo";
  this_month[5]  = "Junio";
  this_month[6]  = "Julio";
  this_month[7]  = "Agosto";
  this_month[8]  = "Septiembre";
  this_month[9]  = "Octubre";
  this_month[10] = "Noviembre";
  this_month[11] = "Diciembre";

  var this_day_e = new makeArray(7);
  this_day_e[0]  = "Domingo";
  this_day_e[1]  = "Lunes";
  this_day_e[2]  = "Martes";
  this_day_e[3]  = "Miércoles";
  this_day_e[4]  = "Jueves";
  this_day_e[5]  = "Viernes";
  this_day_e[6]  = "Sábado";

  var today = new Date();
  var day   = today.getDate();
  var month = today.getMonth();
  var year  = today.getYear();
  var dia = today.getDay();
    if (year < 1000) {
       year += 1900; }
  return( " " + this_day_e[dia] + ", " + day + " de " + this_month[month] + " " + year);
}


