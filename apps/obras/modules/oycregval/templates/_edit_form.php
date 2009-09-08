<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/10/14 22:43:28
?>
<?php echo form_tag('oycregval/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocperval, 'getId') ?>
<?php echo javascript_include_tag('ajax','tools','dFilter','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Contrato')?></legend>
<div class="form-row">
  <?php echo label_for('ocperval[codcon]', __($labels['ocperval{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{codcon}')): ?>
    <?php echo form_error('ocperval{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocperval, 'getCodcon', array (
  'size' => 15,
  'maxlength' => 8,
  'control_name' => 'ocperval[codcon]',
  'onBlur'=> remote_function(array(
    'url'      => 'oycregval/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocperval_codcon').value != '' && $('id').value == ''",
    'with' => "'ajax=1&cajtexmos=ocperval_descon&cajtexcom=ocperval_codcon&codigo='+this.value"
    ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocregcon_Oycregact/clase/Ocregcon/frame/sf_admin_edit_form/obj1/ocperval_codcon/obj2/ocperval_descon/campo1/codcon/campo2/descon','','','botoncat')?>

  <?php $value = object_input_tag($ocperval, 'getDescon', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocperval[descon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('ocperval[codobr]', __($labels['ocperval{codobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{codobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{codobr}')): ?>
    <?php echo form_error('ocperval{codobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocperval, 'getCodobr', array (
  'readonly' => true,
  'control_name' => 'ocperval[codobr]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($ocperval, 'getDesobr', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocperval[desobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('ocperval[codpro]', __($labels['ocperval{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{codpro}')): ?>
    <?php echo form_error('ocperval{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocperval, 'getCodpro', array (
  'readonly' => true,
  'control_name' => 'ocperval[codpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($ocperval, 'getNompro', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocperval[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocperval[moncon]', __($labels['ocperval{moncon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{moncon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{moncon}')): ?>
    <?php echo form_error('ocperval{moncon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocperval, array('getMoncon',true), array (
  'readonly' => true,
  'control_name' => 'ocperval[moncon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</div>
</fieldset>
<br>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos de la Valuación');?>
<fieldset>
<div class="form-row">
  <?php echo label_for('ocperval[codtipval]', __($labels['ocperval{codtipval}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{codtipval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{codtipval}')): ?>
    <?php echo form_error('ocperval{codtipval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('ocperval[codtipval]', $ocperval->getCodtipval(),
    'oycregval/autocomplete?ajax=2', array('autocomplete' => 'off',
	'maxlength' => 4,
    'size' => 15,
    'onBlur'=> remote_function(array(
    'url'      => 'oycregval/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocperval_codtipval').value != ''",
    'with' => "'ajax=2&cajtexmos=ocperval_destipval&cajtexcom=ocperval_codtipval&codcon='+$('ocperval_codcon').value+'&codigo='+this.value"
    ))),
     array('use_style' => 'true'))
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipval_Oycdefemp/clase/Octipval/frame/sf_admin_edit_form/obj1/ocperval_codtipval/obj2/ocperval_destipval/campo1/codtipval/campo2/destipval','','','botoncat')?>

  <?php $value = object_input_tag($ocperval, 'getDestipval', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocperval[destipval]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocperval[numval]', __($labels['ocperval{numval}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{numval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{numval}')): ?>
    <?php echo form_error('ocperval{numval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocperval, 'getNumval', array (
  'size' => 5,
  'readonly' => true,
  'maxlength' => 2,
  'control_name' => 'ocperval[numval]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('ocperval[fecreg]', __($labels['ocperval{fecreg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{fecreg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{fecreg}')): ?>
    <?php echo form_error('ocperval{fecreg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php $value = object_input_date_tag($ocperval, 'getFecreg', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocperval[fecreg]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>

<br>

  <?php echo label_for('ocperval[monval]', __($labels['ocperval{monval}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{monval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{monval}')): ?>
    <?php echo form_error('ocperval{monval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocperval, 'getMonval', array (
  'size' => 7,
  'control_name' => 'ocperval[monval]',
  'onBlur' => "javascript:event.keyCode=13; entermontootro(event, this.id);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('ocperval[obsval]', __($labels['ocperval{obsval}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{obsval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{obsval}')): ?>
    <?php echo form_error('ocperval{obsval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_textarea_tag($ocperval, 'getObsval', array (
  'size' => '60x5',
  'maxlength' => 100,
  'control_name' => 'ocperval[obsval]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Personal Autorizado');?>
<fieldset>
<div class="form-row">
  <?php echo label_for('ocperval[cedins]', __($labels['ocperval{cedins}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{cedins}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{cedins}')): ?>
    <?php echo form_error('ocperval{cedins}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocperval, 'getCedins', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'ocperval[cedins]',
   'onBlur'=> remote_function(array(
      'url'      => 'oycregval/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('ocperval_cedins').value != '' && $('id').value == ''",
      'with' => "'ajax=3&cajtexmos=ocperval_nomins&cajtexcom=ocperval_cedins&obra='+$('ocperval_codobr').value+'&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Ocinginsobr_Oycregact/clase/Ocinginsobr/frame/sf_admin_edit_form/obj1/ocperval_cedins/obj2/ocperval_nomins/campo1/cedins/campo2/nomins/param1/'+$('ocperval_codobr').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($ocperval, 'getNomins', array (
  'disabled' => true,
  'control_name' => 'ocperval[nomins]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocperval[cedtec]', __($labels['ocperval{cedtec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{cedtec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{cedtec}')): ?>
    <?php echo form_error('ocperval{cedtec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('ocperval[cedtec]', $ocperval->getCedtec(),
    'oycregval/autocomplete?ajax=3', array('autocomplete' => 'off',
	'maxlength' => 15,
    'size' => 20,
    'onBlur'=> remote_function(array(
    'url'      => 'oycregval/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocperval_cedtec').value != ''",
    'with' => "'ajax=4&cajtexmos=ocperval_nomtec&cajtexcom=ocperval_cedtec&codigo='+this.value"
    ))),
     array('use_style' => 'true'))
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Nomasicarconnom/clase/Nphojint/frame/sf_admin_edit_form/obj1/ocperval_cedtec/obj2/ocperval_nomtec/campo1/codemp/campo2/nomemp','','','botoncat')?>

  <?php $value = object_input_tag($ocperval, 'getNomtec', array (
  'disabled' => true,
  'control_name' => 'ocperval[nomtec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('ocperval[cedfis]', __($labels['ocperval{cedfis}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{cedfis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{cedfis}')): ?>
    <?php echo form_error('ocperval{cedfis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('ocperval[cedfis]', $ocperval->getCedfis(),
    'oycregval/autocomplete?ajax=4', array('autocomplete' => 'off',
	'maxlength' => 15,
    'size' => 20,
    'onBlur'=> remote_function(array(
    'url'      => 'oycregval/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocperval_cedfis').value != ''",
    'with' => "'ajax=4&cajtexmos=ocperval_nomdir&cajtexcom=ocperval_cedfis&codigo='+this.value"
    ))),
     array('use_style' => 'true'))
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Nomasicarconnom/clase/Nphojint/frame/sf_admin_edit_form/obj1/ocperval_cedfis/obj2/ocperval_nomdir/campo1/codemp/campo2/nomemp','','','botoncat')?>

  <?php $value = object_input_tag($ocperval, 'getNomdir', array (
  'disabled' => true,
  'control_name' => 'ocperval[nomdir]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('ocperval[cedres]', __($labels['ocperval{cedres}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{cedres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{cedres}')): ?>
    <?php echo form_error('ocperval{cedres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocperval, 'getCedres', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'ocperval[cedres]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($ocperval, 'getNomper', array (
  'disabled' => true,
  'control_name' => 'ocperval[nomper]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('ocperval[cedtop]', __($labels['ocperval{cedtop}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocperval{cedtop}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocperval{cedtop}')): ?>
    <?php echo form_error('ocperval{cedtop}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocperval, 'getCedtop', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'ocperval[cedtop]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($ocperval, 'getNomtop', array (
  'disabled' => true,
  'control_name' => 'ocperval[nomtop]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Historial de Valuaciones');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo grid_tag($obj);?>
</div>
</fieldset>

<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('ocperval' => $ocperval)) ?>

</form>

<ul class="sf_admin_actions">

  </ul>
