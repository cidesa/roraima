<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/21 17:26:03
?>
<?php echo form_tag('nomnomcalnom/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript') ?>
<?php use_helper('Grid') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('SubmitClick') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('nomina/nomnomcalnom') ?>
<?php use_helper('wait') ?>


<?php echo object_input_hidden_tag($npnomina, 'getId') ?>
<?php echo input_hidden_tag('cajocuaux','') ?>
<?php echo input_hidden_tag('controlador','') ?>
<?php echo input_hidden_tag('entorno',$ent) ?>
<?php echo input_hidden_tag('tiempo','') ?>


<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset>
<h2><?php echo __('Tipo de Nomina') ?></h2>
<div class="form-row">
  <?php echo label_for('npnomina[codnom]', __($labels['npnomina{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{codnom}')): ?>
    <?php echo form_error('npnomina{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('npnomina[codnom]', $npnomina->getCodnom(),
    'nomnomcalnom/autocomplete?ajax=1',  array('autocomplete' => 'off','size' => 5, 'maxlength' => 3,
	'onKeypress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();$('npnomina_codnom').value=cadena",
	'onBlur'=> remote_function(array(
			  'url'      => 'nomnomcalnom/ajax',
			  'complete' => 'AjaxJSON(request, json), validarNomina()',
			  'condition' => "$('npnomina_codnom').value != ''",
  			  'with' => "'ajax=1&codigo='+this.value",
			  ))),
     array('use_style' => 'true' )
  )
  ?>

<input id="opsi" type="text" value="" style="display:none">
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefcpt_nomconceptossalariointegral/clase/Npnomina/frame/sf_admin_edit_form/obj1/npnomina_codnom/obj2/npnomina_nomnom/campo1/codnom/campo2/nomnom/param1/1','','','botoncat')?>

  <?php $value = object_input_tag($npnomina, 'getNomnom', array (
  'readonly' => true,
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'npnomina[nomnom]',
)); echo '&nbsp;&nbsp;'.$value ? '&nbsp;&nbsp;'.$value : '&nbsp;' ?>
    </div>

<br>
<div id="numsemanas2">
  <?php echo label_for('npnomina[numsem]', __($labels['npnomina{numsem}']), 'class="required" style=width:70px ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{numsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{numsem}')): ?>
    <?php echo form_error('npnomina{numsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomina, 'getNumsem', array (
  'size' => 3,
  'control_name' => 'npnomina[numsem]',
)); echo $value ? $value : '&nbsp;' ?>

  <strong><?php echo '&nbsp;&nbsp;&nbsp;'.__('semanas') ?></strong>
    </div>
</div>
<br>

</div>
</fieldset>

<br>

<fieldset>
<h2><?php echo __('Fechas de Procesamiento') ?></h2>
<div class="form-row">

<table>
<tr>
	<th>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</th>
	</tr>
	<tr>
	<th>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</th>
</tr>
<tr>
 <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
  <?php echo label_for('npnomina[ultfec]', __($labels['npnomina{ultfec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{ultfec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{ultfec}')): ?>
    <?php echo form_error('npnomina{ultfec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npnomina, 'getUltfec', array (
  'rich' => true,
  //'readonly' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npnomina[ultfec]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>

  <th>
  <?php echo label_for('npnomina[profec]', __($labels['npnomina{profec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{profec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{profec}')): ?>
    <?php echo form_error('npnomina{profec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npnomina, 'getProfec', array (
  'rich' => true,
  //'readonly' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npnomina[profec]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
   </th>
</tr>
<tr>
	<th>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</th>
	</tr>
	<tr>
	<th>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</th>
</tr>
<tr>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>

 <th colspan="2">

  <div id="numsemanas" style="display:none">
  <fieldset>
  <div class="form-row">
   <table>
    <tr>
    <th>
    	<?php echo label_for('labelmsem', __('Nro. de la Semana'), array('class' => 'required', 'style' => 'width:100px' )) ?>
		<?php echo input_tag('msem2','0',array('size' => 5, 'onBlur' => "javascript: validaMsem()")) ?>
    </th>
    <th>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
    <div id="ultimasemana">
     <fieldset>
     <legend><?php echo __('Ultima Semana') ?></legend>
		   <div class="form-row">

			<?php echo __('SI')?><?php echo radiobutton_tag('opsi[]','SI',true).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'?>
			<?php echo __('NO')?><?php echo radiobutton_tag('opsi[]','NO',false)?>
		  </div>
         </fieldset>
     </div>
    </th>
    </tr>
   </table>
   </div>
   </fieldset>
  </div>
 </th>
 <th>
 </th>
</tr>
</table>
</div>
</fieldset>

<ul  class="sf_admin_actions" >
<?php echo submit_to_remote('btnCalcular', 'Calcular Nomina', array(
			   'update'  => 'grid1',
			   'url'      => 'nomnomcalnom/ajax',
			   'script'   => true,
			   'complete' => 'AjaxJSON(request, json), validarCalculo()',
			   'with'     => "'ajax=2&codnom='+$('npnomina_codnom').value+'&numsem='+$('npnomina_numsem').value+'&desde='+$('npnomina_ultfec').value+'&hasta='+$('npnomina_profec').value+'&opsi='+$('opsi').value+'&msem2='+$('msem2').value+'&nomnom='+$('npnomina_nomnom').value",
));

 ?>
</ul>


<div style='width:450px; color: #c11b17; font-size: 14px; font-weight: bold ' >
	<strong>
		<?php echo __('LAS SIGUIENTES NOMINAS SE ESTAN EJECUTANDO')?>
	</strong>
</div>

<BR>
 <div id="grid1">

		<? echo grid_tag($obj); ?>
</div>

</div>
</fieldset>


</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npnomina->getId()): ?>
<?php echo button_to(__('delete'), 'nomnomcalnom/delete?id='.$npnomina->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>


