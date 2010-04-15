<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/27 15:16:09
?>
<?php echo form_tag('fordefunimed/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefunimed, 'getId') ?>
<?php echo javascript_include_tag('tools') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Unidad de Medida')?></legend>
<div class="form-row">
  <?php echo label_for('fordefunimed[codunimed]', __($labels['fordefunimed{codunimed}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefunimed{codunimed}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefunimed{codunimed}')): ?>
    <?php echo form_error('fordefunimed{codunimed}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefunimed, 'getCodunimed', array (
  'size' => 3,
  'maxlength' => 3,
  'readonly'  =>  $fordefunimed->getId()!='' ? true : false ,
  'control_name' => 'fordefunimed[codunimed]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('fordefunimed_codunimed').value=valor;document.getElementById('fordefunimed_codunimed').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordefunimed[desunimed]', __($labels['fordefunimed{desunimed}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefunimed{desunimed}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefunimed{desunimed}')): ?>
    <?php echo form_error('fordefunimed{desunimed}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefunimed, 'getDesunimed', array (
  'size' => 30,
  'maxlength' => 30,
  'control_name' => 'fordefunimed[desunimed]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordefunimed[nomabrunimed]', __($labels['fordefunimed{nomabrunimed}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefunimed{nomabrunimed}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefunimed{nomabrunimed}')): ?>
    <?php echo form_error('fordefunimed{nomabrunimed}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefunimed, 'getNomabrunimed', array (
  'size' => 20,
  'maxlength' => 10,
  'control_name' => 'fordefunimed[nomabrunimed]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fordefunimed' => $fordefunimed)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($fordefunimed->getId()): ?>
<?php echo button_to(__('delete'), 'fordefunimed/delete?id='.$fordefunimed->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
