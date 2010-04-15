// JavaScript Document
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


		function focos(e,fc)
		{
		 if (e.keyCode==13)
			{
				document.getElementById(fc).focus();
				document.getElementById(fc).select();
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
			str= document.getElementById(id).value.toString();			
			str= str.replace(',','');	
			str= str.replace(',','');	
			str= str.replace(',','');					

			var num=parseFloat(str);  //Valor Real sin (.) y ni (,)								
			document.getElementById(id).value=num;
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
		   if (key.keyCode!=13)
			{		
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
	

	 function desbloquearGrip(col,fila)
	   {
   		   i=1;
		   c=2;
		   while (i<=fila)
		   {
//				var fx="x"+i+"2";
		//		document.getElementById(fx).disabled=false
				
				while (c<=col)
				{

					var cx="x"+i+c;				
					//alert(cx);
					document.getElementById(cx).disabled=false
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
					document.getElementById(cx).disabled=true
					c=c+1;
				}
				i=i+1;
			}
	   }
	