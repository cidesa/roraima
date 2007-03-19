<?php
// auto-generated by sfPropelAdmin
// date: 2007/03/19 09:54:04
?>
<?php echo form_tag('almtiprecpro/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($catiprec, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('catiprec[codtiprec]', __($labels['catiprec{codtiprec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catiprec{codtiprec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catiprec{codtiprec}')): ?>
    <?php echo form_error('catiprec{codtiprec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catiprec, 'getCodtiprec', array (
  'size' => 20,
  'control_name' => 'catiprec[codtiprec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('catiprec[destiprec]', __($labels['catiprec{destiprec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catiprec{destiprec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catiprec{destiprec}')): ?>
    <?php echo form_error('catiprec{destiprec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catiprec, 'getDestiprec', array (
  'size' => 80,
  'control_name' => 'catiprec[destiprec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('catiprec' => $catiprec)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($catiprec->getId()): ?>
<?php echo button_to(__('delete'), 'almtiprecpro/delete?id='.$catiprec->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
