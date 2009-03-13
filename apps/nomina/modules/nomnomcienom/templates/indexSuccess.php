<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid','Linktoapp') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<div id="sf_admin_container">
<h1><?php echo __('Cierre de Nómina', array()) ?></h1>
<div id="sf_admin_content">
<?php if ($sf_flash->has('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_flash->get('notice')) ?></h2>
</div>
<?php endif; ?>
<?php echo form_tag('nomnomcienom/index', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipo de Nomina') ?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('codigo',__('Código') , 'class="required" Style="width:110px"') ?>
<?php echo input_tag('codigo','', array(
 'size' => 3,
 'maxlength' => 3,
 'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();$('codigo').value=cadena",
 'onBlur'=> remote_function(array(
			  'update'   => 'divAvisos',
              'url'      => 'nomnomcienom/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('codigo').value != ''",
              'script' => true,
  			  'with' => "'ajax=1&cajtexmos=descripcion&codigo='+this.value"
			  ))
)) ?>
</th>
<th>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npnomina_Nomnomcienom/clase/Npnomina/frame/sf_admin_edit_form/obj1/codigo/obj2/descripcion/obj3/fecha/obj4/frecuencia/obj5/proxcalculo/campo1/codnom/campo2/nomnom/campo3/ultfec/campo4/frecal/campo5/profec/')?>
</th><?php echo input_hidden_tag('proxcalculo', '') ?><?php echo input_hidden_tag('frecuencia', '') ?>
<th><?php echo input_hidden_tag('valida', '') ?>
<?php echo input_tag('descripcion','', array(
 'size' => 40,
 'readonly' => true,
)) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo input_tag('pago','', 'size=15 readonly=true') ?>
</th>
</tr>
</table>

<br>
<?php echo label_for('fecha',__('Última Fecha de Procesamiento') , 'class="required" Style="width:110px"') ?>
<?php echo input_tag('fecha','', array(
 'size' => 15,
 'rich' => true,
 'readonly' => true,
 'date_format' => 'dd/MM/yyyy',
)) ?>
</div>
</fieldset>
</div>

<br>
<div class="form-row">
<div id="divAvisos">
<table width="100%">
<tr>
<th width="80%">
</th>
<th width="20%">
<input type="button" name="Submit" value="Cerrar" disabled="true"/>
</th>
</tr>
</table>
</div>
</div>
</fieldset>
</form>

<script type="text/javascript">
 function importante()
 {
   f=document.sf_admin_edit_form;
   f.action="/nomina_dev.php/nomnomcienom/realizarcierre";
   f.submit();
 }

 function cerrar()
 {
  if ($('valida').value=='N')
  {
    $('importante').show();
    $('mensajes').hide();
  }
  else if ($('valida').value=='S')
  {
   alert('Ya la Nómina fue cerrada con esa fecha');
  }
 }
</script>
</div>
</div>