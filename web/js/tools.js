//FUNCIONES JAVASCRIPT

		/////////////////////////////////////////////////////////////////////////
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

		/////////////////////////////////////////////////////////////////////////		
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
		

		/////////////////////////////////////////////////////////////////////////
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
	
	function disableObjetos(obj,val)
	{
		for(i=0;i<obj.length;i++) document.getElementById(obj[i]).disabled = val;
	}

	function disableAllObjetos(obj,val,form)
	{
		for(i=0;i<document.forms[0].elements.length;i++) document.forms[0].elements[i].disabled = val;
		
		for(i=0;i<obj.length;i++) document.getElementById(obj[i]).disabled = !val;
	}
	
	
