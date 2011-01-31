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

function Sumar_dias(id)
{
    var aux  = id.split("_");
    var name = aux[0];//ax
    var datos = 0;
    var fil  = parseInt(aux[1]);
    var filsig  = parseInt(aux[1])+1;
    var filant  = parseInt(aux[1])-1;
    var col  = parseInt(aux[2])+1;
    if (fil==0)
    {
		var dia = name+"_"+fil+"_"+2;
    }
    else
    {
		var dia = name+"_"+filant+"_"+2;
    }
    var dia_siguiente = name+"_"+fil+"_"+1;
    var dia=toFloat(dia);
    if (dia!="")
    {
	    dias = 1 + dia;
	    $(dia_siguiente).value = dias;
    }
}
