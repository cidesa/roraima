<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($contabc->getStacom()=='D') { ?>
<ul class="sf_admin_actions">
<?php echo submit_to_remote('btnActualizar', 'Actualizar', array(
			   'url'      => 'confincomaj/ajax',
			   'script'   => true,
			   'complete' => 'AjaxJSON(request, json)',
			   'submit' => 'sf_admin_edit_form'
				 ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</ul>
<?php } ?>





