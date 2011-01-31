<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools','formulacion/forcreaasiini') ?>

<div id="sf_admin_container">
<h1><?php echo __('Pasar Montos Formulados a Asignacion Inicial', array()) ?></h1>
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

<?php echo form_tag('forcreaasiini/index', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<fieldset id="sf_fieldset_none" class="">
<div align="center"  class="form-row">
<br><br>
<?php echo input_hidden_tag('sw', '') ?>
<?php echo input_hidden_tag('entorno',$ent) ?>

  <?php echo submit_to_remote('Submit', 'Crear Asignacion Inicial', array(
         'url'      => 'forcreaasiini/ajax?ajax=1',
         'script'   => true,
         'update'   => 'actualizar',
         'complete' => 'AjaxJSON(request, json), CrearSaldos()',
         'submit' => 'sf_admin_edit_form',
    )) ?>

<br><br><br>
</div>

<div id="actualizar">
</div>
</fieldset>
</form>