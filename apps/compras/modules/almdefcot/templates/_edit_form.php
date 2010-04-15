<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/09/26 15:28:23
?>
<?php echo form_tag('almdefcot/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($carancot, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('carancot[candes]', __($labels['carancot{candes}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carancot{candes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carancot{candes}')): ?>
    <?php echo form_error('carancot{candes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carancot, 'getCandes', array (
  'size' => 19,
  'readonly'  =>  $carancot->getId()!='' ? true : false ,
  'control_name' => 'carancot[candes]',
  'onBlur' => "javascript:event.keyCode=13;return enternumero(event, this.id)",
  'maxlength' => 17,
)); echo $value ? $value : '&nbsp;' ?>

    </div>
<br>
  <?php echo label_for('carancot[canhas]', __($labels['carancot{canhas}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carancot{canhas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carancot{canhas}')): ?>
    <?php echo form_error('carancot{canhas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carancot, 'getCanhas', array (
  'size' => 19,
  'control_name' => 'carancot[canhas]',
  'maxlength' => 17,
  'onBlur' => "javascript:event.keyCode=13;return enternumero(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('carancot[cancot]', __($labels['carancot{cancot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carancot{cancot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carancot{cancot}')): ?>
    <?php echo form_error('carancot{cancot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carancot,'getCancotent', array (
  'size' => 19,
  'control_name' => 'carancot[cancot]',
  'onBlur' => "javascript:event.keyCode=13;return enternumero(event, this.id)",
  'maxlength' => 17,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('carancot' => $carancot)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($carancot->getId()): ?>
<?php echo button_to(__('delete'), 'almdefcot/delete?id='.$carancot->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
