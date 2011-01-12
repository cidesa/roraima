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

function cambiarfilas()
{

   if ($('id').value=='') {
   var grad=parseInt($('npcomocp_grades').value);
    var grah=parseInt($('npcomocp_grahas').value);
    var valor=parseInt($('npcomocp_pascar').value);

    var numfil= ((grah-grad+1)*valor);

    new Ajax.Updater('grid', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+numfil});
   }
}

  function actualizar_grid()
  {
    var grad=parseInt($('npcomocp_grades').value);
    var grah=parseInt($('npcomocp_grahas').value);
    var valor=parseInt($('npcomocp_pascar').value);

    var numfil= ((grah-grad+1)*valor);
     fila=1;
     f=0;
     //grado = 1;
     var grado=grad;

     //while (f<99)
      while (f<numfil)
      {
         var col_paso = "ax_"+f+"_2";
         var col_grado = "ax_"+f+"_1";
         if (fila>valor)
         {
           fila=1;
           grado++;
         }
      //document.write(grado);
         if (grado.toString().length>1)
         {
             $(col_grado).value="0"+grado;
         }
         else
         {
             $(col_grado).value="00"+grado;
         }

         if (fila.toString().length>1)
         {
             $(col_paso).value="0"+fila;
         }
         else
         {
             $(col_paso).value="00"+fila;
         }
         fila++;
         f++;
      }

      $('npcomocp_pascar').value=$('npcomocp_pascar').value.pad(3, '0',0);
      $('npcomocp_pascar').disabled=false;
  }

  function actualizar_grid_sueldos(id)
  {

   var grad=parseInt($('npcomocp_grades').value);
    var grah=parseInt($('npcomocp_grahas').value);
    var valor=parseInt($('npcomocp_pascar').value);

    var numfil= ((grah-grad+1)*valor);

     fila=1;
     f=0;
     t = 0;
     inicial = 0;
     n=1;

      increm = id.replace('.','');
      increm = increm.replace(',','.');
      increm = parseFloat(increm);

     while (f<numfil)
      {
           var col_grad = "ax_"+f+"_1";
         var col_paso = "ax_"+f+"_2";
         var col_suel = "ax_"+f+"_3";

         if (($(col_paso).value=="001") && (($(col_suel).value!="0,00") || ($(col_suel).value!="0")))
         {
           /*inicial = $(col_suel).value.toString();
           inicial = inicial.replace('.','');
           inicial = inicial.replace(',','.');
           inicial = parseFloat(inicial); */
           inicial = toFloat($(col_suel).id);
           n = 1;
         }
         else
         {
         if ($(col_grad).value!="")
          {
          if (document.forms[0].incremento_paso[1].checked)
           {
           aumento = (increm/100)*inicial;
           nuevomonto= inicial + (aumento * n);
           $(col_suel).value = format(nuevomonto.toFixed(2),'.',',','.');
           }
           if (document.forms[0].incremento_paso[2].checked)
           {
           nuevomonto= inicial + (increm * n);
           $(col_suel).value = format(nuevomonto.toFixed(2),'.',',','.');
           }
           n++;
          }
         }
         if ((($(col_paso).value=="") || (n == 1 )) && (($(col_suel).value=="0,00") || ($(col_suel).value=="0") || ($(col_suel).value=="")))
         {
         t = f;
         f = numfil+1;
         }

         f++;
      }

     /* while ( (t < numfil ) && (t != 0))
      {
        var col_grad = "ax_"+t+"_1";
      var col_paso = "ax_"+t+"_2";
      var col_suel = "ax_"+t+"_3";
      $(col_grad).value="";
      $(col_paso).value="";
      $(col_suel).value="";
        t++;
      }*/



  }

  function inizializo_descuentos()
  {
   var grad=parseInt($('npcomocp_grades').value);
    var grah=parseInt($('npcomocp_grahas').value);
    var valor=parseInt($('npcomocp_pascar').value);

    var numfil= ((grah-grad+1)*valor);

    f=0;
      while (f<numfil)
        {
          var col_fila_sueldo = "ax_"+f+"_3";
          cero=0;
             $(col_fila_sueldo).value=format(cero.toFixed(2),'.',',','.');
            f++;
        }
     $('incremento').disabled=true;
     $('incremento').value='';
    }
   function bloquear_incremento()
   {
     $('incremento').disabled=true;
     $('incremento').value='';
   }

   function desbloquear_incremento()
   {
     $('incremento').disabled=false;

   }

   function validarepetido(nomina_concepto,fila)
   {
       var conceptorepetido=false;
       var am=obtener_filas_grid('a',3);
       var i=0;
       while (i<am)
       {
        var codigo="ax"+"_"+i+"_1";
        var concepto="ax"+"_"+i+"_3";

        var nomina_concepto2=$(codigo).value+$(concepto).value;

        if (i!=fila)
        {
          if (nomina_concepto==nomina_concepto2)
          {
            conceptorepetido=true;
            break;
          }
        }
       i++;
       }
       
       if (conceptorepetido)
       {
          var nom="ax"+"_"+fila+"_1";
          var con="ax"+"_"+fila+"_3";
          var descrcon="ax"+"_"+fila+"_4";
           alert('El Concepto '+$(con).value+' ya esta asociado a la Nomina '+$(nom).value+' cambielo por otro');
           $(con).value='';
           $(descrcon).value='';
       }
   }