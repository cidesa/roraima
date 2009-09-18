<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($tscheemi->getObjeto());
?>

<script language="JavaScript" type="text/javascript">
  var am=parseInt('<?php echo $tscheemi->getFilasord() ?>');
  var j=0;
  while (j<am)
  {
    var fecha="trigger_ax_"+j+"_5";

    $(fecha).hide();
  	j++;
  }
</script>
