
  <?php echo label_for('dftabtip[clvprm]', __($labels['dftabtip{clvprm}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{clvprm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{clvprm}')): ?>
    <?php echo form_error('dftabtip{clvprm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[clvprm]', options_for_select($campos,$dftabtip->getClvprm(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Código del Documento') ?></div>
    </div>
<BR></BR>
  <?php echo label_for('dftabtip[clvfrn]', __($labels['dftabtip{clvfrn}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{clvfrn}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{clvfrn}')): ?>
    <?php echo form_error('dftabtip{clvfrn}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[clvfrn]', options_for_select($campos,$dftabtip->getClvfrn(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Tipo de Documento (Enlace con Presupuesto)') ?></div>
    </div>
<BR></BR>
  <?php echo label_for('dftabtip[mondoc]', __($labels['dftabtip{mondoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{mondoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{mondoc}')): ?>
    <?php echo form_error('dftabtip{mondoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[mondoc]', options_for_select($campos, $dftabtip->getMondoc(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Monto del Documento') ?></div>
    </div>
<BR></BR>
  <?php echo label_for('dftabtip[fecdoc]', __($labels['dftabtip{fecdoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{fecdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{fecdoc}')): ?>
    <?php echo form_error('dftabtip{fecdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[fecdoc]', options_for_select($campos, $dftabtip->getFecdoc(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Fecha de Creación') ?></div>
    </div>
<BR></BR>
  <?php echo label_for('dftabtip[desdoc]', __($labels['dftabtip{desdoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{desdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{desdoc}')): ?>
    <?php echo form_error('dftabtip{desdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[desdoc]', options_for_select($campos, $dftabtip->getDesdoc(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Descripción') ?></div>
    </div>
<BR></BR>
  <?php echo label_for('dftabtip[stadoc]', __($labels['dftabtip{stadoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{stadoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{stadoc}')): ?>
    <?php echo form_error('dftabtip{stadoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[stadoc]', options_for_select($campos, $dftabtip->getStadoc(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Estado del Documento') ?></div>
    </div>
<BR></BR>
  <?php echo label_for('dftabtip[infdoc1]', __($labels['dftabtip{infdoc1}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{infdoc1}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{infdoc1}')): ?>
    <?php echo form_error('dftabtip{infdoc1}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[infdoc1]', options_for_select($campos, $dftabtip->getInfdoc1(),'include_custom=Seleccione...')) ?>
  <div class="sf_admin_edit_help"><?php echo __('Información Adicional') ?></div>
    </div>

<BR></BR>
  <?php echo label_for('dftabtip[infdoc2]', __($labels['dftabtip{infdoc2}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{infdoc2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{infdoc2}')): ?>
    <?php echo form_error('dftabtip{infdoc2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[infdoc2]', options_for_select($campos, $dftabtip->getInfdoc2(),'include_custom=Seleccione...')) ?>
    </div>

<BR></BR>
  <?php echo label_for('dftabtip[infdoc3]', __($labels['dftabtip{infdoc3}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{infdoc3}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{infdoc3}')): ?>
    <?php echo form_error('dftabtip{infdoc3}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[infdoc3]', options_for_select($campos, $dftabtip->getInfdoc3(),'include_custom=Seleccione...')) ?>
    </div>

<BR></BR>
  <?php echo label_for('dftabtip[infdoc4]', __($labels['dftabtip{infdoc4}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{infdoc4}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{infdoc4}')): ?>
    <?php echo form_error('dftabtip{infdoc4}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[infdoc4]', options_for_select($campos, $dftabtip->getInfdoc4(),'include_custom=Seleccione...')) ?>
    </div>



