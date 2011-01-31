<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id='gridfor'>
<?php echo grid_tag_V2($cobtransa->getObjformapagos()); ?>
</div>

<script language="JavaScript" type="text/javascript">
  $('sf_fieldset_none').hide();
  $('divcodtip').hide();
</script>

