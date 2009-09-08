<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 18:31:04
?>
<?php echo form_tag('presnomantpre/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npantpre, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<?php use_helper('Javascript','wait','Grid','PopUp','SubmitClick','tabs') ?>


&nbsp;
&nbsp;
&nbsp;
&nbsp;
<fieldset id="sf_fieldset_none" class="">
<legend>Datos del Tabajador</legend>
<div class="form-row">
  <?php echo label_for('npantpre[codemp]', __($labels['npantpre{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npantpre{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npantpre{codemp}')): ?>
    <?php echo form_error('npantpre{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npantpre, 'getCodemp', array (
  'size' => 20,
  'control_name' => 'npantpre[codemp]',
  'onBlur'=> remote_function(array(
      'condition' =>  "$('id').value == '' && $('npantpre_codemp').value != ''",
      'update'   => 'mensaje',
      'url'      => 'presnomantpre/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script' => true,
      'with' => "'ajax=1&cajtexmos=npantpre_nomemp&cajtexmos1=npantpre_monto&cajtexcom=npantpre_codemp&codigo='+this.value",
    )),
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;
<?php if (!$npantpre->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Presnomreghisantpre_Npantpre/clase/Npasiempcont/frame/sf_admin_edit_form/obj1/npantpre_codemp/obj2/npantpre_nomemp/campo1/codemp/campo2/nomemp')?>
&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($npantpre, 'getNomemp', array (
  'disabled' => true,
  'style' => "border-style:none;",
    'size' => 60,
  'control_name' => 'npantpre[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br><br>
    <?php echo label_for('npantpre[monto]', __($labels['npantpre{monto}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npantpre{monto}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npantpre{monto}')): ?>
    <?php echo form_error('npantpre{monto}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npantpre, array('getMonto',true), array (
  'size' => 7,
  'readonly'=> true,
  'style' => "border-style:none;",
  'control_name' => 'npantpre[monto]',
  'onBlur' => "javascript:event.keyCode=13;return entermonantotro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br><br>
</div>
</fieldset>
<fieldset id="sf_fieldset_none" class="">
<legend>Datos del Anticipo</legend>
<div class="form-row">
<?php echo label_for('npantpre[fecsolant]', __($labels['npantpre{fecsolant}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npantpre{fecsolant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npantpre{fecsolant}')): ?>
    <?php echo form_error('npantpre{fecsolant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npantpre, 'getFecsolant', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npantpre[fecsolant]',
  'date_format' => 'dd/MM/yy',
  'onChange'=> remote_function(array(
     'update'   => 'mensaje',
     'condition' =>  "$('id').value == ''",
     'url'      => 'presnomantpre/ajax',
     'complete' => 'AjaxJSON(request, json)',
     'script' => true,
     'with' => "'ajax=2&cod='+$('npantpre_codemp').value+'&codigo='+this.value",
     )),
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>	
	
	
  <?php echo label_for('npantpre[fecant]', __($labels['npantpre{fecant}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npantpre{fecant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npantpre{fecant}')): ?>
    <?php echo form_error('npantpre{fecant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npantpre, 'getFecant', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npantpre[fecant]',
  'date_format' => 'dd/MM/yy',
  'onChange'=> remote_function(array(
     'update'   => 'mensaje',
     'condition' =>  "$('id').value == ''",
     'url'      => 'presnomantpre/ajax',
     'complete' => 'AjaxJSON(request, json)',
     'script' => true,
     'with' => "'ajax=2&cod='+$('npantpre_codemp').value+'&codigo='+this.value",
     )),
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>  

  <?php echo label_for('npantpre[monant]', __($labels['npantpre{monant}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npantpre{monant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npantpre{monant}')): ?>
    <?php echo form_error('npantpre{monant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npantpre, array('getMonant',true), array (
  'size' => 7,
  'control_name' => 'npantpre[monant]',
  'onChange' => "javascript:event.keyCode=13;return entermonantotro(event,this.id)",
    'onBlur'=> remote_function(array(
      'condition' =>  "$('npantpre_monant').value != '0,00'  && $('id').value == ''",
      'update'   => 'mensaje',
      'url'      => 'presnomantpre/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script' => true,
      'with' => "'ajax=3&codemp='+$('npantpre_codemp').value+'&cajtexcom=npantpre_monant&cod='+$('npantpre_monto').value+'&codigo='+this.value+'&codigo2='+$('npantpre_pormon').value"
    )),

)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Porcentaje:</strong>
&nbsp;&nbsp;
  <?php  echo input_tag('npantpre_pormon','0',array(
  	'size' => 2,
  	'onBlur'=> remote_function(array(
      'condition' =>  "$('npantpre_pormon').value != '0,00'  && $('id').value == ''",
      'update'   => 'mensaje',
      'url'      => 'presnomantpre/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script' => true,
      'with' => "'ajax=3&codemp='+$('npantpre_codemp').value+'&cajtexcom=npantpre_pormon&cod='+$('npantpre_monto').value+'&codigo='+$('npantpre_monant').value+'&codigo2='+this.value"
    ))
  )); ?>
<strong>%</strong>
    </div>
    <br><br>
  <?php echo label_for('npantpre[observacion]', __($labels['npantpre{observacion}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npantpre{observacion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npantpre{observacion}')): ?>
    <?php echo form_error('npantpre{observacion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($npantpre, 'getObservacion', array (
  'size' => '80x4',
  'control_name' => 'npantpre[observacion]',
)); echo $value ? $value : '&nbsp;' ?>
    <br><br>

</div>
</fieldset>
<div id="mensaje">
</div>




<?php include_partial('edit_actions', array('npantpre' => $npantpre)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npantpre->getId()): ?>
<?php echo button_to(__('delete'), 'presnomantpre/delete?id='.$npantpre->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
