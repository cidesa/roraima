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

function validaMontos(id,obj) {
  var idS=id.split('_');
  var c=0;
  var f=idS[1];
  var u=idS[2];
  if (u=='4') {
    if (toFloat($('ax_'+f+'_5').id)>0) {
      $('ax_'+f+'_4').value=format(c.toFixed(2),'.',',','.');;
    }
  }else
    if (u=='5') {
      if (toFloat($('ax_'+f+'_4').id)>0) {
        $('ax_'+f+'_5').value=format(c.toFixed(2),'.',',','.');;
    }
  }
  ValidarMontoGridv2(obj);
}

function rellenar() {
  if ($('contabc_numcom').value=='') {
    $('contabc_numcom').value='########';
  }else {
    $('contabc_numcom').value=$('contabc_numcom').value.pad(8,'0',0);
  }
}


