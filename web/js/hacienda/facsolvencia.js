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

function verificardeudas()
{
   var tot=obtener_filas_grid('a',5);
   var i=0;
   while (i<tot)
   {
    var codigo="ax"+"_"+i+"_5";

    if ($(codigo) == 'PENDIENTE')
    {
    	  alert('El Contribuyente tiene Deudas Pendientes con el Municipios');
        break;
    }

   i++;
   }

   return true;
}


  function anular(){
	  if (confirm("Realmente desea Anular esta Solvencia?")) {
	    var referencia=$('fcsolvencia_codsol').value;
	    var fecexp = $('fcsolvencia_fecexp').value;


    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&referencia='+referencia+'&fecexp='+fecexp})
	   }
  }

  function abreAnular(referencia,fecexp) {
	window.open(getUrlModulo()+'anular?referencia='+referencia+'&fecexp='+fecexp,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }