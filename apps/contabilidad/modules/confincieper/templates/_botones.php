<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<h2>ADVERTENCIA</h2>
<br>
<p><b>Al realizar el Cierre del Período, usted no podrá volver a incluir ni actualizar ningún Comprobante del mismo.

<p><b>Asegurese de que toda su información está completa antes de realizar el Cierre.
<table>
<tr>
<td>
<ul class="sf_admin_actions">
<?php echo  submit_tag_click(__('Abrir'), array (
  'name' => 'btnAbrir',
  'params'     => "/accion/1",
  'class' => '',
)) ?>
</ul>
</td>
<td>
<ul class="sf_admin_actions">
<?php echo  submit_tag_click(__('Cerrar'), array (
  'name' => 'btnCerrar',
  'params' => "/accion/2",
  'class' => '',
)) ?>
</ul>
</td>
</tr>
</table>
