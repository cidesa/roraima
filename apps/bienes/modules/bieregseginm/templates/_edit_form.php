<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/03 16:40:22
?>
<?php echo form_tag('bieregseginm/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bnseginm, 'getId') ?>
<?php use_helper('Javascript') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('Grid'); ?>
<?php use_helper('PopUp') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
<table>
<tr>
<th>

<?php echo label_for('bnseginm[codact]', __($labels['bnseginm{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnseginm{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnseginm{codact}')): ?>
    <?php echo form_error('bnseginm{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($bnseginm, 'getCodact', array (
  'size' => 15,
  'control_name' => 'bnseginm[codact]',
  'onKeypress' => "javascript:cadena=rayitas(this.value);document.getElementById('bnseginm_codact').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracatalogo')",

)); echo $value ? $value : '&nbsp;' ?>

  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnreginm_Bieregseginm/clase/Bnreginm/frame/sf_admin_edit_form/obj1/bnseginm_codact/obj2/bnseginm_codmue/obj3/bnseginm_desinm/campo1/codact/campo2/codinm/campo3/desinm/param1/'); ?>
</th>
</div>
<th></th>
<th>
<?php echo label_for('bnseginm[codmue]', __($labels['bnseginm{codmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnseginm{codmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnseginm{codmue}')): ?>
    <?php echo form_error('bnseginm{codmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnseginm, 'getCodmue', array (
  'size' => 20,
  'control_name' => 'bnseginm[codmue]',
  //'onBlur'=> "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('bnseginm_codmue').value=valor;document.getElementById('bnseginm_codmue').disabled=false; ".remote_function(array(
  'onBlur'=> "javascript: document.getElementById('bnseginm_codmue').disabled=false; ".remote_function(array(
  			'url'      => 'bieregseginm/ajax',
  			'complete' => 'AjaxJSON(request, json)',
  			'with' => "'ajax=4&cajtexmos=bnseginm_codact&cajtexcom=bnseginm_desinm&codigo='+this.value",
       		)),
  )); echo $value ? $value : '&nbsp;' ?>
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnreginm_Bieregseginm1/clase/Bnreginm/frame/sf_admin_edit_form/obj1/bnseginm_codmue/obj2/bnseginm_codact/obj3/bnseginm_desinm/campo1/codinm/campo2/codact/campo3/desinm/param1/'); ?>
    </div>
</th>
</tr>
</table>

<?php echo label_for('bnseginm[desinm]', __('Descripción'), 'class="required" ') ?>
 <?php $value = object_input_tag($bnseginm, 'getDesinm', array (
  'size' => 65,
  'disabled' => true,
  'control_name' => 'bnseginm[desinm]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Póliza de Seguro')?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('bnseginm[nroseginm]', __($labels['bnseginm{nroseginm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnseginm{nroseginm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnseginm{nroseginm}')): ?>
    <?php echo form_error('bnseginm{nroseginm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


 <?php echo input_auto_complete_tag('bnseginm[nroseginm]', $bnseginm->getNroseginm(),
    'bieregseginm/autocomplete?ajax=3', array('size' => 6, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'bieregseginm/ajax',
      'complete' => 'AjaxJSON(request, json)',
          'script'   => true,
       'with' => "'ajax=2&cajtexcom=bnseginm_nroseginm&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>
    </div>
</th>
<th></th>
<th>
<?php echo label_for('bnseginm[fecseginm]', __($labels['bnseginm{fecseginm}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnseginm{fecseginm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnseginm{fecseginm}')): ?>
    <?php echo form_error('bnseginm{fecseginm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnseginm, 'getFecseginm', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnseginm[fecseginm]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
<br>
<?php echo label_for('bnseginm[nomseginm]', __($labels['bnseginm{nomseginm}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnseginm{nomseginm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnseginm{nomseginm}')): ?>
    <?php echo form_error('bnseginm{nomseginm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnseginm, 'getNomseginm', array (
  'size' => 80,
  'control_name' => 'bnseginm[nomseginm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
<table>
<tr>
<th>
<?php echo label_for('bnseginm[fecsegven]', __($labels['bnseginm{fecsegven}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnseginm{fecsegven}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnseginm{fecsegven}')): ?>
    <?php echo form_error('bnseginm{fecsegven}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnseginm, 'getFecsegven', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnseginm[fecsegven]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date ('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
</tr>
</table>
<br>
<?php echo label_for('bnseginm[proseginm]', __($labels['bnseginm{proseginm}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnseginm{proseginm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnseginm{proseginm}')): ?>
    <?php echo form_error('bnseginm{proseginm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnseginm, 'getProseginm', array (
  'size' => 80,
  'control_name' => 'bnseginm[proseginm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
<?php echo label_for('bnseginm[obsseginm]', __($labels['bnseginm{obsseginm}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnseginm{obsseginm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnseginm{obsseginm}')): ?>
    <?php echo form_error('bnseginm{obsseginm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bnseginm, 'getObsseginm', array (
  'size' => '80x3',
  'control_name' => 'bnseginm[obsseginm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<?php echo input_hidden_tag('fecha_actual', date("d/m/Y")) ?>

</fieldset>
<fieldset>
<div class="form-row">
<?php echo grid_tag($obj);?>
</div>
</fieldset>
<?php include_partial('edit_actions', array('bnseginm' => $bnseginm)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnseginm->getId()): ?>
<?php echo button_to(__('delete'), 'bieregseginm/delete?id='.$bnseginm->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
