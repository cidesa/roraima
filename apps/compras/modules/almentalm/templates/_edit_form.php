<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 16:31:01
?>
<?php echo form_tag('almentalm/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript') ?>
<?php use_helper('Grid') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('SubmitClick') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'compras/almentalm', 'tools','observe') ?>


<?php echo object_input_hidden_tag($caentalm, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend>Entrada</legend>
<div class="form-row">
<table>
<tr>
	<th width="100">
		  <?php echo label_for('caentalm[rcpart]', __($labels['caentalm{rcpart}']), 'class="required" ') ?>
		  <div class="content<?php if ($sf_request->hasError('caentalm{rcpart}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('caentalm{rcpart}')): ?>
		    <?php echo form_error('caentalm{rcpart}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($caentalm, 'getRcpart', array (
		  'size' => 12, 'maxlength' => 8,
		  'onBlur'  => "javascript: valor=this.value; if (valor!=''){ valor=valor.pad(8, '0',0); }else{ valor=valor.pad(8, '#',0); }  $('caentalm_rcpart').value=valor;",
		  'control_name' => 'caentalm[rcpart]',
		   'readonly'  =>  $caentalm->getId()!='' ? true : false,
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
	</th>
	<th width="200"></th>
	<th>
		  <?php echo label_for('caentalm[fecrcp]', __($labels['caentalm{fecrcp}']), 'class="required" style="width: 1px"') ?>
		  <div class="content<?php if ($sf_request->hasError('caentalm{fecrcp}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('caentalm{fecrcp}')): ?>
		    <?php echo form_error('caentalm{fecrcp}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_date_tag($caentalm, 'getFecrcp', array (
		  'rich' => true,
		  'calendar_button_img' => '/sf/sf_admin/images/date.png',
		  'control_name' => 'caentalm[fecrcp]',
		  'date_format' => 'dd/MM/yyyy',
		  'readonly'  =>  $caentalm->getId()!='' ? true : false,
		  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
		),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
		   </div>
	</th>
</tr>
</table>
<br>
  <?php echo label_for('caentalm[codpro]', __($labels['caentalm{codpro}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{codpro}')): ?>
    <?php echo form_error('caentalm{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo input_auto_complete_tag('caentalm[codpro]', $caentalm->getRifpro(),
    'almentalm/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 20,  'readonly'  =>  $caentalm->getId()!='' ? true : false , 'onBlur'=> remote_function(array(
			  'url'      => 'almentalm/ajax',
			  'condition' => "$('caentalm_codpro').value != '' && $('id').value == ''",
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=2&cajtexmos=caentalm_nompro&cajtexcom=caentalm_codpro&codigo='+this.value"
			  ))),
     array('use_style' => 'true'))?>
     &nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caprovee_Almentalm/clase/Caprovee/frame/sf_admin_edit_form/obj1/caentalm_codpro/obj2/caentalm_nompro/campo1/rifpro/campo2/nompro','','','botoncat')?>

<?php echo input_tag('caentalm[nompro]',$caentalm->getNompro(),'size=50,disabled=true'); ?>
    </div>

<br>
  <?php echo label_for('caentalm[desrcp]', __($labels['caentalm{desrcp}']), 'class="required" ') ?>
	  <div class="content<?php if ($sf_request->hasError('caentalm{desrcp}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('caentalm{desrcp}')): ?>
	    <?php echo form_error('caentalm{desrcp}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($caentalm, 'getDesrcp', array (
	  'size' => 100,
	  'control_name' => 'caentalm[desrcp]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
<br>

<table>
<tr>
	<th>
	  <?php echo label_for('caentalm[tipmov]', __($labels['caentalm{tipmov}']), 'class="required"') ?>
	  <div class="content<?php if ($sf_request->hasError('caentalm{tipmov}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('caentalm{tipmov}')): ?>
	    <?php echo form_error('caentalm{tipmov}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php echo input_auto_complete_tag('caentalm[tipmov]', $caentalm->getTipmov(),
    'almentalm/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 3, 'size' => 4,   'readonly'  =>  $caentalm->getId()!='' ? true : false,  'onBlur'=> remote_function(array(
			  'url'      => 'almentalm/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('caentalm_tipmov').value != '' && $('id').value == ''",
  			  'with' => "'ajax=3&cajtexmos=caentalm_nomtip&cajtexcom=caentalm_tipmov&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catipent_Almentalm/clase/Catipent/frame/sf_admin_edit_form/obj1/caentalm_tipmov/obj2/caentalm_nomtip/campo1/codtipent/campo2/destipent','','','botoncat')?>

 <?php echo input_tag('caentalm[nomtip]',$caentalm->getNomtip(),'size=30,disabled=true'); ?>
	    </div>
	</th>
	<th width="100"></th>
	<th>
	  <?php echo label_for('caentalm[monrcp]', __($labels['caentalm{monrcp}']), 'class="required"') ?>
	  <div class="content<?php if ($sf_request->hasError('caentalm{monrcp}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('caentalm{monrcp}')): ?>
	    <?php echo form_error('caentalm{monrcp}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($caentalm, 'getMonrcp', array (
	  'size' => 15,
	  'control_name' => 'caentalm[monrcp]', 'readonly' => true,
	),$default_value = number_format($value,2,',','.')); echo $value ? $value : '&nbsp;' ?>
	    </div>
    </th>
</tr>
</table>
</div>
</fieldset>
<br>

<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>

<?php include_partial('edit_actions', array('caentalm' => $caentalm)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($caentalm->getId()): ?>
<?php echo button_to(__('delete'), 'almentalm/delete?id='.$caentalm->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script type="text/javascript">
  var id="";
  var id='<?php echo $caentalm->getId()?>';
  actualiza(id);
</script>