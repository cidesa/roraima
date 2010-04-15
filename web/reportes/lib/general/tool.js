 //FUNCIONES JAVASCRIPT
 var expresionfloatVE = /^(\d{1,3}\.){0,6}(\d{1,3})(\,\d{1,6})$/;
 var expresionfloatVE_1 = /^(\d{1,10})(\,\d{1,6})?$/;
 var expresionfloatVE_2 = /^(\d{1,3}\.){1,6}(\d{1,3})(\,\d{1,6})?$/;

 var expresionfloat =  /^(\d{1,3}\,){0,6}(\d{1,3})(\.\d{1,6})$/;
 var expresionfloat_1 =  /^(\d{1,10})(\.\d{1,6})?$/;
 var expresionfloat_2 =  /^(\d{1,3}\,){1,6}(\d{3,3})(\.\d{1,6})?$/;

	function catalogo(catal,pos)
	{
	    pagina="../../lib/general/Catalogo.php?id="+catal+"&pos="+pos;
	    window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
	}

 	function entermonto(e,id)
  	{
    if (e.keyCode==13  || e.keyCode==9)
    {
      if(ValidarNumeroV2Float(id))
        elnum = FloattoFloatVE($(id).value);
      else
        if(ValidarNumeroV2VE(id))
        {
          elnum = FloatVEtoFloat($(id).value);
          elnum = FloattoFloatVE(elnum);
        }
        else{elnum = '0,00';}
      $(id).value = elnum;
    }

  	} //end function

	  // Validar si puede ser parseado por las funciones
	  function ValidarNumeroV2(t)
	  {
	    if(ValidarNumeroV2VE(t) || ValidarNumeroV2Float(t)) return true;
	    else return false;
	  }

	  // Pasando el Objeto HTML
	  function ValidarNumeroV2VE(t)
	  {
	    var val = $(t).value;

	    if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2)) return true;
	    else return false;
	  }

	  // Pasando el valor string
	  function ValidarNumeroV2VE_(t)
	  {
	    var val = t;

	    if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2)) return true;
	    else return false;
	  }

	  // Pasando el Objeto HTML
	  function ValidarNumeroV2Float(t)
	  {
	    var val = $(t).value;

	    if(val.match(expresionfloat_1) || val.match(expresionfloat_2) || val.match(expresionfloat)) return true;
	    else return false;
	  }

	  // Pasando el Valor String
	  function ValidarNumeroV2Float_(t)
	  {
	    var val = t;

	    if(val.match(expresionfloat_1) || val.match(expresionfloat_2) || val.match(expresionfloat)) return true;
	    else return false;
	  }

	  function FloatVEtoFloat(val)
	  {

	    try{
	      if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2)){
	        var sinpuntos = val.gsub(/\./, '');
	        var valor_en_float = parseFloat(sinpuntos.gsub(/,/, '.'));
	        if(isNaN(valor_en_float))
	          return 0.00;
	        else return valor_en_float
	      }else return 0.00;
	    }catch(e){return 0.00;}
	  }

	  function FloattoFloatVE(monto)
	  {
	    var val = monto.toString()
	    var expresion = /^(\d{1,3}\,?){0,6}(\d{1,3})(\.\d{1,6})?$/;
	    if(val.match(expresion)){
	        //monto = redondeo2decimales(monto);
	        //val = monto.toString();
	        var numero = null;
	        if(val.substring(val.length-3,val.length-2)!=',' && val.substring(val.length-2,val.length-1)!=',')
	          {numero = val.gsub(/\,/,'');}
	        else {
	          numero = val.gsub(/\./,'');
	          numero = numero.gsub(/\,/,'.');
	        }
	        numero = numero.split(/\./);
	        var digitos = numero[0].length;
	        var primer = digitos % 3;
	        var miles = Math.ceil(digitos / 3);
	        var i = 0;
	        var floatve = '';
	        for(var n=0;n<miles;n++) {
	          if(n==0){
	            if(primer==0){
	              floatve = floatve + numero[0].substring(0,3);
	              i += 3;
	            }
	            else{
	              floatve = floatve + numero[0].substring(0,primer);
	              i += primer;
	            }
	          }
	          else{
	            floatve = floatve + numero[0].substring(i,i+3);
	            i += 3;
	          }
	          if(n!=(miles-1)) floatve = floatve + '.';
	        }
	        floatve = floatve + ',';
	        if (numero.length>1) floatve = floatve + numero[1].substring(0,3);
	        else floatve = floatve + '00';
	        return floatve;
	    }else {
	      if(ValidarNumeroV2VE_(val)) return val; else return '0,00';
	    }
	  }

	  function toFloat(id)
	  {
	    var elnum = 0.00;

		  if(ValidarNumeroV2Float(id))
			elnum = parseFloat($(id).value);
		  else
			if(ValidarNumeroV2VE(id))
			  elnum = FloatVEtoFloat($(id).value);
			else
			  elnum = 0.00;

		return elnum;
	  } //end function