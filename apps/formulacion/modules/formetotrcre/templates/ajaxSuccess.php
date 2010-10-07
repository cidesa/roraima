<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($numajax=='1') { ?>
<?php $value = get_partial('grid', array('type' => 'edit', 'formetotrcre' => $formetotrcre,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($numajax=='5') {?>
<?php $value = get_partial('gridper', array('type' => 'edit', 'formetotrcre' => $formetotrcre,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($numajax=='6') {?>
<?php $value = get_partial('gridfue', array('type' => 'edit', 'formetotrcre' => $formetotrcre,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($numajax=='8') {?>
<?php $value = get_partial('gridorg', array('type' => 'edit', 'formetotrcre' => $formetotrcre,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<script language="JavaScript" type="text/javascript">
distribuirOrganismos();
$('divgridper').hide();
$('divgridfue').hide();
$('divgridorg').show();
</script>
<?php } ?>