<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/03 16:46:39
?>
<?php echo form_tag('biedisactsem/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bndissem, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('bndissem[codact]', __($labels['bndissem{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndissem{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndissem{codact}')): ?>
    <?php echo form_error('bndissem{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndissem, 'getCodact', array (
  'size' => 30,
  'control_name' => 'bndissem[codact]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to('...','#')?>
&nbsp;&nbsp;&nbsp;
<strong>C&oacute;digo Activo</strong>
<?php $value = object_input_tag($bndissem, 'getCodsem', array (
  'size' => 20,
  'control_name' => 'bndissem[codsem]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
 <?php $value = object_input_tag($bndissem, 'getDessem', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'bndissem[dessem]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<fieldset id="sf_fieldset_none" class="">
<legend>Transacci&oacute;n</legend>
<div class="form-row">
  <?php echo label_for('bndissem[nrodissem]', __($labels['bndissem{nrodissem}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndissem{nrodissem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndissem{nrodissem}')): ?>
    <?php echo form_error('bndissem{nrodissem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndissem, 'getNrodissem', array (
  'size' => 20,
  'control_name' => 'bndissem[nrodissem]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Tipo</strong>&nbsp;
<?php echo select_tag('bndissem[tipdissem]', options_for_select($tipos,$bndissem->getTipdissem())); ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bndissem[motdissem]', __($labels['bndissem{motdissem}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndissem{motdissem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndissem{motdissem}')): ?>
    <?php echo form_error('bndissem{motdissem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndissem, array('getMotdissem',true), array (
  'size' => 50,
    'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
  'control_name' => 'bndissem[motdissem]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <strong>Fecha</strong>&nbsp;
  <?php $value = object_input_date_tag($bndissem, 'getFecdissem', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bndissem[fecdissem]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
<strong>Fecha Devoluci&oacute;n</strong>&nbsp;
<?php $value = object_input_date_tag($bndissem, 'getFecdevdis', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bndissem[fecdevdis]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
<strong>Monto</strong>&nbsp;
 <?php $value = object_input_tag($bndissem, 'getMondissem', array (
  'size' => 7,
  'control_name' => 'bndissem[mondissem]',
)); echo $value ? $value : '&nbsp;' ?>    
</div>

<div class="form-row">
  <?php echo label_for('bndissem[detdissem]', __($labels['bndissem{detdissem}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndissem{detdissem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndissem{detdissem}')): ?>
    <?php echo form_error('bndissem{detdissem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bndissem, 'getDetdissem', array (
  'size' => '100x3',
  'control_name' => 'bndissem[detdissem]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Ubicaci&oacute;n</legend>
<div class="form-row">
  <?php echo label_for('bndissem[codubiori]', __($labels['bndissem{codubiori}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndissem{codubiori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndissem{codubiori}')): ?>
    <?php echo form_error('bndissem{codubiori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndissem, 'getCodubiori', array (
  'size' => 30,
  'control_name' => 'bndissem[codubiori]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to('...','#')?>
&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($bndissem, 'getDesubiori', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bndissem[desubiori]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bndissem[codubides]', __($labels['bndissem{codubides}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndissem{codubides}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndissem{codubides}')): ?>
    <?php echo form_error('bndissem{codubides}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndissem, 'getCodubides', array (
  'size' => 30,
  'control_name' => 'bndissem[codubides]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to('...','#')?>
&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($bndissem, 'getDesubides', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bndissem[desubides]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<div class="form-row">
  <?php echo label_for('bndissem[obsdissem]', __($labels['bndissem{obsdissem}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndissem{obsdissem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndissem{obsdissem}')): ?>
    <?php echo form_error('bndissem{obsdissem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bndissem, 'getObsdissem', array (
  'size' => '100x3',
  'control_name' => 'bndissem[obsdissem]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('bndissem' => $bndissem)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bndissem->getId()): ?>
<?php echo button_to(__('delete'), 'biedisactsem/delete?id='.$bndissem->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
