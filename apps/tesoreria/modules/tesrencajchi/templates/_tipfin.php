<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$opordpag->getId())
{ ?>
<?php echo Catalogo($opordpag,3,array(
  'getprincipal' => 'getTipfin',
  'getsecundario' => 'getNomext2',
  'campoprincipal' => 'tipfin',
  'camposecundario' => 'nomext2',
  'campobase' => 'tipfin_id',
  ), 'Fortipfin_Pagemiord', 'Fortipfin', '', ''); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($opordpag, 'getTipfin' , array (
  'size' => 20,
  'control_name' => 'opordpag[tipfin]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($opordpag, 'getNomext2', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'opordpag[nomext2]',
)); echo $value ? $value : '&nbsp;';

}
?>
<ul class="sf_admin_actions">
<li>
<? if ($opordpag->getId()=='') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'tesrencajchi/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</li>
<? } else { ?>
<li><input name="Comprobante" type="button" value="Comprobantes" class="sf_admin_action_save" onClick="consultarComp()"></li>
<?php } ?>
</ul>

<div id="comp"></div>
<script language="JavaScript" type="text/javascript">
    function comprobante(formulario)
  {
      window.open('/tesoreria_dev.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
   function consultarComp()
  {
    window.open('/tesoreria_dev.php/confincomgen/edit/id/'+document.getElementById("opordpag_idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
</script>
