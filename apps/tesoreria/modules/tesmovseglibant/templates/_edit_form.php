<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/09 10:05:18
?>
<?php echo form_tag('tesmovseglibant/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript', 'Grid', 'SubmitClick','tabs','wait') ?>
<?php echo javascript_include_tag('tools', 'observe','ajax','dFilter') ?>

<?php echo object_input_hidden_tag($tsmovlib, 'getId') ?>

<fieldset>
<div class="form-row">

<fieldset>
<legend><?php echo __('Datos del Movimiento')?></legend>
<div class="form-row">
  <?php echo label_for('tsmovlib[numcue]', __($labels['tsmovlib{numcue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{numcue}')): ?>
    <?php echo form_error('tsmovlib{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('tsmovlib[numcue]', $tsmovlib->getNumcue(),
    'tesmovseglib/autocomplete?ajax=1',  array('autocomplete' => 'off','size' => 25,
    'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
    'maxlength' => 20,
	'onBlur'=> remote_function(array(
			  'url'      => 'tesmovseglibant/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('tsmovlib_numcue').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=tsmovlib_nomcue&cajtexcom=tsmovlib_numcue&codigo='+this.value",

			  ))),
     array('use_style' => 'true')
  )?><?php echo input_hidden_tag('tsmovlib[ctacon]', $tsmovlib->getCtacon()) ?>
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsmovlib_tesmovdeglib/clase/Tsdefban/frame/sf_admin_edit_form/obj1/tsmovlib_nomcue/obj2/tsmovlib_numcue/obj3/tsmovlib_ctacon/campo1/nomcue/campo2/numcue/campo3/codcta/param1/1','','','botoncat')?>

  <?php $value = object_input_tag($tsmovlib, 'getNomcue', array (
  'disabled' => true,
  'size' => 50,
  'maxlength' => 100,
  'control_name' => 'tsmovlib[nomcue]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>
  <table>
   <tr>
    <th>
     <?php echo label_for('tsmovlib[reflib]', __($labels['tsmovlib{reflib}']), 'class="required" ') ?>
	  <div class="content<?php if ($sf_request->hasError('tsmovlib{reflib}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('tsmovlib{reflib}')): ?>
	<?php echo form_error('tsmovlib{reflib}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($tsmovlib, 'getReflib', array (
	  'size' => 12,
	  'maxlength' => 8,
	  'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
	  'control_name' => 'tsmovlib[reflib]',
	  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('tsmovlib_reflib').value=valor;",
	)); echo $value ? $value : '&nbsp;' ?>
	</div>
    </th>
    <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
     <?php echo label_for('tsmovlib[feclib]', __($labels['tsmovlib{feclib}']), 'class="required" Style="width:150px"') ?>
	  <div class="content<?php if ($sf_request->hasError('tsmovlib{feclib}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('tsmovlib{feclib}')): ?>
	    <?php echo form_error('tsmovlib{feclib}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_date_tag($tsmovlib, 'getFeclib', array (
	  'rich' => true,
	  'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
	  'calendar_button_img' => '/sf/sf_admin/images/date.png',
	  'control_name' => 'tsmovlib[feclib]',
	  'date_format' => 'dd/MM/yy',
	  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
    </th>
  <tr>
  </table>

<br>

<div class="form-row" id="divx" style="display : none">
<?php echo grid_tag($obj);?>
</div>

<br>

  <?php echo label_for('tsmovlib[tipmov]', __($labels['tsmovlib{tipmov}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{tipmov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{tipmov}')): ?>
    <?php echo form_error('tsmovlib{tipmov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('tsmovlib[tipmov]', $tsmovlib->getTipmov(),
    'tesmovseglibant/autocomplete?ajax=2',  array('autocomplete' => 'off','size' => 5, 'maxlength' => 4,
	'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
			  'url'      => 'tesmovseglibant/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('tsmovlib_tipmov').value != '' && $('id').value == ''",
  			  'with' => "'ajax=2&cajtexmos=tsmovlib_destip&cajtexcom=tsmovlib_tipmov&codigo='+this.value",

			  ))),
     array('use_style' => 'true')
  )?>&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp3/clase/Tstipmov/frame/sf_admin_edit_form/obj1/tsmovlib_tipmov/obj2/tsmovlib_destip/obj3/tsmovlib_debcre/campo1/codtip/campo2/destip/campo3/debcre','','','botoncat')?>

  <?php $value = object_input_tag($tsmovlib, 'getDestip', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'tsmovlib[destip]',
   )); echo $value ? $value : '&nbsp;' ?>
	<?php echo input_hidden_tag('tsmovlib[debcre]', $tsmovlib->getDebcre()) ?>
    </div>

<br>

  <?php echo label_for('tsmovlib[deslib]', __($labels['tsmovlib{deslib}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{deslib}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{deslib}')): ?>
    <?php echo form_error('tsmovlib{deslib}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovlib, 'getDeslib', array (
  'size' => 120,
  'maxlength' => 4000,
  'control_name' => 'tsmovlib[deslib]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <table>
   <tr>
    <th>
   <?php echo label_for('tsmovlib[monmov]', __($labels['tsmovlib{monmov}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{monmov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{monmov}')): ?>
    <?php echo form_error('tsmovlib{monmov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovlib,array('getMonmov',true), array (
  'size' => 15,
  'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
  'control_name' => 'tsmovlib[monmov]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
    <th>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
      <?php echo label_for('tsmovlib[fecing]', __($labels['tsmovlib{fecing}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{fecing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{fecing}')): ?>
    <?php echo form_error('tsmovlib{fecing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsmovlib, 'getFecing', array (
  'rich' => true,
  'readonly'  =>  $tsmovlib->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsmovlib[fecing]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
), date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
   </tr>
  </table>
</div>
</fieldset>
</div>
</fieldset>

<?php include_partial('edit_actions', array('tsmovlib' => $tsmovlib)) ?>

</form>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $tsmovlib->getId()?>';
  if (ids!="")
  {
  	$('trigger_tsmovlib_feclib').hide();
  	$('trigger_tsmovlib_fecing').hide();
    $$('.botoncat')[0].disabled=true;
  	$$('.botoncat')[1].disabled=true;
  }
</script>

