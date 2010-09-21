/**
 * Librerías Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

function verificar_formula()
{
  new Ajax.Request('/hacienda_dev.php/facprotip/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});
}

function formula(id)
{
    var seguir="si";
	var acum = 0;
	var cadena = $("fctippro_parpro").value;
	cadena = borrar_blanco(cadena);
    var z=0;
    while (z<=((cadena.length)))
    {
     var simbolo=cadena.substring(z,z+2);
     if ((simbolo=="++") || (simbolo=="+-") || (simbolo=="+/") || (simbolo=="+*") || (simbolo=="--") || (simbolo=="-+") || (simbolo=="-*") || (simbolo=="-/") || (simbolo=="**") || (simbolo=="*+") || (simbolo=="*-") || (simbolo=="*/") || (simbolo=="//") || (simbolo=="/+") || (simbolo=="/*")  || (simbolo=="/-"))
     {
	       alert("Hay Simbolos Repetidos");
     }
     z++;
    }
    var formula=cadena;
    formula = formula.replace('+','_');
    formula = formula.replace('+','_');
    formula = formula.replace('+','_');
    formula = formula.replace('+','_');
    formula = formula.replace('+','_');
    formula = formula.replace('/','_');
    formula = formula.replace('/','_');
    formula = formula.replace('/','_');
    formula = formula.replace('/','_');
    formula = formula.replace('*','_');
    formula = formula.replace('*','_');
    formula = formula.replace('*','_');
    formula = formula.replace('*','_');
    formula = formula.replace('-','_');
    formula = formula.replace('-','_');
    formula = formula.replace('-','_');
    formula = formula.replace('-','_');
    var formula_arreglo = formula.split("_");
	var textopermitido=new Array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","V","W","X","Y","Z","+","-","*","/");
    var x=0;
    while (x<((formula_arreglo.length)))
    {
	      posicion=buscararreglo(textopermitido,formula_arreglo[x].toUpperCase());
	      if (posicion >=0)
	         var prueba2=2;
	      else
          {
			alert("Variable "+formula_arreglo[x]+" no Permitida");
			seguir="no";
			break;
          }
     x++;
    }
    if (seguir=="si")
    {
	    var fil=0;
	    var arreglo_filas="";
	    var filas="";
	    var posicion="";
	    while (fil<3)
	    {
	      var variable="ax"+"_"+fil+"_1";
	      if ($(variable).value!="")
		  {
		     filas=filas+"_"+$(variable).value;
		  }
		  fil++;
		}
	    var arreglo_filas = filas.split("_");
	    var z=0;
	    while (z<((formula_arreglo.length)))
	    {
		      posicion=buscararreglo(arreglo_filas,formula_arreglo[z].toUpperCase());
		      if (posicion >=0)
		         var prueba=2;
		      else
				alert("Variable "+formula_arreglo[z]+" no Identificada");
	     z++;
	    }
	 }
  	 $("fctippro_parpro").value=cadena;
}

function buscararreglo(arreglo, valor)
{
  var ind, pos;
  for(ind=0; ind<arreglo.length; ind++)
  {
    if (arreglo[ind] == valor)
      break;
  }
  pos = (ind < arreglo.length)? ind : -1;
  return (pos);
}

function establecertipo(id)
{
    var aux  = id.split("_");
    var name = aux[0];
    var fil  = parseInt(aux[1]);
    var col  = parseInt(aux[2]);
    var variable = name+"_"+fil+"_"+1;
    var valor = name+"_"+fil+"_"+2;
    var tipo = name+"_"+fil+"_"+3;
    if (($(valor).value=='') && ($(variable).value!=''))
    {
       $(tipo).value = "V";
    }
    else if (($(valor).value!='') && ($(variable).value!=''))
    {
       $(tipo).value = "F";
    }
    var mayuscula=$(variable).value.toUpperCase();
    $(variable).value=mayuscula;
}

  function borrar_blanco(cadena)
    {
      for(i=0; i<cadena.length; )
      {
        if(cadena.charAt(i)==" ")
          cadena=cadena.substring(i+1, cadena.length);
        else
          break;
      }

      for(i=cadena.length-1; i>=0; i=cadena.length-1)
      {
        if(cadena.charAt(i)==" ")
          cadena=cadena.substring(0,i);
        else
          break;
      }
      i=0;
      while (i <= cadena.length)
      {
          if(cadena.charAt(i)==" ")
        {
          cad1 = cadena.substring(0,i);
          cad2 = cadena.substring(i+1,cadena.length);
          cadena= cad1+cad2;
        }
        i = i + 1;
      }

      return cadena;
    }