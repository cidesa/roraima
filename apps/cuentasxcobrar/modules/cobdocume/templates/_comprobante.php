<ul class="sf_admin_actions">
<li>
<? if ($cobdocume->getId()=='') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'cobdocume/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</li>
<? } else { ?>
<li><input name="Comprobante" type="button" value="Comprobante" onClick="consultarComp()"></li>

<?php } ?>
</ul>

<div id="comp"></div>

<?php if (SF_ENVIRONMENT=='dev') $dev ='_dev'; else $dev=''; ?>

<script language="JavaScript" type="text/javascript">
    function comprobante(formulario)
  {
      window.open('/tesoreria<?php echo $dev ?>.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
   function consultarComp()
  {
    window.open('/tesoreria<?php echo $dev ?>.php/confincomgen/edit/id/'+document.getElementById("cobdocume_refcomcon").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
</script>
