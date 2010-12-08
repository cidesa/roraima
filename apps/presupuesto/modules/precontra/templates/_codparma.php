<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
 $masc=$cpcontra->getMascara();
 $lenmasc=strlen($cpcontra->getMascara());

 $value = object_input_tag($cpcontra, 'getCodparma', array (
  'size' => $lenmasc+2,
  'maxlength' => $lenmasc,
  'control_name' => 'cpcontra[codparma]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$masc')",
  'onBlur'=> remote_function(array(
        'update'  => 'divgrid',
        'url'      => 'precontra/ajax',
        'condition' => "$('cpcontra_codparma').value!= ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=cpcontra_nompar&cajtexcom=cpcontra_codparma&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php
echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nppartidas_Precontra/clase/Prepartidas/frame/sf_admin_edit_form/obj1/cpcontra_codparma/obj2/cpcontra_nompar/campo1/codpar/campo2/nompar','','','botoncat')?>


<?php $value = object_input_tag($cpcontra, 'getNompar', array (
  'disabled' => true,
  'size' => 40,
  'control_name' => 'cpcontra[nompar]',
)); echo $value ? $value : '&nbsp;' ?>


<script type="text/javascript" language="JavaScript">

function verificarpartida(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col +1;
   var descrip=name+"_"+fila+"_"+coldes;

   if (codpar_repetida(id))
   {
      alert_('El Partida Presupuestaria esta repetida');
      $(id).value="";
      $(id).focus();
      $(descrip).value="";
   }

}

 function codpar_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var compara=$(id).value;

   var codparrepetida=false;
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
        codparrepetida=true;
        break;
      }
    }
   i++;
   }
   return codparrepetida;
 }
</script>