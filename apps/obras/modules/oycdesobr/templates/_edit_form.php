<?php
// auto-generated by sfPropelAdmin
// date: 2007/05/04 16:19:31
?>
<?php echo form_tag('oycdesobr/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocregobr, 'getId') ?>

<?php use_helper('tabs') ?>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Definicion');?>

<div class="form-row">
  <?php echo label_for('ocregobr[codobr]', __($labels['ocregobr{codobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{codobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{codobr}')): ?>
    <?php echo form_error('ocregobr{codobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getCodobr', array (
  'size' => 32,
  'control_name' => 'ocregobr[codobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocregobr[codtipobr]', __($labels['ocregobr{codtipobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{codtipobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{codtipobr}')): ?>
    <?php echo form_error('ocregobr{codtipobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getCodtipobr', array (
  'size' => 4,
  'control_name' => 'ocregobr[codtipobr]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to('...','#') ?>
&nbsp;
  <?php $value = object_input_tag($ocregobr, 'getDestipobr', array (
  'disabled' => true,
  'size'=> 40,
  'control_name' => 'ocregobr[destipobr]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocregobr[desobr]', __($labels['ocregobr{desobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{desobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{desobr}')): ?>
    <?php echo form_error('ocregobr{desobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getDesobr', array (
  'size' => 80,
  'control_name' => 'ocregobr[desobr]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocregobr[fecini]', __($labels['ocregobr{fecini}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{fecini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{fecini}')): ?>
    <?php echo form_error('ocregobr{fecini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregobr, 'getFecini', array (
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregobr[fecini]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocregobr[fecfin]', __($labels['ocregobr{fecfin}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{fecfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{fecfin}')): ?>
    <?php echo form_error('ocregobr{fecfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregobr, 'getFecfin', array (
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregobr[fecfin]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


<?php tabPageOpenClose("tp1", "tabPage2", ' Datos Ubicacion ');?>
<div class="form-row"><?php echo label_for('ocregobr[codpai]', __($labels['ocregobr{codpai}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codpai}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codpai}')): ?><?php echo form_error('ocregobr{codpai}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php echo select_tag('ocregobr[codpai]', options_for_select($pais,'0001'),array('onChange'=> remote_function(array(
		'update'   => 'divEstados',
		'url'      => 'oycdatsol/combo?par=1',
		'with' => "'pais='+this.value"
  ))));?></div>
<br>
<?php echo label_for('ocregobr[codedo]', __($labels['ocregobr{codedo}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codedo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codedo}')): ?> <?php echo form_error('ocregobr{codedo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divEstados"><?php echo select_tag('ocregobr[codedo]', options_for_select($estados,'0001'),array('onChange'=> remote_function(array(
		'update'   => 'divMunicipios',
		'url'      => 'oycdatsol/combo?par=2',
		'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocregobr[codmun]', __($labels['ocregobr{codmun}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codmun}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codmun}')): ?> <?php echo form_error('ocregobr{codmun}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divMunicipios"><?php echo select_tag('ocregobr[codmun]', options_for_select($municipio,'0001'),array('onChange'=> remote_function(array(
		'update'   => 'divParroquia',
		'url'      => 'oycdatsol/combo?par=3',
		'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+document.getElementById('ocregobr_codedo').value+'&municipio='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocregobr[codpar]', __($labels['ocregobr{codpar}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codpar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codpar}')): ?> <?php echo form_error('ocregobr{codpar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divParroquia"><?php echo select_tag('ocregobr[codpar]', options_for_select($parroquia,'0001'),array('onChange'=> remote_function(array(
'update'   => 'divSector',
'url'      => 'oycdatsol/combo?par=4',
'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+document.getElementById('ocregobr_codedo').value+'&municipio='+document.getElementById('ocregobr_codmun').value+'&parroquia='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocregobr[codsec]', __($labels['ocregobr{codsec}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codsec}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codsec}')): ?> <?php echo form_error('ocregobr{codsec}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divSector"><?php echo select_tag('ocregobr[codsec]', options_for_select($sector,'0001'),array('onChange'=> remote_function(array(
'update'   => 'divCasa',
'url'      => 'oycdatsol/combo?par=5',
'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+document.getElementById('ocregobr_codedo').value+'&municipio='+document.getElementById('ocregobr_codmun').value+'&parroquia='+document.getElementById('ocregobr_codpar').value+'&sector='+this.value"
  ))));?></div>
</div>
</div>
 
<div class="form-row">
  <?php echo label_for('ocregobr[dirobr]', __($labels['ocregobr{dirobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{dirobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{dirobr}')): ?>
    <?php echo form_error('ocregobr{dirobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getDirobr', array (
  'size' => 80,
  'control_name' => 'ocregobr[dirobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<?php tabPageOpenClose("tp1", "tabPage3", 'Presupuesto');?> 

<div class="form-row">
<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>
</div>

<?php tabPageOpenClose("tp1", "tabPage4", 'Asignación');?> 
<div class="form-row">
  <?php echo label_for('ocregobr[codpre]', __($labels['ocregobr{codpre}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{codpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{codpre}')): ?>
    <?php echo form_error('ocregobr{codpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getCodpre', array (
  'size' => 32,
  'control_name' => 'ocregobr[codpre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ocregobr[nompre]', __($labels['ocregobr{nompre}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{nompre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{nompre}')): ?>
    <?php echo form_error('ocregobr{nompre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getNompre', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'ocregobr[nompre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<?php tabPageOpenClose("tp1", "tabPage5", 'Fotos');?> 
<?php tabPageOpenClose("tp1", "tabPage6", 'Inspectores');?> 
<div class="form-row">
<form name="form1" id="form1">
<?
echo grid_tag($obj2);
?>
</form>
</div>
<?php tabInit();?>


<?php include_partial('edit_actions', array('ocregobr' => $ocregobr)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocregobr->getId()): ?>
<?php echo button_to(__('delete'), 'oycdesobr/delete?id='.$ocregobr->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
