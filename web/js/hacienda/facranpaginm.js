function Multiplicar_uno()
{
  valor1=toFloat('fcvalinm_valmtr');
  valor2=toFloat('fcvalinm_porvalfis');
  if ($('fcvalinm_valmtr').value>0)
  {
  	resultado=(valor1*valor2)/100;
  	$('fcvalinm_valfis').value=format(resultado.toFixed(2),'.',',','.');
  }
  else
  {
  	alert('Valores tienen que ser mayor que cero');
  }
}

function Calculo_fila2(id)
{
  	var aux  = id.split("_");
    var name = aux[0];
    var fil  = parseInt(aux[1]);
    var col  = parseInt(aux[2]);
    var columna_seleccionada = name+"_"+fil+"_"+col;
    var proxima_columna = name+"_"+fil+"_4";
    $(proxima_columna).value=format($(columna_seleccionada).value.toFixed(2),'.',',','.');
    $(columna_seleccionada).value=format($(proxima_columna).value.toFixed(2),'.',',','.');
}

function Calculo_fila4(id)
{
  	var aux  = id.split("_");
    var name = aux[0];
    var fil  = parseInt(aux[1]);
    var col  = parseInt(aux[2]);
    var columna_seleccionada = name+"_"+fil+"_"+col;
    var proxima_columna = name+"_"+fil+"_6";
    $(proxima_columna).value=format($(columna_seleccionada).value.toFixed(2),'.',',','.');
    $(columna_seleccionada).value=format($(proxima_columna).value.toFixed(2),'.',',','.');
}


function num(e)
{
      evt = e ? e : event;
      tcl = (window.Event) ? evt.which : evt.keyCode;
      if ((tcl < 48 || tcl > 57))
      {
          return false;
      }
      else if (tcl == 20)
      {
          return false;
      }
     return true;
}