<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/30 13:23:08
?>
<?php echo form_tag('oycressol/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocressol, 'getId') ?>
<?php use_helper('Grid','PopUp','tabs','Javascript','Linktoapp') ?>
<?php echo javascript_include_tag('ajax','dFilter','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Solicitud')?></legend>
<div class="form-row">
  <?php echo label_for('ocressol[numsol]', __($labels['ocressol{numsol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{numsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{numsol}')): ?>
    <?php echo form_error('ocressol{numsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('ocressol[numsol]', $ocressol->getNumsol(),
    'oycressol/autocomplete?ajax=1', array('autocomplete' => 'off',
	'maxlength' => 8,
    'size' => 10,
    'readonly'  =>  $ocressol->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
      'url'      => 'oycressol/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('ocressol_numsol').value != '' && $('id').value == ''",
      'with' => "'ajax=1&cajtexmos=ocressol_dessol&cajtexcom=ocressol_numsol&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocregsol_Oycressol/clase/Ocregsol/frame/sf_admin_edit_form/obj1/ocressol_numsol/obj2/ocressol_dessol/obj3/ocressol_cedulaste/obj4/ocressol_nombreste/obj5/ocressol_fechasol/obj6/ocressol_cedulate/obj7/ocressol_nomemp2/campo1/numsol/campo2/dessol/campo3/cedste/campo4/nomste/campo5/fecsol/campo6/codemp/campo7/nomemp','','','botoncat')?>

<?php $value = object_input_tag($ocressol, 'getDessol', array (
  'disabled' => true,
  'size' => 70,
  'control_name' => 'ocressol[dessol]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('ocressol[cedulaste]', __($labels['ocressol{cedulaste}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{cedulaste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{cedulaste}')): ?>
    <?php echo form_error('ocressol{cedulaste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocressol, 'getCedulaste', array (
  'disabled' => true,
  'size' => 15,
  'control_name' => 'ocressol[cedulaste]',
)); echo $value ? $value : '&nbsp;' ?>

  <?php $value = object_input_tag($ocressol, 'getNombreste', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'ocressol[nombreste]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Respuesta')?></legend>
<div class="form-row">
  <?php echo label_for('ocressol[numcor]', __($labels['ocressol{numcor}']), 'class="required" Style="width110px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{numcor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{numcor}')): ?>
    <?php echo form_error('ocressol{numcor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocressol, 'getNumcor', array (
  'size' => 15,
  'maxlength' => 20,
  'readonly'  =>  $ocressol->getId()!='' ? true : false ,
  //'onBlur'  => "javascript: valor=this.value; valor=valor.pad(12, '0',0);document.getElementById('ocressol_numcor').value=valor",
  'control_name' => 'ocressol[numcor]',
  'onBlur'=> remote_function(array(
      'url'      => 'oycressol/ajax',
      'before' => 'valor=this.value; valor=valor.pad(12, "0",0);document.getElementById("ocressol_numcor").value=valor',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('ocressol_numcor').value != '' && $('id').value == ''",
      'with' => "'ajax=4&cajtexcom=ocressol_numcor&numsol='+$('ocressol_numsol').value+'&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<table>
<tr>
<th>
  <?php echo label_for('ocressol[cedemi]', __($labels['ocressol{cedemi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{cedemi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{cedemi}')): ?>
    <?php echo form_error('ocressol{cedemi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('ocressol[cedemi]', $ocressol->getCedemi(),
    'oycressol/autocomplete?ajax=2', array('autocomplete' => 'off',
	'maxlength' => 16,'size' => 16,
    'readonly'  =>  $ocressol->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
      'url'      => 'oycressol/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('ocressol_cedemi').value != '' && $('id').value == ''",
      'with' => "'ajax=2&cajtexmos=ocressol_nomemp&cajtexcom=ocressol_cedemi&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/oycressol_nphojint/clase/Nphojint/frame/sf_admin_edit_form/obj1/ocressol_cedemi/obj2/ocressol_nomemp/campo1/codemp/campo2/nomemp','','','botoncat')?>

  <?php $value = object_input_tag($ocressol, 'getNomemp', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocressol[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocressol[cedfir]', __($labels['ocressol{cedfir}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{cedfir}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{cedfir}')): ?>
    <?php echo form_error('ocressol{cedfir}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('ocressol[cedfir]', $ocressol->getCedfir(),
    'oycressol/autocomplete?ajax=3', array('autocomplete' => 'off',
	'maxlength' => 16,'size' => 16,
	'readonly'  =>  $ocressol->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
      'url'      => 'oycressol/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('ocressol_cedfir').value != '' && $('id').value == ''",
      'with' => "'ajax=3&cajtexmos=ocressol_nomemp3&cajtexcom=ocressol_cedfir&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/oycressol_nphojint/clase/Nphojint/frame/sf_admin_edit_form/obj1/ocressol_cedfir/obj2/ocressol_nomemp3/campo1/codemp/campo2/nomemp','','','botoncat')?>

  <?php $value = object_input_tag($ocressol, 'getNomemp3', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocressol[nomemp3]',
)); echo $value ? $value : '&nbsp;&nbsp;' ?>
</div>
<br>
  <?php echo label_for('ocressol[cedulate]', __($labels['ocressol{cedulate}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{cedulate}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{cedulate}')): ?>
    <?php echo form_error('ocressol{cedulate}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocressol, 'getCedulate', array (
  'disabled' => true,
  'size' => 16,
  'control_name' => 'ocressol[cedulate]',
)); echo $value ? $value : '&nbsp;' ?>

  <?php $value = object_input_tag($ocressol, 'getNomemp2', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocressol[nomemp2]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>


</th>
<th>
  <?php echo label_for('ocressol[fecres]', __($labels['ocressol{fecres}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{fecres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{fecres}')): ?>
    <?php echo form_error('ocressol{fecres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocressol, 'getFecres', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocressol[fecres]',
  'readonly'  =>  $ocressol->getId()!='' ? true : false ,
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'size' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocressol[fecfir]', __($labels['ocressol{fecfir}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{fecfir}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{fecfir}')): ?>
    <?php echo form_error('ocressol{fecfir}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocressol, 'getFecfir', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocressol[fecfir]',
  'readonly'  =>  $ocressol->getId()!='' ? true : false ,
  'date_format' => 'dd/MM/yyyy',
  'size' => 10,
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocressol[fechasol]', __($labels['ocressol{fechasol}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{fechasol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{fechasol}')): ?>
    <?php echo form_error('ocressol{fechasol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocressol, 'getFechasol', array (
  'disabled' => true,
  'control_name' => 'ocressol[fechasol]',
  'date_format' => 'dd/MM/yyyy',
  'size' => 10,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
<br>
  <?php echo label_for('ocressol[ubiarc]', __($labels['ocressol{ubiarc}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocressol{ubiarc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocressol{ubiarc}')): ?>
    <?php echo form_error('ocressol{ubiarc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocressol, 'getUbiarc', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'ocressol[ubiarc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
</div>
</fieldset>

<?php include_partial('edit_actions', array('ocressol' => $ocressol)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocressol->getId()): ?>
<?php echo button_to(__('delete'), 'oycressol/delete?id='.$ocressol->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
  var id='<?php echo $ocressol->getId()?>';
  if (id!="")
  {
    $('trigger_ocressol_fecres').hide();
    $('trigger_ocressol_fecfir').hide();
    $$('.botoncat')[0].disabled=true;
    $$('.botoncat')[1].disabled=true;
    $$('.botoncat')[2].disabled=true;
  }
</script>
