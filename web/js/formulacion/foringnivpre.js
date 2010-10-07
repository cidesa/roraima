/**
 * LibrerÃ­as Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

function actualizarformato(id)//Actualiza el formato de los niveles presupuestarios
{
   $('foringdefniv_forpre').value='';
   var totfil = obtener_filas_grid('a',2);
   var fila = true;
   var fil=0;
   if ($F(obtenerColumnaAnterior(id))!='')
   {
     while (fil <= totfil)
     {
        var aux="ax_"+fil+"_2";
        if (($(aux) && ($(aux).value!='')))
        {
          var rup='';
          var k=1;
          var lon=parseInt($(aux).value);

          while (k<=lon){
            rup=rup+'#';
            k++;
          }

          if($('foringdefniv_forpre').value!=''){
            $('foringdefniv_forpre').value=$('foringdefniv_forpre').value+"-"+rup;

          }else{
            $('foringdefniv_forpre').value=rup;
          }
        }
     fil++;
     }
  }else{
    alert('Debe seleccionar un Tipo (Partida)');
  }
 }



 function cargargridper(){

 var fecha=$('foringdefniv_fecini').value;
 var numper=$('foringdefniv_numper').value;
 var fecfinal=$('foringdefniv_feccie').value;
 $('gridperiodos').show();

  if ((fecha!='') && (numper!='') && (fecfinal!='')){
     new Ajax.Updater('gridperiodos', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&fecha='+fecha+'&numper='+numper+'&fecfinal='+fecfinal});
   }


 }

 function validarfeccie(){

	var fecini=$('foringdefniv_fecini').value;
 	var feccie=$('foringdefniv_feccie').value;

	array_fecini = fecini.split("/");

	var diaini=array_fecini[0];
	var mesini=(array_fecini[1]-1);
	var anoini=(array_fecini[2]);
	var fechaini = new Date(anoini,mesini,diaini);

	array_feccie = feccie.split("/");

	var diacie=array_feccie[0];
	var mescie=(array_feccie[1]-1);
	var anocie=(array_feccie[2]);
	var fechacie = new Date(anocie,mescie,diacie);

	if (fechacie<fechaini){
   		alert('La Fecha de Cierre debe ser mayor que la Fecha de Inicio');
	   	$('cidefniv_feccie').value='';
 	}	
 }

 function validarcatpar()//Valida el numero de partidas 
 {
   var am=obtener_filas_grid('a',2); //totalregistros('ax',1,16);
   var fil=0;
   var conpar=0;
   while (fil<am)
   {
     var id="ax_"+fil+"_1";
     if ($(id).value!='Seleccione'){
       if ($(id).value=='P'){
           conpar=conpar+1;
        }
      }
     fil++;
   }

  if (conpar>$('foringdefniv_ruppar').value)
  {
    alert_('El N&uacute;mero de Rupturas para la Partida ya est&aacute; cubierto');
    var fila=conpar-1;
    id="ax_"+fila+"_1";
    $(id).value='';
  }
 }