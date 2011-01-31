<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N', 'PopUp') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>

<?php if ($visible=='0')
{?>
<div id="mensajes">

<table width="95%">
<tr>
<th>
<fieldset id="sf_fieldset_none" class="">
				<div class="form-error">
					<h2 align="center"><?php  echo __('::: A d v e r t e n c i a :::'); ?></h2>
						<dl>
							<dt>
								<?php echo __('Es Recomendable Respaldar los Datos antes de Procesar el Cierre de Nómina.') ?>
							</dt>
						</dl>
						<dl>
							<dt>
								<input type="button" name="Submit" value="      Cerrar" class="sf_admin_action_cancel" onclick="javascript:cerrar();" />
							</dt>
						</dl>

				</div>

</fieldset>
</th>
</tr>

</table>


</div>
<div id="importante" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('::: I m p o r t a n t e :::') ?></h2>

<p>
<h3 align="center">
<?php echo __('Al realizar el cierre de nómina se generaran los registros necesarios para el proceso
de emisión de la orden de pago de nómina. Por lo tanto es necesario verificar los reportes de
disponibilidad presupuestaria para evitar inconvenientes al momento de generar la orden de pago.
') ?>
</h3>
</p>

<br>

<table width="100%">
<tr align="center">
<th width="50%" align="center">
<ul  class="sf_admin_actions" >
	<input type="button" name="Submit1" value="Realizar Cierre" class="sf_admin_action_save" onclick="importante();" />
	<input type="button" name="Submit2" value="Salir sin Cerrar" class="sf_admin_action_cancel" onclick=" $('mensajes').show(); $('importante').hide();" />
</ul>

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

				<div class="form-errors">
					<h2 align="center"><?php  echo __('::: E r r o r :::'); ?></h2>
						<dl>
							<dt>
								Esta Nómina No ha sido Calculada...
							</dt>

							<td width="20%">
									<input type="button" name="Submit" value="Cerrar" disabled="true"/>
							</td>

						</dl>
				</div>
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