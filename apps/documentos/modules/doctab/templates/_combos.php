
  <?php echo label_for('dftabtip[clvprm]', __($labels['dftabtip{clvprm}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{clvprm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{clvprm}')): ?>
    <?php echo form_error('dftabtip{clvprm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[clvprm]', options_for_select($params['campos'],$dftabtip->getClvprm(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Código del Documento') ?></div>
    </div>
<br>
  <?php echo label_for('dftabtip[clvfrn]', __($labels['dftabtip{clvfrn}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{clvfrn}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{clvfrn}')): ?>
    <?php echo form_error('dftabtip{clvfrn}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[clvfrn]', options_for_select($params['campos'],$dftabtip->getClvfrn(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Tipo de Documento (Enlace con Presupuesto)') ?></div>
    </div>
<BR>
  <?php echo label_for('dftabtip[mondoc]', __($labels['dftabtip{mondoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{mondoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{mondoc}')): ?>
    <?php echo form_error('dftabtip{mondoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[mondoc]', options_for_select($params['campos'], $dftabtip->getMondoc(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Monto del Documento') ?></div>
    </div>
<BR>
  <?php echo label_for('dftabtip[fecdoc]', __($labels['dftabtip{fecdoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{fecdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{fecdoc}')): ?>
    <?php echo form_error('dftabtip{fecdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[fecdoc]', options_for_select($params['campos'], $dftabtip->getFecdoc(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Fecha de Creación') ?></div>
    </div>
<BR>
  <?php echo label_for('dftabtip[desdoc]', __($labels['dftabtip{desdoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{desdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{desdoc}')): ?>
    <?php echo form_error('dftabtip{desdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[desdoc]', options_for_select($params['campos'], $dftabtip->getDesdoc(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Descripción') ?></div>
    </div>
<BR>
  <?php echo label_for('dftabtip[stadoc]', __($labels['dftabtip{stadoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{stadoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{stadoc}')): ?>
    <?php echo form_error('dftabtip{stadoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[stadoc]', options_for_select($params['campos'], $dftabtip->getStadoc(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Estado del Documento') ?></div>
    </div>

<BR>
  <?php echo label_for('dftabtip[refdoc]', __($labels['dftabtip{refdoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{refdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{refdoc}')): ?>
    <?php echo form_error('dftabtip{refdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[refdoc]', options_for_select($params['campos'], $dftabtip->getRefdoc(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Referencia del Documento') ?></div>
    </div>

<?php echo javascript_tag("

  $('dftabtip_nomcolloc').update('".str_replace('
',"",options_for_select($params['campos'], $dftabtip->getNomcolloc(),'include_custom=Seleccione...'))."');

") ?>