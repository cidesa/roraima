<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<div id="sf_admin_container">
<h1><?php echo __('Clasificador de Partidas Presupuestarias', array()) ?></h1>
<div id="sf_admin_content">
<?php if ($sf_flash->has('notice1')): ?>
<div class="save-ok">
<h2><?php echo __($sf_flash->get('notice1')) ?></h2>
</div>
<?php endif; ?>

<?php if ($sf_flash->has('notice2')): ?>
<div class="form-errors">
<h2><?php echo __($sf_flash->get('notice2')) ?></h2>
</div>
<?php endif; ?>

<?php echo form_tag('nommanclapre/index', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Información') ?></legend>
<div class="form-row" >
<table>
<tr>
<th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>

<th>
<?php echo label_for('titulo', __('Este módulo permite crear el clasificador presupuestario, el cual contendra las categorias ' .
    ' y partidas existentes en la contabilidad presupuestaria para ser manejadas desde la Nomina.') , 'class="required" Style="width:600px"')?>
</th>
</tr>
</table>
<br>
</div>
</fieldset>
</div>

<br>
<div class="form-row">
<div id="divAvisos">
<table width="100%">
<tr>
<th width="35%">
</th>
<th width="30%">
<?php echo button_to(__('Crear Clasificador'), 'nommanclapre/save', array (
  'class' => '',
)) ?>
</th>
<th width="35%">
</th>
</tr>
</table>
</div>
</div>
</fieldset>
</form>