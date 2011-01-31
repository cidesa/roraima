<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/01 21:47:52
?>
<?php echo form_tag('oycdefper/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($ocdefper, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Empleado')?></legend>
<div class="form-row">
  <?php echo label_for('ocdefper[cedper]', __($labels['ocdefper{cedper}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefper{cedper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefper{cedper}')): ?>
    <?php echo form_error('ocdefper{cedper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefper, 'getCedper', array (
  'size' => 10,
  'maxlength' => 15,
  'control_name' => 'ocdefper[cedper]',
  'readonly'  =>  $ocdefper->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocdefper[nomper]', __($labels['ocdefper{nomper}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefper{nomper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefper{nomper}')): ?>
    <?php echo form_error('ocdefper{nomper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefper, 'getNomper', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'ocdefper[nomper]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocdefper[telper]', __($labels['ocdefper{telper}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefper{telper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefper{telper}')): ?>
    <?php echo form_error('ocdefper{telper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefper, 'getTelper', array (
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'ocdefper[telper]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('ocdefper[codtipper]', __($labels['ocdefper{codtipper}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefper{codtipper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefper{codtipper}')): ?>
    <?php echo form_error('ocdefper{codtipper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefper, 'getCodtipper', array (
  'size' => 6,
  'control_name' => 'ocdefper[codtipper]',
  'maxlength' => 3,
  'onBlur'=> remote_function(array(
			  'url'      => 'oycdefper/ajax',
              'before'   => 'var variable=document.getElementById("ocdefper_codtipper").value;variable=variable.pad(3, "0",0);document.getElementById("ocdefper_codtipper").value=variable;',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=4&cajtexcom=ocdefper_codtipper&cajtexmos=ocdefper_destipper&codigo='+this.value",
			  )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipper_Oycdefper/clase/Octipper/frame/sf_admin_edit_form/obj1/ocdefper_codtipper/obj2/ocdefper_destipper/campo1/codtipper/campo2/destipper')?>

  <?php $value = object_input_tag($ocdefper, 'getDestipper', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'ocdefper[destipper]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <?php echo label_for('ocdefper[codtipcar]', __($labels['ocdefper{codtipcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefper{codtipcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefper{codtipcar}')): ?>
    <?php echo form_error('ocdefper{codtipcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefper, 'getCodtipcar', array (
  'size' => 6,
  'maxlength' => 4,
  'control_name' => 'ocdefper[codtipcar]',
  'onBlur'=> remote_function(array(
			  'url'      => 'oycdefper/ajax',
              'before'   => 'var variable=document.getElementById("ocdefper_codtipcar").value;variable=variable.pad(4, "0",0);document.getElementById("ocdefper_codtipcar").value=variable;',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=2&cajtexcom=ocdefper_codtipcar&cajtexmos=ocdefper_destipcar&codigo='+this.value",
			  )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/octipcar_oycdefper/clase/Octipcar/frame/sf_admin_edit_form/obj1/ocdefper_codtipcar/obj2/ocdefper_destipcar/campo1/codtipcar/campo2/destipcar')?>

  <?php $value = object_input_tag($ocdefper, 'getDestipcar', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'ocdefper[destipcar]',
)); echo $value ? $value : '&nbsp;' ?>

      </div>
<br>
  <?php echo label_for('ocdefper[codtippro]', __($labels['ocdefper{codtippro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefper{codtippro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefper{codtippro}')): ?>
    <?php echo form_error('ocdefper{codtippro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefper, 'getCodtippro', array (
  'size' => 6,
  'maxlength' => 4,
  'control_name' => 'ocdefper[codtippro]',
  'onBlur'=> remote_function(array(
			  'url'      => 'oycdefper/ajax',
              'before'   => 'var variable=document.getElementById("ocdefper_codtippro").value;variable=variable.pad(4, "0",0);document.getElementById("ocdefper_codtippro").value=variable;',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=3&cajtexcom=ocdefper_codtippro&cajtexmos=ocdefper_destippro&codigo='+this.value",
			  )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octippro_oycdefper/clase/Octippro/frame/sf_admin_edit_form/obj1/ocdefper_codtippro/obj2/ocdefper_destippro/campo1/codtippro/campo2/destippro')?>

  <?php $value = object_input_tag($ocdefper, 'getDestippro', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'ocdefper[destippro]',
)); echo $value ? $value : '&nbsp;' ?>

   </div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('ocdefper' => $ocdefper)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocdefper->getId()): ?>
<?php echo button_to(__('delete'), 'oycdefper/delete?id='.$ocdefper->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
