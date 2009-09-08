<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/03 15:27:55
?>
<?php echo form_tag('biedisactinm/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('Grid') ?>
<?php use_helper('Date') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('Linktoapp','observe') ?>
<?php echo javascript_include_tag('tools') ?>
<?php use_helper('tabs') ?>

<?php echo object_input_hidden_tag($bndisinm, 'getId') ?>
<?php echo object_input_hidden_tag($bndisinm, 'getIdrefer') ?>


<fieldset id="sf_fieldset_none" class="">
<legend>Datos</legend>
<div class="form-row">
 <table>
<tr>
  <th>
  <?php echo label_for('bndisinm[codact]', __($labels['bndisinm{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{codact}')): ?>
    <?php echo form_error('bndisinm{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($bndisinm, 'getCodact', array (
  'size' => 15,
  'control_name' => 'bndisinm[codact]',
   'maxlength' => strlen($mascaracatalogo),
   'onKeypress' => "javascript:return dFilter (event.keyCode, this,'$mascaracatalogo')",
    'onBlur'=> remote_function(array(
  'url'      => 'biedisactinm/ajax',
  'condition' => "$('bndisinm_codact').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=3&cajtexmos=bndisinm_codact&cajtexcom=bndisinm_codact&codinm='+$('bndisinm_codmue').value+'&codigo='+this.value",
)),
 )); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnreginm_Biedisactinm/clase/Bnreginm/frame/sf_admin_edit_form/obj1/bndisinm_codact/obj2/bndisinm_codmue/obj3/bndisinm_desinm/obj4/bndisinm_codubiori/obj5/bndisinm_desubiori/obj6/bndisinm_mondisinm/campo1/codact/campo2/codinm/campo3/desinm/campo4/codubi/campo5/desubi/campo6/valini/param1/')?>
</div>
  </th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th>
  <?php echo label_for('bndisinm[codmue]', __($labels['bndisinm{codmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{codmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{codmue}')): ?>
    <?php echo form_error('bndisinm{codmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_input_tag($bndisinm, 'getCodmue', array (
  'size' => 15,
  'control_name' => 'bndisinm[codmue]',
  'onBlur'=> remote_function(array(
  'url'      => 'biedisactinm/ajax',
  'condition' => "$('bndisinm_codmue').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=1&cajtexmos=bndisinm_codact&cajtexcom=bndisinm_desinm&codigo='+this.value",
)),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnreginm_Biedisactinm1/clase/Bnreginm/frame/sf_admin_edit_form/obj1/bndisinm_codmue/obj2/bndisinm_codact/obj3/bndisinm_desinm/obj4/bndisinm_mondisinm/campo1/codinm/campo2/codact/campo3/desinm/campo4/valini/param1/')?>
</div>
  </th>
</tr>
</table>

<br>

  <?php echo label_for('bndisim[desinm]', __('Descripción Catálogo:'), 'class="required" ') ?>
   <?php $value = object_input_tag($bndisinm, 'getDesinm', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bndisinm[desinm]',
)); echo $value ? $value : '&nbsp;' ?>

</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<legend>Transacci&oacute;n</legend>
<div class="form-row">
  <?php echo label_for('bndisinm[nrodisinm]', __($labels['bndisinm{nrodisinm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{nrodisinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{nrodisinm}')): ?>
    <?php echo form_error('bndisinm{nrodisinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndisinm, 'getNrodisinm', array (
  'size' => 15,
  'control_name' => 'bndisinm[nrodisinm]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('bndisinm_nrodisinm').value=valor;document.getElementById('bndisinm[nrodisinm').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>

<strong>Tipo :</strong>&nbsp;&nbsp;&nbsp;
<?php echo select_tag('bndisinm[tipdisinm]', options_for_select($tipos,$bndisinm->getTipdisinm())); ?>
    </div>
<br>
  <?php echo label_for('bndisinm[motdisinm]', __($labels['bndisinm{motdisinm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{motdisinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{motdisinm}')): ?>
    <?php echo form_error('bndisinm{motdisinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($bndisinm, 'getMotdisinm', array (
  'size' => 7,
  'control_name' => 'bndisinm[motdisinm]',
  'onBlur'=> remote_function(array(
  'url'      => 'biedisactmuenew/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=2&cajtexmos=bndisinm_desmot&codigo='+this.value",
//'with' => "'ajax=2&cajtexmos=bndismue_desmot&cajtexcom=bndisinm_desmot&codigo='+this.value",
   )),
)); echo $value ? $value : '&nbsp;' ?>


<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnmotdis_Biedisactmuenew/clase/Bnmotdis/frame/sf_admin_edit_form/obj1/bndisinm_motdisinm/obj2/bndisinm_desmot/campo1/codmot/campo2/desmot/param1/')?>


<?php $value = object_input_tag($bndisinm, 'getDesmot', array (
  'size' => 66,
  'disabled' => true,
  'control_name' => 'bndisinm[desmot]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<table>
<tr>
<th>
    <?php echo label_for('bndisinm[fecdisinm]', __($labels['bndisinm{fecdisinm}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{fecdisinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{fecdisinm}')): ?>
    <?php echo form_error('bndisinm{fecdisinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bndisinm, 'getFecdisinm', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bndisinm[fecdisinm]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
</th>
<th>
<?php echo label_for('bndisinm[fecdevdis]', __($labels['bndisinm{fecdevdis}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{fecdevdis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{fecdevdis}')): ?>
    <?php echo form_error('bndisinm{fecdevdis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_date_tag($bndisinm, 'getFecdevdis', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bndisinm[fecdevdis]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
</th>
<th>
 <?php echo label_for('bndisinm[mondisinm]', __($labels['bndisinm{mondisinm}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{mondisinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{mondisinm}')): ?>
    <?php echo form_error('bndisinm{mondisinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_tag($bndisinm, array('getMondisinm',true), array (
  'size' => 10,
  'control_name' => 'bndisinm[mondisinm]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>
<br>
<br>
  <?php echo label_for('bndisinm[detdisinm]', __($labels['bndisinm{detdisinm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{detdisinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{detdisinm}')): ?>
    <?php echo form_error('bndisinm{detdisinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bndisinm, 'getDetdisinm', array (
  'size' => '80x3',
  'control_name' => 'bndisinm[detdisinm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<legend>Ubicaci&oacute;n</legend>
<div class="form-row">
  <?php echo label_for('bndisinm[codubiori]', __($labels['bndisinm{codubiori}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{codubiori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{codubiori}')): ?>
    <?php echo form_error('bndisinm{codubiori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndisinm, 'getCodubiori', array (
  'size' => 13,
  'control_name' => 'bndisinm[codubiori]',
  //'onKeypress' => "javascript:cadena=rayitas(this.value);document.getElementById('bndisinm_codubiori').value=cadena;",
  //'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraformatoubi')",
  'onBlur'=> remote_function(array(
  'url'      => 'biedisactmuenew/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=3&cajtexmos=bndisinm_desubiori&codigo='+this.value",
  )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Biedisactmuenew/clase/Bnubibie/frame/sf_admin_edit_form/obj1/bndisinm_codubiori/obj2/bndisinm_desubiori/campo1/codubi/campo2/desubi/param1/')?>


<?php $value = object_input_tag($bndisinm, 'getDesubiori', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bndisinm[desubiori]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('bndisinm[codubides]', __($labels['bndisinm{codubides}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{codubides}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{codubides}')): ?>
    <?php echo form_error('bndisinm{codubides}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndisinm, 'getCodubides', array (
  'size' => 13,
  'control_name' => 'bndisinm[codubides]',
  //'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraformatoubi')",
  'onBlur'=> remote_function(array(
  'url'      => 'biedisactmuenew/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=3&cajtexmos=bndisinm_desubides&codigo='+this.value",
  )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Biedisactmuenew/clase/Bnubibie/frame/sf_admin_edit_form/obj1/bndisinm_codubides/obj2/bndisinm_desubides/campo1/codubi/campo2/desubi/param1/')?>

<?php $value = object_input_tag($bndisinm, 'getDesubides', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bndisinm[desubides]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('bndisinm[obsdisinm]', __($labels['bndisinm{obsdisinm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisinm{obsdisinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisinm{obsdisinm}')): ?>
    <?php echo form_error('bndisinm{obsdisinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bndisinm, 'getObsdisinm', array (
  'size' => '80x3',
  'control_name' => 'bndisinm[obsdisinm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<ul class="sf_admin_actions">
<li>
<?
  if(SF_ENVIRONMENT=='dev') $dev = '_dev';
  else $dev = '';

if ($bndisinm->getId()=='') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'biedisactinm/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</li>
<? } else if ($bndisinm->getIdrefer()!='') { ?>
<li><input name="Comprobante" type="button" value="Comprobantes" class="sf_admin_action_save" onClick="consultarComp()"></li>
<?php } ?>
</ul>

<div id="comp"></div>
<script language="JavaScript" type="text/javascript">
  function comprobante(formulario)
  {
      window.open('/tesoreria_dev.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

   function consultarComp()
  {
    window.open('/tesoreria_dev.php/confincomgen/edit/id/'+$("idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
</script>

<?php include_partial('edit_actions', array('bndisinm' => $bndisinm)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bndisinm->getId()): ?>
<?php echo button_to(__('delete'), 'biedisactinm/delete?id='.$bndisinm->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
