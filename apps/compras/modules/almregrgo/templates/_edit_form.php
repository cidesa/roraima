<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 22:19:10
?>
<?php echo form_tag('almregrgo/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('dFilter','Observe') ?>
<?php echo javascript_include_tag('tools') ?>

<?php echo object_input_hidden_tag($carecarg, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Recargo')?></legend>
<div class="form-row">
<?php echo label_for('carecarg[codrgo]', __($labels['carecarg{codrgo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('carecarg{codrgo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('carecarg{codrgo}')): ?> <?php echo form_error('carecarg{codrgo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($carecarg, 'getCodrgo', array (
'size' => 5,
'maxlength' => 4,
'readonly' => $carecarg->getId()!='' ? true : false,
'control_name' => 'carecarg[codrgo]',
'onBlur'  => "javascript: valor=this.value; if (valor!='') {valor=valor.pad(4, '0',0);document.getElementById('carecarg_codrgo').value=valor;}",
)); echo $value ? $value : '&nbsp;' ?>

</div>
<br>

<?php echo label_for('carecarg[nomrgo]', __($labels['carecarg{nomrgo}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('carecarg{nomrgo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('carecarg{nomrgo}')): ?> <?php echo form_error('carecarg{nomrgo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($carecarg, 'getNomrgo', array (
  'size' => 50,
  'maxlength' => 100,
  'control_name' => 'carecarg[nomrgo]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<table>
<tr>
<th><fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipo de Recargo') ?></legend>
<div class="form-row">
<?
if ($carecarg->getTiprgo()=='M')	{
  ?><?php echo radiobutton_tag('carecarg[tiprgo]', 'M', true)        ."Puntual".'&nbsp;&nbsp;';
		  echo radiobutton_tag('carecarg[tiprgo]', 'P', false)."   Porcentual";?>
		<?

}else{
	echo radiobutton_tag('carecarg[tiprgo]', 'M', false)        ."Puntual".'&nbsp;&nbsp;';
	echo radiobutton_tag('carecarg[tiprgo]', 'P', true)."   Porcentual";

} ?> </div></fieldset></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th><?php echo label_for('carecarg[monrgo]', __($labels['carecarg{monrgo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('carecarg{monrgo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('carecarg{monrgo}')): ?> <?php echo form_error('carecarg{monrgo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($carecarg, array('getMonrgo',true), array (
'size' => 7,
'control_name' => 'carecarg[monrgo]',
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
), $default_value = number_format($value,2,',','.')); echo $value ? $value : '&nbsp;' ?>&nbsp;&nbsp;</div></th>
</tr>
</table>
</fieldset>


<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Titulo Presupuestario') ?></legend>
<div class="form-row">
<?php echo label_for('carecarg[codpre]', __($labels['carecarg{codpre}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('carecarg{codpre}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('carecarg{codpre}')): ?> <?php echo form_error('carecarg{codpre}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($carecarg, 'getCodpre', array (
  'size' => 32,
  'control_name' => 'carecarg[codpre]',
  'maxlength' => $longpre,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascarapresupuestaria')",
  'onBlur'=> remote_function(array(
			  'url'      => 'almregrgo/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('carecarg_codpre').value != ''",
  			  'with' => "'ajax=1&cajtexcom=carecarg_codpre&cajtexmos=carecarg_nompre&codigo='+this.value"
			  )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;

<?php

if ($tipoformato=='P')
{
  echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdeftit_Almregrgo/clase/Cpdeftit/frame/sf_admin_edit_form/obj1/carecarg_codpre/obj2/carecarg_nompre/campo1/codpre/campo2/nompre/param1/'.$longpre);
}
else
{echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nppartidas_Almregrgo/clase/Nppartidas/frame/sf_admin_edit_form/obj1/carecarg_codpre/obj2/carecarg_nompre/campo1/codpar/campo2/nompar');
}


?>

 </div>

<br>

  <?php echo label_for('carecarg[nompre]', __($labels['carecarg{nompre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecarg{nompre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecarg{nompre}')): ?>
    <?php echo form_error('carecarg{nompre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carecarg, 'getNompre', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'carecarg[nompre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Cuenta Contable') ?></legend>
<div class="form-row">
<?php echo label_for('carecarg[codcta]', __($labels['carecarg{codcta}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('carecarg{codcta}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('carecarg{codcta}')): ?> <?php echo form_error('carecarg{codcta}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($carecarg, 'getCodcta', array (
  'size' => 32,
  'control_name' => 'carecarg[codcta]',
  'maxlength' => $longcon,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
			  'url'      => 'almregrgo/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('carecarg_codcta').value != ''",
  			  'with' => "'ajax=2&cajtexcom=carecarg_codcta&cajtexmos=carecarg_descta&codigo='+this.value"
			  )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
 <?php
 echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregrgo/clase/Contabb/frame/sf_admin_edit_form/obj1/carecarg_codcta/obj2/carecarg_descta')
 ?>
</div>

<br>

  <?php echo label_for('carecarg[descta]', __($labels['carecarg{descta}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('carecarg{descta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecarg{descta}')): ?>
    <?php echo form_error('carecarg{descta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carecarg, 'getDescta', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'carecarg[descta]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

</div>
</fieldset>

<?php include_partial('edit_actions', array('carecarg' => $carecarg)) ?>
</form>

<ul class="sf_admin_actions">
	<li class="float-rigth">
	<?php if ($carecarg->getId()): ?>
	<?php echo button_to(__('delete'), 'almregrgo/delete?id='.$carecarg->getId(), array (
	'post' => true,
	'confirm' => __('Are you sure?'),
	'class' => 'sf_admin_action_delete',
	)) ?>
	<?php endif; ?></li>
</ul>

