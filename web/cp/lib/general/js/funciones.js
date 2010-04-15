// JavaScript Document
  var expresionfloatVE = /^(\d{1,3}\.){0,6}(\d{1,3})(\,\d{1,6})$/;
  var expresionfloatVE_1 = /^(\d{1,10})(\,\d{1,6})?$/;
  var expresionfloatVE_2 = /^(\d{1,3}\.){1,6}(\d{1,3})(\,\d{1,6})?$/;

  var expresionfloat =  /^(\d{1,3}\,){0,6}(\d{1,3})(\.\d{1,6})$/;
  var expresionfloat_1 =  /^(\d{1,10})(\.\d{1,6})?$/;
  var expresionfloat_2 =  /^(\d{1,3}\,){1,6}(\d{3,3})(\.\d{1,6})?$/;
  ////////////////////////////////////////////////////

		function validarnumero(t)
		{
			valor=document.getElementById(t).value;
			longitud=valor.length;
			bueno=true;
			for(i=0;i<longitud;i++)
			{
				car=valor.substring(i,i+1);
				if ( (!((car>="0") && (car<="9"))) &&(car!=".") )
				{
						bueno=false;
						break;
				}
			}
			return bueno;
		}

		function validarnumeroint(t)
		{
			valor=document.getElementById(t).value;
			longitud=valor.length;
			bueno=true;
			for(i=0;i<longitud;i++)
			{
				car=valor.substring(i,i+1);
				if  (!((car>="0") && (car<="9")))
				{
						bueno=false;
						break;
				}
			}
			return bueno;
		}

		function rayitas(e,tira)
		{

			if (e.keyCode==13)
			{
				long=tira.length;
				i=1;
				if (long > 1)
				{
					i=long;
					while (i>0)
					{
						if ( (tira.charAt(i)=='0') || (tira.charAt(i)=='1') || (tira.charAt(i)=='2') || (tira.charAt(i)=='3') || (tira.charAt(i)=='4') || (tira.charAt(i)=='5') || (tira.charAt(i)=='6') || (tira.charAt(i)=='7') || (tira.charAt(i)=='8') || (tira.charAt(i)=='9'))
						{
							hasta=i+1;
							i=0;
						}
						i=i-1;
					}
				tira= tira.substring(0,hasta);
				return tira;
				}

			}
		}

		function rayitasfc(tira)
		{
				long=tira.length;
				i=1;
				if (long > 1)
				{
					i=long;
					while (i>0)
					{
						if ( (tira.charAt(i)=='0') || (tira.charAt(i)=='1') || (tira.charAt(i)=='2') || (tira.charAt(i)=='3') || (tira.charAt(i)=='4') || (tira.charAt(i)=='5') || (tira.charAt(i)=='6') || (tira.charAt(i)=='7') || (tira.charAt(i)=='8') || (tira.charAt(i)=='9'))
						{
							hasta=i+1;
							i=0;
						}
						i=i-1;
					}
				tira= tira.substring(0,hasta);
				return tira;
				}
		}

		function focos(e,fc)
		{
		 if (e.keyCode==13)
			{
//			alerT('ddd');
				//document.getElementById(fc).focus();
				$(fc).focus();
				$(fc).select();
				//document.getElementById(fc).select();
			}
		}

		function format(nStr, inD, outD, sep)
		{
			nStr += '';
			var dpos = nStr.indexOf(inD);
			var nStrEnd = '';
			if (dpos != -1) {
				nStrEnd = outD + nStr.substring(dpos + 1, nStr.length);
				nStr = nStr.substring(0, dpos);
			}
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(nStr)) {
				nStr = nStr.replace(rgx, '$1' + sep + '$2');
			}
			return nStr + nStrEnd;
		}


		function QuitarComa(valor,id)
		{
			if (valor!="")
			{
				str= document.getElementById(id).value.toString();
				str= str.replace(',','');
				str= str.replace(',','');
				str= str.replace(',','');

				var num=parseFloat(str);  //Valor Real sin (.) y ni (,)
				document.getElementById(id).value=num;
			}
		}


		function ColocarFormato(key,valor,id)
		{
		   if (key.keyCode==13)
			{
//			valor= document.getElementById(id).value.toString();
  		    valor= valor.replace(',','');
			valor= valor.replace(',','');
			valor= valor.replace(',','');
			var valor=parseFloat(valor);
			document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');
			}
		}


		function ColocarFormatoOnBlue(key,valor,id)
		{
		   if ((key.keyCode!=13) && (valor!=""))
			{
  		    valor= valor.replace(',','');
			valor= valor.replace(',','');
			valor= valor.replace(',','');

			var valor=parseFloat(valor);
			document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');
			}
		}

		function IsNumeric(valor)// FORMATEAR FECHA
		{
		var log=valor.length; var ok="S";
		for (x=0; x<log; x++)
		{ v1=valor.substr(x,1);
		v2 = parseInt(v1);
		//Compruebo si es un valor numérico
		if (isNaN(v2)) { ok= "N";}
		}
		if (ok=="S") {return true;} else {return false; }
		}

		var primerslap=false;
		var segundoslap=false;
		var tercerslap=false;

		function formateafecha(fecha)
		{
		var long = fecha.length;
		var dia;
		var mes;
		var ano;

		if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2);
		if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; }
		else { fecha=""; primerslap=false;}
		}
		else
		{ dia=fecha.substr(0,1);
		if (IsNumeric(dia)==false)
		{fecha="";}
		if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; }
		}
		if ((long>=5) && (segundoslap==false))
		{ mes=fecha.substr(3,2);
		if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; }
		else { fecha=fecha.substr(0,3); segundoslap=false;}
		}
		else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } }
		if (long>=7)
		{ ano=fecha.substr(6,4);
		if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); }
		else { if (long==10){ if ((ano==0) || (ano<1900) || (ano>2100)) { fecha=fecha.substr(0,6); } } }
		}

		if (long>=10)
		{
		fecha=fecha.substr(0,10);
		dia=fecha.substr(0,2);
		mes=fecha.substr(3,2);
		ano=fecha.substr(6,4);
		// Año no viciesto y es febrero y el dia es mayor a 28
		if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; }
		}
		return (fecha);
	}

	function verificar_campo_clave(tipo,valor,msg)
	{
		if (msg=="")
		{
			msg="No puede salvar sin introducir todos los campos claves";
		}
		switch (tipo)
		{

			//tira
			 case 0 :
					if (valor=="")
					{
						alert(msg);
						return false;
					}
					else
					{
						return true;
					}
					break;

			//numerogrid
			 case 1 :
				if (valor=="0.00")
					{
						alert(msg);
						return false;
					}
					else
					{
						return true;
					}
				break;

		 }

	}


	 function desbloquearGrip(col,fila,desde)
	   {
   		   i=1;
		   while (i<=fila)
		   {
 			    c=desde;  //A partir de que columna va a empezar a desabilitar
				while (c<=col)
				{
					var cx="x"+i+c;
					if ($(cx)){
						document.getElementById(cx).disabled=false
						}
					c=c+1;
				}
				i=i+1;
			}

	   }

	   function bloquearGrip(col,fila,desde)
	   {
   		   i=1;
		   //c=2;
		   while (i<=fila)
		   {
			   c=desde;  //A partir de que columna va a empezar a desabilitar
				while (c<=col)
				{
					var cx="x"+i+c;
					//alert(cx);
					if ($(cx)){
						//document.getElementById(cx).disabled="true";
						document.getElementById(cx).readonly="true";
					}
					c=c+1;
				}
				i=i+1;
			}
	   }


	String.prototype.pad = function(l, s, t){
	      return s || (s = " "), (l -= this.length) > 0 ? (s = new Array(Math.ceil(l / s.length)
		+ 1).join(s)).substr(0, t = !t ? l : t == 1 ? 0 : Math.ceil(l / 2))
		+ this + s.substr(0, l - t) : this;
         };


	function TrimString(sInString)
	{
	  sInString = sInString.replace( /^\s+/g, "" );// strip leading
	  return sInString.replace( /\s+$/g, "" );// strip trailing
	}


	function compareDate(dateA, dateB, dateC)
	{
	   dateA1=new Date(dateA);
	   dateB1=new Date(dateB);
	   dateC1=new Date(dateC);

	   timeDifference = dateA1 - dateB1;
	   timeDifference2 = dateA1 - dateC1;
	//alert(timeDifference);
	   if ((timeDifference >= 0) && (timeDifference2 <= 0))
	      return 1;  //verdadero
	   else if ((timeDifference <= 0) && (timeDifference2 >= 0))
	      return -1;
	   else
	      return 0;  //falso
	}

	function compareDate2(dateA, dateB)
	{
	   dateA1=new Date(dateA);
	   dateB1=new Date(dateB);

	   timeDifference = dateA1 - dateB1;
	//alert(timeDifference);
	   if (timeDifference > 0)
	      return 1;  //verdadero
	   else if (timeDifference < 0)
	      return -1;
	   else
	      return 0;  //falso
	}

	function mostrarfecha()
	{
		var mydate=new Date();
		var year=mydate.getYear();
		if (year < 1000)
			year+=1900;

		var day=mydate.getDay();
		var month=mydate.getMonth()+1;

		if (month<10)
			month="0"+month;

		var daym=mydate.getDate();
		if (daym<10)
			daym="0"+daym;

		return daym+"/"+month+"/"+year;
	}


  function ValidarNumeroV2VE2(val)
  {
    if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2)) return true;
    else return false;
  }

  // Pasando el Objeto HTML
  function ValidarNumeroV2VE(t)
  {
    var val = $(t).value;

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
          if(n!=(miles-1)) floatve = floatve + ',';
        }
        floatve = floatve + '.';
        if (numero.length>1) floatve = floatve + numero[1].substring(0,3);
        else floatve = floatve + '00';
        return floatve;
    }else {
      if(ValidarNumeroV2VE_(val)) return val; else return '0.00';
    }
  }


  function formatoDecimal(e,id)
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


