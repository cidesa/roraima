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
<?php echo form_tag('farecarg/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('dFilter','Observe') ?>
<?php echo javascript_include_tag('tools') ?>

<?php echo object_input_hidden_tag($farecarg, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Recargo')?></legend>
<div class="form-row">
<?php echo label_for('farecarg[codrgo]', __($labels['farecarg{codrgo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('farecarg{codrgo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('farecarg{codrgo}')): ?> <?php echo form_error('farecarg{codrgo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($farecarg, 'getCodrgo', array (
'size' => 5,
'maxlength' => 4,
'readonly' => $farecarg->getId()!='' ? true : false,
'control_name' => 'farecarg[codrgo]',
'onBlur'  => "javascript: valor=this.value; if (valor!='') {valor=valor.pad(4, '0',0);document.getElementById('farecarg_codrgo').value=valor;}",
)); echo $value ? $value : '&nbsp;' ?>

</div>
<br>

<?php echo label_for('farecarg[nomrgo]', __($labels['farecarg{nomrgo}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('farecarg{nomrgo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('farecarg{nomrgo}')): ?> <?php echo form_error('farecarg{nomrgo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($farecarg, 'getNomrgo', array (
  'size' => 50,
  'maxlength' => 100,
  'control_name' => 'farecarg[nomrgo]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<table>
<tr>
<th><fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipo de Recargo') ?></legend>
<div class="form-row">
<?
if ($farecarg->getTiprgo()=='M')	{
  ?><?php echo radiobutton_tag('farecarg[tiprgo]', 'M', true)        ."Puntual".'&nbsp;&nbsp;';
		  echo radiobutton_tag('farecarg[tiprgo]', 'P', false)."   Porcentual";?>
		<?

}else{
	echo radiobutton_tag('farecarg[tiprgo]', 'M', false)        ."Puntual".'&nbsp;&nbsp;';
	echo radiobutton_tag('farecarg[tiprgo]', 'P', true)."   Porcentual";

} ?> </div></fieldset></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th><?php echo label_for('farecarg[monrgo]', __($labels['farecarg{monrgo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('farecarg{monrgo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('farecarg{monrgo}')): ?> <?php echo form_error('farecarg{monrgo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($farecarg, array('getMonrgo',true), array (
'size' => 7,
'control_name' => 'farecarg[monrgo]',
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
), $default_value = number_format($value,2,',','.')); echo $value ? $value : '&nbsp;' ?>&nbsp;&nbsp;</div></th>
</tr>
</table>
</fieldset>


<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Titulo Presupuestario') ?></legend>
<div class="form-row">
<?php echo label_for('farecarg[codpre]', __($labels['farecarg{codpre}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('farecarg{codpre}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('farecarg{codpre}')): ?> <?php echo form_error('farecarg{codpre}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($farecarg, 'getCodpre', array (
  'size' => 32,
  'control_name' => 'farecarg[codpre]',
  'maxlength' => $longpre,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascarapresupuestaria')",
  'onBlur'=> remote_function(array(
			  'url'      => 'farecarg/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('farecarg_codpre').value != ''",
  			  'with' => "'ajax=1&cajtexcom=farecarg_codpre&cajtexmos=farecarg_nompre&codigo='+this.value"
			  )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;

<?php

//if ($tipoformato=='P')
//{
  echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Preasiini_Cpdeftit/clase/Cpdeftit/frame/sf_admin_edit_form/obj1/farecarg_codpre/obj2/farecarg_nompre/campo1/codpre/campo2/nompre/param1/'.$longpre);
//}
//else
//{
	//echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nppartidas_farecarg/clase/Nppartidas/frame/sf_admin_edit_form/obj1/farecarg_codpre/obj2/farecarg_nompre/campo1/codpar/campo2/nompar');
//}


?>

 </div>

<br>

  <?php echo label_for('farecarg[nompre]', __($labels['farecarg{nompre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('farecarg{nompre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('farecarg{nompre}')): ?>
    <?php echo form_error('farecarg{nompre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($farecarg, 'getNompre', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'farecarg[nompre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Cuenta Contable') ?></legend>
<div class="form-row">
<?php echo label_for('farecarg[codcta]', __($labels['farecarg{codcta}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('farecarg{codcta}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('farecarg{codcta}')): ?> <?php echo form_error('farecarg{codcta}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($farecarg, 'getCodcta', array (
  'size' => 32,
  'control_name' => 'farecarg[codcta]',
  'maxlength' => $longcon,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
			  'url'      => 'farecarg/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('farecarg_codcta').value != ''",
  			  'with' => "'ajax=2&cajtexcom=farecarg_codcta&cajtexmos=farecarg_descta&codigo='+this.value"
			  )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
 <?php
 echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_farecarg/clase/Contabb/frame/sf_admin_edit_form/obj1/farecarg_codcta/obj2/farecarg_descta')
 ?>
</div>

<br>

  <?php echo label_for('farecarg[descta]', __($labels['farecarg{descta}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('farecarg{descta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('farecarg{descta}')): ?>
    <?php echo form_error('farecarg{descta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($farecarg, 'getDescta', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'farecarg[descta]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

</div>
</fieldset>

<?php include_partial('edit_actions', array('farecarg' => $farecarg)) ?>
</form>

<ul class="sf_admin_actions">
	<li class="float-rigth">
	<?php if ($farecarg->getId()): ?>
	<?php echo button_to(__('delete'), 'farecarg/delete?id='.$farecarg->getId(), array (
	'post' => true,
	'confirm' => __('Are you sure?'),
	'class' => 'sf_admin_action_delete',
	)) ?>
	<?php endif; ?></li>
</ul>

