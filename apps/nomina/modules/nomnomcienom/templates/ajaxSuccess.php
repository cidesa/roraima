<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N', 'PopUp') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>

<?php if ($visible=='0')
{?>
<div id="mensajes">
<table width="100%">
<tr>
<th width="80%">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<p>
<?php echo __('Es recomendable respaldar los datos antes de procesar el cierre de nómina.') ?>
</p>
</div>
</fieldset>
</th>
<th width="20%">
<input type="button" name="Submit" value="Cerrar" onclick="javascript:cerrar();" />
</th>
</tr>
</table>
</div>
<div id="importante" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Importante') ?></legend>

<p>
<?php echo __('Al realizar el cierre de nómina se generaran los registros necesarios para el proceso
de emisión de la orden de pago de nómina. Por lo tanto es necesario verificar los reportes de
disponibilidad presupuestaria para evitar inconvenientes al momento de generar la orden de pago.
') ?>
</p>

<br>

<table width="100%">
<tr>
<th width="50%" align="center">
<input type="button" name="Submit1" value="Realizar Cierre" onclick="importante();" />
</th>
<th width="50%" align="center">
<input type="button" name="Submit2" value="Salir sin Cerrar" onclick=" $('mensajes').show(); $('importante').hide();" />
</th>
</tr>
</table>

</div>
</fieldset>
</div>
<?}else if ($visible=='1'){?>
<div id="mensajes">
<table width="100%">
<tr>
<th width="80%">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<p>
<?php echo __('Esta nómina no ha sido calculada...') ?>
</p>
</div>
</fieldset>
</th>
<th width="20%">
<input type="button" name="Submit" value="Cerrar" disabled="true"/>
</th>
</tr>
</table>
</div>
<?}else if ($visible==""){?>
<script type="text/javascript">
 alert('El Código de la Nómina no existe');
</script>
<?}else {?>
<div id="mensajes">
<table width="100%">
<tr>
<th width="80%">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<p>
<?php echo __('Esta nómina ya fue cerrada...') ?>
</p>
</div>
</fieldset>
</th>
<th width="20%">
<input type="button" name="Submit" value="Cerrar" disabled="true"/>
</th>
</tr>
</table>
</div>
<?}?>