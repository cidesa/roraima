<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/27 17:25:29
?>
<?php echo form_tag('fordefproyecto/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefpry, 'getId') ?>
<?php echo javascript_include_tag('dFilter_string') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Definición de Proyectos y Acciones Centralizadas')?></legend>
<div class="form-row">
  <table>
   <tr>
    <th> <?php echo label_for('fordefpry[codpro]', __($labels['fordefpry{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codpro}')): ?>
    <?php echo form_error('fordefpry{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getCodpro', array (
  'size' => strlen($mascaraproyecto),
  'maxlength' => strlen($mascaraproyecto),
  'control_name' => 'fordefpry[codpro]',
  'readonly'  =>  $fordefpry->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraproyecto');",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>


    <th> <?php echo label_for('fordefpry[codpryonapre]', __($labels['fordefpry{codpryonapre}']), 'class="required" style="width: 150px"') ?>
	  <div class="content<?php if ($sf_request->hasError('fordefpry{codpryonapre}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('fordefpry{codpryonapre}')): ?>
	    <?php echo form_error('fordefpry{codpryonapre}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($fordefpry, 'getCodpryonapre', array (
	  'size' => 20,
	  'maxlength' =>10,
	  'control_name' => 'fordefpry[codpryonapre]',
	  //'readonly'  =>  $fordefpry->getId()!='' ? true : false ,

	)); echo $value ? $value : '&nbsp;' ?>
    </div></th>


    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
     <?php echo label_for('fordefpry[proacc]', __($labels['fordefpry{proacc}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{proacc}')): ?> form-error<?php endif; ?>">

  <?php if ($sf_request->hasError('fordefpry{proacc}')): ?>
    <?php echo form_error('fordefpry{proacc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo select_tag('fordefpry[proacc]', options_for_select($pacc,$fordefpry->getProacc(),'include_custom=Seleccione Uno')); ?>
    </div></th>
   </tr>
  </table>

<br>

  <?php echo label_for('fordefpry[nompro]', __($labels['fordefpry{nompro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{nompro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{nompro}')): ?>
    <?php echo form_error('fordefpry{nompro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getNompro', array (
  'size' => '80x3',
  'maxlength' =>1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos Generales');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <table>
   <tr>
    <th>  <?php echo label_for('fordefpry[codsta]', __($labels['fordefpry{codsta}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codsta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codsta}')): ?>
    <?php echo form_error('fordefpry{codsta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  &nbsp;&nbsp;&nbsp;
  <?php echo input_auto_complete_tag('fordefpry[codsta]', $fordefpry->getCodsta(),
    'fordefproyecto/autocomplete?ajax=6',  array('autocomplete' => 'off','size' => 2,'maxlength' => 2, 'onBlur'=> remote_function(array(
			  'url'      => 'fordefproyecto/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('fordefpry_codsta').value != '' && $('id').value == ''",
  			  'with' => "'ajax=6&cajtexmos=fordefpry_dessta&cajtexcom=fordefpry_codsta&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>&nbsp;&nbsp;&nbsp;
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_fordefproyecto/clase/Fordefsta/frame/sf_admin_edit_form/obj1/fordefpry_dessta/obj2/fordefpry_codsta/campo1/dessta/campo2/codsta/param1/1')?>
    <th>  <?php $value = object_input_tag($fordefpry, 'getDessta', array (
  'readonly' => true,
  'size' => 60,
  'control_name' => 'fordefpry[dessta]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>

   <tr>
    <th>  <?php echo label_for('fordefpry[codsitpre]', __($labels['fordefpry{codsitpre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codsitpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codsitpre}')): ?>
    <?php echo form_error('fordefpry{codsitpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  &nbsp;&nbsp;&nbsp;
  <?php echo input_auto_complete_tag('fordefpry[codsitpre]', $fordefpry->getCodsitpre(),
    'fordefproyecto/autocomplete?ajax=2',  array('autocomplete' => 'off','size' => 2,'maxlength' => 2, 'onBlur'=> remote_function(array(
			  'url'      => 'fordefproyecto/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('fordefpry_codsitpre').value != '' && $('id').value == ''",
  			  'with' => "'ajax=2&cajtexmos=fordefpry_dessitpre&cajtexcom=fordefpry_codsitpre&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>&nbsp;&nbsp;&nbsp;
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_fordefproyecto/clase/Fordefsitpre/frame/sf_admin_edit_form/obj1/fordefpry_dessitpre/obj2/fordefpry_codsitpre/campo1/dessitpre/campo2/codsitpre/param1/2')?>
    <th>  <?php $value = object_input_tag($fordefpry, 'getDessitpre', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'fordefpry[dessitpre]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>

  </table>

<br>

  <table>
   <tr>
    <th><?php echo label_for('fordefpry[fecini]', __($labels['fordefpry{fecini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{fecini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{fecini}')): ?>
    <?php echo form_error('fordefpry{fecini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  &nbsp;&nbsp;&nbsp;
  <?php $value = object_input_date_tag($fordefpry, 'getFecini', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fordefpry[fecini]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>



    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>  <?php echo label_for('fordefpry[feccul]', __($labels['fordefpry{feccul}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{feccul}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{feccul}')): ?>
    <?php echo form_error('fordefpry{feccul}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  &nbsp;&nbsp;&nbsp;


  <?php $value = object_input_date_tag($fordefpry, 'getFeccul', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fordefpry[feccul]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
 'url'      => 'fordefproyecto/ajax',
 'complete' => 'AjaxJSON(request, json)',
 'with' => "'ajax=9&cajtexmos11=fordefpry_tieejeanopry&cajtexmos22=fordefpry_tieejemespry&fechaini='+document.getElementById('fordefpry_fecini').value+'&fechacul='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>
	  <?php echo label_for('fordefpry[tieejeanopry]', __($labels['fordefpry{tieejeanopry}']), 'class="required" style="width: 150px"') ?>
	  <div class="content<?php if ($sf_request->hasError('fordefpry{tieejeanopry}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('fordefpry{tieejeanopry}')): ?>
	    <?php echo form_error('fordefpry{tieejeanopry}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($fordefpry, 'getTieejeanopry', array (
	  'size' => 7,
	  'maxlength' =>5,
	  'control_name' => 'fordefpry[tieejeanopry]',
	)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>
	<?php echo label_for('fordefpry[tieejemespry]', __($labels['fordefpry{tieejemespry}']), 'class="required"') ?>
	  <div class="content<?php if ($sf_request->hasError('fordefpry{tieejemespry}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('fordefpry{tieejemespry}')): ?>
	    <?php echo form_error('fordefpry{tieejemespry}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
     &nbsp;&nbsp;&nbsp;
	  <?php $value = object_input_tag($fordefpry, 'getTieejemespry', array (
	  'size' => 7,
	  'maxlength' =>5,
	  'control_name' => 'fordefpry[tieejemespry]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
  </th>
   </tr>
  </table>



<br>

   <table>
   <tr>
    <th><?php echo label_for('estado', __('Estado: '), 'class="required" ') ?>
  <div class="content">
  <?php echo select_tag('estado', options_for_select($estados,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipios',
    'url'      => 'fordefproyecto/combo?par=1',
    'with' => "'estado='+this.value"
  ))));?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

    <th> <?php echo label_for('municipio', __('Municipio: '), 'class="required" ') ?>

  <div class="content">
  <div id="divMunicipios">

<?php echo select_tag('municipio', options_for_select($municipios,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquias',
    'url'      => 'fordefproyecto/combo?par=2',
    'with' => "'estado='+$('estado').value+'&municipio='+this.value"
  ))));?></div>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('parroquia', __('Parroquia: '), 'class="required" ') ?>
  <div class="content">

<div id="divParroquias">
<?php echo select_tag('parroquia', options_for_select($parroquias,'','include_custom=Seleccione Uno'));?></div>
    </div></th>

	<th>&nbsp;&nbsp;&nbsp;
		<?php echo link_to_function(image_tag('/images/OperatorClass.png'), "agregargrid();") ?>
	</th>
   </tr>
  </table>
  <br>

<div id="grid1"   style="font-weight:bold">

<?
	echo grid_tag($obj);
?>

</div>




</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Area Estratégica y Objetivos');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('fordefpry[codequ]', __($labels['fordefpry{codequ}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codequ}')): ?>
    <?php echo form_error('fordefpry{codequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('fordefpry[codequ]', options_for_select($directriz,$fordefpry->getCodequ(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divSubObjetivo',
    'url'      => 'fordefproyecto/combo?par=3',
    'complete' => 'AjaxJSON(request, json)',
    'with' => "'directriz='+this.value+'&desobj=fordefpry_desobj'"
  ))));?>
    </div>

<br>
	  <?php echo label_for('fordefpry[desobj]', __($labels['fordefpry{desobj}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{desobj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{desobj}')): ?>
    <?php echo form_error('fordefpry{desobj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getDesobj', array (
  'disabled' => true,
  'size' => '80x2',
  'control_name' => 'fordefpry[desobj]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordefpry[codsubobj]', __($labels['fordefpry{codsubobj}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codsubobj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codsubobj}')): ?>
    <?php echo form_error('fordefpry{codsubobj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <div id="divSubObjetivo">
<?php echo select_tag('fordefpry[codsubobj]', options_for_select($subobjetivo,$fordefpry->getCodsubobj(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divSubSubObjetivo',
		'url'      => 'fordefproyecto/combo?par=4',
		'with' => "'directriz='+$('fordefpry_codequ').value+'&subobjetivo='+this.value"
  ))));?></div>
   </div>

<br>

  <?php echo label_for('fordefpry[codsubsubobj]', __($labels['fordefpry{codsubsubobj}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codsubsubobj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codsubsubobj}')): ?>
    <?php echo form_error('fordefpry{codsubsubobj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <div id="divSubSubObjetivo">
<?php echo select_tag('fordefpry[codsubsubobj]', options_for_select($subsubobjetivo,$fordefpry->getCodsubsubobj(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divOtro',
		'url'      => 'fordefproyecto/combo?par=3',
		'with' => "'directriz='+$('fordefpry_codequ').value+'&subobjetivo='+$('fordefpry_codsubobj').value+'&subsubobjetivo='+this.value"
  ))));?></div>
    </div>

<br>

<table>
 <tr>
  <th>
<?php echo label_for('fordefpry[codobjnvaeta]', __($labels['fordefpry{codobjnvaeta}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codobjnvaeta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codobjnvaeta}')): ?>
    <?php echo form_error('fordefpry{codobjnvaeta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

&nbsp;&nbsp;&nbsp;
  <?php echo input_auto_complete_tag('fordefpry[codobjnvaeta]', $fordefpry->getCodobjnvaeta(),
    'fordefproyecto/autocomplete?ajax=4',  array('autocomplete' => 'off','size' => 3,'maxlength' => 3, 'onBlur'=> remote_function(array(
			  'url'      => 'fordefproyecto/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('fordefpry_codobjnvaeta').value != '' && $('id').value == ''",
  			  'with' => "'ajax=4&cajtexmos=fordefpry_objestnueeta&cajtexcom=fordefpry_codobjnvaeta&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>

</div>
 </th>
 <th>
    &nbsp;&nbsp;&nbsp;
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_fordefproyecto/clase/Fordefobjestnvaeta/frame/sf_admin_edit_form/obj1/fordefpry_desobjnva/obj2/fordefpry_codobjnvaeta/campo1/desobjnvaeta/campo2/codobjnvaeta/param1/4')?>
   </th>
   <th>
 &nbsp;&nbsp;&nbsp;
  <?php $value = object_textarea_tag($fordefpry, 'getDesobjnva', array (
  'disabled' => 'true',
  'size' => '50x2',
  'control_name' => 'fordefpry[desobjnva]',
)); echo $value ? $value : '&nbsp;' ?>
   </div>

    </th>
  </tr>
</table>

<br>

  <?php echo label_for('fordefpry[objestins]', __($labels['fordefpry{objestins}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{objestins}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{objestins}')): ?>
    <?php echo form_error('fordefpry{objestins}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getObjestins', array (
  'size' => '80x2',
  'maxlength' =>1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[objestins]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordefpry[objeesppro]', __($labels['fordefpry{objeesppro}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{objeesppro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{objeesppro}')): ?>
    <?php echo form_error('fordefpry{objeesppro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getObjeesppro', array (
  'size' => '80x2',
  'maxlength' =>1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[objeesppro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>


  <?php echo label_for('fordefpry[objpndes]', __($labels['fordefpry{objpndes}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{objpndes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{objpndes}')): ?>
    <?php echo form_error('fordefpry{objpndes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getObjpndes', array (
  'size' => '80x2',
  'maxlength' =>1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[objpndes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<br>

<fieldset>
<legend><strong><? echo __('Clasificacion Sectorial') ?></strong> </legend>
 <div class="form-row">
  <?php echo label_for('fordefpry[codsec]', __($labels['fordefpry{codsec}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codsec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codsec}')): ?>
    <?php echo form_error('fordefpry{codsec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('fordefpry[codsec]', options_for_select($sector,$fordefpry->getCodsec(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divsubsector',
    'url'      => 'fordefproyecto/combo?par=5',
    'complete' => 'AjaxJSON(request, json)',
    'with' => "'sector='+this.value"
  ))));?>
    </div>

<br>


  <?php echo label_for('fordefpry[codsubsec]', __($labels['fordefpry{codsubsec}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codsubsec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codsubsec}')): ?>
    <?php echo form_error('fordefpry{codsubsec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<div id="divsubsector">
    <?php echo select_tag('fordefpry[codsubsec]', options_for_select($subsector,$fordefpry->getCodsubsec(),'include_custom=Seleccione Uno'));?>
    </div>
</div>

</div>
</fieldset>

</fieldset>


<?php tabPageOpenClose("tp1", "tabPage3", 'Indicadores / Resultado del Proyecto');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset>
<legend><? echo __('Indicadores del Proyecto')?></legend>
<div class="form-row">
<?php echo label_for('fordefpry[enupro]', __($labels['fordefpry{enupro}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{enupro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{enupro}')): ?>
    <?php echo form_error('fordefpry{enupro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getEnupro', array (

  'size' => '126x3',
  'maxlength' =>1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[enupro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('fordefpry[indsitact]', __($labels['fordefpry{indsitact}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{indsitact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{indsitact}')): ?>
    <?php echo form_error('fordefpry{indsitact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getIndsitact', array (
  'size' => '126x3',
  'maxlength' =>1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[indsitact]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<table>
  <tr>
   <th>
<?php echo label_for('fordefpry[fecultdat]', __($labels['fordefpry{fecultdat}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{fecultdat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{fecultdat}')): ?>
    <?php echo form_error('fordefpry{fecultdat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fordefpry, 'getFecultdat', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fordefpry[fecultdat]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    </th>

    <th>
<?php echo label_for('fordefpry[sitobjdes]', __($labels['fordefpry{sitobjdes}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{sitobjdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{sitobjdes}')): ?>
    <?php echo form_error('fordefpry{sitobjdes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getSitobjdes', array (
  'size' => '80x3',
  'maxlength' =>250,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[sitobjdes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    </th>

 </tr>
</table>

<br>

  <table>
    <tr>
	  <th>
  <?php echo label_for('fordefpry[forind]', __($labels['fordefpry{forind}']), 'class="required" style="width: 80px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{forind}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{forind}')): ?>
    <?php echo form_error('fordefpry{forind}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getForind', array (
  'size' => '50x3',
  'maxlength' =>1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[forind]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
      </th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th>
  <?php echo label_for('fordefpry[fueind]', __($labels['fordefpry{fueind}']), 'class="required" style="width: 70px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{fueind}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{fueind}')): ?>
    <?php echo form_error('fordefpry{fueind}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getFueind', array (
  'size' => '50x3',
  'maxlength' =>100,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[fueind]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
      </th>
    </tr>
  </table>


<br>


<?php echo label_for('fordefpry[indsitobj]', __($labels['fordefpry{indsitobj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{indsitobj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{indsitobj}')): ?>
    <?php echo form_error('fordefpry{indsitobj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getIndsitobj', array (
  'size' => '126x3',
  'maxlength' =>1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[indsitobj]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <table>
    <tr>
      <th>
       <?php echo label_for('fordefpry[tieimpano]', __($labels['fordefpry{tieimpano}']), 'class="required" style="width: 170px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{tieimpano}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{tieimpano}')): ?>
    <?php echo form_error('fordefpry{tieimpano}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getTieimpano', array (
  'size' => 7,
  'maxlength' =>5,
  'control_name' => 'fordefpry[tieimpano]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
      </th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th>
  <?php echo label_for('fordefpry[tieimpmes]', __($labels['fordefpry{tieimpmes}']), 'class="required" style="width: 30px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{tieimpmes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{tieimpmes}')): ?>
    <?php echo form_error('fordefpry{tieimpmes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getTieimpmes', array (
  'size' => 7,
  'maxlength' =>5,
  'control_name' => 'fordefpry[tieimpmes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
    </tr>
  </table>
</div>
</fieldset>

<br>

<fieldset>
<legend><? echo __('Resultado del Proyecto')?></legend>
<div class="form-row">

<?php echo label_for('fordefpry[respro]', __($labels['fordefpry{respro}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{respro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{respro}')): ?>
    <?php echo form_error('fordefpry{respro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getRespro', array (
  'size' => '126x3',
  'maxlength' =>1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[respro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>


<br>
<table>
  <tr>
      <th><?php echo label_for('fordefpry[unimedres]', __($labels['fordefpry{unimedres}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{unimedres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{unimedres}')): ?>
    <?php echo form_error('fordefpry{unimedres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('fordefpry[unimedres]', $fordefpry->getUnimedres(),
    'fordefproyecto/autocomplete?ajax=5',  array('autocomplete' => 'off','size' => 3,'maxlength' => 3, 'onBlur'=> remote_function(array(
			  'url'      => 'fordefproyecto/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('fordefpry_unimedres').value != '' && $('id').value == ''",
  			  'with' => "'ajax=5&cajtexmos=fordefpry_desunimed&cajtexcom=fordefpry_unimedres&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>&nbsp;&nbsp;&nbsp;
     <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_fordefproyecto/clase/Fordefunimed/frame/sf_admin_edit_form/obj1/fordefpry_desunimed/obj2/fordefpry_unimedres/campo1/desunimed/campo2/codunimed/param1/5')?>
    </th>
    <th>  <?php $value = object_input_tag($fordefpry, 'getDesunimed', array (
  'readonly' => true,
  'size' => 60,
  'control_name' => 'fordefpry[desunimed]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
<?php echo label_for('fordefpry[cantmet]', __($labels['fordefpry{cantmet}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{cantmet}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{cantmet}')): ?>
    <?php echo form_error('fordefpry{cantmet}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getCantmet', array (
  'size' => 7,
  'maxlength' =>12,
  'control_name' => 'fordefpry[cantmet]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
  </tr>
</table>

<br>

  <?php echo label_for('fordefpry[benpro]', __($labels['fordefpry{benpro}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{benpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{benpro}')): ?>
    <?php echo form_error('fordefpry{benpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getBenpro', array (
  'size' => 80,
  'maxlength' =>250,
  'control_name' => 'fordefpry[benpro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

</div>
</fieldset>
</div>
</fieldset>


<?php tabPageOpenClose("tp1", "tabPage4", 'Indicadores de Gestión');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset>
<legend> <? echo __('Localización Política Territorial')?></legend>
<div  class="form-row">

  <?php echo label_for('fordefpry[nucdesend]', __($labels['fordefpry{nucdesend}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{nucdesend}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{nucdesend}')): ?>
    <?php echo form_error('fordefpry{nucdesend}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getNucdesend', array (
  'size' => '126x3',
  'maxlength' =>250,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[nucdesend]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordefpry[zonecodes]', __($labels['fordefpry{zonecodes}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{zonecodes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{zonecodes}')): ?>
    <?php echo form_error('fordefpry{zonecodes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getZonecodes', array (
  'size' => '126x3',
  'maxlength' =>250,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[zonecodes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>


<br>

  <?php echo label_for('fordefpry[comindust]', __($labels['fordefpry{comindust}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{comindust}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{comindust}')): ?>
    <?php echo form_error('fordefpry{comindust}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getComindust', array (
  'size' => '126x3',
  'maxlength' =>250,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[comindust]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('fordefpry[montotpry]', __($labels['fordefpry{montotpry}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{montotpry}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{montotpry}')): ?>
    <?php echo form_error('fordefpry{montotpry}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, array('getMontotpry',true), array (
  'size' => 40,
  //'maxlength' =>27,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'fordefpry[montotpry]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</div>
</fieldset>
</div>
</fieldset>

<div class="form-row">

<br>

<div id="grid1"   style="font-weight:bold">

<?
	echo grid_tag($obj2);
?>

</div>

</div>


<?php tabPageOpenClose("tp1", "tabPage5", 'Organismos Públicos');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset>
<legend><? echo __('Gerente del Proyecto')?></legend>
<div class="form-row">
<table>
  <tr>
    <th>
<?php echo label_for('fordefpry[codemp]', __($labels['fordefpry{codemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{codemp}')): ?>
    <?php echo form_error('fordefpry{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('fordefpry[codemp]', $fordefpry->getCodemp(),
    'fordefproyecto/autocomplete?ajax=7',  array('autocomplete' => 'off','size' => 16, 'maxlength' => 16, 'onBlur'=> remote_function(array(
			  'url'      => 'fordefproyecto/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('fordefpry_codemp').value != '' && $('id').value == ''",
  			  'with' => "'ajax=8&cajtexmos=fordefpry_nomemp2&cajtexcom=fordefpry_codemp&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>&nbsp;&nbsp;&nbsp;
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_fordefproyecto/clase/Nphojint/frame/sf_admin_edit_form/obj1/fordefpry_nomemp2/obj2/fordefpry_codemp/campo1/nomemp/campo2/codemp/param1/6')?></th>
    <th>  <?php $value = object_input_tag($fordefpry, 'getNomemp2', array (
  'readonly' => true,
  'size' => 83,
  'control_name' => 'fordefpry[nomemp2]',
)); echo $value ? $value : '&nbsp;' ?></th>
</tr>
</table>

<br>

  <table>
    <tr>
      <th>
	  <?php echo label_for('fordefpry[uniadsemp]', __($labels['fordefpry{uniadsemp}']), 'class="required"') ?>
	  <div class="content<?php if ($sf_request->hasError('fordefpry{uniadsemp}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('fordefpry{uniadsemp}')): ?>
	    <?php echo form_error('fordefpry{uniadsemp}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($fordefpry, 'getUniadsemp', array (
	  'size' => 45,
	  'maxlength' => 100,
	  'control_name' => 'fordefpry[uniadsemp]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	   </th>
         <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
	   <th>
	  <?php echo label_for('fordefpry[caremp]', __($labels['fordefpry{caremp}']), 'class="required" ') ?>
	  <div class="content<?php if ($sf_request->hasError('fordefpry{caremp}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('fordefpry{caremp}')): ?>
	    <?php echo form_error('fordefpry{caremp}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($fordefpry, 'getCaremp', array (
	  'size' => 46,
	  'maxlength' => 100,
	  'control_name' => 'fordefpry[caremp]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
      </th>
    </tr>
  </table>

  <br>

  <table>
    <tr>
     <th>
  <?php echo label_for('fordefpry[telemp]', __($labels['fordefpry{telemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{telemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{telemp}')): ?>
    <?php echo form_error('fordefpry{telemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getTelemp', array (
  'size' => 20,
  'maxlength' => 30,
  'control_name' => 'fordefpry[telemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>&nbsp;&nbsp;&nbsp</th>
<th>
  <?php echo label_for('fordefpry[faxemp]', __($labels['fordefpry{faxemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{faxemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{faxemp}')): ?>
    <?php echo form_error('fordefpry{faxemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getFaxemp', array (
  'size' => 20,
  'maxlength' => 30,
  'control_name' => 'fordefpry[faxemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>&nbsp;&nbsp;&nbsp</th>
<th>
  <?php echo label_for('fordefpry[emaemp]', __($labels['fordefpry{emaemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{emaemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{emaemp}')): ?>
    <?php echo form_error('fordefpry{emaemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getEmaemp', array (
  'size' => 30,
  'maxlength' => 50,
  'control_name' => 'fordefpry[emaemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </th>
    </tr>
  </table>
</div>
</fieldset>

<fieldset>
<legend><? echo __('Agencia del Decisor')?></legend>
<div class="form-row">

<table>
 <tr>
   <th>
<?php echo label_for('fordefpry[accinm]', __($labels['fordefpry{accinm}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{accinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{accinm}')): ?>
    <?php echo form_error('fordefpry{accinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getAccinm', array (
  'size' => '45x2',
  'maxlength' => 250,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[accinm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
    <th>
    <?php echo label_for('fordefpry[accdif]', __($labels['fordefpry{accdif}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{accdif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{accdif}')): ?>
    <?php echo form_error('fordefpry{accdif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getAccdif', array (
  'size' => '45x2',
  'maxlength' => 250,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[accdif]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
  </tr>
 </table>

<br>

<?php echo label_for('fordefpry[placontin]', __($labels['fordefpry{placontin}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{placontin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{placontin}')): ?>
    <?php echo form_error('fordefpry{placontin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpry, 'getPlacontin', array (
  'size' => '115x3',
  'maxlength' => 250,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[placontin]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<fieldset>
<legend><? echo __('Empleos Generados')?></legend>
<div class="form-row">

<table>
  <tr>
    <th>
       <?php echo label_for('fordefpry[nroempdir]', __($labels['fordefpry{nroempdir}']), 'class="required" style="width: 250px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{nroempdir}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{nroempdir}')): ?>
    <?php echo form_error('fordefpry{nroempdir}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getNroempdir', array (
  'size' => 7,
  'maxlength' => 10,
  'control_name' => 'fordefpry[nroempdir]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
    <th>
    <?php echo label_for('fordefpry[nroempind]', __($labels['fordefpry{nroempind}']), 'class="required" style="width: 250px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{nroempind}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{nroempind}')): ?>
    <?php echo form_error('fordefpry{nroempind}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getNroempind', array (
  'size' => 7,
  'maxlength' => 10,
  'control_name' => 'fordefpry[nroempind]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
  </tr>
</table>

</div>
</fieldset>

<fieldset>
<legend><? echo __('Descripción Breve del Proyecto')?></legend>
<div class="form-row">

  <?php $value = object_textarea_tag($fordefpry, 'getDesbrepry', array (
  'size' => '130x3',
  'maxlength' => 1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'fordefpry[desbrepry]',
)); echo $value ? $value : '&nbsp;' ?>

</div>
</fieldset>

<fieldset>
<legend><? echo __('Avance del Proyecto')?></legend>
<div class="form-row">


  <table>
    <tr>
      <th>
  <?php echo label_for('fordefpry[poravafis]', __($labels['fordefpry{poravafis}']), 'class="required" style="width: 250px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{poravafis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{poravafis}')): ?>
    <?php echo form_error('fordefpry{poravafis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getPoravafis', array (
  'size' => 7,
  'maxlength' => 10,
  'control_name' => 'fordefpry[poravafis]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
   </th>
    <th>
  <?php echo label_for('fordefpry[poravafin]', __($labels['fordefpry{poravafin}']), 'class="required" style="width: 250px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpry{poravafin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpry{poravafin}')): ?>
    <?php echo form_error('fordefpry{poravafin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpry, 'getPoravafin', array (
  'size' => 7,
  'maxlength' => 10,
  'control_name' => 'fordefpry[poravafin]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
	</th>
    </tr>
  </table>



</div>
</fieldset>


</div>
</fieldset>

<?php tabInit('tp1','0');?>
<?php include_partial('edit_actions', array('fordefpry' => $fordefpry)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($fordefpry->getId()): ?>
<?php echo button_to(__('delete'), 'fordefproyecto/delete?id='.$fordefpry->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

 <script language="JavaScript" type="text/javascript" >

  function agregargrid()
  {
  	if  ($('parroquia').value!="")
	{
	     //VARIABLES A PASAR AL GRID
	     var index=$('estado').selectedIndex;
	     var text=$('estado').options[index].text;
	     var cod = $('estado').value;

	     var index2=$('municipio').selectedIndex;
	     var text2=$('municipio').options[index2].text;
	     var cod2 = $('municipio').value;

	     var index3=$('parroquia').selectedIndex;
	     var text3=$('parroquia').options[index3].text;
	     var cod3 = $('parroquia').value;

		 var fil2=0;
	     var cuentafil=0;
	     var esta=false;
	     while (fil2<50)
	     {
	       var ida="ax"+"_"+fil2+"_2";
	       var ida2="ax"+"_"+fil2+"_3";
	       var ida3="ax"+"_"+fil2+"_5";
	       if ($(ida).value==cod && $(ida2).value==cod2 && $(ida3).value==cod3)
	       {
            alert ('No se puede repetir la ubicación del proyecto');
            esta = true;
	        break;
	       }
	       fil2++;
	     }




		//PROCEDIMIENTO PARA METER VALORES AL GRID

       if (!esta)
       {
	     var fil2=0;
	       var cuentafil=0;
	       while (fil2<50)
	       {
	        var ida="ax"+"_"+fil2+"_2";
	        if ($(ida).value=="")
	        {
	         cuentafil=fil2;
	         fil2=50;
	        }
	       fil2++;
	       }

	       var caj1="ax"+"_"+cuentafil+"_2";
	       var caj2="ax"+"_"+cuentafil+"_1";
	       var caj3="ax"+"_"+cuentafil+"_3";
	       var caj4="ax"+"_"+cuentafil+"_4";
	       var caj5="ax"+"_"+cuentafil+"_5";
	       var caj6="ax"+"_"+cuentafil+"_6";

	       $(caj1).value=cod;
	       $(caj2).value=text;
	       $(caj3).value=cod2;
	       $(caj4).value=text2;
	       $(caj5).value=cod3;
	       $(caj6).value=text3;
	 }
	}else
	 {
	 	alert ('Debe seleccionar una parroquia..');
	 }
  }
 function validargrid(id)
 {
    var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
    var descripcion=name+"_"+fila+"_"+coldes;

	if (organismo_repetido(id))
	{
		alert('El organismo se encuentra repetido');
		$(id).value="";
		$(descripcion).value="";

	}

 }

 function organismo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var organismo=$(id).value;

   var organismorepetido=false;
   var am=totalregistros('bx',1,50);
   var i=0;
   while (i<am)
   {
    var codigo="bx"+"_"+i+"_1";

    var organismo2=$(codigo).value;

    if (i!=fila)
    {
      if (organismo==organismo2)
      {
        organismorepetido=true;
        break;
      }
    }
   i++;
   }
   return organismorepetido;
 }

 function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
  }

 function ajax(id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descripcion=name+"_"+fil+"_"+coldes;
    var cod=$(id).value;

    new Ajax.Request('/formulacion_dev.php/fordefproyecto/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id); }, parameters:'ajax=7&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
 }

 </script>
