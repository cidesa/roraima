function datosavaluo()
{
  var nroinm    = $('fcreginm_nroinm').value;
  var anoava    = $('fcreginm_anoava').value;

 new Ajax.Updater('complemento', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&anoava='+anoava+'&nroinm='+nroinm});

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



function SConstruccion(id,objeto)
{
		var colum8 = obtenerColumna(id,'','');
		var colum5 = obtenerColumna(id,'3','-');
		var total = obtenerColumnaSiguiente(id);

		if (($(colum8).toFloat() > 0) && ($(colum5).toFloat() > 0))
		{
				$(total).value =	$(colum5).toFloat() * $(colum8).toFloat();
				$(total).valueToFloatVE();
		}

		CalculoDeprec(id,total);
		ValidarMontoGridv2(objeto);
		TotalAvaluo();
 }

function CalculoDeprec(id,total)
{
	var codestinm = $F('fcreginm_codestinm');
	var colum12 = obtenerColumna(id,'3','+');
	var total = obtenerColumnaSiguiente(id);

	if (codestinm!=''){
	}else{
				$(colum12).value =	$F(total);
				$(colum12).valueToFloatVE();

	}
}


function TotalAvaluo()
{
	var bsft= $('fcreginm_bster').toFloat();
	var bsfc= $('fcreginm_bscon').toFloat();
  $('fcreginm_total_avaluo').value = bsft + bsfc
  $('fcreginm_total_avaluo').valueToFloatVE();
}


function Mostrar_Negacion()
{
	$('negacion2').show();
}