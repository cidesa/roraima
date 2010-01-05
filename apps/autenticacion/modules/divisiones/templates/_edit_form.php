<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2008/04/25 15:46:40
?>
<?php echo form_tag('divisiones/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($division, 'getId') ?>
<?php echo javascript_include_tag('dFilter','Linktoapp','ajax','tools','observe') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la División')?></legend>
<div class="form-row">
  <?php echo label_for('division[coddiv]', __($labels['division{coddiv}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('division{coddiv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('division{coddiv}')): ?>
    <?php echo form_error('division{coddiv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($division, 'getCoddiv', array (
  'size' => 20,
  'control_name' => 'division[coddiv]',
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('division_coddiv').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('division[desdiv]', __($labels['division{desdiv}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('division{desdiv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('division{desdiv}')): ?>
    <?php echo form_error('division{desdiv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($division, 'getDesdiv', array (
  'size' => 80,
  'control_name' => 'division[desdiv]',
  'maxlength' => 250,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('division' => $division)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($division->getId()): ?>
<?php echo button_to(__('delete'), 'divisiones/delete?id='.$division->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
