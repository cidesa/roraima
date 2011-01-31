<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/07 18:44:51
?>
<?php echo form_tag('fcajero/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fccajero, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend>Datos Personales</legend>
<div class="form-row">
  <?php echo label_for('fccajero[codcaj]', __($labels['fccajero{codcaj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fccajero{codcaj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fccajero{codcaj}')): ?>
    <?php echo form_error('fccajero{codcaj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fccajero, 'getCodcaj', array (
  'size' => 20,
  'control_name' => 'fccajero[codcaj]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fccajero[cedcaj]', __($labels['fccajero{cedcaj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fccajero{cedcaj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fccajero{cedcaj}')): ?>
    <?php echo form_error('fccajero{cedcaj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fccajero, 'getCedcaj', array (
  'size' => 20,
  'control_name' => 'fccajero[cedcaj]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fccajero[nomcaj]', __($labels['fccajero{nomcaj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fccajero{nomcaj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fccajero{nomcaj}')): ?>
    <?php echo form_error('fccajero{nomcaj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fccajero, 'getNomcaj', array (
  'size' => 30,
  'control_name' => 'fccajero[nomcaj]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fccajero[dircaj]', __($labels['fccajero{dircaj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fccajero{dircaj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fccajero{dircaj}')): ?>
    <?php echo form_error('fccajero{dircaj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fccajero, 'getDircaj', array (
  'size' => 50,
  'control_name' => 'fccajero[dircaj]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fccajero[telcaj]', __($labels['fccajero{telcaj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fccajero{telcaj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fccajero{telcaj}')): ?>
    <?php echo form_error('fccajero{telcaj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fccajero, 'getTelcaj', array (
  'size' => 20,
  'control_name' => 'fccajero[telcaj]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fccajero' => $fccajero)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fccajero->getId()): ?>
<?php echo button_to(__('delete'), 'fcajero/delete?id='.$fccajero->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
