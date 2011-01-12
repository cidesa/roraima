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

function mostrar(id)
{
  //if (e.keyCode==13)
  //{
  	var aux  = id.split("_");
    var name = aux[0];
    var fil  = parseInt(aux[1]);
    var col  = parseInt(aux[2]);

    var codmeta=name+"_"+fil+"_"+1;

    var proyecto=$('fordefpryaccmet_codpro').value;
    var accion=$('fordefpryaccmet_codaccesp').value;
    var meta=$(codmeta).value;

    new Ajax.Updater('divGrid', getUrlModulo()+'ajax',
                    {asynchronous:true,
                     evalScripts:true,
                     onComplete:function(request, json){
                     	      AjaxJSON(request, json);},
                     parameters:'ajax=4&proyecto='+proyecto+'&accion='+accion+'&meta='+meta+'&fil='+fil
                     })
  //}

  CalculoTrimestral();
}

function CalculoTrimestral()
{
		var cantproanual;
		var fil=0;
		var i=1;
		var tot=0;
		while (fil<12)
		{
		  str1= $("bx"+"_"+fil+"_2").value.toString();
		  str1= str1.replace('.','') ;
		  str1= str1.replace('.','') ;
		  str1= str1.replace('.','') ;
		  str1= str1.replace('.','') ;
		  str1= str1.replace('.','') ;
		  str1= str1.replace('.','') ;
		  str1= str1.replace(',','.');
		  var t=parseFloat(str1);

		  tot = tot + t;
			$("bx"+"_"+fil+"_4").value = format(tot.toFixed(2),'.',',','.');
			if ((fil==2) || (fil==5) || (fil==8) || (fil==11))
		      {
		          //fil = 0;

		          tot=0;
		      }
		  fil++;
		}
}



function distribuirPeriodos()
{
//  if ($('id').value=="")  //Nuevo
//  {
  if ($('total').value=='0,00')  //Nuevo
  {

	  var fil=0;
	  while (fil<12)
	  {
	    var periodo="bx"+"_"+fil+"_1";
	    if (fil<9){
	    $(periodo).value= '0'+(fil +1);}
	    else{ $(periodo).value= (fil +1);}
	    fil++;
	  }
  }

  var j       = $('fila').value;
  var haydist = "ax"+"_"+j+"_5";

  if ($(haydist).value!="")
  {
    var distrib=$(haydist).value;
  	var aux2=distrib.split("!");

  	var z=0;
    while (z<((aux2.length)-1))
    {
      var reg=aux2[z];
      var aux3=reg.split("-");
      var periodo=aux3[0] -1;
      var periodos=aux3[0];
      var monto=aux3[1];

      var per="bx"+"_"+periodo+"_1";
      var mont="bx"+"_"+periodo+"_2";

      $(per).value=periodos;
      $(mont).value=monto;

     z++;
    }
  }
//  actualizarsaldos_b();


}

function salvarcantidades()
{
  var fil=0;
  var cadena='';
  while (fil<12)
  {
    var periodo="bx"+"_"+fil+"_1";
    var cant="bx"+"_"+fil+"_2";
    var canteje="bx"+"_"+fil+"_3";

    str1= $(cant).value.toString();
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace(',','.');
    var cantidad=parseFloat(str1);

    var cadena=cadena + $(periodo).value+'-'+$(cant).value+'-'+$(canteje).value+'!';

    fil++;
  }

  var filas=$('fila').value;
  var cantdist="ax"+"_"+filas+"_6";
  var cantot="ax"+"_"+filas+"_5";


  $(cantdist).value=cadena;
  $(cantot).value=$('total').value;
  $('periodos').hide();
}

 function validargrid(id)
 {
 	valor=$(id).value;
 	if (valor!='')
 	{
 		valor=valor.pad(5,"0",0);
 		$(id).value=valor;
	}

 	if (meta_repetido(id))
	{
		alert('La Meta se encuentra repetida');
		$(id).value="";
	}
 }

 function meta_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var meta=$(id).value;

   var metarepetido=false;
   var am=totalregistros('ax',1,20);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var meta2=$(codigo).value;

    if (i!=fila)
    {
      if (meta==meta2)
      {
        metarepetido=true;
        break;
      }
    }
   i++;
   }
   return metarepetido;
 }

 function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
  }
  function verificar1()
  { if ($('fordefpryaccmet_codpro').value!=""){
  	if ($('existe1').value=='S')
  	{
  		alert('El Proyecto no existe');
  		$('fordefpryaccmet_codpro').value="";
  		$('fordefpryaccmet_tippro').value="";
  		$('fordefpryaccmet_nompro').value="";
  	}}

  	if ($('fordefpryaccmet_codaccesp').value!=""){
  	if ($('existe2').value=='S')
  	{
  		alert('La Accion Especifica no esta asociada al Proyecto');
  		$('fordefpryaccmet_codaccesp').value="";
  	}
  	  if($('duplicada').value=='S')
  	  {
  	  	alert('El Proyecto Y la Accion Especifica ya tienen Metas asociadas');
  	  	$('fordefpryaccmet_codpro').value="";
  		$('fordefpryaccmet_tippro').value="";
  		$('fordefpryaccmet_nompro').value="";
  		$('fordefpryaccmet_codaccesp').value="";
  		$('fordefpryaccmet_desaccesp').value="";
  	  }
  	}
  }
