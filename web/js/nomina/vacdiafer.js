function validarDiafer(id)
{
     var aux = id.split("_");
     var name=aux[0];
   	 var fila=aux[1];
   	 var col=parseInt(aux[2]);
   	 var colaid = col - 1;
   	 var idnew = name+"_"+fila+"_"+colaid;
 	 valorM = $(idnew).value;
     valorD = $(id).value;
     valor1 = parseInt(valorM);  //mes
     valor2 = parseInt(valorD);  //dia

      //Compruebo si es un valor numérico
      if (isNaN(valor2))
      {
            alert('El Valor Introducido Debe ser un Numero');
            $(id).value='';
            $(id).focus();
      }else
      {
      if (valor1 = 2 && valor2 > 28 )
           {
            alert('Dia No Valido Para Este Mes');
            $(id).value='';
            $(id).focus();

           }
           else
           { if (((valor1 = 4 ) || (valor1 = 6) || (valor1 = 9) || (valor1 = 11)) && (valor2 > 30))
             {
       		      alert('Dia No Valido Para Este Mes');
      		      $(id).value='';
      		      $(id).focus();

              }
              else
              { if (((valor1 = 1) || (valor1 = 3) || (valor1 = 5) || (valor1 = 7) || (valor1 = 8) || (valor1 = 10) || (valor1 = 12)) && (valor2 > 31 ))
             	{
       		      alert('Dia No Valido Para Este Mes');
      		      $(id).value='';
      		      $(id).focus();

          	    }

              }

           }
      }
}
function validarMes(id)
{
      //intento convertir a entero.
     //si era un entero no le afecta, si no lo era lo intenta convertir
     valor = $(id).value;
      //Compruebo si es un valor numérico
      if(valor!='')
      {
          valor = parseInt(valor);
	      if (isNaN(valor)) {
	            alert('El Valor Introducido Debe ser un Numero');
	            $(id).value='';
	            $(id).focus();
	      }else{  if (valor > 12)
	                  {
	                    alert('El Valor Introducido Debe ser un Numero');
	            		$(id).value='';
	            		$(id).focus();
	                  }
	            //En caso contrario (Si era un número) devuelvo el valor
      }

      }
}