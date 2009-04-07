<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<div id="detalle">
<?
	echo grid_tag_v2($opordpag->getObjeto());
?>
</div>

<script language="JavaScript" type="text/javascript">
  ActualizarSaldosGrid("a",new Array("opordpag_monord"));
</script>