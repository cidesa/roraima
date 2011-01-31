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

function Totales()
{

	 //Total de Recargos
	 $('Totalpag').value = $('fcpagos_pagcon').toFloat() + $('fcpagos_recargo').toFloat() - $('fcpagos_descuento').toFloat();
   $('Totalpag').valueToFloatVE();

	 $('fcpagos_montodeuda').value = $('fcpagos_montodeuda2').toFloat();
   $('fcpagos_montodeuda').valueToFloatVE();


	 $('saldo').value = $('fcpagos_monpag').toFloat() - $('fcpagos_totalmon').toFloat() ;
   $('saldo').valueToFloatVE();


	 $('saldo1').value = $('fcpagos_montodeuda').toFloat() + $('fcpagos_montomora').toFloat()  - $('fcpagos_montodscprntopago').toFloat();
   $('saldo1').valueToFloatVE();

	 $('saldo2').value = $('fcpagos_montodeuda2').toFloat() - $('fcpagos_montoautliq').toFloat();
   $('saldo2').valueToFloatVE();

//	 $('saldo3').value = 0;
//   $('saldo3').valueToFloatVE();

	 $('saldo3').value = $('fcpagos_pagcon').toFloat();
   $('saldo3').valueToFloatVE();

//	 $('saldo4').value = $('fcpagos_montopagcon').toFloat();
	 $('saldo4').value = $('saldo1').toFloat() + $('saldo2').toFloat() - $('saldo3').toFloat();
   $('saldo4').valueToFloatVE();


//	CalcularRecargo();
	 $('Totalpag').value = $('fcpagos_pagcon').toFloat() + $('fcpagos_recargo').toFloat() - $('fcpagos_descuento').toFloat();
   $('Totalpag').valueToFloatVE();


	 $('fcpagos_monpag').value = $('fcpagos_pagcon').toFloat() + $('fcpagos_recargo').toFloat() - $('fcpagos_descuento').toFloat();
   $('fcpagos_monpag').valueToFloatVE();

//alert($('fcpagos_pagcon').value);
//alert($('fcpagos_recargo').value);
//alert($('fcpagos_descuento').value);
//alert($('fcpagos_monpag').value);

}

function validarmonto(objeto)
{
//	CalcularRecargo();
	 $('Totalpag').value = $('fcpagos_pagcon').toFloat() + $('fcpagos_recargo').toFloat() - $('fcpagos_descuento').toFloat();
   $('Totalpag').valueToFloatVE();

	valor = objeto.toFloat();
  totalpagar = $('Totalpag').toFloat();


	if (totalpagar < 0){ alert('Monto Incluido Excede el Total a Pagar'); objeto.value="0";  }

//	CalcularRecargo();
	 $('Totalpag').value = $('fcpagos_pagcon').toFloat() + $('fcpagos_recargo').toFloat() - $('fcpagos_descuento').toFloat();
   $('Totalpag').valueToFloatVE();
}



function AsignarMonto(objeto)
{
	var celda;
	var Saldo;
	var MontoPagoConstr;

	if ($(objeto).checked){
		celda = getCeldav2(objeto, 14);

	  MontoPagoConstr = obtenerColumna(objeto,13,'+');
	  $(MontoPagoConstr).value = celda;

	  Saldo = obtenerColumna(objeto,14,'+');
	  $(Saldo).value = '0,00';

	  $(MontoPagoConstr).focus();
	}else{

		celda = getCeldav2(objeto, 13);

	  MontoPagoConstr = obtenerColumna(objeto,14,'+');
	  $(MontoPagoConstr).value = celda;


	  Saldo = obtenerColumna(objeto,13,'+');
	  $(Saldo).value = '0,00';


	  $(MontoPagoConstr).focus();
	}

	Totales();
}
