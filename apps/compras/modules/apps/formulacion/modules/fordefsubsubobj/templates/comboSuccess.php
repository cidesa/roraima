<?php

?>

<?php use_helper('Object', 'Validation', 'Javascript') ?>
<?php if ($tipo=='E')
{
echo select_tag('fordefsubsubobj[codsubobj]', options_for_select($subobjetivo,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divOtro',//Div a Actualizar
		'url'      => 'fordefsubsubobj/combo?par=2',//Variable para el control de la accion(1)
		'with' => "'equilibrio='+document.getElementById('fordefsubsubobj_codequ').value+'&subobjetivo='+this.value"//Valor de la variale de la caja de texto
  ))));
}
?>