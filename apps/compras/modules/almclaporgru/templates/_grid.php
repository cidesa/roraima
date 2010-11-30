<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($cagrucla->getObj());
?>
<script type="text/javascript" language="Javascript">
function validarclausularepetida(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

    var coldes= col +1;
   var descripcion=name+"_"+fila+"_"+coldes;

   if (clausula_repetida(id))
   {
      alert_('El C&oacute;digo de la Cla&uacute;sula esta repetido');
      $(id).value="";
      $(descripcion).value="";
      $(id).focus();
   }

}

 function clausula_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var compara=$(id).value;

   var clausularepetida=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var compara2=$(codigo).value;

    if (i!=fila)
    {
      if (compara==compara2)
      {
        clausularepetida=true;
        break;
      }
    }
   i++;
   }
   return clausularepetida;
 }

</script>
