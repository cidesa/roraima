<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<table>
<tr>
<td>
<ul class="sf_admin_actions">
<?php echo submit_to_remote('btnTrasladar', 'Trasladar Saldos', array(
			   'url'      => 'confincie/btntrasladar',
			   'script'   => true,
			   'complete' => 'AjaxJSON(request, json)',
				'submit' => 'sf_admin_edit_form',
				 ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</ul>
</td>
<td>
<ul class="sf_admin_actions">
 <?php echo submit_to_remote('btnGenerar', 'Generar Comprobantes de Cierre', array(
         'url'      => 'confincie/Ajaxcomprobante',
         'update'   => 'divcompro',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</ul>
</td>
<div id="divcompro"></div>
</tr>
</table>
