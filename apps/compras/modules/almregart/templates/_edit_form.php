<?php
// auto-generated by sfPropelAdmin
// date: 2007/03/20 10:29:35
?>
<?php echo form_tag('almregart/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',  
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php use_helper('PopUp') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('validaciones') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>

<?php echo object_input_hidden_tag($caregart, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend>Datos del Articulo</legend>
<div class="form-row">
<table width="93%" height="5" border="0">
  <tr>
    <td width="23%"><?php echo label_for('caregart[codart]', __($labels['caregart{codart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{codart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{codart}')): ?>
    <?php echo form_error('caregart{codart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getCodart', array (
  'size' => 15,
  'control_name' => 'caregart[codart]',
  'maxlegth' => 20,
  'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('caregart_codart').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraarticulo')",
)); echo $value ? $value : '&nbsp;' ?> </div></td>
    <td width="27%"><?
if ($caregart->getTipo()=='A')	{ $valor1 = true;

}else{ $valor1=false;

} 
	echo radiobutton_tag('caregart[tipo]', 'A', $valor1, array('onClick' => "javascript:disableAllObjetos(a=new Array(),false);",))        ."Articulo".'&nbsp;&nbsp;';
	echo "<br>".radiobutton_tag('caregart[tipo]', 'S', !$valor1, array('onClick' => "javascript:disableAllObjetos(a=new Array('caregart_codart','caregart_desart','caregart_tipo'),true);",))."   Servicio";

?></td>
    <td width="50%"><strong>Codigo Contable</strong>    
<?php $value = object_input_tag($caregart, 'getCodcta', array (
  'size' => 20,
  'control_name' => 'caregart[codcta]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to_popup('...','generales/catalogo?clase=Contabb&frame=sf_admin_edit_form&obj1=caregart_codcta')?>
</td>
  </tr>
</table>   
</div>

<div class="form-row">
  <?php echo label_for('caregart[desart]', __($labels['caregart{desart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{desart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{desart}')): ?>
    <?php echo form_error('caregart{desart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  
 <?php $value = object_textarea_tag($caregart, 'getDesart', array (
  'size' => '80x5',
  'control_name' => 'caregart[desart]',
  'maxlength' => 250,
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</div>

<div class="form-row">
  <?php echo label_for('caregart[ramart]', __($labels['caregart{ramart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{ramart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{ramart}')): ?>
    <?php echo form_error('caregart{ramart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getRamart', array (
  'size' => 20,
  'control_name' => 'caregart[ramart]',
  'maxlength' => 6,    
  'onBlur'=> remote_function(array(
			  'url'      => 'almregart/ajax?ajax=1',  			   
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'codigo='+this.value"
			  )),    
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
 <?php echo button_to_popup('...','generales/catalogo?clase=Caramart&frame=sf_admin_edit_form&obj1=caregart_ramart&obj2=nomram')?>
 <?php echo input_tag('nomram',$caregart->getNomram(),'size=50,disabled=true'); ?>
  </div>
</div>

<div class="form-row">
  <?php echo label_for('caregart[codpar]', __($labels['caregart{codpar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{codpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{codpar}')): ?>
    <?php echo form_error('caregart{codpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getCodpar', array (
  'size' => 20,
  'control_name' => 'caregart[codpar]',
  'maxlength' => 16,   
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascarapartida')",
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to_popup('...','generales/catalogo?clase=Nppartidas&frame=sf_admin_edit_form&obj1=caregart_codpar')?>
   
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<strong>Unidad Medida</strong>
<?php $value = object_input_tag($caregart, 'getUnimed', array (
  'size' => 20,
  'control_name' => 'caregart[unimed]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>


<div class="form-row">
  <?php echo label_for('caregart[unialt]', __($labels['caregart{unialt}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{unialt}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{unialt}')): ?>
    <?php echo form_error('caregart{unialt}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getUnialt', array (
  'size' => 20,
  'control_name' => 'caregart[unialt]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<strong>Relacion</strong>
  <?php $value = object_input_tag($caregart, 'getRelart', array (
  'size' => 25,
  'control_name' => 'caregart[relart]',
  'maxlength' => 26,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('caregart[exitot]', __($labels['caregart{exitot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{exitot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{exitot}')): ?>
    <?php echo form_error('caregart{exitot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  
  <?php $value = object_input_tag($caregart, 'getExitot', array (
  'size' => 7,
  'control_name' => 'caregart[exitot]',
  'onKeyPress' => "javascript:return entermonto(event, this.id,this.id)",  
), $default_value = number_format($value,2,'.',',')); echo $value ? $value : '&nbsp;' ?>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<strong>Fecha Ult. Compra</strong>
<?php $value = object_input_date_tag($caregart, 'getFecult', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caregart[fecult]',
  'date_format' => 'dd/MM/yy',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'##/##/####')",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table width="100%" height="117" border="0">
  <tr>
    <td width="55%">
    <fieldset id="sf_fieldset_none" class="">
<legend>Costos</legend>
<div class="form-row">
<strong>Ultimo</strong>
<?php $value = object_input_tag($caregart, 'getCosult', array (
  'size' => 7,
  'control_name' => 'caregart[cosult]',
  'onKeyPress' => "javascript:return entermonto(event, this.id,this.id)",
), $default_value = number_format($value,2,'.',',')); echo $value ? $value : '&nbsp;' ?>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<strong>Promedio</strong>
<?php $value = object_input_tag($caregart, 'getCospro', array (
  'size' => 7,
  'control_name' => 'caregart[cospro]',
  'onKeyPress' => "javascript:return entermonto(event, this.id,this.id)",
), $default_value = number_format($value,2,'.',',')); echo $value ? $value : '&nbsp;' ?>
</div>
</fielddset></td>
    <td width="45%">
    <fieldset id="sf_fieldset_none" class="">
<legend>Existencia</legend>
<div class="form-row">
  <?php echo label_for('caregart[invini]', __($labels['caregart{invini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{invini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{invini}')): ?>
    <?php echo form_error('caregart{invini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getInvini', array (
  'size' => 7,
  'control_name' => 'caregart[invini]',
  'onKeyPress' => "javascript:return entermonto(event, this.id,this.id)",
), $default_value = number_format($value,2,'.',',')); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset></td>
  </tr>
</table>
</div>
</fieldset>
&nbsp;
&nbsp;
&nbsp;
<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
<input type="button" value="x" onClick="alert(document.getElementById('txtidborrar').value)">
</form>

<?php include_partial('edit_actions', array('caregart' => $caregart)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($caregart->getId()): ?>
<?php echo button_to(__('delete'), 'almregart/delete?id='.$caregart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
