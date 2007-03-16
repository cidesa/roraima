<?php
// auto-generated by sfPropelAdmin
// date: 2007/03/15 09:47:37
?>
<?php echo form_tag('teschecus/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tscheemi, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend>Datos del Cheque</legend>
<div class="form-row">
  <?php echo label_for('tscheemi[numche]', __($labels['tscheemi{numche}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numche}')): ?>
    <?php echo form_error('tscheemi{numche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNumche', array (
  'size' => 20,
  'control_name' => 'tscheemi[numche]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<strong>Fecha Emision</strong> 
  <?php $value = object_input_date_tag($tscheemi, 'getFecemi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tscheemi[fecemi]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
&nbsp;
<div class="form-row">
  <?php echo label_for('tscheemi[monche]', __($labels['tscheemi{monche}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{monche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{monche}')): ?>
    <?php echo form_error('tscheemi{monche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getMonche', array (
  'size' => 7,
  'control_name' => 'tscheemi[monche]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
&nbsp;
<div class="form-row">
  <?php echo label_for('tscheemi[cedrif]', __($labels['tscheemi{cedrif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{cedrif}')): ?>
    <?php echo form_error('tscheemi{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getCedrif', array (
  'size' => 20,
  'control_name' => 'tscheemi[cedrif]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo input_tag('bene',$bene,'size=50,disabled=true') ?>
    </div>
</div>

<fieldset id="sf_fieldset_none" class="">
<legend>Datos del Banco</legend>
&nbsp;
<div class="form-row">
  <?php echo label_for('tscheemi[numcue]', __($labels['tscheemi{numcue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numcue}')): ?>
    <?php echo form_error('tscheemi{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNumcue', array (
  'size' => 20,
  'control_name' => 'tscheemi[numcue]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo input_tag('banco',$banco,'size=50,disabled=true') ?>
    </div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
 <strong>Orden de Pago</strong> 
 <?php echo input_tag('orden',$numord,'size=50, disabled=true') ?>
</div>
&nbsp;
<div class="form-row">
<strong>Numero de Comprobante</strong>
&nbsp; 
<?php echo input_tag('numero',$numcomp,'size=50, disabled=true') ?>
</div>
&nbsp;
<div class="form-row">
  <?php echo label_for('tscheemi[status]', __($labels['tscheemi{status}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{status}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{status}')): ?>
    <?php echo form_error('tscheemi{status}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  &nbsp;
<?php if($tscheemi->getStatus()=='C') $val = true; else $val=false;?>  
<?php echo "Anulado" .radiobutton_tag('radio', 'A', $val)?>
&nbsp;
<?php echo "Entregado" .radiobutton_tag('radio', 'E', $val) ?>
&nbsp;
<?php echo "Caja" .radiobutton_tag('radio', 'C', !$val) ?>
    </div>
</div>
</fieldset>
&nbsp;
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('tscheemi[fecent]', __($labels['tscheemi{fecent}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fecent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fecent}')): ?>
    <?php echo form_error('tscheemi{fecent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tscheemi, 'getFecent', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tscheemi[fecent]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
&nbsp;
<div class="form-row">
  <?php echo label_for('tscheemi[obsent]', __($labels['tscheemi{obsent}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{obsent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{obsent}')): ?>
    <?php echo form_error('tscheemi{obsent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getObsent', array (
  'size' => 80,
  'control_name' => 'tscheemi[obsent]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
&nbsp;
<div class="form-row">
  <?php echo label_for('tscheemi[nomrec]', __($labels['tscheemi{nomrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{nomrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{nomrec}')): ?>
    <?php echo form_error('tscheemi{nomrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNomrec', array (
  'size' => 50,
  'control_name' => 'tscheemi[nomrec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
&nbsp;
<div class="form-row">
<strong>Entregado Por</strong> 
 <?php echo input_tag('entregado','Administrador del Sistema','size=50') ?>
 </div>
</fieldset>

<?php include_partial('edit_actions', array('tscheemi' => $tscheemi)) ?>
</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($tscheemi->getId()): ?>
<?php echo button_to(__('delete'), 'teschecus/delete?id='.$tscheemi->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
