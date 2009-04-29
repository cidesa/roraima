<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<div id="detalle">
<?
	echo grid_tag_v2($opordpag->getObjeto());
?>
</div>

<script language="JavaScript" type="text/javascript">
  totalfil('<?php echo $opordpag->getFilasord() ?>');
</script>
