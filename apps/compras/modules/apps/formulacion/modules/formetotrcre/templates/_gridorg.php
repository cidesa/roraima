<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($formetotrcre->getObjorg());
?>

<div align="center">
<?php echo link_to_function(image_tag('/images/salir.gif'), "ocultarOrganismos()") ?>
</div>

<script type="text/javascript">
$('divgridper').hide();
$('divgridfue').hide();
$('divgridorg').hide();

</script>