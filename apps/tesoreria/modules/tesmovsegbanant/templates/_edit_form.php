<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/09 10:55:55
?>
<?php echo form_tag('tesmovsegbanant/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','tabs','Linktoapp') ?>
<?php echo javascript_include_tag('ajax','dFilter','tools','observe') ?>

<?php echo object_input_hidden_tag($tsmovban, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Movimiento')?></legend>
<div class="form-row">
  <?php echo label_for('tsmovban[numcue]', __($labels['tsmovban{numcue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{numcue}')): ?>
    <?php echo form_error('tsmovban{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('tsmovban[numcue]', $tsmovban->getNumcue(),
  'tesmovsegbanant/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 20, 'onBlur'=> remote_function(array(
  'url'      => 'tesmovsegbanant/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=1&cajtexmos=tsmovban_nombanco&cajtexcom=tsmovban_numcue&codigo='+this.value"
			  ))),
  array('use_style' => 'true')
  )?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsmovlib_tesmovdeglib/clase/Tsdefban/frame/sf_admin_edit_form/obj1/tsmovban_nombanco/obj2/tsmovban_numcue/campo1/nomcue/campo2/numcue/param1/1','','','botoncat')?>

  <?php $value = object_input_tag($tsmovban, 'getNombanco', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'tsmovban[nombanco]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<table>
 <tr>
  <th>
    <?php echo label_for('tsmovban[refban]', __($labels['tsmovban{refban}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{refban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{refban}')): ?>
    <?php echo form_error('tsmovban{refban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovban, 'getRefban', array (
  'size' => 20,
  'control_name' => 'tsmovban[refban]',
  'maxlength' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('tsmovban_refban').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
    <?php echo label_for('tsmovban[fecban]', __($labels['tsmovban{fecban}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{fecban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{fecban}')): ?>
    <?php echo form_error('tsmovban{fecban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsmovban, 'getFecban', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsmovban[fecban]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
 </tr>
</table>

<br>

  <?php echo label_for('tsmovban[tipmov]', __($labels['tsmovban{tipmov}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{tipmov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{tipmov}')): ?>
    <?php echo form_error('tsmovban{tipmov}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php echo input_auto_complete_tag('tsmovban[tipmov]', $tsmovban->getTipmov(),
    'tesmovsegbanant/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 20, 'onBlur'=> remote_function(array(
    'url'      => 'tesmovsegbanant/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'with' => "'ajax=2&cajtexmos=tsmovban_nommovim&cajtexcom=tsmovban_tipmov&codigo='+this.value"
			  ))),
    array('use_style' => 'true')
    )?>&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsmovlib_tesmovdeglib/clase/Tstipmov/frame/sf_admin_edit_form/obj1/tsmovban_tipmov/obj2/tsmovban_nommovim/campo1/codtip/campo2/destip/param1/2','','','botoncat')?>

  <?php $value = object_input_tag($tsmovban, 'getNommovim', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'tsmovban[nommovim]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('tsmovban[desban]', __($labels['tsmovban{desban}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('tsmovban{desban}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('tsmovban{desban}')): ?> <?php echo form_error('tsmovban{desban}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($tsmovban, 'getDesban', array (
'size' => 80,
'maxlength' => 250,
'control_name' => 'tsmovban[desban]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('tsmovban[monmov]', __($labels['tsmovban{monmov}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('tsmovban{monmov}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('tsmovban{monmov}')): ?> <?php echo form_error('tsmovban{monmov}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($tsmovban, array('getMonmov',true), array (
'size' => 7,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
'control_name' => 'tsmovban[monmov]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('tsmovban' => $tsmovban)) ?>
</form>


