<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<div id="sf_admin_container">
<h1><?php echo __('Creacion de Proyectos, Acciones Especificas y Unidades Ejecutoras por Migracion', array()) ?></h1>
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
<div align="center">
<br><br>
  <?php echo submit_to_remote('Submit2', 'Crear Proyectos', array(
         'url'      => 'formancreproacc/migrar?var=1',
         'script'   => true,
         'update'   => 'actualizar',
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
    )) ?>

<br><br>
  <?php echo submit_to_remote('Submit2', 'Crear Acciones Especificas', array(
         'url'      => 'formancreproacc/migrar?var=2',
         'script'   => true,
         'update'   => 'actualizar',
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
    )) ?><br><br>
  <?php echo submit_to_remote('Submit2', 'Crear Unidades Ejecutoras', array(
		 'url'      => 'formancreproacc/migrar?var=3',
         'script'   => true,
         'update'   => 'actualizar',
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
    )) ?><br><br>
  <?php echo submit_to_remote('Submit2', 'Crear Proyectos, Acciones Especificas y Unidades Ejecutoras', array(
		 'url'      => 'formancreproacc/migrar?var=4',
         'script'   => true,
         'update'   => 'actualizar',
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
    )) ?><br><br>
  <?php echo submit_to_remote('Submit2', 'Crear Partidas de Egreso', array(
		 'url'      => 'formancreproacc/migrar?var=5',
         'script'   => true,
         'update'   => 'actualizar',
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
    )) ?>
</div>
<div id="actualizar">
</div>
</fieldset>
</form>