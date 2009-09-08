<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/17 10:18:40
?>
<?php echo form_tag('nomdefespnivorg/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npestorg, 'getId') ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npestorg[codniv]', __($labels['npestorg{codniv}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npestorg{codniv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npestorg{codniv}')): ?>
    <?php echo form_error('npestorg{codniv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npestorg, 'getCodniv', array (
  'size' => 16,
  'control_name' => 'npestorg[codniv]',
  'maxlength' => $longitud,
  'readonly'  =>  $npestorg->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$formato')",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npestorg[desniv]', __($labels['npestorg{desniv}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npestorg{desniv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npestorg{desniv}')): ?>
    <?php echo form_error('npestorg{desniv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npestorg, 'getDesniv', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'npestorg[desniv]',
  //'readonly'  =>  $npestorg->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npestorg[telext]', __($labels['npestorg{telext}']),  'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npestorg{telext}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npestorg{telext}')): ?>
    <?php echo form_error('npestorg{telext}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npestorg, 'getTelext', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'npestorg[telext]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
	
<br>

 <?php echo label_for('npestorg[email]', __($labels['npestorg{email}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npestorg{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npestorg{email}')): ?>
    <?php echo form_error('npestorg{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npestorg, 'getEmail', array (
  'size' => 40,
  'control_name' => 'npestorg[email]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

	
</div>
</fieldset>

<?php include_partial('edit_actions', array('npestorg' => $npestorg)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npestorg->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespnivorg/delete?id='.$npestorg->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
