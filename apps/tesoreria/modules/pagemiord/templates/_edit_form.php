<?php
// auto-generated by sfPropelAdmin
// date: 2007/03/16 12:00:17
?>
<?php echo form_tag('pagemiord/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($opordpag, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<fieldset>
<legend>Datos de la Orden</legend>

<div class="form-row">
  <?php echo label_for('opordpag[numord]', __($labels['opordpag{numord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numord}')): ?>
    <?php echo form_error('opordpag{numord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumord', array (
  'size' => 20,
  'control_name' => 'opordpag[numord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[fecemi]', __($labels['opordpag{fecemi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecemi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecemi}')): ?>
    <?php echo form_error('opordpag{fecemi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecemi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecemi]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[tipcau]', __($labels['opordpag{tipcau}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipcau}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipcau}')): ?>
    <?php echo form_error('opordpag{tipcau}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getTipcau', array (
  'size' => 20,
  'control_name' => 'opordpag[tipcau]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[desord]', __($labels['opordpag{desord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{desord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{desord}')): ?>
    <?php echo form_error('opordpag{desord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getDesord', array (
  'size' => 80,
  'control_name' => 'opordpag[desord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[cedrif]', __($labels['opordpag{cedrif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{cedrif}')): ?>
    <?php echo form_error('opordpag{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCedrif', array (
  'size' => 20,
  'control_name' => 'opordpag[cedrif]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[nomben]', __($labels['opordpag{nomben}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nomben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nomben}')): ?>
    <?php echo form_error('opordpag{nomben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNomben', array (
  'size' => 80,
  'control_name' => 'opordpag[nomben]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[ctapag]', __($labels['opordpag{ctapag}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{ctapag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{ctapag}')): ?>
    <?php echo form_error('opordpag{ctapag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCtapag', array (
  'size' => 32,
  'control_name' => 'opordpag[ctapag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[coduni]', __($labels['opordpag{coduni}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{coduni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{coduni}')): ?>
    <?php echo form_error('opordpag{coduni}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCoduni', array (
  'size' => 30,
  'control_name' => 'opordpag[coduni]', 'maxlength' => 3, 'size' => 5
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[obsord]', __($labels['opordpag{obsord}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{obsord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{obsord}')): ?>
    <?php echo form_error('opordpag{obsord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getObsord', array (
  'size' => 80,
  'control_name' => 'opordpag[obsord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<div class="grid01" id="grid01">
<fieldset>
<legend>Imputaciones Presupuestarias</legend>
<table border="0" class="sf_admin_list">
<? 
$titulo=array(0 => 'Codigo Presupuestario', 1 => 'Referencia', 2 => 'Monto Causado', 3 => 'Monto Descuento', 4 => 'Monto Retencion');

if ( count($imppre)>0){
$i=0;
foreach ($imppre as $k=>$fila) {
    $i++;
    if($i==1){?>
      <thead><tr>
    <? foreach ($fila as $key => $value){?>
        <th><?=$titulo[$key]?></th>
    <? }?>
      </tr> </thead>
    <? }?>
<tr>
<? foreach ($fila as $key => $value){?>
    <td><?=$value?></td>
<? }?>
</tr>
<? }
  }
?></table>
</fieldset>
</div>


<? if(count($ret)>0) { ?>
<div class="grid01" id="grid01">
<fieldset>
<legend>Retenciones</legend>
<table border="0" class="sf_admin_list">
<? 
$titulo2=array(0 => 'Nro. Orden', 1 => 'Tipo', 2 => 'Descripcion', 3 => 'Monto Descuento', 4 => 'Monto');

if (count($ret)>0){
$i=0;
foreach ($ret as $k=>$fila) {
    $i++;
    if($i==1){?>
      <thead><tr>
    <? foreach ($fila as $key => $value){?>
        <th><?=$titulo2[$key]?></th>
    <? }?>
      </tr> </thead>
    <? }?>
<tr>
<? foreach ($fila as $key => $value){?>
    <td><?=$value?></td>
<? }?>
</tr>
<? }
  }
?></table>
</fieldset>
</div>
<? }?>


















<!-- <div class="form-row">
  <?php echo label_for('opordpag[monord]', __($labels['opordpag{monord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{monord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{monord}')): ?>
    <?php echo form_error('opordpag{monord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getMonord', array (
  'size' => 7,
  'control_name' => 'opordpag[monord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



<div class="form-row">
  <?php echo label_for('opordpag[mondes]', __($labels['opordpag{mondes}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{mondes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{mondes}')): ?>
    <?php echo form_error('opordpag{mondes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getMondes', array (
  'size' => 7,
  'control_name' => 'opordpag[mondes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[monret]', __($labels['opordpag{monret}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{monret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{monret}')): ?>
    <?php echo form_error('opordpag{monret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getMonret', array (
  'size' => 7,
  'control_name' => 'opordpag[monret]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[numche]', __($labels['opordpag{numche}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numche}')): ?>
    <?php echo form_error('opordpag{numche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumche', array (
  'size' => 20,
  'control_name' => 'opordpag[numche]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[ctaban]', __($labels['opordpag{ctaban}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{ctaban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{ctaban}')): ?>
    <?php echo form_error('opordpag{ctaban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCtaban', array (
  'size' => 20,
  'control_name' => 'opordpag[ctaban]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



<div class="form-row">
  <?php echo label_for('opordpag[numcom]', __($labels['opordpag{numcom}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numcom}')): ?>
    <?php echo form_error('opordpag{numcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumcom', array (
  'size' => 20,
  'control_name' => 'opordpag[numcom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[status]', __($labels['opordpag{status}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{status}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{status}')): ?>
    <?php echo form_error('opordpag{status}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getStatus', array (
  'size' => 20,
  'control_name' => 'opordpag[status]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



<div class="form-row">
  <?php echo label_for('opordpag[fecenvcon]', __($labels['opordpag{fecenvcon}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecenvcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecenvcon}')): ?>
    <?php echo form_error('opordpag{fecenvcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecenvcon', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecenvcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[fecenvfin]', __($labels['opordpag{fecenvfin}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecenvfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecenvfin}')): ?>
    <?php echo form_error('opordpag{fecenvfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecenvfin', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecenvfin]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[ctapagfin]', __($labels['opordpag{ctapagfin}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{ctapagfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{ctapagfin}')): ?>
    <?php echo form_error('opordpag{ctapagfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCtapagfin', array (
  'size' => 32,
  'control_name' => 'opordpag[ctapagfin]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



<div class="form-row">
  <?php echo label_for('opordpag[fecven]', __($labels['opordpag{fecven}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecven}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecven}')): ?>
    <?php echo form_error('opordpag{fecven}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecven', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecven]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[fecanu]', __($labels['opordpag{fecanu}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecanu}')): ?>
    <?php echo form_error('opordpag{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[desanu]', __($labels['opordpag{desanu}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{desanu}')): ?>
    <?php echo form_error('opordpag{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'opordpag[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[monpag]', __($labels['opordpag{monpag}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{monpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{monpag}')): ?>
    <?php echo form_error('opordpag{monpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getMonpag', array (
  'size' => 7,
  'control_name' => 'opordpag[monpag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[aproba]', __($labels['opordpag{aproba}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{aproba}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{aproba}')): ?>
    <?php echo form_error('opordpag{aproba}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getAproba', array (
  'size' => 20,
  'control_name' => 'opordpag[aproba]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[nombensus]', __($labels['opordpag{nombensus}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nombensus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nombensus}')): ?>
    <?php echo form_error('opordpag{nombensus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNombensus', array (
  'size' => 80,
  'control_name' => 'opordpag[nombensus]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[fecrecfin]', __($labels['opordpag{fecrecfin}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecrecfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecrecfin}')): ?>
    <?php echo form_error('opordpag{fecrecfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecrecfin', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecrecfin]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[anopre]', __($labels['opordpag{anopre}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{anopre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{anopre}')): ?>
    <?php echo form_error('opordpag{anopre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getAnopre', array (
  'size' => 20,
  'control_name' => 'opordpag[anopre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[fecpag]', __($labels['opordpag{fecpag}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecpag}')): ?>
    <?php echo form_error('opordpag{fecpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecpag', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecpag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[numtiq]', __($labels['opordpag{numtiq}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numtiq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numtiq}')): ?>
    <?php echo form_error('opordpag{numtiq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumtiq', array (
  'size' => 20,
  'control_name' => 'opordpag[numtiq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[peraut]', __($labels['opordpag{peraut}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{peraut}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{peraut}')): ?>
    <?php echo form_error('opordpag{peraut}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getPeraut', array (
  'size' => 80,
  'control_name' => 'opordpag[peraut]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[cedaut]', __($labels['opordpag{cedaut}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{cedaut}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{cedaut}')): ?>
    <?php echo form_error('opordpag{cedaut}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCedaut', array (
  'size' => 80,
  'control_name' => 'opordpag[cedaut]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[nomper2]', __($labels['opordpag{nomper2}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nomper2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nomper2}')): ?>
    <?php echo form_error('opordpag{nomper2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNomper2', array (
  'size' => 50,
  'control_name' => 'opordpag[nomper2]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[nomper1]', __($labels['opordpag{nomper1}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nomper1}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nomper1}')): ?>
    <?php echo form_error('opordpag{nomper1}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNomper1', array (
  'size' => 50,
  'control_name' => 'opordpag[nomper1]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[horcon]', __($labels['opordpag{horcon}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{horcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{horcon}')): ?>
    <?php echo form_error('opordpag{horcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getHorcon', array (
  'size' => 20,
  'control_name' => 'opordpag[horcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[feccon]', __($labels['opordpag{feccon}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{feccon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{feccon}')): ?>
    <?php echo form_error('opordpag{feccon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFeccon', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[feccon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[nomcat]', __($labels['opordpag{nomcat}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nomcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nomcat}')): ?>
    <?php echo form_error('opordpag{nomcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNomcat', array (
  'size' => 80,
  'control_name' => 'opordpag[nomcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[numfac]', __($labels['opordpag{numfac}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numfac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numfac}')): ?>
    <?php echo form_error('opordpag{numfac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumfac', array (
  'size' => 20,
  'control_name' => 'opordpag[numfac]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[numconfac]', __($labels['opordpag{numconfac}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numconfac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numconfac}')): ?>
    <?php echo form_error('opordpag{numconfac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumconfac', array (
  'size' => 20,
  'control_name' => 'opordpag[numconfac]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[numcorfac]', __($labels['opordpag{numcorfac}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numcorfac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numcorfac}')): ?>
    <?php echo form_error('opordpag{numcorfac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumcorfac', array (
  'size' => 20,
  'control_name' => 'opordpag[numcorfac]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[fechafac]', __($labels['opordpag{fechafac}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fechafac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fechafac}')): ?>
    <?php echo form_error('opordpag{fechafac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFechafac', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fechafac]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[fecfac]', __($labels['opordpag{fecfac}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecfac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecfac}')): ?>
    <?php echo form_error('opordpag{fecfac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecfac', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecfac]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[tipfin]', __($labels['opordpag{tipfin}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipfin}')): ?>
    <?php echo form_error('opordpag{tipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getTipfin', array (
  'size' => 20,
  'control_name' => 'opordpag[tipfin]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[comret]', __($labels['opordpag{comret}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{comret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{comret}')): ?>
    <?php echo form_error('opordpag{comret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getComret', array (
  'size' => 20,
  'control_name' => 'opordpag[comret]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[feccomret]', __($labels['opordpag{feccomret}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{feccomret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{feccomret}')): ?>
    <?php echo form_error('opordpag{feccomret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFeccomret', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[feccomret]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[comretislr]', __($labels['opordpag{comretislr}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{comretislr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{comretislr}')): ?>
    <?php echo form_error('opordpag{comretislr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getComretislr', array (
  'size' => 20,
  'control_name' => 'opordpag[comretislr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[feccomretislr]', __($labels['opordpag{feccomretislr}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{feccomretislr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{feccomretislr}')): ?>
    <?php echo form_error('opordpag{feccomretislr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFeccomretislr', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[feccomretislr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[comretltf]', __($labels['opordpag{comretltf}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{comretltf}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{comretltf}')): ?>
    <?php echo form_error('opordpag{comretltf}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getComretltf', array (
  'size' => 20,
  'control_name' => 'opordpag[comretltf]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('opordpag[feccomretltf]', __($labels['opordpag{feccomretltf}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{feccomretltf}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{feccomretltf}')): ?>
    <?php echo form_error('opordpag{feccomretltf}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFeccomretltf', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[feccomretltf]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>-->
















</fieldset>

<?php include_partial('edit_actions', array('opordpag' => $opordpag)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($opordpag->getId()): ?>
<?php echo button_to(__('delete'), 'pagemiord/delete?id='.$opordpag->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
