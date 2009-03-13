<?php //<input type="button" name="Submit" value="Comprobante" onclick="javascript:comprobante()" />?>

<? if ($cireging->getId()=='') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'ingreging/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         )) ?>
<div id="comp">
</div>
<? } else { ?>
<input name="Comprobante" type="button" value="Comprobante" onClick="consultarComp()">

<?php } ?>
