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
  var suma = toFloat($('ax_0_5').id)+toFloat($('ax_1_4').id);
  var idSaldoActual = 'ax_0_5';
  var i = 1;

  while ($(idSaldoActual))
    {
      idSaldoActual = name+"x_"+i+"_"+'5';
      if (($F(idSaldoActual)!='') && ($F(idSaldoActual)!=0)) {
        $(idSaldoActual).value=format(suma.toFixed(2),'.',',','.');;
      }
      i = i + 1;
      idSaldoActual = name+"x_"+i+"_"+'5';
    }
   ValidarMontoGridv2(obj);
}
