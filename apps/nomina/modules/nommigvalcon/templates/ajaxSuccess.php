<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if($datos) {?>
<div id="divgriddatos">
	<?php echo grid_tag_v2($npasiconemp->getObjcon()); ?>
</div>	
<script>
    $('leer').hide();
    $('cargar').hide();
    $('salvar').show();
</script>
<?php }else { ?>
<script>
    $('leer').show();
    $('cargar').show();
    $('salvar').hide();
</script>
<div id="divgriddatos">
<table width="100%" >
  <tr>
    <th><strong><font color="#CC0000" size="4" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo "No se pudo leer la InformaciÃ³n del Archivo";?></font></strong></th>
  </tr>
</table>
</div>
<?php } ?>	

