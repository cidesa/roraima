<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/29 18:57:51
?>
<?php echo form_tag('vacsalidas/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npvacsalidas, 'getId') ?>
<?php echo input_hidden_tag('cajocugrid', '') ?>
<?php use_helper('Javascript','wait','Grid','PopUp','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npvacsalidas[codemp]', __($labels['npvacsalidas{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npvacsalidas{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{codemp}')): ?>
    <?php echo form_error('npvacsalidas{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npvacsalidas, 'getCodemp', array (
  'size' => 10,
  //'disabled' => true,
  'control_name' => 'npvacsalidas[codemp]',
  'onBlur'=> remote_function(array(
  'update'   => 'grid',
  'url'      => 'vacsalidas/ajax',
  'condition' => "$('npvacsalidas_codemp').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json),llenarcajaoculta()',
  'with' => "'ajax=1&cajtexfecvac=npvacsalidas_fecvac&cajtexfecdes=npvacsalidas_fecdes&cajtexfechas=npvacsalidas_fechas&cajtexnom=npvacsalidas_nomemp&cajtexfec=npvacsalidas_fecing&cajtexdiaspend=diaspend&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Vacsalidas/clase/Nphojint/frame/sf_admin_edit_form/obj1/npvacsalidas_codemp/obj2/npvacsalidas_nomemp/obj3/npvacsalidas_fecing/campo1/codemp/campo2/nomemp/campo3/fecing')?> &nbsp;

  <?php $value = object_input_tag($npvacsalidas, 'getNomemp', array (
  'size' => 50,
  'style' => "border-style:none;",
  'readonly' => true,
  'control_name' => 'npvacsalidas[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('npvacsalidas[fecing]', __($labels['npvacsalidas{fecing}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npvacsalidas{fecing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{fecing}')): ?>
    <?php echo form_error('npvacsalidas{fecing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npvacsalidas, array('getFecing',true), array (
  'readonly' => true,
  'size' => 10,
  'rich' => true,
  'maxlength' => 10,
  'style' => "border-style:none;",
  'readonly' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npvacsalidas[fecing]',
  'date_format' => 'dd/MM/yyyy',
  //'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>
</fieldset>

<fieldset>
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('npvacsalidas[fecvac]', __($labels['npvacsalidas{fecvac}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacsalidas{fecvac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{fecvac}')): ?>
    <?php echo form_error('npvacsalidas{fecvac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npvacsalidas, 'getFecvac', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npvacsalidas[fecvac]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'size' => 10,
  'readonly' => $npvacsalidas->getId() ? true : false, 
  'onkeyup' => "javascript: mascara(this,'/',patron,true)"/*,
  'onchange'=> remote_function(array(
  'update'   => 'grid',
  'url'      => 'vacsalidas/ajax',
  'condition' => "$('npvacsalidas_codemp').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=2&cajtexdiasvac=npvacsalidas_diasdisfrutar&cajtexfecdesde=npvacsalidas_fecdes&cajtexfechasta=npvacsalidas_fechas&cajtexfecobserva=npvacsalidas_observa&cajtexdiaspend=diaspend&fecing='+$('npvacsalidas_fecing').value+'&codemp='+$('npvacsalidas_codemp').value+'&fecha='+this.value",
        )),*/
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
</tr>
<tr>
<th>
<?php echo label_for('npvacsalidas[fecdes]', __($labels['npvacsalidas{fecdes}']), 'class="required" Style="width:120px"') ?>
<?php $value = object_input_date_tag($npvacsalidas, 'getFecdes', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npvacsalidas[fecdes]',
  'maxlength' => 10,
  'size' => 10,
  'readonly' => $npvacsalidas->getId() ? true : false,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'date_format' => 'dd/MM/yyyy',
  'onBlur'=> remote_function(array(
  'url'      => 'vacsalidas/ajax',
  'condition' => "$('npvacsalidas_codemp').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=4&cajtexdiasvac=npvacsalidas_diasdisfrutar&cajtexdiaspend=diaspend&cajtexfechas=npvacsalidas_fechas&diasvac='+$('npvacsalidas_diasdisfrutar').value+'&codemp='+$('npvacsalidas_codemp').value+'&fecing='+$('npvacsalidas_fecing').value+'&fecdes='+this.value+'&diaspend='+$('diaspend').value+'&valfilgrid='+$('cajocugrid').value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Primer Día de Vacaciones del Empleado') ?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('npvacsalidas[fechas]', __($labels['npvacsalidas{fechas}']), 'class="required" Style="width:120px"') ?>
 <?php $value = object_input_date_tag($npvacsalidas, 'getFechas', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npvacsalidas[fechas]',
  'date_format' => 'dd/MM/yyyy',
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
</th>
<tr>
<th>
  <?php echo label_for('npvacsalidas[diasdisfrutar]', __($labels['npvacsalidas{diasdisfrutar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npvacsalidas{diasdisfrutar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{diasdisfrutar}')): ?>
    <?php echo form_error('npvacsalidas{diasdisfrutar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npvacsalidas, 'getDiasdisfrutar', array (
  'value' => $npvacsalidas->getId()!='' ? $npvacsalidas->getDiasdisfrutar() : '0' ,
  'size' => 7,
  'readonly' => $npvacsalidas->getId() ? true : false,
  'control_name' => 'npvacsalidas[diasdisfrutar]',
  'onBlur'=> remote_function(array(
  'update'   => 'grid',
  'url'      => 'vacsalidas/ajax',
  'condition' => "$('npvacsalidas_codemp').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=3&cajtexdiasvac=npvacsalidas_diasdisfrutar&cajtexdiaspend=diaspend&cajtexfechas=npvacsalidas_fechas&fecdesde='+$('npvacsalidas_fecdes').value+'&diaspend='+$('diaspend').value+'&fecing='+$('npvacsalidas_fecing').value+'&fecvac='+$('npvacsalidas_fecvac').value+'&codemp='+$('npvacsalidas_codemp').value+'&diasvac='+this.value+'&valfilgrid='+$('cajocugrid').value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
 <?php echo label_for('npvacsalidas[diaspend]', __($labels['npvacsalidas{diaspend}']), 'class="required" ') ?>
&nbsp;
<?php echo input_tag('diaspend','0',array('size' => 7,'disabled' => true,)) ?>
    </div>
</th>
</tr>
</table>
 <?php echo label_for('npvacsalidas[observa]', __($labels['npvacsalidas{observa}']), 'class="required" Style="width:125px"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacsalidas{observa}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{observa}')): ?>
    <?php echo form_error('npvacsalidas{observa}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npvacsalidas, 'getObserva', array (
  'size' => 80,
  'control_name' => 'npvacsalidas[observa]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<div class="form-row" id="grid">
<?
echo grid_tag($obj);
?>
</div>

<?php include_partial('edit_actions', array('npvacsalidas' => $npvacsalidas)) ?>

</form>

<ul class="sf_admin_actions">
  <li class="float-left"><?php if ($npvacsalidas->getId()): ?>
<?php echo button_to(__('delete'), 'vacsalidas/delete?id='.$npvacsalidas->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
 </li>
  </ul>
 <script language="JavaScript">
 	if('<?php echo $npvacsalidas->getId(); ?>'!='')
	{
		$('trigger_npvacsalidas_fecvac').hide();
		$('trigger_npvacsalidas_fecdes').hide();
		$('trigger_npvacsalidas_fechas').hide();
	}
	function llenarcajaoculta()
	{
		var totfil = parseInt(obtener_filas_grid('a',1))-1;
		$('cajocugrid').value=$('ax_'+totfil+'_7').value;
	}
	
 </script> 
  
