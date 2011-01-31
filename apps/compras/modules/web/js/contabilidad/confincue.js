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

function activaSaldoActual()
{
  var seleccionC =  $('contabb_cargab_C').checked;
  if (seleccionC) {
  	$('ax_0_5').readOnly=false;
  } else $('ax_0_5').readOnly=true;


}

function actualizarSaldos(obj)
{
  var name = 'a';
  var idSaldoActual = 'ax_0_5';
  var i = 1;

  while ($(idSaldoActual)) {
      suma = toFloat($('ax_0_5').id)+toFloat($(name+"x_"+i+"_"+'4').id);
      idSaldoActual = name+"x_"+i+"_"+'5';
      if (($F(idSaldoActual)!='') && ($F(idSaldoActual)!=0)) {
        $(idSaldoActual).value=format(suma.toFixed(2),'.',',','.');;
      }
      i = i + 1;
      idSaldoActual = name+"x_"+i+"_"+'5';
    }
   ValidarMontoGridv2(obj);
}

 function validarrepetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var descripcion=name+"_"+fila+"_"+coldes;

   if (centrocosto_repetido(id))
   {
     alert('El Centro de Costo ya esta asociado a esa Cuenta Contable');
     $(id).value="";
     $(descripcion).value="";
   }
 }

 function centrocosto_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var colcta=col-3;

   var cuenta=name+"_"+fila+"_"+colcta;
   var cuenta_centrocosto=$(cuenta).value+$(id).value;

   var centrocostorepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    var centrocos="ax"+"_"+i+"_4";

    var cuenta_centrocosto2=$(codigo).value+$(centrocos).value;

    if (i!=fila)
    {
      if (cuenta_centrocosto==cuenta_centrocosto2)
      {
        centrocostorepetido=true;
        break;
      }
    }
   i++;
   }
   return centrocostorepetido;
 }
