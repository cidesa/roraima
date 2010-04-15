<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<h2>ADVERTENCIA</h2>
<br>
<p><b>Recuerde revisar todos los Saldos Anteriores de sus Cuentas, Antes de Ejecutar esta opcion.

<p><b>El Archivo de Saldos por Periodo sera Actualizado y no se permitiran mas modificaciones.
<div id='botones'>
<table>
<tr>
<?php if ($params[0]=='C') : ?>
<td>
<ul class="sf_admin_actions">
<?php echo submit_to_remote('btnAbrir', 'Abrir', array(
			   'update'   => 'botones',
			   'url'      => 'confinciedef/ajax',
			   'script'   => true,
			   'complete' => 'AjaxJSON(request, json)',
			   'with'     => "'ajax=1&params=C'"
)); ?>
</ul>
</td>
<?php endif; ?>

<?php if ($params[0]=='A') : ?>
<td>
<ul class="sf_admin_actions">
<?php echo submit_to_remote('btnCerrar', 'Cerrar', array(
			   'update'   => 'botones',
			   'url'      => 'confinciedef/ajax',
			   'script'   => true,
			   'complete' => 'AjaxJSON(request, json)',
			   'with'     => "'ajax=2&params=A'"
)); ?>
</ul>
</td>
<?php endif; ?>
</tr>
</table>
</div>
