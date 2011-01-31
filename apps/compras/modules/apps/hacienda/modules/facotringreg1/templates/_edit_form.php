<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/09 15:01:02
?>
<?php echo form_tag('facotringreg/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fcotring, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('fcotring[nrocon]', __($labels['fcotring{nrocon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcotring{nrocon}')): ?> form-error<?php endif; ?>"></div>
  <?php if ($sf_request->hasError('fcotring{nrocon}')): ?>
    <?php echo form_error('fcotring{nrocon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcotring, 'getNrocon', array (
  'size' => 20,
  'control_name' => 'fcotring[nrocon]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Fuente de Ingreso</strong>
<?php echo select_tag('fcotring[codfue]', options_for_select($fuentes,$fcotring->getCodfue(), 'include_custom=Seleccione Uno')); ?>
</div>

<div class="form-row">
  <?php echo label_for('fcotring[fecreg]', __($labels['fcotring{fecreg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcotring{fecreg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcotring{fecreg}')): ?>
    <?php echo form_error('fcotring{fecreg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fcotring, 'getFecreg', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcotring[fecreg]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos del Contribuyente');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('fcotring[rifcon]', __($labels['fcotring{rifcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcotring{rifcon}')): ?> form-error<?php endif; ?>"></div>
  <?php if ($sf_request->hasError('fcotring{rifcon}')): ?>
    <?php echo form_error('fcotring{rifcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcotring, 'getRifcon', array (
  'size' => 20,
  'control_name' => 'fcotring[rifcon]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php echo button_to('...','#')?>
&nbsp;&nbsp;
<strong>Nombre</strong>
 <?php $value = object_input_tag($fcotring, 'getNomcon', array (
  'size' => 50,
  'control_name' => 'fcotring[nomcon]',
  'disabled' => true,
)); echo $value ? $value : '&nbsp;' ?>    
</div>

<div class="form-row" align="center">
  <?php echo label_for('fcotring[dircon]', __($labels['fcotring{dircon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcotring{dircon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcotring{dircon}')): ?>
    <?php echo form_error('fcotring{dircon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcotring, 'getDircon', array (
  'size' => 80,
  'control_name' => 'fcotring[dircon]',
  'disabled' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row" align="center">
<table border="0">
  <tr>
    <th><fieldset id="sf_fieldset_none" class="">
<legend>Nacionalidad</legend>
<div class="form-row">
<?
if ($fcotring->getNaccon()=='V')	{
  ?><?php echo radiobutton_tag('fcotring[naccon]', 'V', true, 'disabled=true')        ."Venezolano(a)".'&nbsp;&nbsp;';
		  echo radiobutton_tag('fcotring[naccon]', 'E', false, 'disabled=true')."   Extranjero(a)";?>
		<?

}else{
	echo radiobutton_tag('fcotring[naccon]', 'V', false, 'disabled=true')        ."Venezolano(a)".'&nbsp;&nbsp;';
	echo radiobutton_tag('fcotring[naccon]', 'E', true, 'disabled=true')."   Extranjero(a)";

} ?> </div></fieldset></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><fieldset id="sf_fieldset_none" class="">
<legend>Tipo</legend>
<div class="form-row">
<?
if ($fcotring->getTipcon()=='N')	{
  ?><?php echo radiobutton_tag('fcotring[tipcon]', 'N', true, 'disabled=true')        ."Natural".'&nbsp;&nbsp;';
		  echo radiobutton_tag('fcotring[tipcon]', 'J', false, 'disabled=true')."   Jurídica";?>
		<?

}else{
	echo radiobutton_tag('fcotring[tipcon]', 'N', false, 'disabled=true')        ."Natural".'&nbsp;&nbsp;';
	echo radiobutton_tag('fcotring[tipcon]', 'J', true, 'disabled=true')."   Jurídica";

} ?></div></fieldset></th>
  </tr>
</table>   
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Datos del Representante');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('fcotring[rifrep]', __($labels['fcotring{rifrep}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcotring{rifrep}')): ?> form-error<?php endif; ?>"></div>
  <?php if ($sf_request->hasError('fcotring{rifrep}')): ?>
    <?php echo form_error('fcotring{rifrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcotring, 'getRifrep', array (
  'size' => 20,
  'control_name' => 'fcotring[rifrep]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php echo button_to('...','#')?>
&nbsp;&nbsp;
<strong>Nombre</strong>
<?php $value = object_input_tag($fcotring, 'getNomconr', array (
  'size' => 50,
  'control_name' => 'fcotring[nomconr]',
  'disabled' => true,
)); echo $value ? $value : '&nbsp;' ?>   
</div>

<div class="form-row">
  <?php echo label_for('fcotring[dirconr]', __($labels['fcotring{dirconr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcotring{dirconr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcotring{dirconr}')): ?>
    <?php echo form_error('fcotring{dirconr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcotring, 'getDirconr', array (
  'size' => 80,
  'control_name' => 'fcotring[dirconr]',
  'disabled' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row" align="center">
<table border="0">
  <tr>
    <th><fieldset id="sf_fieldset_none" class="">
<legend>Nacionalidad</legend>
<div class="form-row">
<?
if ($fcotring->getNacconr()=='V')	{
  ?><?php echo radiobutton_tag('fcotring[nacconr]', 'V', true, 'disabled=true')        ."Venezolano(a)".'&nbsp;&nbsp;';
		  echo radiobutton_tag('fcotring[nacconr]', 'E', false, 'disabled=true')."   Extranjero(a)";?>
		<?

}else{
	echo radiobutton_tag('fcotring[nacconr]', 'V', false, 'disabled=true')        ."Venezolano(a)".'&nbsp;&nbsp;';
	echo radiobutton_tag('fcotring[nacconr]', 'E', true, 'disabled=true')."   Extranjero(a)";

} ?> </div></fieldset></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><fieldset id="sf_fieldset_none" class="">
<legend>Tipo</legend>
<div class="form-row">
<?
if ($fcotring->getTipconr()=='N')	{
  ?><?php echo radiobutton_tag('fcotring[tipconr]', 'N', true, 'disabled=true')        ."Natural".'&nbsp;&nbsp;';
		  echo radiobutton_tag('fcotring[tipconr]', 'J', false, 'disabled=true')."   Jurídica";?>
		<?

}else{
	echo radiobutton_tag('fcotring[tipconr]', 'N', false, 'disabled=true')        ."Natural".'&nbsp;&nbsp;';
	echo radiobutton_tag('fcotring[tipconr]', 'J', true, 'disabled=true')."   Jurídica";

} ?></div></fieldset></th>
  </tr>
</table>   
</div>
</fieldset>

<?php tabInit("tp1", "0");?>

<br>

<?php tabMainJS("tp2","tabPane2", "tabPage1", 'Datos del Registros');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('fcotring[desing]', __($labels['fcotring{desing}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcotring{desing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcotring{desing}')): ?>
    <?php echo form_error('fcotring{desing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fcotring, 'getDesing', array (
  'size' => '80x5',
  'control_name' => 'fcotring[desing]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <strong>Monto del Impuesto a Pagar</strong>
  <?php $value = object_input_tag($fcotring, 'getMonimp', array (
  'size' => 7,
  'control_name' => 'fcotring[monimp]',
)); echo $value ? $value : '&nbsp;' ?>    
</div>
</fieldset>

<?php tabPageOpenClose("tp2", "tabPage2", 'Recepción');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('fcotring[funrec]', __($labels['fcotring{funrec}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcotring{funrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcotring{funrec}')): ?>
    <?php echo form_error('fcotring{funrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcotring, 'getFunrec', array (
  'size' => 50,
  'control_name' => 'fcotring[funrec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcotring[fecrec]', __($labels['fcotring{fecrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcotring{fecrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcotring{fecrec}')): ?>
    <?php echo form_error('fcotring{fecrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fcotring, 'getFecrec', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcotring[fecrec]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php tabPageOpenClose("tp2", "tabPage3", 'Distribución de la Deuda');?>
<fieldset id="sf_fieldset_none" class="">
<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>
<div class="form-row" align="right">
<strong>Monto de la Declaración</strong>
 &nbsp;&nbsp;&nbsp;
<?php echo input_tag('montodec', '', 'size=20 disabled=true') ?>
</div>
</fieldset>
<?php tabInit("tp2", "0");?>

<?php include_partial('edit_actions', array('fcotring' => $fcotring)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fcotring->getId()): ?>
<?php echo button_to(__('delete'), 'facotringreg/delete?id='.$fcotring->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
