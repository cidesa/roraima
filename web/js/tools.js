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

		/////////////////////////////////////////////////////////////////////////
		function disableObjetos(obj,val) // Deshabilita los objetos segun un arreglo de objetos
		{
			for(i=0;i<obj.length;i++) document.getElementById(obj[i]).disabled = val;
		}
	
		/////////////////////////////////////////////////////////////////////////
		function disableAllObjetos(obj,val) // Desahabilita todos los objetos menos los del arreglo
		{
			for(i=0;i<document.forms[0].elements.length;i++) document.forms[0].elements[i].disabled = val;
			
			for(i=0;i<obj.length;i++) document.getElementById(obj[i]).disabled = !val;
		}
	
	
    function focos(e,fc)
		{
		 if (e.keyCode==9)
			{
				document.getElementById(fc).focus();
				document.getElementById(fc).select();
			}
		}
		
	
  function entermontootro(e,id,fc)
   {
	if (e.keyCode==13)		
	 {				
		if (validarnumero(id)==true)                    
		 {
		   str= document.getElementById(id).value.toString();		   
		   var num=parseFloat(str);								
		   document.getElementById(id).value=format(num.toFixed(2),'.','.',',');		
 		   focos(e,fc);
	     } 
	    else
		 {	
 		  alert("Dato Invalido");	
		  document.getElementById(id).value='0.00';
		  document.getElementById(id).focus();
		  document.getElementById(id).select();
	     }
	 }				
   } //end function
		
  function currencyFormat(fld, milSep, decSep, e) {
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true; // Enter
    key = String.fromCharCode(whichCode); // Get key value from key code
    if (strCheck.indexOf(key) == -1) return false; // Not a valid key
    len = fld.value.length;
    for(i = 0; i < len; i++)
     if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;
    aux = '';
    for(; i < len; i++)
     if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) fld.value = '';
    if (len == 1) fld.value = '0'+ decSep + '0' + aux;
    if (len == 2) fld.value = '0'+ decSep + aux;
    if (len > 2) {
     aux2 = '';
     for (j = 0, i = len - 3; i >= 0; i--) {
      if (j == 3) {
       aux2 += milSep;
       j = 0;
      }
      aux2 += aux.charAt(i);
      j++;
     }
     fld.value = '';
     len2 = aux2.length;
     for (i = len2 - 1; i >= 0; i--)
      fld.value += aux2.charAt(i);
     fld.value += decSep + aux.substr(len - 2, len);
    }
    return false;
   } 
	
 function ColocarFormato(key,valor,id)
		{		
		   if (key.keyCode==13)
			{
			//str= document.getElementById(id).value.toString();			
			var valor=parseFloat(valor); 								
			document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');			
			}
		}	
  function ColocarFormatoOnBlue(key,valor,id)
		{
		   if ((key.keyCode!=13) && (valor!=""))
			{		
			var valor=parseFloat(valor); 								
			document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');			
			}
		}
  function rayitas(tira)
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
  function rayitas2(e,tira)
		{				
			if (e.KeyCode==13)
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
	
