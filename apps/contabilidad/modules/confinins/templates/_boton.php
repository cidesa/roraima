<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<ul  class="sf_admin_actions" >
<?php echo submit_to_remote('btnDistribuir', 'Distribuir', array(
			   'update'  => 'grid',
			   'url'      => 'confinins/ajax',
			   'script'   => true,
			   'complete' => 'AjaxJSON(request, json)',

			   'with'     => "'ajax=1&fecini='+$('contaba_fecini').value+'&feccie='+$('contaba_feccie').value",
));

 ?>
</ul>
