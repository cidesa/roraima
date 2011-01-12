  <?php echo label_for('dftabtip[infdoc1]', __($labels['dftabtip{infdoc1}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{infdoc1}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{infdoc1}')): ?>
    <?php echo form_error('dftabtip{infdoc1}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[infdoc1]', options_for_select($params['camposfk'], $dftabtip->getInfdoc1(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Información Adicional') ?></div>
    </div>

<BR>
  <?php echo label_for('dftabtip[infdoc2]', __($labels['dftabtip{infdoc2}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{infdoc2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{infdoc2}')): ?>
    <?php echo form_error('dftabtip{infdoc2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[infdoc2]', options_for_select($params['camposfk'], $dftabtip->getInfdoc2(),'include_custom=Seleccione...')) ?>
    </div>

<BR>
  <?php echo label_for('dftabtip[infdoc3]', __($labels['dftabtip{infdoc3}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{infdoc3}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{infdoc3}')): ?>
    <?php echo form_error('dftabtip{infdoc3}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[infdoc3]', options_for_select($params['camposfk'], $dftabtip->getInfdoc3(),'include_custom=Seleccione...')) ?>
    </div>

<BR>
  <?php echo label_for('dftabtip[infdoc4]', __($labels['dftabtip{infdoc4}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{infdoc4}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{infdoc4}')): ?>
    <?php echo form_error('dftabtip{infdoc4}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[infdoc4]', options_for_select($params['camposfk'], $dftabtip->getInfdoc4(),'include_custom=Seleccione...')) ?>
    </div>

<?php echo javascript_tag("

  $('dftabtip_nomcolfor').update('".str_replace('
',"",options_for_select($params['camposfk'], $dftabtip->getNomcolfor(),'include_custom=Seleccione...'))."');

") ?>