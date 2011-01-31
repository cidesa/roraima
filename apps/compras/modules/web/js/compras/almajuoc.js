
  function validarRango(id)
{
	// alert('Entro');
      //intento convertir a entero.
     //si era un entero no le afecta, si no lo era lo intenta convertir
     var valor = $(id).value;
     valor = parseFloat(valor);

	  var aux = id.split("_");

   	  var name=aux[0];
   	  var fila=aux[1];
   	  var col=parseInt(aux[2]);

      var coldes=col+1;
      var valor2  = name+"_"+fila+"_"+coldes;

      id2 = $(valor2).value;

      id2 = parseFloat(id2);

      if (id2 < valor)
      {
      $(valor).value = '0';
      $(valor).focus();
      }
}


  function totalfila(id)
  {

    var fila = id.split('_')[0]+'_'+id.split('_')[1]+'_';

    var diferencia_ajuste = toFloat($(fila+'5').value) - toFloat($(fila+'4').value);

    var costo_unidad = toFloat($(fila+'7').value) / toFloat($(fila+'5').value);

    $(fila+'7').value = toString(costo_unidad * diferencia_ajuste);

    //alert(toFloat($(fila+'4').value));

  }

  function toFloat(val)
  {
    var expresion = /^(\d{1,3}\.){0,6}(\d{1,3})(\,\d{1,2})?$/;
    if(val.match(expresion)){
      if(true){
        var sinpuntos = val.gsub(/\./, '');
        var valor_en_float = parseFloat(sinpuntos.gsub(/,/, '.'));
        if(isNaN(valor_en_float))
          return 0.00;
        else return valor_en_float
      }else{
        return 0.00;
      }
    }
  }

  function toString(val)
  {
    var strval = val.toString();
    return strval;
  }
