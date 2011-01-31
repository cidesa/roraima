

  function validarNomina()
  {
	var valaux = $('cajocuaux').value;

	if (valaux=='' && $('npnomina_codnom').value!='')
	{
		alert('Codigo de Nomina no tiene movimientos, intente de nuevo...');
		$('npnomina_codnom').value='';
		$('npnomina_nomnom').value='';
		$('npnomina_codnom').focus();
	}

	if (valaux.toUpperCase()=='S')
	{
		$('numsemanas').show();
		$('ultimasemana').hide();
		$('numsemanas2').hide();
		$('msem').focus();

	}
	if (valaux.toUpperCase()=='Q' || valaux.toUpperCase()=='M' )
	{
		$('numsemanas').hide();
		$('numsemanas2').show();
	}
  }

  function validaMsem()
  {
  	if ($('msem').value!='__' && $('msem').value!='0')
  	{
		$('ultimasemana').show();
		$('opsi_SI').setAttribute('checked','checked');
  	}else
  	{
  	    $('ultimasemana').hide();
  	    $('opsi_NO').setAttribute('checked','checked');
  	}
  }

  function validarCalculo()
  {
  	if ($('controlador').value=='vacio')
  	{
		alert('Debe Colocar un Codigo de Nomina');
  	}else
  	{
  		if ($('controlador').value=='si')
	  	{
	  		alert('Esta Nomina se esta Calculando...');
	  		    /* location=('/nomina'+$("entorno").value+'.php/nomnomcalnom');*/
	  	}
	  	if ($('controlador').value=='no')
	  	{
	  		var tiempo = $('tiempo').value;
	  		alert('Se ha realizado exitosamente el Calculo de la Nomina '+$('npnomina_codnom').value +' en '+tiempo+'seg. ');
			//alert('El Calculo de la Nomina '+$('npnomina_codnom').value+'no se ha realizado con exito');
	  	}
  	}
  }
