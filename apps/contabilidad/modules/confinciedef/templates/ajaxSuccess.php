<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<table>
<tr>
<?php if ($params=='A') : ?>
<script> alert('La Etapa de Definicion se Cerrado'); </script>
<td>
<ul class="sf_admin_actions">
<?php
	echo submit_to_remote('btnAbrir', 'Abrir', array(
			   'update'   => 'botones',
			   'url'      => 'confinciedef/ajax',
			   'script'   => true,
			   'complete' => 'AjaxJSON(request, json)',
			   'with'     => "'ajax=1&params=C'"
)); ?>
</ul>
</td>
<?php endif; ?>

<?php if ($params=='C') : ?>
<script> alert('La Etapa de Definicion se Abierto'); </script>
<td>
<ul class="sf_admin_actions">
<?php
	echo submit_to_remote('btnCerrar', 'Cerrar', array(
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