<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/14 15:14:58
?>
<?php echo form_tag('tesdefrengas/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tsdefrengas, 'getId') ?>
<?php echo javascript_include_tag('ajax','tools','dFilter') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipo de Movimiento para Apertura o Reposicion de Caja Chica') ?></legend>
<div class="form-row">
 <table>
  <tr>
   <th> <?php echo label_for('tsdefrengas[pagrepcaj]', __($labels['tsdefrengas{pagrepcaj}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefrengas{pagrepcaj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefrengas{pagrepcaj}')): ?>
    <?php echo form_error('tsdefrengas{pagrepcaj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefrengas, 'getPagrepcaj', array (
  'size' => 20,
  'maxlength' => 4,
  'control_name' => 'tsdefrengas[pagrepcaj]',
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tsdefrengas_pagrepcaj').value=cadena",
  'onBlur'=> remote_function(array(
			  'url'      => 'tesdefrengas/ajax',
			  'complete' => 'AjaxJSON(request, json), verificar3()',
			  'condition' => "$('tsdefrengas_pagrepcaj').value != ''",
  			  'with' => "'ajax=1&cajtexmos=tsdefrengas_nomext&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?></div></th>
   <th>&nbsp;&nbsp;&nbsp;
   <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsdefrengas_tesdefrengas/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/tsdefrengas_pagrepcaj/obj2/tsdefrengas_nomext/campo1/tipcau/campo2/nomext/param1/1')?>
   </th>
   <th><?php $value = object_input_tag($tsdefrengas, 'getNomext', array (
  'disabled' => true,
  'size' => 45,
  'control_name' => 'tsdefrengas[nomext]',
)); echo $value ? $value : '&nbsp;' ?></th><?php echo input_hidden_tag('extra', '') ?>
  </tr>
 </table>

 <br>

 <table>
  <tr>
   <th> <?php echo label_for('tsdefrengas[ctarepcaj]', __($labels['tsdefrengas{ctarepcaj}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefrengas{ctarepcaj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefrengas{ctarepcaj}')): ?>
    <?php echo form_error('tsdefrengas{ctarepcaj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefrengas, 'getCtarepcaj', array (
  'size' => 20,
  'maxlength' => $loncta,
  'control_name' => 'tsdefrengas[ctarepcaj]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
			  'url'      => 'tesdefrengas/ajax',
			  'complete' => 'AjaxJSON(request, json), verificar("tsdefrengas_ctarepcaj","tsdefrengas_descta")',
			  'condition' => "$('tsdefrengas_ctarepcaj').value != ''",
  			  'with' => "'ajax=2&cajtexmos=tsdefrengas_descta&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?></div></th>
   <th>&nbsp;&nbsp;&nbsp;
   <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsdefrengas_tesdefrengas/clase/Contabb/frame/sf_admin_edit_form/obj1/tsdefrengas_descta/obj2/tsdefrengas_ctarepcaj/campo1/descta/campo2/codcta/param1/2')?>
   </th>
   <th><?php $value = object_input_tag($tsdefrengas, 'getDescta', array (
  'disabled' => true,
  'size' => 45,
  'control_name' => 'tsdefrengas[descta]',
)); echo $value ? $value : '&nbsp;' ?></th><?php echo input_hidden_tag('cargable', '') ?>
  </tr>
 </table>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Cuenta para la Rendición de Gastos de Anticipo')?></legend>
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('tsdefrengas[ctacheant]', __($labels['tsdefrengas{ctacheant}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefrengas{ctacheant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefrengas{ctacheant}')): ?>
    <?php echo form_error('tsdefrengas{ctacheant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefrengas, 'getCtacheant', array (
  'size' => 20,
  'maxlength' => $loncta,
  'control_name' => 'tsdefrengas[ctacheant]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
			  'url'      => 'tesdefrengas/ajax',
			  'complete' => 'AjaxJSON(request, json), verificar("tsdefrengas_ctacheant","tsdefrengas_descta2")',
			  'condition' => "$('tsdefrengas_ctacheant').value != ''",
  			  'with' => "'ajax=2&cajtexmos=tsdefrengas_descta2&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?></div></th>
    <th>&nbsp;&nbsp;&nbsp;
    <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsdefrengas_tesdefrengas/clase/Contabb/frame/sf_admin_edit_form/obj1/tsdefrengas_descta2/obj2/tsdefrengas_ctacheant/campo1/descta/campo2/codcta/param1/2')?>
    </th>
    <th><?php $value = object_input_tag($tsdefrengas, 'getDescta2', array (
  'disabled' => true,
  'size' => 45,
  'control_name' => 'tsdefrengas[descta2]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>
</div>
</fieldset>

<br>


<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipo de Movimiento según Libro para Reintegro de Caja Chica')?></legend>
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('tsdefrengas[movreicaj]', __($labels['tsdefrengas{movreicaj}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefrengas{movreicaj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefrengas{movreicaj}')): ?>
    <?php echo form_error('tsdefrengas{movreicaj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefrengas, 'getMovreicaj', array (
  'size' => 25,
  'maxlength' => 4,
  'control_name' => 'tsdefrengas[movreicaj]',
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tsdefrengas_movreicaj').value=cadena",
  'onBlur'=> remote_function(array(
			  'url'      => 'tesdefrengas/ajax',
			  'complete' => 'AjaxJSON(request, json),verificar2()',
			  'condition' => "$('tsdefrengas_movreicaj').value != ''",
  			  'with' => "'ajax=4&cajtexmos=tsdefrengas_destip&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?></div></th>
    <th>&nbsp;&nbsp;&nbsp;
    <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsdefrengas_tesdefrengas/clase/Tstipmov/frame/sf_admin_edit_form/obj1/tsdefrengas_destip/obj2/tsdefrengas_movreicaj/campo1/destip/campo2/codtip/param1/3')?>
    </th>
    <th><?php $value = object_input_tag($tsdefrengas, 'getDestip', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'tsdefrengas[destip]',
)); echo $value ? $value : '&nbsp;' ?></th><?php echo input_hidden_tag('nodeb', '') ?>
   </tr>
  </table>
</div>
</fieldset>
</div>
</fieldset>
<?php include_partial('edit_actions', array('tsdefrengas' => $tsdefrengas)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($tsdefrengas->getId()): ?>
<?php echo button_to(__('delete'), 'tesdefrengas/delete?id='.$tsdefrengas->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script language="JavaScript" type="text/javascript">
  function verificar(id,id2)
{
  if ($('cargable').value=='N' && $(id).value!="")
  {
  	alert('La Cuenta Contable no es Cargable, Por favor Cambiela por una Cuenta Cargable');
  	$(id).value="";
  	$(id2).value="";
  	$('cargable').value="";

  }
}
   function verificar2()
   {
	 if ($('nodeb').value=='N' && $('tsdefrengas_movreicaj').value!="")
	 {
	 	alert('El tipo de Movimiento No afecta Débitos');
	 	$('tsdefrengas_movreicaj').value="";
	 	$('tsdefrengas_destip').value="";
	 }
   }

   function verificar3()
   {
	 if ($('extra').value=='N' && $('tsdefrengas_pagrepcaj').value!="")
	 {
	 	alert('El Tipo de Causado no es de Extrapresupuesto');
	 	$('tsdefrengas_pagrepcaj').value="";
	 	$('tsdefrengas_nomext').value="";
	 }
   }
</script>
