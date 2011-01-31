<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'DoubleList') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo label_for('caprovee[recargo]', '', '') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{recargo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{recargo}')): ?>
    <?php echo form_error('caprovee{recargo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>



  <?php $value = object_admin_double_list_criteria($c,$caprovee, 'getRecargo', array (
  'control_name' => 'caprovee[recargo]',
  'through_class' => 'Carecpro',
  'unassociated_label' => 'Recaudos',
  'associated_label' => 'Recaudos Seleccionados',
  'style' => 'width:450px'
)); echo $value ? $value : '&nbsp;' ?>
    </div>







