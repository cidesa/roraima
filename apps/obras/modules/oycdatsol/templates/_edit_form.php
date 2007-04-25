<?php
// auto-generated by sfPropelAdmin
// date: 2007/04/17 17:52:21
?>
<?php echo form_tag('oycdatsol/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocdatste, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('ocdatste[cedste]', __($labels['ocdatste{cedste}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{cedste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{cedste}')): ?>
    <?php echo form_error('ocdatste{cedste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getCedste', array (
  'size' => 20,
  'control_name' => 'ocdatste[cedste]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[nomste]', __($labels['ocdatste{nomste}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{nomste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{nomste}')): ?>
    <?php echo form_error('ocdatste{nomste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getNomste', array (
  'size' => 50,
  'control_name' => 'ocdatste[nomste]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[codste]', __($labels['ocdatste{codste}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{codste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{codste}')): ?>
    <?php echo form_error('ocdatste{codste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getCodste', array (
  'size' => 20,
  'control_name' => 'ocdatste[codste]',
)); echo $value ? $value : '&nbsp;' ?>
<?php echo button_to_popup('...','generales/catalogo?clase=Octipste&frame=sf_admin_edit_form&obj1=ocdatste_codste&obj2=desste')?>
<?php if (isset($desste)): ?>
	<?php echo input_tag('desste',$desste,'size=70,disabled=true'); ?>
<?php endif; ?> 
	</div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[dirste]', __($labels['ocdatste{dirste}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{dirste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{dirste}')): ?>
    <?php echo form_error('ocdatste{dirste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getDirste', array (
  'size' => 80,
  'control_name' => 'ocdatste[dirste]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[telste]', __($labels['ocdatste{telste}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{telste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{telste}')): ?>
    <?php echo form_error('ocdatste{telste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getTelste', array (
  'size' => 30,
  'control_name' => 'ocdatste[telste]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[faxste]', __($labels['ocdatste{faxste}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{faxste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{faxste}')): ?>
    <?php echo form_error('ocdatste{faxste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getFaxste', array (
  'size' => 20,
  'control_name' => 'ocdatste[faxste]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[emaste]', __($labels['ocdatste{emaste}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{emaste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{emaste}')): ?>
    <?php echo form_error('ocdatste{emaste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getEmaste', array (
  'size' => 80,
  'control_name' => 'ocdatste[emaste]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[cedrep]', __($labels['ocdatste{cedrep}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{cedrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{cedrep}')): ?>
    <?php echo form_error('ocdatste{cedrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getCedrep', array (
  'size' => 20,
  'control_name' => 'ocdatste[cedrep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[nomrep]', __($labels['ocdatste{nomrep}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{nomrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{nomrep}')): ?>
    <?php echo form_error('ocdatste{nomrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getNomrep', array (
  'size' => 50,
  'control_name' => 'ocdatste[nomrep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[dirrep]', __($labels['ocdatste{dirrep}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{dirrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{dirrep}')): ?>
    <?php echo form_error('ocdatste{dirrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getDirrep', array (
  'size' => 80,
  'control_name' => 'ocdatste[dirrep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[telrep]', __($labels['ocdatste{telrep}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{telrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{telrep}')): ?>
    <?php echo form_error('ocdatste{telrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getTelrep', array (
  'size' => 30,
  'control_name' => 'ocdatste[telrep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[faxrep]', __($labels['ocdatste{faxrep}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{faxrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{faxrep}')): ?>
    <?php echo form_error('ocdatste{faxrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getFaxrep', array (
  'size' => 20,
  'control_name' => 'ocdatste[faxrep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[emarep]', __($labels['ocdatste{emarep}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{emarep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{emarep}')): ?>
    <?php echo form_error('ocdatste{emarep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getEmarep', array (
  'size' => 80,
  'control_name' => 'ocdatste[emarep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[codpai]', __($labels['ocdatste{codpai}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{codpai}')): ?>
    <?php echo form_error('ocdatste{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getCodpai', array (
  'size' => 20,
  'control_name' => 'ocdatste[codpai]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[codedo]', __($labels['ocdatste{codedo}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{codedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{codedo}')): ?>
    <?php echo form_error('ocdatste{codedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getCodedo', array (
  'size' => 20,
  'control_name' => 'ocdatste[codedo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[codmun]', __($labels['ocdatste{codmun}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{codmun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{codmun}')): ?>
    <?php echo form_error('ocdatste{codmun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getCodmun', array (
  'size' => 20,
  'control_name' => 'ocdatste[codmun]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[codpar]', __($labels['ocdatste{codpar}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{codpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{codpar}')): ?>
    <?php echo form_error('ocdatste{codpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getCodpar', array (
  'size' => 20,
  'control_name' => 'ocdatste[codpar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocdatste[codsec]', __($labels['ocdatste{codsec}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('ocdatste{codsec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdatste{codsec}')): ?>
    <?php echo form_error('ocdatste{codsec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdatste, 'getCodsec', array (
  'size' => 20,
  'control_name' => 'ocdatste[codsec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('ocdatste' => $ocdatste)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocdatste->getId()): ?>
<?php echo button_to(__('delete'), 'oycdatsol/delete?id='.$ocdatste->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
