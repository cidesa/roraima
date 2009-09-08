<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/09 08:49:32
?>
<?php echo form_tag('docuni/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($acunidad, 'getId') ?>


<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('acunidad[numuni]', __($labels['acunidad{numuni}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('acunidad{numuni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('acunidad{numuni}')): ?>
    <?php echo form_error('acunidad{numuni}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($acunidad, 'getNumuni', array (
  'size' => 20,
  'control_name' => 'acunidad[numuni]',
  'onBlur' => 'javascript:MascaraCodigo(this,4);',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('acunidad[nomuni]', __($labels['acunidad{nomuni}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('acunidad{nomuni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('acunidad{nomuni}')): ?>
    <?php echo form_error('acunidad{nomuni}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($acunidad, 'getNomuni', array (
  'size' => 30,
  'control_name' => 'acunidad[nomuni]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('acunidad[desuni]', __($labels['acunidad{desuni}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('acunidad{desuni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('acunidad{desuni}')): ?>
    <?php echo form_error('acunidad{desuni}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($acunidad, 'getDesuni', array (
  'size' => 80,
  'control_name' => 'acunidad[desuni]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('acunidad' => $acunidad)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($acunidad->getId()): ?>
<?php echo button_to(__('delete'), 'docuni/delete?id='.$acunidad->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
