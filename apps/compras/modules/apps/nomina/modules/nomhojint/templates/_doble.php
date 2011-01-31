<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'DoubleList') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo label_for('nphojint[incapacidades]', '', '') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{incapacidades}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{incapacidades}')): ?>
    <?php echo form_error('nphojint{incapacidades}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>



  <?php $value = object_admin_double_list_criteria($c,$nphojint, 'getRecargo', array (
  'control_name' => 'nphojint[incapacidades]',
  'through_class' => 'Nphojintinc',
  'unassociated_label' => 'Incapacidades',
  'associated_label' => 'Incapacidades Seleccionadas',
  'style' => 'width:450px'
)); echo $value ? $value : '&nbsp;' ?>
    </div>







