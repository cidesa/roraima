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

function  Calculoimpuesto(id,objeto)
{
    var colum4 = obtenerColumna(id,'2','-');
    var colum7 = obtenerColumna(id,'1','+');
    var colum8 = obtenerColumna(id,'2','+');

    var Alicuota = $(colum7).toFloat();
    var MontoDif = ($(colum4).toFloat() - $(id).toFloat());
    var ImpCau = ((MontoDif * Alicuota) / 100);

    $(colum8).value = ImpCau;
    $(colum8).valueToFloatVE();

    ValidarMontoGridv2(objeto);

    DistribuirDeclaracion();
}


function DistribuirDeclaracion()
{
  var id    = $('fcrepfis_id').value;
//  var anoava    = $('fcreginm_anoava').value;

	 new Ajax.Updater(
	 			'divDist',
	 			getUrlModuloAjax(),
	 			{
	 				  asynchronous:true,
						evalScripts:true,
						onComplete: function(request, json){  AjaxJSON(request, json)  },
						parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))
				}
				);

 }


function STerreno(id,objeto)
{

		var colum6 = obtenerColumna(id,'','');
		var colum4 = obtenerColumna(id,'2','-');
		var total = obtenerColumnaSiguiente(id);

		if (($(colum6).toFloat() > 0) && ($(colum4).toFloat() > 0))
		{
				$(total).value =	$(colum4).toFloat() * $(colum6).toFloat();
				$(total).valueToFloatVE();
		}

		ValidarMontoGridv2(objeto);
		TotalAvaluo();
 }