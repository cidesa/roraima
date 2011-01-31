<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/05 12:26:05
?>
<?php echo form_tag('oycregsol/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocregsol, 'getId') ?>
<?php use_helper('Javascript','tabs','PopUp','Grid','Linktoapp') ?>
<?php echo javascript_include_tag('tools','observe','dFilter','ajax') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Solicitud')?></legend>
<div class="form-row">
  <?php echo label_for('ocregsol[numsol]', __($labels['ocregsol{numsol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregsol{numsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregsol{numsol}')): ?>
    <?php echo form_error('ocregsol{numsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregsol, 'getNumsol', array (
  'size' => 8,
  'maxlength' => 8,
  'readonly'  =>  $ocregsol->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('ocregsol_numsol').value=valor",
  'control_name' => 'ocregsol[numsol]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregsol[cedste]', __($labels['ocregsol{cedste}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregsol{cedste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregsol{cedste}')): ?>
    <?php echo form_error('ocregsol{cedste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('ocregsol[cedste]', $ocregsol->getCedste(),
    'oycregsol/autocomplete?ajax=1', array('autocomplete' => 'off',
	'maxlength' => 15,'size' => 15,'onBlur'=> remote_function(array(
      'url'      => 'oycregsol/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=1&cajtexmos=ocregsol_nomste&cajtexcom=ocregsol_cedste&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Oycregsol_ocdatste/clase/Ocdatste/frame/sf_admin_edit_form/obj1/ocregsol_cedste/obj2/ocregsol_nomste/campo1/cedste/campo2/nomste')?>


  <?php $value = object_input_tag($ocregsol, 'getNomste', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'ocregsol[nomste]',
)); echo $value ? $value : '&nbsp;&nbsp;' ?>

    </div>
<br>
  <?php echo label_for('ocregsol[dessol]', __($labels['ocregsol{dessol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregsol{dessol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregsol{dessol}')): ?>
    <?php echo form_error('ocregsol{dessol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregsol, 'getDessol', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'ocregsol[dessol]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregsol[codsol]', __($labels['ocregsol{codsol}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregsol{codsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregsol{codsol}')): ?>
    <?php echo form_error('ocregsol{codsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('ocregsol[codsol]', $ocregsol->getCodsol(),
    'oycregsol/autocomplete?ajax=2', array('autocomplete' => 'off',
	'maxlength' => 4,'size' => 4,'onBlur'=> remote_function(array(
      'url'      => 'oycregsol/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=2&cajtexmos=ocregsol_dessol1&cajtexcom=ocregsol_codsol&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Oycregsol_octipsol/clase/Octipsol/frame/sf_admin_edit_form/obj1/ocregsol_codsol/obj2/ocregsol_dessol1/campo1/codsol/campo2/dessol')?>

  <?php $value = object_input_tag($ocregsol, 'getDessol1', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'ocregsol[dessol1]',
)); echo $value ? $value : '&nbsp;&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregsol[codorg]', __($labels['ocregsol{codorg}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregsol{codorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregsol{codorg}')): ?>
    <?php echo form_error('ocregsol{codorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('ocregsol[codorg]', $ocregsol->getCodorg(),
    'oycregsol/autocomplete?ajax=3', array('autocomplete' => 'off',
	'maxlength' => 4,'size' => 4,'onBlur'=> remote_function(array(
      'url'      => 'oycregsol/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=3&cajtexmos=ocregsol_desorg&cajtexcom=ocregsol_codorg&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Oycregsol_ocdeforg/clase/Ocdeforg/frame/sf_admin_edit_form/obj1/ocregsol_codorg/obj2/ocregsol_desorg/campo1/codorg/campo2/desorg')?>

<?php $value = object_input_tag($ocregsol, 'getDesorg', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'ocregsol[desorg]',
)); echo $value ? $value : '&nbsp;&nbsp;' ?>

    </div>
<br>
  <?php echo label_for('ocregsol[fecsol]', __($labels['ocregsol{fecsol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregsol{fecsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregsol{fecsol}')): ?>
    <?php echo form_error('ocregsol{fecsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregsol, 'getFecsol', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregsol[fecsol]',
  'date_format' => 'dd/MM/yyyy',
  'size' => 10,
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregsol[fecres]', __($labels['ocregsol{fecres}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregsol{fecres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregsol{fecres}')): ?>
    <?php echo form_error('ocregsol{fecres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregsol, 'getFecres', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregsol[fecres]',
  'date_format' => 'dd/MM/yyyy',
  'size' => 10,
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",

)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregsol[obssol]', __($labels['ocregsol{obssol}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregsol{obssol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregsol{obssol}')): ?>
    <?php echo form_error('ocregsol{obssol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregsol, 'getObssol', array (
  'size' => 80,
  'control_name' => 'ocregsol[obssol]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregsol[codemp]', __($labels['ocregsol{codemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregsol{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregsol{codemp}')): ?>
    <?php echo form_error('ocregsol{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('ocregsol[codemp]', $ocregsol->getCodemp(),
    'oycregsol/autocomplete?ajax=4', array('autocomplete' => 'off',
	'size' => 15,'onBlur'=> remote_function(array(
      'url'      => 'oycregsol/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=4&cajtexmos=ocregsol_nomemp&cajtexcom=ocregsol_codemp&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Oycregsol_nphojint/clase/Nphojint/frame/sf_admin_edit_form/obj1/ocregsol_codemp/obj2/ocregsol_nomemp/campo1/codemp/campo2/nomemp')?>


<?php $value = object_input_tag($ocregsol, 'getNomemp', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'ocregsol[nomemp]',
)); echo $value ? $value : '&nbsp;&nbsp;' ?>

    </div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('ocregsol' => $ocregsol)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocregsol->getId()): ?>
<?php echo button_to(__('delete'), 'oycregsol/delete?id='.$ocregsol->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
