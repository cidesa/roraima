function validarEntero(id)
{
     valor = $(id).value;
     valor = parseInt(valor);

      if (isNaN(valor))
      {
            //alert('El Valor Introducido Debe ser un Numero');
            $(id).value='';
            $(id).focus();
      }
      else 
      {   
         $(id).value=valor; 
      }
}

function calcular_dias(id)
{
	var adisfrutar = $(id).value;
	var aux = id.split("_");

   	var name=aux[0];
   	var fila=aux[1];
   	var col=parseInt(aux[2]);

      var coldes=col+1;
      var disfrutados  = name+"_"+fila+"_"+coldes;

      var coldes=col+2;
      var pordisfrutar = name+"_"+fila+"_"+coldes;

   var dias = parseInt(adisfrutar) - parseInt($(disfrutados).value);

     if (isNaN(dias))
     {
       $(pordisfrutar).value = "";
     }
     else
     {
       $(pordisfrutar).value = dias;
     }

}

function calcular_dias2(id)
{
	var disfrutados = $(id).value;
	var aux = id.split("_");

   	var name=aux[0];
   	var fila=aux[1];
   	var col=parseInt(aux[2]);

      var coldes=col-1;
      var adisfrutar  = name+"_"+fila+"_"+coldes;

      var coldes=col+1;
      var pordisfrutar = name+"_"+fila+"_"+coldes;

    var dias = parseInt($(adisfrutar).value) - parseInt(disfrutados);

     if (isNaN(dias))
     {
       $(pordisfrutar).value = "";
     }
     else
     {
       $(pordisfrutar).value = dias;
     }

}
