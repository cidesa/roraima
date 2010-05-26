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

    function Inicial()
    {
	    if ($('id').value!='')
	    {
		    //$('npcalcon_codcon').focus();
		    //disableAllObjetos(a=new Array('npcalcon_codcon','npcalcon_codnom'),false);
			$('npcalcon_codcon').readOnly=true;
   			$('npcalcon_codnom').readOnly=true;
		    $$('.buttoncat')[0].disabled=true;
		    $$('.buttoncat')[1].disabled=true;
		    $$('.sf_admin_action_list')[0].disabled=false;
		    $$('.sf_admin_action_save')[0].disabled=false;
		    $$('.sf_admin_action_create')[0].disabled=false;
		    //$('npcalcon_codnom').focus();

	    }else
	    {
	    	disableAllObjetos_(a=new Array('npcalcon_codcon'),true);
			//$('npcalcon_codcon').readOnly=true;
	    	$$('.buttoncat')[0].disabled=false;
	    	$$('.sf_admin_action_list')[0].disabled=false;
	    	$$('.sf_admin_action_create')[0].disabled=false;
	    	$('npcalcon_codcon').focus();
	    }
    }
/*
	function validaconcepto()
	{
			if ($('npcalcon_nomcon').value=='' && $('npcalcon_codcon').value!='' )
			{
				alert('Codigo del Concepto no existe');
				$('npcalcon_codcon').value='';
				$('npcalcon_codnom').value='';
				$('npcalcon_codcon').focus();
			}else
			{
				if ($('cajocu1').value=='' && $('npcalcon_codcon').value!='' )
				{
					alert('No existen nominas para los cargos asignados con este concepto');
					$('npcalcon_codcon').value='';
					$('npcalcon_codnom').value='';
					$('npcalcon_nomcon').value='';
					$('npcalcon_codcon').focus();
				}else
				{
					if ($('id').value=='' && $('npcalcon_codcon').value!='')
					{
						disableAllObjetos_(a=new Array('npcalcon_codcon','npcalcon_codnom'),true);
			    		$$('.buttoncat')[1].disabled=false;
			    		$('npcalcon_codcon').readOnly=true;
			    		$$('.sf_admin_action_list')[0].disabled=false;
			    		$$('.sf_admin_action_create')[0].disabled=false;
						$('npcalcon_codnom').focus();
					}
					if($('npcalcon_codcon').value!='')
					{
						$('npcalcon_codcon').readOnly=true;
					}else
					{
						disableAllObjetos_(a=new Array('npcalcon_codcon'),true);
						$('npcalcon_codcon').readOnly=false;
						$$('.buttoncat')[0].disabled=false;
					}
				}
			}
	}
*/
/*	function validanomina()
	{
		if ($('npcalcon_nomnom').value=='' && $('npcalcon_codnom').value!='' )
		{
			alert('Codigo de la nomina no existe ');
			$('npcalcon_codnom').value='';
			$('npcalcon_nomnom').value='';
			$('npcalcon_codnom').focus();
			var condicion = false;
		}else
		{
		if ($('npcalcon_nomnom').value=='no' && $('npcalcon_codnom').value!='' )
		{
			alert('Codigo de la nomina no existe para los cargos asignados al concepto');
			$('npcalcon_codnom').value='';
			$('npcalcon_nomnom').value='';
			$('npcalcon_codnom').focus();
			var condicion = false;
		}
		if ($('cajocu2').value=='' && $('npcalcon_codnom').value!='' )
		{
			alert('Codigo de la nomina no existe para un cargo asignado con el concepto ' + $('npcalcon_codcon').value);
			$('npcalcon_codnom').value='';
			$('npcalcon_nomnom').value='';
			$('npcalcon_codnom').focus();
			var condicion = false;
		}

		new Ajax.Updater( 'divVariables', '/nomina'+$("entorno").value+'.php/nomcalcon/ajax', {asynchronous:true, evalScripts:true, parameters:'ajax=5'});
        new Ajax.Updater( 'divHistoricos', '/nomina'+$("entorno").value+'.php/nomcalcon/ajax', {asynchronous:true, evalScripts:true, parameters:'ajax=3'});

		   if ($('id').value=='')
		   {
		       if ($('cajocu3').value=='' && $('npcalcon_codnom').value!='')
		       {
		       	  alert('Este concepto con esta nomina fueron calculados vaya a lista si desea modificarlos');
		       	  location=('/nomina'+$("entorno").value+'.php/nomcalcon/create');
		       	  var condicion = false;
		       }else
		       {
		       	  if ($('cajocu3').value!='' && $('npcalcon_codnom').value!='' && $('npcalcon_nomnom')!='')
		       	  {
		       		disableAllObjetos_(a=new Array(),false);
  					$('npcalcon_codcon').readOnly=true;
	     			$('npcalcon_codnom').readOnly=true;
	     			$$('.sf_admin_action_list')[0].disabled=false;
				    $$('.sf_admin_action_save')[0].disabled=false;

		       	  }
		       }
		   }else
		   {
	     	   $('npcalcon_codnom').readOnly=true;
		   }
		}

		if (condicion)
		{
			//EN ESPERA
		}

	}
*/
    function trim(cadena)
	{
		for(i=0; i<cadena.length; )
		{
			if(cadena.charAt(i)==" ")
				cadena=cadena.substring(i+1, cadena.length);
		}

		for(i=cadena.length-1; i>=0; i=cadena.length-1)
		{
			if(cadena.charAt(i)==" ")
				cadena=cadena.substring(0,i);
		}

		return cadena;
	}

    function ValidarFormula(id)
    {
		$('cajgrid3').value = trim($(id).value);
		var nomina = $('npcalcon_codnom').value;
        new Ajax.Request('/nomina'+$("entorno").value+'.php/nomcalcon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), SeguirValidacion(id) }, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});//return false;
    }

    function SeguirValidacion(id)
    {
		if ($('cajgrid2').value=='-1')
		{
			alert('Error en la formula, por favor verifique...');
			$(id).readOnly=false;
			$(id).focus();
		}else
		{
  			$(id).readOnly=false;
  			$('npcalcon_codnom').focus();
			$('cajgrid1').value='';
		}
    }

	function PostFormula(e,id)
	{
		if (e.keyCode==13)
		{
		    var val = $(id).value.split(",");
		    var cont = val.length;
			for(i=0;i<cont-1;i++)
			{
				$(id).value=$(id).value.replace(",",".");
			}
			ValidarFormula(id);
		}
	}

	function PreFormula(id)
	{
		$('cajgrid1').value=id;
	}

	function botonAceptar()
	{

		if ($('cajgrid1').value!='')
		{
			if ($('idlabel').value!='' && $('idlabel2').value=='')
			{
				var cod1 = $('cajaux').value;
				var cod2 = $('idlabel').value;
				if (cod1=="NHMENEDA" || cod1=="NHMAYEDA"|| cod1=="SIMESDAD"|| cod1=='SHORAS' || cod1=='SDIAS' || cod1=='FECDIAS'|| cod1=='FECMES'|| cod1=='FECANNOS'|| cod1=='INTPRES'|| cod1=='DIAADIPRE' || cod1=='DIAADIFID')
				    var cod = cod1+cod2.toUpperCase();
  			    else
					var cod = cod1+"("+cod2+")";

				$('textooculto1').hide();
				$('grid1').show();
				$('idfunciones').disabled=false;
				$('idempleados').disabled=false;
				$('idmovimientos').disabled=false;
				$('idhistoricos').disabled=false;
				$('idvariables').disabled=false;
				$('idconceptos').disabled=false;
				$('cajoculabel').value='valor';
				$('idlabel').value='';

				var idnuevo = $('cajgrid1').value;
				$(idnuevo).value = $(idnuevo).value + cod + " ";
				$(idnuevo).focus();

			}else
			{
				if ($('idlabel2').value!='' && $('idlabel').value=='')
				{
					var cod1 = $('cajaux').value;
					var fecha = $('idlabel2').value;
					var cod2 = fecha.substr(0,2)+fecha.substr(3,2)+fecha.substr(6,4);
					if (cod1=='INTPRES' || cod1=='DIAADIPRE' || cod1=='DIAADIFID')
					    var cod = cod1+cod2.toUpperCase();
	  			    else
						var cod = cod1+cod2;

					$('textooculto1').hide();
					$('grid1').show();
					$('idfunciones').disabled=false;
					$('idempleados').disabled=false;
					$('idmovimientos').disabled=false;
					$('idhistoricos').disabled=false;
					$('idvariables').disabled=false;
					$('idconceptos').disabled=false;
					$('cajoculabel').value='valor';
					$('idlabel2').value='';

					var idnuevo = $('cajgrid1').value;
					$(idnuevo).value = $(idnuevo).value + cod + " ";
					$(idnuevo).focus();

				}else
				{
					alert('El Campo no puede estar en Blanco');
				}
			}


		}else
		{
			if ($('idlabel').value!='' && $('idlabel2').value=='')
			{
				var cod1 = $('cajaux').value;
				var cod2 = $('idlabel').value;
				if (cod1=='INTPRES' || cod1=='DIAADIPRE' || cod1=='DIAADIFID')
				    var cod = cod1+cod2.toUpperCase();
  			    else
					var cod = cod1+"("+cod2+")";

				$('textooculto1').hide();
				$('grid1').show();
				$('idfunciones').disabled=false;
				$('idempleados').disabled=false;
				$('idmovimientos').disabled=false;
				$('idhistoricos').disabled=false;
				$('idvariables').disabled=false;
				$('idconceptos').disabled=false;
				cargargrid(cod);
				$('cajoculabel').value='valor';
				$('idlabel').value='';
			}else
			{
				if ($('idlabel2').value!='' && $('idlabel').value=='')
				{
					var cod1 = $('cajaux').value;
					var fecha = $('idlabel2').value;
					var cod2 = fecha.substr(0,2)+fecha.substr(3,2)+fecha.substr(6,4);
					if (cod1=='INTPRES' || cod1=='DIAADIPRE' || cod1=='DIAADIFID')
					    var cod = cod1+cod2.toUpperCase();
	  			    else
						var cod = cod1+cod2;

					$('textooculto1').hide();
					$('grid1').show();
					$('idfunciones').disabled=false;
					$('idempleados').disabled=false;
					$('idmovimientos').disabled=false;
					$('idhistoricos').disabled=false;
					$('idvariables').disabled=false;
					$('idconceptos').disabled=false;
					cargargrid(cod);
					$('cajoculabel').value='valor';
					$('idlabel2').value='';
				}else
				{
					alert('El Campo no puede estar en Blanco');
				}
			}
		}

	}

	function botonAceptar2()
	{
		var dato4 = $('ultmes').value;
		var opcion = $('opciones').value;
		var fec1 = $('fecini').value;
		var fec2 = $('fecfin').value;
		var encontrado = true;

		if (fec1!='')
		    var fecini =  fec1.substr(3,2)+"/"+fec1.substr(0,2)+"/"+fec1.substr(6,4);
		else
		    var fecini = '';

		if (fec2!='')
		  var fecfin =  fec2.substr(3,2)+"/"+fec2.substr(0,2)+"/"+fec2.substr(6,4);
        else
           var fecfin = '';


		if (dato4=='0')
		{
			if (!(isDate(fecini)))
			{
				alert('No puede aceptar con la fecha inicial en blanco');
				encontrado = false;
			}else
			{
				if (!(isDate(fecfin)))
				{
					alert('No puede aceptar con la fecha final en blanco');
					encontrado = false;
				}
			}
		}else
		{
			if (isNaN(parseInt(dato4)))
			{
				alert('No puede aceptar con el numero de meses o peridos igual a 0');
				$('ultmes').value='0';
				encontrado = false;
			}
		}

		if (opcion=='-1' && encontrado==true)
		{
			alert('No puede aceptar con el campo opciones en blanco');
			encontrado = false;
		}else
		{
			if (fecini=='')
				fecini =  'DDMMAAAA';
			else
			    fecini = fecini.substr(0,2)+fecini.substr(3,2)+fecini.substr(6,4);

			if (fecfin=='')
			   fecfin = 'DDMMAAAA';
			else
			   fecfin =  fecfin.substr(0,2)+fecfin.substr(3,2)+fecfin.substr(6,4);
		}

		var opci = fecini + fecfin + opcion;

		if (dato4=='0')
			opci = opci + 'O';
		if (dato4!='0')
		{
          if ($('mesper').value=='P')
		    opci = opci + $('mesper').value+dato4;
          else
		    opci = opci + dato4;
		 }

        var condicion = $('cajaux2').value;
        if (encontrado==true && condicion!='')
        {
    		$('histoculto').hide();
    		$('textooculto1').show();
			$('idfunciones').disabled=true;
			$('idempleados').disabled=true;
			$('idmovimientos').disabled=false;
			$('idhistoricos').disabled=false;
			$('idvariables').disabled=false;
			$('idconceptos').disabled=false;
			$('idlabel').value=$('cajaux2').value + opci;

        }else
        {
			if ($('cajgrid1').value!='')
		    {
	    		var idnuevo = $('cajgrid1').value;
				$(idnuevo).value = $(idnuevo).value + $('cajaux').value + opci + " ";
				$(idnuevo).focus();
				$('histoculto').hide();
	    		$('textooculto1').hide();
	    		$('grid1').show();
				$('idfunciones').disabled=false;
				$('idempleados').disabled=false;
				$('idmovimientos').disabled=false;
				$('idhistoricos').disabled=false;
				$('idvariables').disabled=false;
				$('idconceptos').disabled=false;
				$('cajoculabel').value ='valor';

		    }else
		    {
		    	$('histoculto').hide();
	    		$('textooculto1').hide();
	    		$('grid1').show();
				$('idfunciones').disabled=false;
				$('idempleados').disabled=false;
				$('idmovimientos').disabled=false;
				$('idhistoricos').disabled=false;
				$('idvariables').disabled=false;
				$('idconceptos').disabled=false;
				$('cajoculabel').value ='valor';
				var valor = $('cajaux').value+opci;
				cargargrid(valor);
			}
     	}
	}

	function botonCancelar()
	{
		$('textooculto1').hide();
		$('grid1').show();
		$('idfunciones').disabled=false;
		$('idempleados').disabled=false;
		$('idmovimientos').disabled=false;
		$('idhistoricos').disabled=false;
		$('idvariables').disabled=false;
		$('idconceptos').disabled=false;
		$('cajoculabel').value='valor';
		$('idlabel').value='';
	}

	function botonCancelar2()
	{
	    $('histoculto').hide();
    	$('textooculto1').show();
		$('idfunciones').disabled=true;
		$('idempleados').disabled=true;
		$('idmovimientos').disabled=false;
		$('idhistoricos').disabled=false;
		$('idvariables').disabled=false;
		$('idconceptos').disabled=false;
		$('idlabel').value='';
	}

	function CargarFormula(id)
	{
	  var index=$(id).selectedIndex;
      var text=$(id).options[index].text;
	  var cod = $(id).value;
	  var dato = cod;

/*******************************Aqui entra cuando se esconde le grid**********************************/
		if ($('cajoculabel').value =='')
		{
			$('idlabel').value = $(id).value;

			if (dato=='NHIJO')
			{
				var parametro = cod.substr(5,(cod.length) - 5);
				if (isNaN(parseInt(parametro)))
				   parametro = "0"

				dato = 'NHIJO';
			}

			if (dato=='ACUC')
			{
				var parametro = cod.substr(4,(cod.length) - 4);
				if (isNaN(parametro))
				   parametro = "000";

				dato = 'ACUC';
			}
			if (dato=='STAB' || dato=='SC')
			{
				var param = cod.substr(2,(cod.length) - 2);
				var parametro = param.substr(2,2)+"/"+param.substr(0,2)+"/"+param.substr(4,4);
				var fecha = new Date();
				var ano = fecha.getFullYear();

				if (isDate(parametro))
				   parametro = "0101"+ano;
				if(dato=='STAB')
					dato = 'STAB';
				else
					dato = 'SC';
			}
			if (dato=='CTAB')
			{
				var param = cod.substr(4,(cod.length) - 4);
				var parametro = param.substr(2,2)+"/"+param.substr(0,2)+"/"+param.substr(4,4);
				var fecha = new Date();
				var ano = fecha.getFullYear();

				if (isDate(parametro))
				   parametro = "0101"+ano;

				dato = 'CTAB';
			}
			if (dato != "SIC" &&  dato != "SIC" && dato != "SIM" && dato != "SC" && dato != "SCAR" && dato != "TAF" && dato != "TDED" && dato != "NL" && dato != "NLP" && dato != "NS" &&
			    dato != "AD" && dato != "DC" && dato != "DV" && dato != "DBV" && dato != "PV" && dato != "ADV" && dato != "ADF" && dato != "AM" && dato != "CATRAB" &&
			    dato != "AC" && dato != "AA" && dato != "AET" && dato != "AAP" && dato != "CC" && dato != "ED" && dato != "EE"  && dato != "FFRAC" && dato != "FINT" && dato != "ACUC" &&
			    dato != "MESF"  && dato != "DIAF" && dato != "ANOF" && dato != "NHGR" && dato != "NHIJ" && dato != "PPROF" && dato != "PHIJO" && dato != "MCES" &&
			    dato != "ADIC")
			{
				var vari = dato.substr(0,1);
				if (vari=="H")
				{
					$('grid1').hide();
					$('idfunciones').disabled=true;
					$('idempleados').disabled=true;
					$('idmovimientos').disabled=true;
					$('idhistoricos').disabled=true;
					$('idvariables').disabled=true;
					$('idconceptos').disabled=true;
					$('textooculto1').hide();
					$('cajaux2').value=dato;
					$('ultmes').value='0';
					$('fecini').value='';
					$('fecfin').value='';
					$('histoculto').show();
				}
			}else
			{
			alert('No se puede hacer una funcion de otra');
			$('idlabel').value='';
			}

		}
/***************************Primero entra aqui cuando el grid esta activo************************/
		else
		{
			if ($('cajgrid1').value!='')
			{
				var index=$(id).selectedIndex;
		     	var text=$(id).options[index].text;
		     	var cod = $(id).value;

				if (!validandoParametros(cod))
				{
			     	var idnuevo = $('cajgrid1').value;
					$(idnuevo).value = $(idnuevo).value + cod + " ";
					$(idnuevo).focus();
				}


			}else
			{
	 	        var index=$(id).selectedIndex;
		     	var text=$(id).options[index].text;
		     	var cod = $(id).value;


		     	//aqui van los if que chequean el codigo

		     	if (!validandoParametros(cod))
		     	{
					cargargrid(cod);
		     	}
            }
        }
	}


   function validandoParametros(cod)
   {

		     	if (cod=='FINT' || cod=='FFRAC' || cod=='SHORAS' || cod=='SDIAS')
		     	{
					$('grid1').hide();
					$('idfunciones').disabled=true;
					$('idempleados').disabled=true;
					$('idmovimientos').disabled=false;
					$('idhistoricos').disabled=false;
					$('idvariables').disabled=false;
					$('idconceptos').disabled=false;
					if (cod=='SHORAS' || cod=='SDIAS')
					{
					  $('idhistoricos').disabled=true;
					  $('idvariables').disabled=true;
					}
					$('idlabel2').hide();
					$('idlabel2').value='';
					$('histoculto').hide();
					$('idlabel').show();

                    if (cod=='SHORAS' || cod=='SDIAS')
                    {
                         $('label1').innerHTML = "Escoja el campo al que desea aplicarle la funcion   "+cod+"; coloque cero(0)  si desea el sueldo del cargo:";
                         $('idlabel').readOnly=false;
                    }
                    else
                     {
                         $('label1').innerHTML = "Escoja el campo al que desea aplicarle la funcion   "+cod+":    ";
                          $('idlabel').readOnly=true;
                      }
					$('textooculto1').show();
					$('cajoculabel').value='';
					$('cajaux').value=cod;
					return true;
		     	}else if (cod=='STAB' || cod=='CTAB' || cod=='SC')
		     	{
		     	    $('grid1').hide();
					$('idfunciones').disabled=true;
					$('idempleados').disabled=true;
					$('idmovimientos').disabled=true;
					$('idhistoricos').disabled=true;
					$('idvariables').disabled=true;
					$('idconceptos').disabled=true;
					$('idlabel').hide();
					$('cajoculabel').value='';
					$('idlabel').value='';
					$('histoculto').hide();
					$('idlabel2').show();

					$('label1').innerHTML = "Introduzca una fecha valida para la funcion    "+cod+":    ";
					$('textooculto1').show();
					$('idlabel').value='';
					$('cajaux').value=cod;
					$('idlabel2').readOnly=false;
					$('idlabel2').focus();
					return true;

		     	}else if (cod=='NHMAYEDA' || cod=='NHMENEDA')
		     	{
		     	    $('grid1').hide();
					$('idfunciones').disabled=true;
					$('idempleados').disabled=true;
					$('idmovimientos').disabled=true;
					$('idhistoricos').disabled=true;
					$('idvariables').disabled=true;
					$('idconceptos').disabled=true;
					$('idlabel2').hide();
					$('cajoculabel').value='';
					$('idlabel2').value='';
					$('histoculto').hide();
					$('idlabel').show();

					$('label1').innerHTML = "Introduzca una edad valida para la funcion    "+cod+":    ";
					$('textooculto1').show();
					$('idlabel').value='';
					$('cajaux').value=cod;
					$('idlabel').readOnly=false;
					$('idlabel').focus();
					return true;

		     	}else if(cod=='DIAF' || cod=='MESF' || cod=='ANOF')
		     	{
					$('grid1').hide();
					$('idfunciones').disabled=false;
					$('idempleados').disabled=false;
					$('idmovimientos').disabled=true;
					$('idhistoricos').disabled=true;
					$('idvariables').disabled=true;
					$('idconceptos').disabled=true;
					$('idlabel2').hide();
					$('idlabel2').value='';
					$('histoculto').hide();
					$('idlabel').show();

					$('label1').innerHTML = "Escoja el campo al que desea aplicarle la funcion   "+cod+":    ";
					$('textooculto1').show();
					$('cajoculabel').value='';
					$('cajaux').value=cod;
					$('idlabel').readOnly=true;
					return true;

		     	}else if (cod.substr(0,1)=='H')
		     	{
					$('grid1').hide();
					$('idfunciones').disabled=true;
					$('idempleados').disabled=true;
					$('idmovimientos').disabled=true;
					$('idhistoricos').disabled=true;
					$('idvariables').disabled=true;
					$('idconceptos').disabled=true;
					$('cajoculabel').value='';
					$('ultmes').value='0';
					$('fecini').value='';
					$('fecfin').value='';
					$('cajaux').value=cod;
					$('cajaux2').value='';
					$('histoculto').show();
					return true;
		     	}else if(cod=='SIMESDAD')
		     	{
		     	    $('grid1').hide();
					$('idfunciones').disabled=true;
					$('idempleados').disabled=true;
					$('idmovimientos').disabled=true;
					$('idhistoricos').disabled=true;
					$('idvariables').disabled=true;
					$('idconceptos').disabled=true;
					$('idlabel2').hide();
					$('cajoculabel').value='';
					$('idlabel2').value='';
					$('histoculto').hide();
					$('idlabel').show();

					$('label1').innerHTML = "Introduzca la cantidad de meses hacia atras para la funcion "+cod+":    ";
					$('textooculto1').show();
					$('idlabel').value='';
					$('cajaux').value=cod;
					$('idlabel').readOnly=false;
					$('idlabel').focus();
					return true;
		     	}
				else if(cod=='INTPRES' || cod=='DIAADIPRE' || cod=='DIAADIFID')
		     	{
		     	    $('grid1').hide();
					$('idfunciones').disabled=true;
					$('idempleados').disabled=true;
					$('idmovimientos').disabled=true;
					$('idhistoricos').disabled=true;
					$('idvariables').disabled=true;
					$('idconceptos').disabled=true;
					$('idlabel2').hide();
					$('cajoculabel').value='';
					$('idlabel2').value='';
					$('histoculto').hide();
					$('idlabel').show();

					$('label1').innerHTML = "Introduzca el tipo de capitalizacion (A)nual, (M)ensual o (N)o-Capitalizable:    ";
					$('textooculto1').show();
					$('idlabel').value='';
					$('cajaux').value=cod;
					$('idlabel').readOnly=false;
					$('idlabel').focus();
					return true;
		     	}
		     	else if (cod=='FECDIAS'|| cod=='FECMES'|| cod=='FECANNOS')
		     	{
					$('grid1').hide();
					$('idfunciones').disabled=true;
					$('idempleados').disabled=false;
					$('idmovimientos').disabled=true;
					$('idhistoricos').disabled=true;
					$('idvariables').disabled=true;
					$('idconceptos').disabled=true;
					$('idlabel2').hide();
					$('idlabel2').value='';
					$('histoculto').hide();
					$('idlabel').show();
                    $('label1').innerHTML = "Escoja el campo FECHA al que desea aplicarle la funcion   "+cod+":    ";
                    $('idlabel').readOnly=true;
					$('textooculto1').show();
					$('cajoculabel').value='';
					$('cajaux').value=cod;
					return true;
		     	}
		     	else
		     	{
		     	  return false;
		     	}
   }


	function cargargrid(cod)
	{
		 //VARIABLES A PASAR AL GRID
		   //  var index=$(id).selectedIndex;
		    // var text=$(id).options[index].text;
		     //var cod = $(id).value;

		     var fil2=0;
		     var cuentafil=0;
                 var col=1;
                 var valcajgrid5=$('cajgrid5').value;
                 if(valcajgrid5=='3')
                     col=3;

		     while (fil2<150)
	         {
	            var ida="ax"+"_"+fil2+"_"+col;
	            if ($(ida).value=="")
	            {
	               cuentafil=fil2;
	               break;
	            }
	            fil2++;
	         }
	         var caj1="ax"+"_"+cuentafil+"_"+col;
	         $(caj1).value=cod;
	}

    function ajaxgrid(id)
    {
        var comindex=$(id).selectedIndex;
	    var comtext=$(id).options[comindex].text;
	    var comval = $(id).value;

	     var aux = id.split("_");
   		 var name=aux[0];
   		 var fila=aux[1];
   		 var col=parseInt(aux[2]);

        var coldes=col+1;
        var idnew=name+"_"+fila+"_"+coldes;

	    if ($(idnew).value=='')
	    {
		    if (comval=='-1')
			{
				$(idnew).readOnly=false;
				$(idnew).value='';
				$(idnew).focus();
			}else
			{
				$(idnew).value=comval;
				$(idnew).setAttribute('readonly','true');
				$('cajgrid1').value='';
			}
	    }else
	    {
	    	if ($(idnew).value=='And' || $(idnew).value=='Or' )
	    	{
				if (comval=='-1')
				{
					$(idnew).readOnly=false;
					$(idnew).value='';
					$(idnew).focus();
				}else
				{
					$(idnew).value=comval;
					$(idnew).setAttribute('readonly','true');
					$('cajgrid1').value='';
				}


	    	}else
	    	{
				if (comval=='-1')
				{
					$(idnew).readOnly=false;
					$(idnew).focus();
				}else
				{
					if (confirm('Desea perder los datos de la formula'))
					{
						$(idnew).value=comval;
						$(idnew).setAttribute('readonly','true');
						$('cajgrid1').value='';
					}else
					{
						$(idnew).readOnly=false;
						$(idnew).focus();
					}

				}
	    	}
	    }
    }

	//ONFOCUS
    function condicionValor(id)
    {
    	var aux = id.split("_");
   		var name=aux[0];
   		var fila=aux[1];
   		var col=parseInt(aux[2]);

    	var colcod=col-2;
        var idnew=name+"_"+fila+"_"+colcod;

        $('cajgrid4').value=idnew;

        if ($(idnew).value!='' )
        {
        	if ($(idnew).value=="E00" )
        	{
        	   $(id).setAttribute('maxlength','16');
        	}
        	if ($(idnew).value=="E02" )
        	{
        	   $(id).setAttribute('maxlength','10');
        	}
        	if ($(idnew).value=="E03" )
        	{
				$(id).setAttribute('maxlength','20');
        	}
        	if ($(idnew).value=="E04" )
        	{
				//alert('Introduzca ("S"-soltero(a) "C"-casado(a) "V"-viudo(a) "D"-divorciado(a) despues de aceptar');
				$('labelmensaje').innerHTML = "Introduzca ('S'-soltero(a) 'C'-casado(a) 'V'-viudo(a) 'D'-divorciado(a) ";
				$('mensaje').show();
				$(id).setAttribute('maxlength','1');
        	}
        	if ($(idnew).value=="E05" )
        	{
				//alert('Introduzca ("V"-Venezolano(a) "E"-Extranjero(a) despues de aceptar');
				$('labelmensaje').innerHTML = "Introduzca ('V'-Venezolano(a) 'E'-Extranjero(a)";
				$('mensaje').show();
				$(id).setAttribute('maxlength','1');
        	}
        	if ($(idnew).value=="E06" )
        	{
				//alert('Introduzca ("M"-Masculino) "F"-Femenino despues de aceptar');
				$('labelmensaje').innerHTML = "Introduzca ('M'-Masculino) 'F'-Femenino";
				$('mensaje').show();
				$(id).setAttribute('maxlength','1');
        	}
        	if ($(idnew).value=="NS" || $(idnew).value=="NL" || $(idnew).value=="NLP" )
        	{
				$(id).setAttribute('maxlength','1');
        	}
        	if ($(idnew).value=="E08" || $(idnew).value=="AA" || $(idnew).value=="AET" || $(idnew).value=="AAP" || $(idnew).value=="CC" || $(idnew).value=="NHIJ" ||
        	$(idnew).value=="NHGR" || $(idnew).value=="MESF" || $(idnew).value=="DIAF" || $(idnew).value=="CATRAB" || $(idnew).value=="AC" )
        	{
				$(id).setAttribute('maxlength','2');
        	}
        	if ($(idnew).value=="EE" || $(idnew).value=="AM" || $(idnew).value=="ANOF" )
        	{
				$(id).setAttribute('maxlength','4');
        	}
        	if ($(idnew).value=="AD" || $(idnew).value=="ED" || $(idnew).value=="ADF" || $(idnew).value=="DC" || $(idnew).value=="ADV" || $(idnew).value=="DV" )
        	{
				$(id).setAttribute('maxlength','5');
        	}
        	if ($(idnew).value=="E24" )
        	{
				//alert('Introduzca ("A"-Activo "P"-Permiso "R"-Retirado "V"-Vacaciones despues de aceptar');
				$('labelmensaje').innerHTML = "Introduzca ('A'-Activo 'P'-Permiso 'R'-Retirado 'V'-Vacaciones";
				$('mensaje').show();
				$(id).setAttribute('maxlength','1');
        	}
        	if ($(idnew).value.substr(0,4)=="FINT" )
        	{
				$(id).setAttribute('maxlength','16');
        	}
        }
    }

    //ONBLUR
    function condicionValor2(e,id)
    {
    	/*var aux = id.split("_");
   		var name=aux[0];
   		var fila=aux[1];
   		var col=parseInt(aux[2]);

    	var colcod=col-2;
        var idnew=name+"_"+fila+"_"+colcod;*/
        var idnew = $('cajgrid4').value;

        if ($(idnew).value=='' &&  $(id).value!='')
		{
                        $(id).value='';
			alert('Debe Introducir Primero el Campo');
		}
        else
        if($(id).value!='')
        {
        	if ($(idnew).value=="E03" &&  $(id).value!='')
        	{
				var num = parseInt($(id).value);
				if (isNaN(num))
				{
				   alert('Debe introducir un valor numerico');
				   $(id).value="";
				}
        	}else
        	if ($(idnew).value=="E04" &&  $(id).value!='')
        	{
				var char = $(id).value;
				if (char.toUpperCase()!="S" && char.toUpperCase()!="C" && char.toUpperCase()!="V" && char.toUpperCase()!="D" )
				{
				   alert('Debe introducir uno de los valores antes mencionados');
				   $(id).value="";
				}else
				  {
				     $(id).value= $(id).value.toUpperCase();
				  }

        	}else
        	if ($(idnew).value=="E05" &&  $(id).value!='')
        	{
				var char = $(id).value;
				if (char.toUpperCase()!="V" && char.toUpperCase()!="E" )
				{
				   alert('Debe introducir uno de los valores antes mencionados');
				   $(id).value="";
				}
        	}else
        	if ($(idnew).value=="E06" &&  $(id).value!='')
        	{
				var char = $(id).value;
				if (char.toUpperCase()!="M" && char.toUpperCase()!="F" )
				{
				   alert('Debe introducir uno de los valores antes mencionados');
				   $(id).value="";
				}
        	}else
        	if (($(idnew).value=="NS" || $(idnew).value=="NL" || $(idnew).value=="NLP") &&  $(id).value!='')
        	{
				var num = parseInt($(id).value);
				if (isNaN(num))
				{
				   alert('Debe introducir un valor numerico');
				   $(id).value="";
				}
        	}else
        	if (($(idnew).value=="E08" || $(idnew).value=="AA" || $(idnew).value=="AET" || $(idnew).value=="AAP" || $(idnew).value=="CC" || $(idnew).value=="NHIJ" ||
        	$(idnew).value=="NHGR" || $(idnew).value=="MESF" || $(idnew).value=="DIAF" || $(idnew).value=="CATRAB" || $(idnew).value=="AC")&&  $(id).value!='')
        	{
        		var num = parseInt($(id).value);
				if (isNaN(num))
				{
				   alert('Debe introducir un valor numerico');
				   $(id).value="";
				}
        	}else
			if (($(idnew).value=="EE" || $(idnew).value=="AM" || $(idnew).value=="ANOF" )&&  $(id).value!='')
			{
				var num = parseInt($(id).value);
				if (isNaN(num))
				{
				   alert('Debe introducir un valor numerico');
				   $(id).value="";
				}
			}else
			if (($(idnew).value=="AD" || $(idnew).value=="ED" || $(idnew).value=="ADF" || $(idnew).value=="DC" || $(idnew).value=="ADV" || $(idnew).value=="DV")&&  $(id).value!='')
			{
				var num = parseInt($(id).value);
				if (isNaN(num))
				{
				   alert('Debe introducir un valor numerico');
				   $(id).value="";
				}
			}else
			if ($(idnew).value=="E24" &&  $(id).value!='')
        	{
				var char = $(id).value;
				if (char.toUpperCase()!="A" && char.toUpperCase()!="P" && char.toUpperCase()!="R" && char.toUpperCase()!="V" )
				{
				   alert('Debe introducir uno de los valores antes mencionados');
				   $(id).value="";
				}
        	}else
        	if ($(idnew).value.substr(0,4)=="FINT"  &&  $(id).value!='')
        	{
				var num = parseInt($(id).value);
				if (isNaN(num))
				{
				   alert('Debe introducir un valor numerico');
				   $(id).value="";
				}
        	}else if ($(idnew).value!="E00" && $(idnew).value!="E02" && $(idnew).value!="CARG")
        	{
        		var val = $(id).value.replace(',','.');
	        	if (!(isNaN(val)))
				  {
				  	if(ValidarNumeroV2Float(id))
				        elnum = FloattoFloatVE($(id).value);
				      else
				        if(ValidarNumeroV2VE(id))
				        {
				          elnum = FloatVEtoFloat($(id).value);
				          elnum = FloattoFloatVE(elnum);
				        }
				        else{elnum = '0,00';}
				      $(id).value = elnum;
				  }
			 }

        }
        $('mensaje').hide();
    }
     //ONKEYUP
    function condicionValor3(d,id)
    {
    	var idnew = $('cajgrid4').value;

        if ($(idnew).value=='' &&  $(id).value!='')
		{

		}
		else
		{
			if ($(idnew).value=="E07" || $(idnew).value=="E20" || $(idnew).value=="E21" || $(idnew).value=="E22" || $(idnew).value=="E23" || $(idnew).value=="E28" || $(idnew).value=="FECN"  )
			{
				mascara(d,'/',patron,true);
			}
		}

	}
    function Capturarfoco(id)
    {
        var aux = id.split("_");
        var name=aux[0];
        var fila=aux[1];
        var col=parseInt(aux[2]);

        if(col==3)
        {
            $('cajgrid5').value="3";
        }else
        {
            $('cajgrid5').value="1";
        }
    }
