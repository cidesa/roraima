<?php
//eval('$masc = $opordpag->get'.Mascaraubi.'();');
$masc=$opordpag->getMascaraubi();

$value = object_input_tag($opordpag, 'getCoduni', array (
  'size' => 20,
  'maxlength' => $opordpag->getLonubi(),
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[coduni]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$masc')",
  'onBlur'=> remote_function(array(
        'url'      => 'tesrencajchi/ajax',
        'condition' => "$('opordpag_coduni').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=opordpag_desubi&cajtexcom=opordpag_codubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php
if ($opordpag->getId()=='')
echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/opordpag_coduni/obj2/opordpag_desubi/campo1/codubi/campo2/desubi/param1/'.$opordpag->getLonubi(),'','','botoncat')?>

<?php $value = object_input_tag($opordpag, 'getdesubi', array (
  'disabled' => true,
  'size' => 40,
  'control_name' => 'opordpag[desubi]',
)); echo $value ? $value : '&nbsp;' ?>