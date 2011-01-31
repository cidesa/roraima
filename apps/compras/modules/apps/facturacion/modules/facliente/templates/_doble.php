<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'DoubleList') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo label_for('facliente[recargo]', '', '') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{recargo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{recargo}')): ?>
    <?php echo form_error('facliente{recargo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>



  <?php $value = object_admin_double_list_criteria($c,$facliente, 'getRecargo', array (
  'control_name' => 'facliente[recargo]',
  'through_class' => 'Farecpro',
  'unassociated_label' => 'Recaudos',
  'associated_label' => 'Recaudos Seleccionados',
  'style' => 'width:450px'
)); echo $value ? $value : '&nbsp;' ?>
    </div>