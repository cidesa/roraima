<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($numajax=='1') { ?>
<?php $value = get_partial('grid', array('type' => 'edit', 'forestcos' => $forestcos,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($numajax=='5') {?>
<?php $value = get_partial('gridper', array('type' => 'edit', 'forestcos' => $forestcos,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($numajax=='6') {?>
<?php $value = get_partial('gridfue', array('type' => 'edit', 'forestcos' => $forestcos,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<script language="JavaScript" type="text/javascript">
$('divgridper').hide();
$('divgridfue').show();
</script>
<?php } ?>

