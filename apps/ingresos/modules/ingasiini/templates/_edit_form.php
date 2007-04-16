<?php
// auto-generated by sfPropelAdmin
// date: 2007/04/03 12:03:47
?>
<?php use_helper('FooBar'); ?>
<?php echo form_tag('ingasiini/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ciasiini, 'getId') ?>



<fieldset>
<legend>Datos del Codigo Presupuestario</legend>

<div class="form-row">
  <?php echo label_for('ciasiini[codpre]', __($labels['ciasiini{codpre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ciasiini{codpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ciasiini{codpre}')): ?>
    <?php echo form_error('ciasiini{codpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ciasiini, 'getCodpre', array (
  'size' => 34,
  'control_name' => 'ciasiini[codpre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <?php echo label_for('ciasiini[nompre]', __($labels['ciasiini{nompre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ciasiini{nompre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ciasiini{nompre}')): ?>
    <?php echo form_error('ciasiini{nompre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ciasiini, 'getNompre', array (
  'size' => 80,
  'control_name' => 'ciasiini[nompre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    
</div>

</fieldset>

<fieldset>
<legend>Datos de la Estimacion</legend>

<div class="form-row">
  <?php echo label_for('ciasiini[anopre]', __($labels['ciasiini{anopre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ciasiini{anopre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ciasiini{anopre}')): ?>
    <?php echo form_error('ciasiini{anopre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ciasiini, 'getAnopre', array (
  'size' => 5,
  'control_name' => 'ciasiini[anopre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <? echo label_for('lab','Monto a Estimar','class="required"');?>
    <? echo input_tag('monto','','class="required",size=20');?>
</div>
</fieldset>




<?
$filas=17;
$eliminar=true;
$titulos=array("Periodo","Monto");
$anchos=array("3%","94%");
$alignf=array("center","right");
$alignt=array("center","right");
$campos=array("Perpre","Mondis");
$montos=array("2");
$totales=array("total");
$html=array('type="text" size="2"','type="text" size="10"');
$js=array('','onKeypress="entermonto(event,this.id)"');



echo grid_tag($filas,$eliminar,$titulos,$anchos,$alignf,$alignt,$campos,$montos,$totales,$html,$js,$per);
?>



<?php include_partial('edit_actions', array('ciasiini' => $ciasiini)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ciasiini->getId()): ?>
<?php echo button_to(__('delete'), 'ingasiini/delete?id='.$ciasiini->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
  
