<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/27 11:31:53
if($nptipcon->getId()=='')
	$readonly="'readonly' => true";
else
	$readonly="";
?>

<?php echo form_tag('presnomtipcon/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($nptipcon, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('nptipcon[codtipcon]', __($labels['nptipcon{codtipcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipcon{codtipcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipcon{codtipcon}')): ?>
    <?php echo form_error('nptipcon{codtipcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipcon, 'getCodtipcon', array (
  'size' => 5,
  'maxlength' => 3,
  'control_name' => 'nptipcon[codtipcon]',
  'readonly' => $nptipcon->getId() ? true : false,
  'onBlur'=> $nptipcon->getId() ? "" : remote_function(array(
			  'url'      => 'presnomtipcon/ajax',
              'before'   => 'var variable=document.getElementById("nptipcon_codtipcon").value;if($("nptipcon_codtipcon").value!="") variable=variable.pad(3, "0",0);document.getElementById("nptipcon_codtipcon").value=variable;',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexcom=nptipcon_codtipcon&cajtexmos=nptipcon_destipcon&codigo='+this.value",
			  )),
)); echo $value ? $value : '&nbsp;' ?>

<?php /* echo  $nptipcon->getId() ? "" : button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nptipcon_Presnomtipcon/clase/Nptipcon/frame/sf_admin_edit_form/obj1/nptipcon_codtipcon/obj2/nptipcon_destipcon/campo1/codtipcon/campo2/destipcon/param1/')*/ ?>



<div class="sf_admin_edit_help"><?php echo __('Máximo 3 caracteres') ?>
</div>

</div>

<br>

  <?php echo label_for('nptipcon[destipcon]', __($labels['nptipcon{destipcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipcon{destipcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipcon{destipcon}')): ?>
    <?php echo form_error('nptipcon{destipcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipcon, 'getDestipcon', array (
  'size' => 50,
  'control_name' => 'nptipcon[destipcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
<br></form>

<div id="divfre" style="display:none">
  <?php echo label_for('nptipcon[frepagcon]', __($labels['nptipcon{frepagcon}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('nptipcon{frepagcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipcon{frepagcon}')): ?>
    <?php echo form_error('nptipcon{frepagcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo select_tag('nptipcon[frepagcon]', options_for_select($listaFrecuenciaPago,$nptipcon->getFrepagcon()));?>
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>
    </div>
</div>

<?php echo label_for('nptipcon[alicuocon]', __($labels['nptipcon{alicuocon}']), 'class="required"') ?>
<div
	class="content<?php if ($sf_request->hasError('nptipcon{alicuocon}')): ?> form-error<?php endif; ?>">
	<?php if ($sf_request->hasError('nptipcon{alicuocon}')): ?>
	<?php echo form_error('nptipcon{alicuocon}', array('class' => 'form-error-msg')) ?>
	<?php endif; ?>

	<?php  $value = object_checkbox_tag($nptipcon, 'getAlicuocon', array (
    'control_name' => 'nptipcon[alicuocon]',)).""; echo $value ? $value : '&nbsp;' ?>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" name="Submit" value="Ver Alicuota" onclick="$('div_alicuota').toggle();" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" name="Submit" value="Ver Nomina" onclick="$('div_nomina').toggle();" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" name="Submit" value="Ver Intereses" onclick="$('div_intereses').toggle();" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" name="Submit" value="Ver Dias por Antiguedad Regimen Antiguo" onclick="$('div_antiguedad').toggle();" />
	</div>	
<br>
 <?php echo label_for('nptipcon[fid]', __($labels['nptipcon{fid}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nptipcon{fid}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipcon{fid}')): ?>
    <?php echo form_error('nptipcon{fid}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php  $value = object_checkbox_tag($nptipcon, 'getFid', array (
    'control_name' => 'nptipcon[fid]',
	'onclick' => "$('divfechafid').toggle();probar();"
	)).""; echo $value ? $value : '&nbsp;' ?>
    </div>	
<br>	
<div id="divfechafid" style="display:none">	
<br>
<?php echo label_for('nptipcon[fecdes]', __($labels['nptipcon{fecdes}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nptipcon{fecdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipcon{fecdes}')): ?>
    <?php echo form_error('nptipcon{fecdes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nptipcon, 'getFecdes', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nptipcon[fecdes]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<br>	

</div>

<div id="div_alicuota" class="form-row" style="display:none">
<?
	echo grid_tag($obj);
?>
</div>

<div class="form-row">
  <?php echo label_for('nptipcon[fecinireg]', __($labels['nptipcon{fecinireg}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nptipcon{fecinireg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipcon{fecinireg}')): ?>
    <?php echo form_error('nptipcon{fecinireg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nptipcon, 'getFecinireg', array (
  'size' => 11,
  'maxlength' => 10,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nptipcon[fecinireg]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

    </div>
<br>

</div>

<div id="div_nomina" class="form-row" style="display:none">
<?
		echo grid_tag($obj_nomina);
?>
</div>
<br>
<br>
<div id="div_intereses" class="form-row" style="display:none">
<?
	echo grid_tag_v2($obj_intereses);
?>
</div>
<br>
<br>
<div id="div_antiguedad" class="form-row" style="display:none">
<?
	echo grid_tag_v2($obj_antiguedad);
?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('nptipcon' => $nptipcon)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($nptipcon->getId()): ?>
<?php echo button_to(__('delete'), 'presnomtipcon/delete?id='.$nptipcon->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script>	
	if($('nptipcon_fid').checked)
		$('divfechafid').show();
	else
		$('divfechafid').hide();
</script>