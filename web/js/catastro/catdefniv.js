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

function actualizarformato(id)    //Actualiza el formato de los niveles presupuestarios
{
   $('catnivcat_forcodcat').value='';

   var totfil = objs_filas_a.size();
   var fila = true;
   var fil=0;
   if (($F(obtenerColumnaAnterior(id))!=''))
   {
     //while (fila==true)
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

          if($('catnivcat_forcodcat').value!=''){
            $('catnivcat_forcodcat').value=$('catnivcat_forcodcat').value+"-"+rup;

          }else{
            $('catnivcat_forcodcat').value=rup;
          }
       }else{
        //  fila=false;
        }
     fil++;
     }
  }else{

  	if  ($(id).value!=''){
	    alert('Debe seleccionar un Tipo');
	  	$(id).value = '';
  	}
  }
 }

  function activar(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   if ($(id).checked==true){
	   if (activa_repetido(id))
	   {
	     alert('No se puede Marcar mas de un Sector al mismo tiempo');
		 $(id).checked=false;;
	   }
   }
 }

 function activa_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var activa_repetido=$(id).checked;

   var activarepetido=false;
   var am=obtener_filas_grid('a',2);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_4";

    var activa_repetido2=$(codigo).checked;
    if (i!=fila)
    {
      if (activa_repetido==activa_repetido2)
      {
        activarepetido=true;
        break;
      }
    }
   i++;
   }
   return activarepetido;
 }