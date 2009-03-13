function CrearSaldos()
{
	var	sw = $('sw').value;
	var ajax;
	if (sw=='1')
	{
		if (confirm('Existen Datos en la Tabla de Asignacion Inicial, Desea Eliminarlos y Crealos de Nuevo?'))
		{
			ajax='eliminar_crear';
		}else{
			if (confirm('Existen Datos en la Tabla de Asignacion Inicial, Desea Modificar La Asignacion Inicial?'))
			{
				ajax='modificar';
			}

		}

	}else
	{
		ajax='crear';
	}

    new Ajax.Request('/formulacion'+$("entorno").value+'.php/forcreaasiini/crear?ajax='+ajax,
    			{
	    			 asynchronous:true, evalScripts:false,
	    			 onComplete:function(request, json)
	    			 	{
	    			 		AjaxJSON(request, json)
	    			 	},
	    			 parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))
    			 }
    			 );//return false;

}